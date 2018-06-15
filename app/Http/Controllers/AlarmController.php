<?php

namespace App\Http\Controllers;

use App\Alarm;
use App\Events\NewOrderRequest;
use App\Guest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AlarmController extends Controller
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
        $alarms = Alarm::paginate(12);

        return view('services.alarm.index', compact('alarms'));
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

        return view('services.alarm.create', compact('guests'));
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
            'guest_id' => 'required|numeric',
            'day_hour' => 'required|date',
        ];
        $validator = Validator::make($input, $rules);

        if ($validator->passes()) {
            try {
                DB::beginTransaction();
                $input['order_date'] = Carbon::today();
                $input['status']     = '0';
                $guest               = Guest::find($input['guest_id']);
                $alarm               = $guest->alarms()->create($input);
                DB::commit();
                event(new NewOrderRequest($alarm->service_id, $input['guest_id'], $alarm->id));

                if ($request->ajax()) {
                    //$return = ['status' => true];
                    return; //cambio para Cristian
                } else {
                    $return = redirect()->route('alarm.index')->with('status', 'Order added successfully.');
                }
            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }
        } else {
            if ($request->ajax()) {
                //$return = ['status' => false];
                //return; //cambio para Cristian
            } else {
                $return = redirect()->route('alarm.create')->withErrors($validator->getMessageBag());
            }
        }

        return $return;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alarm $alarm
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Alarm $alarm)
    {
        //Se consigue pasar el guest en función del guest_id del taxi
        $guest = Guest::find($alarm->guest_id);

        return view('services.alarm.show', compact('alarm', 'guest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alarm $alarm
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Alarm $alarm)
    {
        $guests = Guest::all();
        foreach ($guests as $guest) {
            $guest->guestRoomNumber = (isset($guest->rooms[0]->number))
                ? $guest->rooms[0]->number . ' - ' . $guest->firstname . ' ' . $guest->lastname : 'Not Found';
        }
        $guests = $guests->pluck('guestRoomNumber', 'id');

        //Falta que el select del edit.blade se quede seleccionado con el guest correcto
        return view('services.alarm.edit', compact('alarm', 'guests'));
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
            'day_hour' => 'required|date',
        ];
        $validator = Validator::make($input, $rules);

        if ($validator->passes()) {
            try {
                DB::beginTransaction();
                //$input['order_date'] = Carbon::today();
                //$input['status']     = 1;
                $alarm = Alarm::find($id);
                $alarm->update($input);
                DB::commit();
                $return = redirect()->route('alarm.index')->with('status', 'Order updated successfully.');

            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }
        } else {
            $return = redirect()->route('alarm.edit', $id)->withErrors($validator->getMessageBag());
        }

        return $return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Alarm::find($id)->delete();

        return redirect()->back()->with('status', 'Order deleted successfully');
    }

    public function changeStatus($id)
    {
        $alarm         = Alarm::findOrFail($id);
        $alarm->status = ($alarm->status === '1') ? '2' : '1';
        $alarm->save();

        return response()->json($alarm->status);
    }

    /**
     * @return mixed
     */
    public function orderList()
    {
        $alarm = Alarm::where('guest_id', Session::get('guest_id'))->get();

        return $alarm;
    }
}
