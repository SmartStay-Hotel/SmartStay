<?php

namespace App\Http\Controllers;

use App\Guest;
use App\ProductType;
use App\SnacksAndDrink;
use Carbon\Carbon;
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
     * @throws \Exception
     */
    public function store(Request $request)
    {
        $input = Input::all();
        //dd($input);
        if ($request->ajax()) {
            if (Session::exists('guest_id')) {
                $input['guest_id'] = Session::get('guest_id');
            } else {
                return response()->json(['status' => false]);
            }
        }

        $rules     = [
            'guest_id'          => 'required|numeric',
            'product_type_id.*' => 'required|numeric',
            'quantity.*'        => 'required|numeric|min:1',
        ];
        $validator = Validator::make($input, $rules);

        if ($validator->passes()) {
            try {
                DB::beginTransaction();
                $input['order_date'] = Carbon::today();
                $input['status']     = '1'; //será cambiado a cero al actualizar la bbdd
                $input['price']      = 0;
                $guest               = Guest::find($input['guest_id']);
                foreach ($input['product_type_id'] as $key => $value) {
                    $guest->snacks()->save(
                        new SnacksAndDrink([$input['guest_id'],
                            $input['product_type_id'][$key],
                            $input['quantity'][$key],
                            $input['price'] = ProductType::getPriceById($input['product_type_id'][$key])
                                * $input['quantity'][$key],
                            $input['status'],
                            $input['order_date']])
                    );
                }

                DB::commit();
                //event(new NewOrderRequest($restaurant->service_id, $input['guest_id'], $restaurant->id));

                if ($request->ajax()) {
                    $return = ['status' => true];
                } else {
                    $return = redirect()->route('snackdrink.index')->with('status', 'Order added successfully.');
                }
            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }
        } else {
            // No pasó el validador
            if ($request->ajax()) {
                $return = ['status' => false];
            } else {
                $return = redirect()->route('snackdrink.create')->withErrors($validator->getMessageBag());
            }
        }

        return $return;
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
