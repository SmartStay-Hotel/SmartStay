<?php

namespace App\Http\Controllers;

use App\Housekeeping;
use App\Guest;
use Illuminate\Http\Request;

class HousekeepingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $housekeepings = Housekeeping::all();
        //Para mostrar el guest_id en el index
        $guests = Guest::all();
        return view('services.housekeeping.index', compact('housekeepings', 'guests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guests = Guest::all();
        return view('services.housekeeping.create', compact('guests'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //En este caso seria interesante añadir en el form campos ocultos:
            // --> service_id
        //Revisar el tema de los precios!! Quizás debería ser un valor dinamico

        $order_date = date('Y-m-d');
        Housekeeping::create(['guest_id' => $request->guest,
            'order_date' => $order_date,
            'bed_sheets' => ($request->bed_sheets) ? true : false,
            'cleaning'   => ($request->cleaning) ? true : false,
            'minibar'    => ($request->minibar) ? true : false,
            'blanket'    => ($request->blanket) ? true : false,
            'toiletries' => ($request->toiletries) ? true : false,
            'toiletries' => ($request->toiletries) ? true : false,
            'pillow'     => ($request->pillow) ? true : false,
            'price'      => 120,
            'status'     => '1']);
        return redirect('/service/housekeeping');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Housekeeping $housekeeping)
    {
        //Se consigue pasar el guest en función del guest_id del taxi
        $guest = Guest::find($housekeeping->guest_id);
        return view('services.housekeeping.show',compact('housekeeping'),
            compact('guest'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Housekeeping $housekeeping)
    {
        //Pasarle el guest parar poder modificarlo
        $guests = Guest::all();
        //Falta que el select del edit.blade se quede seleccionado con el guest correcto
        return view('services.housekeeping.edit',compact('housekeeping', 'guests'));
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
        //$housekeeping->Input::all();
        $order_date = date('Y-m-d');

        //recoger el valor del select de editar!!!
        Housekeeping::find($id)->update(['guest_id' => $request->guest,
            'order_date' => $order_date,
            'bed_sheets' => ($request->bed_sheets) ? true : false,
            'cleaning'   => ($request->cleaning) ? true : false,
            'minibar'    => ($request->minibar) ? true : false,
            'blanket'    => ($request->blanket) ? true : false,
            'toiletries' => ($request->toiletries) ? true : false,
            'toiletries' => ($request->toiletries) ? true : false,
            'pillow'     => ($request->pillow) ? true : false,
            'price'      => 120,
            'status'     => '1']);

        return redirect('/service/housekeeping');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Housekeeping::find($id)->delete();
        return redirect('/service/housekeeping');
    }
}
