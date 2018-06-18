<?php

namespace App\Http\Controllers;

use App\Alarm;
use App\Event;
use App\Guest;
use App\Housekeeping;
use App\PetCare;
use App\Restaurant;
use App\Room;
use App\RoomType;
use App\SnacksAndDrink;
use App\SpaAppointment;
use App\Taxi;
use App\Trip;
use Barryvdh\DomPDF\Facade as PDF;
use Faker\Factory as Faker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class GuestController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guests = Guest::paginate(15);

        return view('admin.guest.index', compact('guests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roomTypes = RoomType::pluck('name', 'id');

        return view('admin.guest.create', compact('roomTypes'));
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
        $input     = Input::all();
        dd($input);
        $rules     = [
            'firstname'     => 'required|max:30',
            'lastname'      => 'required|max:30',
            'nif'           => 'required',
            'email'         => 'required|email',
            'telephone'     => 'required|numeric',
            'checkin_date'  => 'required|date',
            'checkout_date' => 'required|date',
            'type_id'       => 'required',
            'number'        => 'required',
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->passes()) {
            try {
                DB::beginTransaction();
                $newGuest = Guest::create($input);
                $code     = substr(Faker::create()->hexColor, 1);
                $newBook  = Room::where(['number' => $input['number'], 'status' => null])->first();
                $newBook->update(['code' => $code, 'status' => 0]);
                $newGuest->rooms()->sync([
                    $newBook->id => [
                        'checkin_date'  => $input['checkin_date'],
                        'checkout_date' => $input['checkout_date'],
                    ],
                ]);

                DB::commit();

                $return = redirect()->route('guests.index')
                    ->with('status', 'Guest added successfully. Code Generated: ' . $code);
            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }
        } else {
            $return = redirect()->route('guests.create')->withErrors($validator->getMessageBag());
        }

        return $return;


    }

    /**
     * Display the specified resource.
     *
     * @param $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guest       = Guest::find($id);
        $guest->code = $guest->rooms[0]->code;

        return view('admin.guest.show', compact('guest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guest                = Guest::find($id);
        $guest->checkin_date  = $guest->rooms[0]->pivot->checkin_date;
        $guest->checkout_date = $guest->rooms[0]->pivot->checkout_date;

        return view('admin.guest.edit', compact('guest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param                           $id
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function update(Request $request, $id)
    {
        $input     = Input::all();
        $rules     = [
            'firstname'     => 'required|max:30',
            'lastname'      => 'required|max:30',
            'nif'           => 'required',
            'email'         => 'required|email',
            'telephone'     => 'required',
            'checkin_date'  => 'date',
            'checkout_date' => 'required|date',
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->passes()) {
            try {
                DB::beginTransaction();
                $guest = Guest::find($id);
                $guest->update($input);
                $guest->rooms()->sync([
                    $guest->rooms[0]->id => [
                        'checkin_date'  => $input['checkin_date'],
                        'checkout_date' => $input['checkout_date'],
                    ],
                ]);

                DB::commit();

                $return = redirect()->route('guests.index')
                    ->with('status', 'Guest updated successfully');
            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }
        } else {
            $return = redirect()->route('guests.edit', $id)->withErrors($validator->getMessageBag());
        }

        return $return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guest $guest
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $guest      = Guest::find($id);
        $roomNumber = $guest->rooms[0]->number; //foreach si se quiere dar de baja a todas las habitaciones.
        $room       = Room::where('number', $roomNumber)->first();
        $room->update(['code' => null, 'status' => null]);//habitación queda libre.
        $guest->rooms()->sync([]);
        $guest->alarms()->delete();
        $guest->taxis()->delete();
        $guest->restaurants()->delete();
        $guest->snacks()->delete();
        $guest->houseKeepings()->delete();
        $guest->events()->delete();
        $guest->trips()->delete();
        $guest->petCares()->delete();
        $guest->spas()->delete();
        $guest->delete();

        $totalGuests = Guest::getGuestsByCheckoutDate()->count();
        if ($request->ajax()) {
            $return = response()->json([
                'total'   => $totalGuests,
                'message' => 'Guest number: ' . $id . ' was checked out',
            ]);
        } else {
            $return = redirect()->back()->with('status', 'Guest deleted successfully');
        }

        return $return;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param                          $id
     * @param null                     $disAdapted
     * @param null                     $jacuzzi
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAvailableRooms(Request $request, $id, $disAdapted = null, $jacuzzi = null)
    {
        if ($disAdapted && $jacuzzi) {
            $availableRooms = Room::getRoomsByType($id, $disAdapted, $jacuzzi);
        } elseif ($disAdapted) {
            $availableRooms = Room::getRoomsByType($id, $disAdapted, null);
        } elseif ($jacuzzi) {
            $availableRooms = Room::getRoomsByType($id, null, $jacuzzi);
        } else {
            $availableRooms = Room::getRoomsByType($id);
        }

        if ($request->ajax()) {
            return response()->json($availableRooms);
        }
    }

    /**
     *
     */
    public function changeStatus()
    {
        $guestId      = Session::get('guest_id');
        $guest        = Guest::findOrFail($guestId);
        $room         = Room::findOrFail($guest->rooms[0]->id);
        $room->status = ! $room->status;
        $room->save();

        //        return response()->json($room->status);
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function seeStatusGuest($id = null)
    {
        if ($id !== null) {
            return response()->json(Guest::findOrFail($id)->rooms[0]->status);
        } else {
            return response()->json(Guest::findOrFail(Session::get('guest_id'))->rooms[0]->status);
        }
    }

    /**
     * @return mixed
     */
    public function getCheckout()
    {
        return Guest::getCheckoutByGuestId(Session::get('guest_id'));
    }

    public function getOrderHistoryByGuest($id = null)
    {
        if ($id == null) {
            $id = Session::get('guest_id');
        }
        $restaurants    = Restaurant::getOrderHistoryByGuest($id);
        $taxis          = Taxi::getOrderHistoryByGuest($id);
        $alarms         = Alarm::getOrderHistoryByGuest($id);
        $events         = Event::getOrderHistoryByGuest($id);
        $houseKeepings  = Housekeeping::getOrderHistoryByGuest($id);
        $petCare        = PetCare::getOrderHistoryByGuest($id);
        $snackAndDrinks = SnacksAndDrink::getOrderHistoryByGuest($id);
        $spas           = SpaAppointment::getOrderHistoryByGuest($id);
        $trips          = Trip::getOrderHistoryByGuest($id);
        $orders         = collect(array_collapse([
            $restaurants,
            $taxis,
            $alarms,
            $events,
            $houseKeepings,
            $petCare,
            $snackAndDrinks,
            $spas,
            $trips,
        ]));
        //sortByDesc('created_at');
        $orders = $orders->sortByDesc('created_at');
        $list   = [];
        foreach ($orders as $order) {
            $list[] = $order;
        }
        $orders = $list;

        return $orders;
    }

    public function pdf($roomId)
    {
        $room   = Room::find($roomId);
        $guests = $room->guests;
        $orders = [];
        foreach ($guests as $guest) {
            $orders[] = self::getOrderHistoryByGuest($guest->id);
        }
        $pdf = PDF::loadView('admin.guest.pdf.summary', compact('guests', 'orders'));

        return $pdf->stream('summary.pdf');
    }
}
