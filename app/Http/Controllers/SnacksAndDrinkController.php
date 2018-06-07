<?php

namespace App\Http\Controllers;

use App\Guest;
use App\ProductType;
use App\SnacksAndDrink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SnacksAndDrinkController extends Controller
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
        $snacks = SnacksAndDrink::all();

        return view('services.snackdrink.index', compact('snacks'));
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
        $guests       = $guests->pluck('guestRoomNumber', 'id');
        $productTypes = ProductType::pluck('name', 'id');

        return view('services.snackdrink.create', compact('guests', 'productTypes'));
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
        $input = Input::all();

        if ($request->ajax()) {
            if (Session::exists('guest_id')) {
                $input['guest_id'] = Session::get('guest_id');
            } else {
                return response()->json(['status' => false]);
            }
        }

        $rules     = [
            'guest_id'        => 'required|numeric',
            'day_hour'        => 'required|date',
            'quantity1'       => 'required|numeric',
            'product_type_id' => 'required|numeric',
        ];
        $validator = Validator::make($input, $rules);

        if ($validator->passes()) {
            DB::beginTransaction();
            DB::commit();
        }
        /////////////////////// OLD Code //////////////////////////
        $request->validate([
            'quantity1' => 'required',
            'quantity2' => 'required',
        ]);
        $order_date = date('Y-m-d');
        //Trip_types::find($trip->id); Obtener el precio de la tabla Tryp_types
        SnacksAndDrink::create([
            'guest_id'        => $request->guest,
            'order_date'      => $order_date,
            //Revisar!!! Existen varias opciones:
            //Hay que idear la forma de poder guardar, en la misma petición más de un producto.
            //- Replantear las tablas snacks_and_Drink y Product_types
            //- Permitir poder guardar más de un producto en la petición (order) y sus respectivas cantidades.
            //- Ejemplo el guest, pide un snack(x2) y una bebida(x2), permitir perdir dos productos en la misma orden.
            //Posible solución: Rectificar la tabla, añadir una columna para snacks y otra para drinks con sus cantidades.
            //Otra solución, permitir en product_type_id, guardar más de un tipo de producto y en quantity las dos cantidades juntas.
            //Ser capaces de hacer la relación con product_types.
            //Seria interesante que se puedieran pedir más de dos productos en una misma orden, los que el guest desee. Guardar en la base de datos una lista de productos y cantidades.
            'quantity'        => $request->quantity1,
            //.$request->quantity2,
            'product_type_id' => $request->producttype1,
            //.$request->producttype2,
            'price'           => 5.5,
            'status'          => '1',
        ]);

        return redirect('/service/snackdrink');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(SnacksAndDrink $snacksAndDrink)
    {
        $data = [
            'guests'       => Guest::find($snacksAndDrink->guest_id),
            'productTypes' => ProductType::find($snacksAndDrink->product_type_id),
            'snackdrinks'  => $snacksAndDrink,
        ];

        return view('services.snackdrink.edit', $data);
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
        //
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
        SnacksAndDrink::find($id)->delete();

        return redirect('/service/snackdrink');
    }
}
