<?php

namespace App\Http\Controllers;

use App\Guest;
use App\SpaAppointment;
use App\SpaTreatmentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SpaAppointmentController extends Controller
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
        $spaAppointments = SpaAppointment::all();//::paginate(3);

        return view('services.spa.index', compact('spaAppointments'));
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
        $guests   = $guests->pluck('guestRoomNumber', 'id');
        $spaTypes = SpaTreatmentType::all();

        return view('services.spa.create', compact('guests', 'spaTypes'));
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
            'guest_id'          => 'required|numeric',
            'day_hour'          => 'required|date',
            'treatment_type_id' => 'required|numeric',
        ];
        $validator = Validator::make($input, $rules);

        if ($validator->passes()) {
            DB::beginTransaction();
            DB::commit();
        }
        /////////////////////// OLD Code //////////////////////////
        $order_date = date('Y-m-d');

        $request->validate([
            'day_hour' => 'required',
        ]);

        SpaAppointment::create([
            'guest_id'          => $request->guest,
            'order_date'        => $order_date,
            'treatment_type_id' => $request->spatype,
            'day_hour'          => $request->day_hour,
            'price'             => 20,
            'status'            => '0',
        ]);

        return redirect('/service/spa');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\SpaAppointment $spaAppointment
     *
     * @return \Illuminate\Http\Response
     */
    public function show(SpaAppointment $spaAppointment)
    {
        $guest = Guest::find($spaAppointment->guest_id);

        return view('services.spa.show', compact('spaAppointment', 'guest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(SpaAppointment $spaAppointment)
    {
        $data = [
            'guests'   => Guest::all(),
            'spaTypes' => SpaTreatmentType::all(),
            'spa'      => $spaAppointment,
        ];
        //dd($data);

        //return View::make('services.spa.edit')->with($data);
        return view('services.spa.edit', $data);
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
        $order_date = date('Y-m-d');
        SpaAppointment::find($id)->update([
            'guest_id'          => $request->guest,
            'treatment_type_id' => $request->spatype,
            'day_hour'          => $request->day_hour,
            'order_date'        => $order_date,
            'price'             => 20,
            'status'            => '0',
        ]);

        return redirect('/service/spa');
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
        SpaAppointment::find($id)->delete();

        return redirect('/service/spa');
    }

    public function changeStatus($id)
    {
        $spa         = SpaAppointment::findOrFail($id);
        $spa->status = ($spa->status === '1') ? '2' : '1';
        $spa->save();

        return response()->json($spa->status);
    }
}
