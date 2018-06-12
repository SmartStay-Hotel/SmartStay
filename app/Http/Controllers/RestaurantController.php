<?php

namespace App\Http\Controllers;

use App\Events\NewOrderRequest;
use App\Guest;
use App\Restaurant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class RestaurantController extends Controller
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
        $restaurants = Restaurant::paginate(3); //->orderBy('updated_at', 'desc')->get();

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
        foreach ($guests as $guest) {
            $guest->guestRoomNumber = (isset($guest->rooms[0]->number))
                ? $guest->rooms[0]->number . ' - ' . $guest->firstname . ' ' . $guest->lastname : 'Not Found';
        }
        $guests = $guests->pluck('guestRoomNumber', 'id');

        return view('services.restaurant.create', compact('guests'));
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
        //dd($request->request);
        //        Session::put('guest_id', '19');
        //Session::forget('guest_id');
        $input = Input::all();
        if ($request->ajax()) {
            if (Session::exists('guest_id')) {
                $input['guest_id'] = Session::get('guest_id');
            } else {
                return response()->json(['status' => false]);
            }
        }
        $rules     = [
            'guest_id' => 'required|numeric',
            'quantity' => 'required|numeric',
            'day_hour' => 'required|date',
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->passes()) {
            try {
                DB::beginTransaction();
                $input['order_date'] = Carbon::today();
                $input['status']     = '0';
                $guest               = Guest::find($input['guest_id']);
                $restaurant          = $guest->restaurants()->create($input);
                DB::commit();
                event(new NewOrderRequest($restaurant->service_id, $input['guest_id'], $restaurant->id));

                if ($request->ajax()) {
                    //$return = ['status' => true];
                    return; //cambio para Cristian
                } else {
                    $return = redirect()->route('restaurant.index')->with('status', 'Order added successfully.');
                }
            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }
        } else {
            // No pasó el validador
            if ($request->ajax()) {
                //$return = ['status' => false];
                //return; //cambio para Cristian
            } else {
                $return = redirect()->route('restaurant.create')->withErrors($validator->getMessageBag());
            }
        }

        return $return;
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Restaurant $restaurant
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        $guest = Guest::find($restaurant->guest_id);

        return view('services.restaurant.show', compact('restaurant', 'guest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Restaurant $restaurant
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $guests = Guest::all();
        foreach ($guests as $guest) {
            $guest->guestRoomNumber = (isset($guest->rooms[0]->number))
                ? $guest->rooms[0]->number . ' - ' . $guest->firstname . ' ' . $guest->lastname : 'Not Found';
        }
        $guests = $guests->pluck('guestRoomNumber', 'id');

        return view('services.restaurant.edit', compact('guests', 'restaurant'));
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
            'guest_id' => 'numeric',
            'quantity' => 'required|numeric',
            'day_hour' => 'required|date',
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->passes()) {
            try {
                DB::beginTransaction();
                //$input['order_date'] = Carbon::today();
                //$input['status']     = 1;
                $restaurant = Restaurant::find($id);
                $restaurant->update($input);
                DB::commit();

                $return = redirect()->route('restaurant.index')->with('status', 'Order updated successfully.');
            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }
        } else {
            $return = redirect()->route('restaurant.edit', $id)->withErrors($validator->getMessageBag());
        }

        return $return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int                     $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Restaurant::find($id)->delete();
        $totalOrders = Restaurant::all()->count();
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
        $restaurant         = Restaurant::findOrFail($id);
        $restaurant->status = ($restaurant->status === '2') ? '1' : '2';
        $restaurant->save();

        return response()->json($restaurant->status);
    }

    /**
     * @return mixed
     */
    public function orderList()
    {
        $restaurant = Restaurant::where('guest_id', Session::get('guest_id'))->get();

        return $restaurant;
    }
}
