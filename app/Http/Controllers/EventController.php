<?php

namespace App\Http\Controllers;

use App\Event;
use App\Event_types;
use App\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Pasarle más información!!! Es posible?
        $events = Event::all();
        return view('services.event.index', compact('events'));
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
            $guest->guestRoomNumber = $guest->rooms[0]->number . ' - ' . $guest->firstname . ' ' . $guest->lastname;
        }
        $guests = $guests->pluck('guestRoomNumber', 'id');
        $eventTypes = Event_types::all();

        return view('services.event.create', compact('guests', 'eventTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
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
            'guest_id'      => 'required|numeric',
            'day_hour'      => 'required|date',
            'event_type_id'  =>'required|numeric',
        ];
        $validator = Validator::make($input, $rules);

        if ($validator->passes()) {
            DB::beginTransaction();
            DB::commit();
        }
/////////////////////// OLD Code //////////////////////////
        $order_date = date('Y-m-d');
        //Trip_types::find($trip->id); Obtener el precio de la tabla Tryp_types
        Event::create([
            'guest_id'      => $request->guest,
            'order_date'    => $order_date,
            'event_type_id' => $request->eventtype,
            'status'        => '1',
        ]);

        return redirect('/service/event');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $data = [
            'guest'     => Guest::find($event->guest_id),
            'eventType' => Event_types::find($event->event_type_id),
            'event'     => $event,
        ];

        return view('services.event.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $data = [
            'guests'     => Guest::all(),
            'eventTypes' => Event_types::all(),
            'event'      => $event,
        ];

        return view('services.event.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order_date = date('Y-m-d');
        Event::find($id)->update([
            'guest_id'      => $request->guest,
            'event_type_id' => $request->eventtype,
            'order_date'    => $order_date,
            'status'        => '1',
        ]);

        return redirect('/service/event');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::find($id)->delete();

        return redirect('/service/event');
    }

    public function changeStatus($id)
    {
        $event         = Event::findOrFail($id);
        $event->status = ($event->status === '2') ? '1' : '2';
        $event->save();

        return response()->json($event->status);
    }
}
