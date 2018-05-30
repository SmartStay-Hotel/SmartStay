<?php

namespace App\Http\Controllers;

use App\Alarm;
use App\Guest;
use Illuminate\Http\Request;

class AlarmController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alarms = Alarm::all();
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

        return view('services.alarm.create', compact('guests'));
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
        $request->validate([
            'day_hour' => 'required',
        ]);

        $order_date = date('Y-m-d');
        Alarm::create([
            'guest_id'   => $request->guest,
            'order_date' => $order_date,
            'day_hour'   => $request->day_hour,
            'status'     => '1',
        ]);

        return redirect('/service/alarm');
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

        //Falta que el select del edit.blade se quede seleccionado con el guest correcto
        return view('services.alarm.edit', compact('alarm', 'guests'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Alarm               $alarm
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'day_hour' => 'required',
        ]);

        $order_date = date('Y-m-d');
        Alarm::find($id)->update([
            'guest_id'   => $request->guest,
            'order_date' => $order_date,
            'day_hour'   => $request->day_hour,
            'status'     => '1',
        ]);
        return redirect('/service/alarm');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alarm $alarm
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Alarm::find($id)->delete();
        return redirect('/service/alarm');
    }
}
