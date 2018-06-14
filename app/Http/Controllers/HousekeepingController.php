<?php

namespace App\Http\Controllers;

use App\Events\NewOrderRequest;
use App\Guest;
use App\Housekeeping;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class HousekeepingController extends Controller
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
        $housekeepings = Housekeeping::paginate(12);

        return view('services.housekeeping.index', compact('housekeepings'));
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

        return view('services.housekeeping.create', compact('guests'));
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
        $input               = Input::all();
        if ($request->ajax()) {
            if (Session::exists('guest_id')) {
                $input['guest_id'] = Session::get('guest_id');
            } else {
                return response()->json(['status' => false]);
            }
        }
        $rules = [
            'guest_id'   => 'required|numeric',
            'bed_sheets' => 'required_without_all:cleaning,minibar,blanket,toiletries,pillow|boolean',
            'cleaning'   => 'required_without_all:bed_sheets,minibar,blanket,toiletries,pillow|boolean',
            'minibar'    => 'required_without_all:bed_sheets,cleaning,blanket,toiletries,pillow|boolean',
            'blanket'    => 'required_without_all:bed_sheets,cleaning,minibar,toiletries,pillow|boolean',
            'toiletries' => 'required_without_all:bed_sheets,cleaning,minibar,blanket,pillow|boolean',
            'pillow'     => 'required_without_all:bed_sheets,cleaning,minibar,blanket,toiletries|boolean',
        ];

        $validator = Validator::make($input, $rules);
        if ($validator->passes()) {
            try {
                DB::beginTransaction();
                //'bed_sheets' => ($request->bed_sheets) ? true : false,
                $input['bed_sheets'] = (isset($input['bed_sheets'])) ? true : false;
                $input['cleaning']   = (isset($input['cleaning'])) ? true : false;
                $input['minibar']    = (isset($input['minibar'])) ? true : false;
                $input['blanket']    = (isset($input['blanket'])) ? true : false;
                $input['toiletries'] = (isset($input['toiletries'])) ? true : false;
                $input['pillow']     = (isset($input['pillow'])) ? true : false;
                $input['order_date'] = Carbon::today();
                $input['status']     = '0';
                $guest               = Guest::find($input['guest_id']);
                $housekeeping        = $guest->houseKeepings()->create($input);
                DB::commit();
                event(new NewOrderRequest($housekeeping->service_id, $input['guest_id'], $housekeeping->id));

                if ($request->ajax()) {
                    //$return = ['status' => true];
                    return; //cambio para Cristian
                } else {
                    $return = redirect()->route('housekeeping.index')->with('status', 'Order added successfully.');
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
                $return = redirect()->route('housekeeping.create')->withErrors($validator->getMessageBag());
            }
        }

        return $return;
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Housekeeping $housekeeping
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Housekeeping $housekeeping)
    {
        $guest = Guest::find($housekeeping->guest_id);

        return view('services.housekeeping.show', compact('housekeeping', 'guest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Housekeeping $housekeeping
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Housekeeping $housekeeping)
    {
        $guests = Guest::all();
        foreach ($guests as $guest) {
            $guest->guestRoomNumber = (isset($guest->rooms[0]->number))
                ? $guest->rooms[0]->number . ' - ' . $guest->firstname . ' ' . $guest->lastname : 'Not Found';
        }
        $guests = $guests->pluck('guestRoomNumber', 'id');

        return view('services.housekeeping.edit', compact('guests', 'housekeeping'));
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
        //No hay nada que evaluar salvo el guest
        $input = Input::all();
        $rules = [
            'guest_id' => 'numeric',
            'bed_sheets' => 'required_without_all:cleaning,minibar,blanket,toiletries,pillow|boolean',
            'cleaning'   => 'required_without_all:bed_sheets,minibar,blanket,toiletries,pillow|boolean',
            'minibar'    => 'required_without_all:bed_sheets,cleaning,blanket,toiletries,pillow|boolean',
            'blanket'    => 'required_without_all:bed_sheets,cleaning,minibar,toiletries,pillow|boolean',
            'toiletries' => 'required_without_all:bed_sheets,cleaning,minibar,blanket,pillow|boolean',
            'pillow'     => 'required_without_all:bed_sheets,cleaning,minibar,blanket,toiletries|boolean',
        ];

        $validator = Validator::make($input, $rules);
        //$housekeeping->Input::all();
        if ($validator->passes()) {
            try {
                DB::beginTransaction();
                $input['bed_sheets'] = (isset($input['bed_sheets'])) ? true : false;
                $input['cleaning']   = (isset($input['cleaning'])) ? true : false;
                $input['minibar']    = (isset($input['minibar'])) ? true : false;
                $input['blanket']    = (isset($input['blanket'])) ? true : false;
                $input['toiletries'] = (isset($input['toiletries'])) ? true : false;
                $input['pillow']     = (isset($input['pillow'])) ? true : false;
                $housekeeping = Housekeeping::find($id);
                $housekeeping->update($input);
                DB::commit();

                $return = redirect()->route('housekeeping.index')->with('status', 'Order updated successfully.');
            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }
        } else {
            $return = redirect()->route('housekeeping.edit', $id)->withErrors($validator->getMessageBag());
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
        Housekeeping::find($id)->delete();
        $totalOrders = Housekeeping::all()->count();
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

    public function changeStatus($id)
    {
        $housekeeping         = Housekeeping::findOrFail($id);
        $housekeeping->status = ($housekeeping->status === '1') ? '2' : '1';
        $housekeeping->save();

        return response()->json($housekeeping->status);
    }

    public function orderList()
    {
        $housekeeping = Housekeeping::where('guest_id', Session::get('guest_id'))->get();

        return $housekeeping;
    }
}
