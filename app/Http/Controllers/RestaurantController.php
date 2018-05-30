<?php

namespace App\Http\Controllers;

use App\Guest;
use App\Restaurant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class RestaurantController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //FRONT
        //session guest_id
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
        foreach ($guests as $guest) {
            $guest->guestRoomNumber = $guest->rooms[0]->number . ' - ' . $guest->firstname . ' ' . $guest->lastname;
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
        //FRONT
        //session guest_id
        $input     = Input::all();
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
                $input['status']     = '1';
                Restaurant::create($input);
                DB::commit();

                $return = redirect()->route('restaurant.index')->with('status', 'Order added successfully.');
            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }
        } else {
            $return = redirect()->route('restaurant.create')->withErrors($validator->getMessageBag());
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
        //FRONT recoger id del pedido
        //session guest_id
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
            $guest->guestRoomNumber = $guest->rooms[0]->number . ' - ' . $guest->firstname . ' ' . $guest->lastname;
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
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Restaurant::find($id)->delete();

        return redirect()->back()->with('status', 'Guest deleted successfully');
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
}
