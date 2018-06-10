<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PetCare;
use App\Guest;
use Carbon\Carbon;
use App\Events\NewOrderRequest;
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
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
            'guest_id' => 'required|numeric',
            'food' => 'required',
        ];

        $validator = Validator::make($input, $rules);
        if ($validator->passes()) {
            try {
                DB::beginTransaction();

                //guardar los datos de los checkbox. Si está marcado = 1 y si no = 0
                if ($input['water'] = ''){
                    $input['water'] = 0;
                }else{
                    $input['water'] = 1;
                }
                if ($input['snacks'] = ''){
                    $input['snacks'] = 0;
                }else{
                    $input['snacks'] = 1;
                }
                /*
                if (!$input['standard']){
                    $input['standard'] = 0;
                }else{
                    $input['standard'] = 1;
                }
                if (!$input['premium']){
                    $input['premium'] = 0;
                }else{
                    $input['premium'] = 1;
                }
                */
                $input['order_date'] = Carbon::today();
                $input['status']     = '1';
                $guest               = Guest::find($input['guest_id']);
                $petcare             = $guest->petcares()->create($input);
                DB::commit();
                event(new NewOrderRequest($petcare->service_id, $input['guest_id'], $petcare->id));

                if ($request->ajax()) {
                    //$return = ['status' => true];
                    return; //cambio para Cristian
                } else {
                    $return = redirect()->route('petcare.index')->with('status', 'Order added successfully.');
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
                $return = redirect()->route('petcare.create')->withErrors($validator->getMessageBag());
            }
        }

        return $return;


        //Revisar!! No pilla bien los radiobuttons.
        //Para que funcionen en la vista, el name debe ser el mismo.
        //Al recoger en el request, pilla los dos valores igual


        ///////////////// OLD ////////////////////////
        ///
       /*
        *  $order_date = date('Y-m-d');
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
       */
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
        foreach ($guests as $guest) {
            $guest->guestRoomNumber = $guest->rooms[0]->number . ' - ' . $guest->firstname . ' ' . $guest->lastname;
        }
        $guests = $guests->pluck('guestRoomNumber', 'id');

        return view('services.petcare.edit',compact('petcare', 'guests'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function update(Request $request, $id)
    {
        $input     = Input::all();
        $rules     = [
            'food' => 'required',
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->passes()) {
            try {
                DB::beginTransaction();
                //$input['order_date'] = Carbon::today();
                //$input['status']     = 1;
                $petCare = PetCare::find($id);
                $petCare->update($input);
                DB::commit();

                $return = redirect()->route('petcare.index')->with('status', 'Order updated successfully.');
            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }
        } else {
            $return = redirect()->route('petcare.edit', $id)->withErrors($validator->getMessageBag());
        }

        return $return;

        //$order_date = date('Y-m-d');

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
        if (Input::get('food')) {
            $standardFood = 1;
        } else {
            $standardFood = 0;
        }
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
        */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        PetCare::find($id)->delete();
        $totalOrders = PetCare::all()->count();
        if ($request->ajax()) {
            $return = response()->json([
                'total'   => $totalOrders,
                'message' => 'Order number: ' . $id . ' was deleted',
            ]);
        } else {
            $return = redirect()->back()->with('status', 'Guest deleted successfully');
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
        $petCare         = PetCare::findOrFail($id);
        $petCare->status = ($petCare->status === '2') ? '1' : '2';
        $petCare->save();

        return response()->json($petCare->status);
    }

    /**
     * @return mixed
     */
    public function orderList()
    {
        $petCare = PetCare::where('guest_id', Session::get('guest_id'))->get();
        return $petCare;
    }
}
