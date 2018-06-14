<?php

namespace App\Http\Controllers;

use App\Events\NewOrderRequest;
use App\Guest;
use App\PetCare;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PetCareController extends Controller
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
        $petcares = PetCare::paginate(12);

        return view('services.petcare.index', compact('petcares'));
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

        return view('services.petcare.create', compact('guests'));
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
        $rules = [
            'guest_id' => 'required|numeric',
            'water'    => 'required_without_all:snacks,food|boolean',
            'snacks'   => 'required_without_all:water,food|boolean',
            'food'     => 'required',
        ];

        $validator = Validator::make($input, $rules);
        if ($validator->passes()) {
            try {
                DB::beginTransaction();

                $input['water']  = (isset($input['water'])) ? true : false;
                $input['snacks'] = (isset($input['snacks'])) ? true : false;

                if (isset($input['food'])) {
                    $input['standard_food'] = ($input['food'] == 'standard_food') ? true : false;
                    $input['premium_food']  = ($input['food'] == 'premium_food') ? true : false;
                }

                $input['order_date'] = Carbon::today();
                $input['status']     = '0';
                $guest               = Guest::find($input['guest_id']);
                $petcare             = $guest->petcares()->create($input);
                DB::commit();
                event(new NewOrderRequest($petcare->service_id, $input['guest_id'], $petcare->id));

                if ($request->ajax()) {
                    //$return = ['status' => true];
                    return; //cambio para Cristian
                } else {
                    $return = redirect()->route('petcare.index')->with('status', 'Order added successfully.');
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
                $return = redirect()->route('petcare.create')->withErrors($validator->getMessageBag());
            }
        }

        return $return;
    }

    /**
     * Display the specified resource.
     *
     * @param \App\PetCare $petcare
     *
     * @return \Illuminate\Http\Response
     */
    public function show(PetCare $petcare)
    {
        $guest = Guest::find($petcare->guest_id);

        return view('services.petcare.show', compact('petcare', 'guest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\PetCare $petcare
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(PetCare $petcare)
    {
        $guests = Guest::all();
        foreach ($guests as $guest) {
            $guest->guestRoomNumber = (isset($guest->rooms[0]->number))
                ? $guest->rooms[0]->number . ' - ' . $guest->firstname . ' ' . $guest->lastname : 'Not Found';
        }
        $guests = $guests->pluck('guestRoomNumber', 'id');

        return view('services.petcare.edit', compact('petcare', 'guests'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function update(Request $request, $id)
    {
        $input     = Input::all();
        $rules     = [
            'guest_id' => 'numeric',
            'water'    => 'required_without_all:snacks,food|boolean',
            'snacks'   => 'required_without_all:water,food|boolean',
            'food'     => 'required_without_all:water,snacks',
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->passes()) {
            try {
                DB::beginTransaction();

                $input['water']  = (isset($input['water'])) ? true : false;
                $input['snacks'] = (isset($input['snacks'])) ? true : false;

                if (isset($input['food'])) {
                    $input['standard_food'] = ($input['food'] == 'standard_food') ? true : false;
                    $input['premium_food']  = ($input['food'] == 'premium_food') ? true : false;
                }
                //$input['order_date'] = Carbon::today();
                //$input['status']     = 1;
                $petCare = PetCare::find($id);
                $petCare->update($input);
                DB::commit();

                $return = redirect()->route('petcare.index')->with('status', 'Order updated successfully.');
            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }
        } else {
            $return = redirect()->route('petcare.edit', $id)->withErrors($validator->getMessageBag());
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
        PetCare::find($id)->delete();
        $totalOrders = PetCare::all()->count();
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
        $petCare         = PetCare::findOrFail($id);
        $petCare->status = ($petCare->status === '1') ? '2' : '1';
        $petCare->save();

        return response()->json($petCare->status);
    }

    /**
     * @return mixed
     */
    public function orderList()
    {
        $petCare = PetCare::where('guest_id', Session::get('guest_id'))->get();

        return $petCare;
    }
}
