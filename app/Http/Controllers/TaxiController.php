<?php

namespace App\Http\Controllers;

use App\Taxi;
//use App\Guest;
use Illuminate\Http\Request;

class TaxiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taxis = Taxi::all();
        return view('services.taxi.index', compact('taxis', $taxis));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.taxi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'day_hour' => 'required',]);

        //Obtener id del guest para meterlo en el servicio
        //$guest_id = Guest::all();

        $order_date = date('Y-m-d');
        Taxi::create(['guest_id' => 1,
            'service_id' => 1,
            'order_date' => $order_date,
            'day_hour' => $request->day_hour,
            'status' => 1]);
        return redirect('/service/taxi');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Taxi $taxi)
    {
        return view('services.taxi.edit',compact('taxi',$taxi));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Taxi $taxi)
    {
        $request->validate(['day_hour' => 'required']);

        $taxi->day_hour = $request->day_hour;
        $taxi->save();
        //$request->session()->flash('message', 'Successfully modified the taxi!');
        return redirect('/service/taxi');
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
        Taxi::find($id)->delete();
        return redirect('/service/taxi');
    }
}
