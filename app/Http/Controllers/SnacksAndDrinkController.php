<?php

namespace App\Http\Controllers;

use App\Events\NewOrderRequest;
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
        $this->middleware('auth', ['only' => ['index', 'create', 'show', 'edit', 'update', 'changeStatus']]);
        $this->middleware('auth', ['except' => ['orderList', 'store', 'destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $snacks = SnacksAndDrink::paginate(5);

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
            $guest->guestRoomNumber = (isset($guest->rooms[0]->number))
                ? $guest->rooms[0]->number . ' - ' . $guest->firstname . ' ' . $guest->lastname : 'Not Found';
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
                $input['status']     = '0'; //será cambiado a cero al actualizar la bbdd
                $input['price']      = 0;
                $guest               = Guest::find($input['guest_id']);

                $orders = [];
                foreach ($input['product_type_id'] as $key => $value) {
                    $orders[] = new SnacksAndDrink([
                        'guest_id'        => $input['guest_id'],
                        'product_type_id' => $input['product_type_id'][$key],
                        'order_date'      => $input['order_date'],
                        'price'           => $input['price']
                            = ProductType::getPriceById($input['product_type_id'][$key]) * $input['quantity'][$key],
                        'quantity'        => $input['quantity'][$key],
                        'status'          => $input['status'],
                    ]);
                }
                $guest->snacks()->saveMany($orders);

                DB::commit();
                event(new NewOrderRequest($orders[0]->service_id, $input['guest_id'], $orders[0]->id));

                if ($request->ajax()) {
                    //$return = ['status' => true];
                    return;
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
                //$return = ['status' => false];
            } else {
                $return = redirect()->route('snackdrink.create')->withErrors($validator->getMessageBag());
            }
        }

        return $return;
    }

    /**
     * Display the specified resource.
     *
     * @param \App\SnacksAndDrink $snackdrink
     *
     * @return \Illuminate\Http\Response
     */
    public function show(SnacksAndDrink $snackdrink)
    {
        $guest = Guest::find($snackdrink->guest_id);
        $list  = SnacksAndDrink::getOrderByGuestDate($guest->id, $snackdrink->create_at);

        return view('services.snackdrink.show', compact('snackdrink', 'guest', 'list'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\SnacksAndDrink $snackdrink
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(SnacksAndDrink $snackdrink)
    {
        $guests = Guest::all();
        foreach ($guests as $guest) {
            $guest->guestRoomNumber = (isset($guest->rooms[0]->number))
                ? $guest->rooms[0]->number . ' - ' . $guest->firstname . ' ' . $guest->lastname : 'Not Found';
        }
        $guests       = $guests->pluck('guestRoomNumber', 'id');
        $productTypes = ProductType::pluck('name', 'id');

        return view('services.snackdrink.edit', compact('guests', 'productTypes', 'snackdrink'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function update(Request $request, $id)
    {
        $input     = Input::all();
        $rules     = [
            'guest_id'        => 'numeric',
            'product_type_id' => 'required|numeric',
            'quantity'        => 'required|numeric|min:1',
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->passes()) {
            try {
                DB::beginTransaction();
                $snackAndDrink = SnacksAndDrink::find($id);
                $snackAndDrink->update($input);
                DB::commit();

                $return = redirect()->route('snackdrink.index')->with('status', 'Order updated successfully.');
            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }
        } else {
            $return = redirect()->route('snackdrink.edit', $id)->withErrors($validator->getMessageBag());
        }

        return $return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        SnacksAndDrink::find($id)->delete();
        $totalOrders = SnacksAndDrink::all()->count();
        if ($request->ajax()) {
            $return = response()->json([
                'total'   => $totalOrders,
                'message' => 'Order number: ' . $id . ' was deleted',
            ]);
        } else {
            $return = redirect()->back()->with('status', 'Order deleted successfully');
        }

        return $return;
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeStatus($id)
    {
        $snack         = SnacksAndDrink::findOrFail($id);
        $snack->status = ($snack->status === '1') ? '2' : '1';
        $snack->save();

        return response()->json($snack->status);
    }

    /**
     * @return mixed
     */
    public function orderList()
    {
        $snack = SnacksAndDrink::where('guest_id', Session::get('guest_id'))->get();

        return $snack;
    }
}
