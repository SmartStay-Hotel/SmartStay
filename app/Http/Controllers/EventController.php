<?php

namespace App\Http\Controllers;

use App\Event;
use App\Events\NewOrderRequest;
use App\EventType;
use App\Guest;
use Carbon\Carbon;
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
        $events = Event::paginate(12);

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
            $guest->guestRoomNumber = (isset($guest->rooms[0]->number))
                ? $guest->rooms[0]->number . ' - ' . $guest->firstname . ' ' . $guest->lastname : 'Not Found';
        }
        $guests     = $guests->pluck('guestRoomNumber', 'id');
        $eventTypes = EventType::all();
        foreach ($eventTypes as $eventType) {
            $eventType->eventname = $eventType->name;
        }
        $eventTypes = $eventTypes->pluck('eventname', 'id');

        return view('services.event.create', compact('guests', 'eventTypes'));
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
            'guest_id'      => 'required|numeric',
            'event_type_id' => 'required|numeric',
            'people_num'    => 'required|numeric|max:150',
        ];
        $validator = Validator::make($input, $rules);

        if ($validator->passes()) {
            $maxPeople       = EventType::getMaxPeopleByEvent($input['event_type_id']);
            $peopleGoing     = Event::getNumPeopleOnTheList($input['event_type_id']);
            $availablePlaces = $maxPeople - $peopleGoing;
            if ($availablePlaces < $input['people_num']) {
                return redirect()->route('event.create')->withErrors([
                    'Only ' . $availablePlaces . ' available places',
                ]);
            }

            try {
                DB::beginTransaction();

                $input['order_date'] = Carbon::today();
                $input['status']     = '0';
                $guest               = Guest::find($input['guest_id']);
                $event               = $guest->events()->create($input);
                DB::commit();

                event(new NewOrderRequest($event->service_id, $input['guest_id'], $event->id));

                if ($request->ajax()) {
                    //$return = ['status' => true];
                    return; //cambio para Cristian
                } else {
                    $return = redirect()->route('event.index')->with('status', 'Order added successfully.');
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
                $return = redirect()->route('event.create')->withErrors($validator->getMessageBag());
            }
        }

        return $return;
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Event $event
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $guest = Guest::find($event->guest_id);

        return view('services.event.show', compact('event', 'guest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Event $event
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $guests = Guest::all();
        foreach ($guests as $guest) {
            $guest->guestRoomNumber = (isset($guest->rooms[0]->number))
                ? $guest->rooms[0]->number . ' - ' . $guest->firstname . ' ' . $guest->lastname : 'Not Found';
        }
        $guests = $guests->pluck('guestRoomNumber', 'id');

        $eventTypes = EventType::all();
        foreach ($eventTypes as $eventType) {
            $eventType->eventname = $eventType->name;
        }
        $eventTypes = $eventTypes->pluck('eventname', 'id');

        return view('services.event.edit', compact('guests', 'event', 'eventTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param \App\Event                $event
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function update(Request $request, Event $event)
    {
        $input                  = Input::all();
        $input['guest_id']      = (isset($input['guest_id'])) ? $input['guest_id'] : $event->guest_id;
        $input['event_type_id'] = (isset($input['event_type_id'])) ? $input['event_type_id'] : $event->event_type_id;

        $rules     = [
            'guest_id'      => 'required|numeric',
            'event_type_id' => 'required|numeric',
            'people_num'    => 'required|numeric|max:150',
        ];
        $validator = Validator::make($input, $rules);

        if ($validator->passes()) {
            $maxPeople       = EventType::getMaxPeopleByEvent($input['event_type_id']);
            $peopleGoing     = Event::getNumPeopleOnTheList($input['event_type_id']);
            $availablePlaces = $maxPeople - $peopleGoing;
            if ($availablePlaces < $input['people_num']) {
                return redirect()->route('event.edit', $event->id)->withErrors([
                    'Only ' . $availablePlaces . ' available places',
                ]);
            }
            try {
                DB::beginTransaction();
                //$input['order_date'] = Carbon::today();
                //$input['status']     = 1;
                $event = Event::find($event->id);
                $event->update($input);
                DB::commit();

                $return = redirect()->route('event.index')->with('status', 'Order updated successfully.');
            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }
        } else {
            $return = redirect()->route('event.edit', $event->id)->withErrors($validator->getMessageBag());
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
        Event::find($id)->delete();
        $totalOrders = Event::all()->count();
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

    public function changeStatus($id)
    {
        $event         = Event::findOrFail($id);
        $event->status = ($event->status === '1') ? '2' : '1';
        $event->save();

        return response()->json($event->status);
    }

    /**
     * @return mixed
     */
    public function orderList()
    {
        $event = Event::where('guest_id', Session::get('guest_id'))->get();

        return $event;
    }
}
