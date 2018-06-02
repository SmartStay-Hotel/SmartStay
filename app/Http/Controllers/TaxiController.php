<?php

namespace App\Http\Controllers;

use App\Guest;
use App\Taxi;
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

        //Quizás seria necesario mostrar el nombre del guest, en el metodo show()
        return view('services.taxi.index', compact('taxis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guests = Guest::all();

        return view('services.taxi.create', compact('guests'));
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
        Taxi::create([
            'guest_id'   => $request->guest,
            'order_date' => $order_date,
            'day_hour'   => $request->day_hour,
            'status'     => '1',
        ]);

        return redirect('/service/taxi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Taxi $taxi)
    {
        //Se consigue pasar el guest en función del guest_id del taxi
        $guest = Guest::find($taxi->guest_id);

        return view('services.taxi.show', compact('taxi'),
            compact('guest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Taxi $taxi)
    {
        //Pasarle el guest parar poder modificarlo
        $guests = Guest::all();

        //Falta que el select del edit.blade se quede seleccionado con el guest correcto
        return view('services.taxi.edit', compact('taxi'),
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
            'day_hour' => 'required',
        ]);

        $order_date = date('Y-m-d');
        Taxi::find($id)->update([
            'guest_id'   => $request->guest,
            'order_date' => $order_date,
            'day_hour'   => $request->day_hour,
            'status'     => '1',
        ]);

        return redirect('/service/taxi');
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
        //
        Taxi::find($id)->delete();

        return redirect('/service/taxi');
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeStatus($id)
    {
        $taxi         = Taxi::findOrFail($id);
        $taxi->status = ($taxi->status === '2') ? '1' : '2';
        $taxi->save();

        return response()->json($taxi->status);
    }
}
