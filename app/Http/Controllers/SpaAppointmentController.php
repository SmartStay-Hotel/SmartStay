<?php

namespace App\Http\Controllers;

use App\Guest;
use App\SpaAppointment;
use App\SpaType;
use Illuminate\Http\Request;

class SpaAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spaAppointments = SpaAppointment::all();
        return view('services.spa.index', compact('spaAppointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guests = Guest::all();
        $spaTypes = SpaType::all();
        return view('services.spa.create', compact('guests', 'spaTypes'));
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

        $request->validate([
            'day_hour' => 'required',]);

        SpaAppointment::create([
            'guest_id'          => $request->guest,
            'order_date'        => $order_date,
            'treatment_type_id' => $request->spatype,
            'day_hour'          => $request->day_hour,
            'price'             => 20,
            'status'            => '1']);

        return redirect('/service/spa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SpaAppointment $spaAppointment)
    {
        $data = [
            'guest'    => Guest::find($spaAppointment->guest_id),
            'spaType' => SpaType::find($spaAppointment->treatment_type_id),
            'spa'     => $spaAppointment,
        ];

        return view('services.spa.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SpaAppointment $spaAppointment)
    {
        $data = [
            'guests'    => Guest::all(),
            'spaTypes' => SpaType::all(),
            'spa'      => $spaAppointment,
        ];
        //dd($data);

        //return View::make('services.spa.edit')->with($data);
        return view('services.spa.edit', $data);
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
        SpaAppointment::find($id)->update([
            'guest_id'          => $request->guest,
            'treatment_type_id' => $request->spatype,
            'day_hour'          => $request->day_hour,
            'order_date'        => $order_date,
            'price'             => 20,
            'status'            => '1',
        ]);

        return redirect('/service/spa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SpaAppointment::find($id)->delete();

        return redirect('/service/spa');
    }
}
