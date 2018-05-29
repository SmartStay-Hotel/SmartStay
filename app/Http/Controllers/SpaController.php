<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spa_appointment;
use App\Spa_type;
use App\Guest;

class SpaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spas = Spa_appointment::all();
        return view('services.spa.index', compact('spas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guests = Guest::all();
        $spaTypes = Spa_type::all();
        return view('services.spa.create',
            compact('guests'),
            compact('spaTypes'));
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

        $request->validate([
            'day_hour' => 'required',]);

        Spa_appointment::create(['guest_id' => $request->guest,
            'service_id' => 3,
            'order_date' => $order_date,
            'treatment_type_id' => $request->spatype,
            'day_hour' => $request->day_hour,
            //El precio se debe recuperar del tryp_type
            'price' => 20,
            'status' => '1']);
        return redirect('/service/trip');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
