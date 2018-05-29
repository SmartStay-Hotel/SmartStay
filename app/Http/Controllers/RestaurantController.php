<?php

namespace App\Http\Controllers;

use App\Guest;
use App\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::all();

        return view('services.restaurant.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guests = Guest::all();

        return view('services.restaurant.create', compact('guests'));
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
            'quantity' => 'digits_between:1,10',
        ]);

        $order_date = date('Y-m-d');
        Restaurant::create([
            'guest_id'   => $request->guest,
            'order_date' => $order_date,
            'quantity'   => $request->quantity,
            'day_hour'   => $request->day_hour,
            'price'      => 20,
            'status'     => '1',
        ]);

        return redirect('/service/restaurant');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        $guest = Guest::find($restaurant->guest_id);

        return view('services.restaurant.show', compact('restaurant'),
            compact('guest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        //Pasarle el guest parar poder modificarlo
        $guests = Guest::all();

        //Falta que el select del edit.blade se quede seleccionado con el guest correcto
        return view('services.restaurant.edit', compact('restaurant'),
            compact('guests'));
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
        $request->validate([
            'quantity' => 'digits_between:1,10',
            'day_hour' => 'required',
        ]);

        $order_date = date('Y-m-d');
        Restaurant::find($id)->update([
            'guest_id'   => $request->guest,
            'order_date' => $order_date,
            'quantity'   => $request->quantity,
            'day_hour'   => $request->day_hour,
            'status'     => '1',
        ]);

        return redirect('/service/restaurant');
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
        Restaurant::find($id)->delete();

        return redirect('/service/restaurant');
    }
}
