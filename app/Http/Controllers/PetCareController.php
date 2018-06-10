<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PetCare;
use App\Guest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PetCareController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petcares = PetCare::all();
        return view('services.petcare.index', compact('petcares'));
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
            $guest->guestRoomNumber = $guest->rooms[0]->number . ' - ' . $guest->firstname . ' ' . $guest->lastname;
        }
        $guests = $guests->pluck('guestRoomNumber', 'id');
        return view('services.petcare.create', compact('guests'));
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
        //Revisar!! No pilla bien los radiobuttons.
        //Para que funcionen en la vista, el name debe ser el mismo.
        //Al recoger en el request, pilla los dos valores igual

        PetCare::create(['guest_id' => $request->guest,
            'service_id'     => 9,
            'order_date'     => $order_date,
            'water'          => ($request->water) ? true : false,
            'snacks'         => ($request->snacks) ? true : false,
            'standard_food'  => ($request->food) ? true : false,
            'premium_food'   => ($request->food) ? true : false,
            'price'          => 120,
            'status'         => '1']);
        return redirect('/service/petcare');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\PetCare $petcare
     *
     * @return \Illuminate\Http\Response
     */
    public function show(PetCare $petcare)
    {
        $guest = Guest::find($petcare->guest_id);
        return view('services.petcare.show',compact('petcare', 'guest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PetCare $petcare)
    {
        $guests = Guest::all();
        //Falta que el select del edit.blade se quede seleccionado con el guest correcto
        return view('services.petcare.edit',compact('petcare', 'guests'));
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

        //controlar el valor del radio. Obtener aquí el valor actual de las food.
        //Compararlo y en función de lo que tenga actualizar
        /*
        $foods = ['standard_food'  => ($request->food),
            'premium_food'   => ($request->food)];

        dd($foods['standard_food']);
        if ($foods['standard_food'] == 1){
            $foods['premium_food'] = 0;
        }elseif ($foods['premium_food'] == 1){
            $foods['standard_food'] = 0;
        }
        */
/*
        if (Input::get('food')) {
            $standardFood = 1;
        } else {
            $standardFood = 0;
        }
*/
        //Revisar!! No pilla bien los radiobuttons.
        //Para que funcionen en la vista, el name debe ser el mismo.
        //Al recoger en el request, pilla los dos valores igual
        PetCare::find($id)->update([
            'guest_id'       => $request->guest,
            'service_id'     => 9,
            'order_date'     => $order_date,
            'water'          => ($request->water) ? true : false,
            'snacks'         => ($request->snacks) ? true : false,
            'standard_food'  => ($request->food) ? true : false,
            'premium_food'   => ($request->food) ? true : false,
            'price'          => 120,
            'status'         => '1']);

        return redirect('/service/petcare');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PetCare::find($id)->delete();
        return redirect('/service/petcare');
    }
}
