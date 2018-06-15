<?php

namespace App\Http\Controllers;

use App\Events\NewOrderRequest;
use App\Guest;
use App\Trip;
use App\TripType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TripController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['index', 'create', 'show', 'edit', 'update', 'changeStatus']]);
        $this->middleware('auth', ['except' => ['orderList', 'store', 'destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trips = Trip::paginate(12);
        $tripTypes = TripType::all();

        return view('services.trip.index', compact('trips', 'tripTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guests = Guest::all();
        foreach ($guests as $guest) {
            $guest->guestRoomNumber = (isset($guest->rooms[0]->number))
                ? $guest->rooms[0]->number . ' - ' . $guest->firstname . ' ' . $guest->lastname : 'Not Found';
        }
        $guests = $guests->pluck('guestRoomNumber', 'id');

        $tripTypes = TripType::all();
        foreach ($tripTypes as $tripType) {
            $tripType->tripname = $tripType->name;
        }
        $tripTypes = $tripTypes->pluck('tripname', 'id');

        return view('services.trip.create', compact('guests', 'tripTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function store(Request $request)
    {
        $input = Input::all();

        if ($request->ajax()) {
            if (Session::exists('guest_id')) {
                $input['guest_id'] = Session::get('guest_id');
            } else {
                return response()->json(['status' => false]);
            }
        }

        $rules     = [
            'guest_id'     => 'required|numeric',
            'trip_type_id' => 'required|numeric',
            'people_num'   => 'required|numeric|max:150',
        ];
        $validator = Validator::make($input, $rules);

        if ($validator->passes()) {
            $maxPeople       = TripType::getMaxPeopleByEvent($input['trip_type_id']);
            $peopleGoing     = Trip::getNumPeopleOnTheList($input['trip_type_id']);
            $availablePlaces = $maxPeople - $peopleGoing;
            if ($availablePlaces < $input['people_num']) {
                if ($request->ajax()) {
                    return $availablePlaces;
                }
                return redirect()->route('trip.create')->withErrors([
                    'Only ' . $availablePlaces . ' available places',
                ]);
            }
            try {
                DB::beginTransaction();
                $input['order_date'] = Carbon::today();
                $input['status']     = '0';
                $input['price']      = TripType::getPriceById($input['trip_type_id']) * $input['people_num'];
                $guest               = Guest::find($input['guest_id']);
                $trip                = $guest->trips()->create($input);
                DB::commit();

                event(new NewOrderRequest($trip->service_id, $input['guest_id'], $trip->id));

                if ($request->ajax()) {
                    //$return = ['status' => true];
                    return; //cambio para Cristian
                } else {
                    $return = redirect()->route('trip.index')->with('status', 'Order added successfully.');
                }
            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }
        } else {
            // No pasó el validador
            if ($request->ajax()) {
                //$return = ['status' => false];
                //return; //cambio para Cristian
            } else {
                $return = redirect()->route('trip.create')->withErrors($validator->getMessageBag());
            }
        }

        return $return;
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Trip $trip
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Trip $trip)
    {
        $guest = Guest::find($trip->guest_id);

        return view('services.trip.show', compact('trip', 'guest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Trip $trip
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Trip $trip)
    {
        $guests = Guest::all();
        foreach ($guests as $guest) {
            $guest->guestRoomNumber = (isset($guest->rooms[0]->number))
                ? $guest->rooms[0]->number . ' - ' . $guest->firstname . ' ' . $guest->lastname : 'Not Found';
        }
        $guests = $guests->pluck('guestRoomNumber', 'id');

        $tripTypes = TripType::all();
        foreach ($tripTypes as $tripType) {
            $tripType->tripname = $tripType->name;
        }
        $tripTypes = $tripTypes->pluck('tripname', 'id');

        return view('services.trip.edit', compact('guests', 'trip', 'tripTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param \App\Trip                 $trip
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function update(Request $request, Trip $trip)
    {
        $input                 = Input::all();
        $input['guest_id']     = (isset($input['guest_id'])) ? $input['guest_id'] : $trip->guest_id;
        $input['trip_type_id'] = (isset($input['trip_type_id'])) ? $input['trip_type_id'] : $trip->trip_type_id;

        $rules     = [
            'guest_id'     => 'required|numeric',
            'trip_type_id' => 'required|numeric',
            'people_num'   => 'required|numeric|max:150',
        ];
        $validator = Validator::make($input, $rules);

        if ($validator->passes()) {
            $maxPeople       = TripType::getMaxPeopleByEvent($input['trip_type_id']);
            $peopleGoing     = Trip::getNumPeopleOnTheList($input['trip_type_id']);
            $availablePlaces = $maxPeople - $peopleGoing;

            if ($availablePlaces < $input['people_num']) {
                return redirect()->route('trip.edit', $trip->id)->withErrors([
                    'Only ' . $availablePlaces . ' available places',
                ]);
            }
            try {
                DB::beginTransaction();

                $trip = Trip::find($trip->id);
                $input['price']      = TripType::getPriceById($input['trip_type_id']) * $input['people_num'];
                $trip->update($input);
                DB::commit();

                $return = redirect()->route('trip.index')->with('status', 'Order updated successfully.');
            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }
        } else {
            $return = redirect()->route('trip.edit', $trip->id)->withErrors($validator->getMessageBag());
        }

        return $return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Trip::find($id)->delete();
        $totalOrders = Trip::all()->count();
        if ($request->ajax()) {
            $return = response()->json([
                'total'   => $totalOrders,
                'message' => 'Order number: ' . $id . ' was deleted',
            ]);
        } else {
            $return = redirect()->back()->with('status', 'Guest deleted successfully');
        }

        return $return;
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeStatus($id)
    {
        $trip         = Trip::findOrFail($id);
        ($trip->status == 2) ? Guest::reduceBalance($trip) : null;
        $trip->status = ($trip->status === '1') ? '2' : '1';
        ($trip->status == 2) ? Guest::updateBalance($trip) : null;
        $trip->save();

        return response()->json($trip->status);
    }

    /**
     * @return mixed
     */
    public function orderList()
    {
        $trip = Trip::where('guest_id', Session::get('guest_id'))->get();

        return $trip;
    }
}
