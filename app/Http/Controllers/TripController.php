<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trip;
use App\Trip_types;
use App\Guest;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Pasarle más información!!! Es posible?
        $trips = Trip::all();
        return view('services.trip.index', compact('trips'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guests = Guest::all();
        $tripTypes = Trip_types::all();
        return view('services.trip.create',
            compact('guests'),
            compact('tripTypes'));
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
        Trip::create(['guest_id' => $request->guest,
            'order_date' => $order_date,
            'trip_type_id' => $request->triptype,
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
    public function show(Trip $trip)
    {
        //Se consigue pasar el guest en función del guest_id del taxi

        $data = [
            'guest'     => Guest::find($trip->guest_id),
            'tripType'  => Trip_types::find($trip->trip_type_id),
            'trip'      => $trip
        ];
        return view('services.trip.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Trip $trip)
    {
        $data = [
            'guests'    => Guest::all(),
            'tripTypes' => Trip_types::all(),
            'trip'      => $trip
        ];

        //return View::make('services.trip.edit')->with($data);
        return view('services.trip.edit', $data);
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
        trip::find($id)->update(['guest_id' => $request->guest,
            'trip_type_id' => $request->triptype,
            'order_date'   => $order_date,
            //pasarle el precio del trip_type
            'price'        => 20,
            'status'       => '1']);

        return redirect('/service/trip');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Trip::find($id)->delete();
        return redirect('/service/trip');
    }
}
