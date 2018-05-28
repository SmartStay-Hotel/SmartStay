<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Event_types;
use App\Guest;

class EventController extends Controller
{
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
        $eventTypes = Event_types::all();
        return view('services.event.create',
            compact('guests'),
            compact('eventTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order_date = date('Y-m-d');
        //Trip_types::find($trip->id); Obtener el precio de la tabla Tryp_types
        Event::create(['guest_id' => $request->guest,
            'service_id' => 8,
            'order_date' => $order_date,
            'event_type_id' => $request->eventtype,
            'status' => '1']);
        return redirect('/service/event');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $data = [
            'guest'  => Guest::find($event->guest_id),
            'eventType'   => Event_types::find($event->event_type_id),
            'event' => $event
        ];
        return view('services.event.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $data = [
            'guests'  => Guest::all(),
            'eventTypes'   => Event_types::all(),
            'event' => $event
        ];
        return view('services.event.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order_date = date('Y-m-d');
        Event::find($id)->update(['guest_id' => $request->guest,
            'event_type_id' => $request->eventtype,
            'service_id' => 7,
            'order_date' => $order_date,
            'status' => '1']);

        return redirect('/service/event');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::find($id)->delete();
        return redirect('/service/event');
    }
}