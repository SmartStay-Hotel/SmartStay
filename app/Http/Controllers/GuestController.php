<?php

namespace App\Http\Controllers;

use App\Guest;
use App\Room;
use App\RoomType;
use Faker\Factory as Faker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
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
        $guests = Guest::all();

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
        $rules     = [
            'firstname'     => 'required|max:30',
            'lastname'      => 'required|max:30',
            'nie'           => 'required',
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
     * @param  \App\Guest $guest
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guest = Guest::find($id);
        $guest->code = $guest->rooms[0]->code;

        return view('admin.guest.show', compact('guest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guest $guest
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
     * @param  \App\Guest               $guest
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
            'nie'           => 'required',
            'email'         => 'required|email',
            'telephone'     => 'required',
            'checkin_date'  => 'required|date',
            'checkout_date' => 'required|date',
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->passes()) {
            try {
                DB::beginTransaction();
                $guest = Guest::find($id);
                $guest->update($input);
                $guest->rooms()->sync([
                    $guest->id => [
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
    public function destroy($id)
    {
        $guest      = Guest::find($id);
        $roomNumber = $guest->rooms[0]->number; //foreach si se quiere dar de baja a todas las habitaciones.
        $room       = Room::where('number', $roomNumber)->first();
        $room->update(['code' => null, 'status' => null]);//habitación queda libre.
        $guest->rooms()->sync([]);
        $guest->delete();

        return redirect()->route('guests.index')->with('status', 'Guest deleted successfully');
    }

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
}
