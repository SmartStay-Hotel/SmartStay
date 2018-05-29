<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SnacksAndDrink;

class SnackDrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $snackanddrinks = SnacksAndDrink::all();
        return view('services.snackdrink.index', compact('snackanddrinks'));
        /*
        $snacksDrinks = SnacksAndDrink::all();
        dd($snacksDrinks);
        $productTypes = ProductType::all();
        foreach ($snacksDrinks as $key => $snacksDrink){
            $snacksDrink->name = $productTypes[$key]->name;
            $snacksDrink->price = $productTypes[$key]->price;
        }
        //dd($snacksDrinks);
        return view('services.snackdrink.index', compact('snacksDrinks'));
        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
