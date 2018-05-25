<?php

namespace App\Http\Controllers;

use App\Room;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class CodeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        $guestCode = implode("", Input::get('code'));
        //$guestCode = '6ca36f';
        $room      = Room::where("code", $guestCode)->first();
        if ($room['code']) {
            $checkOutDate = $room->guests[0]->pivot->checkout_date;
            $today        = Carbon::today();
            $checkOutDate = Carbon::parse($checkOutDate);

            if ($today->lte($checkOutDate)) { //entrará si faltan días
                $guestId = $room->guests[0]->id;
                $minLeft = $today->diffInMinutes($checkOutDate);
                \config(['session.lifetime' => $minLeft]);
                Session::put('guest_id', $guestId);
                //dd(Session::get('guest_id'));
                //dd(\config('session.lifetime'));

                //return compact room guestId
                $return = view('guest.dashboard', compact('room'));
            } else {
                $room->update([
                    'code'   => null,
                    'status' => null,
                ]);//valores pasarán a null porque la estancia ha caducado.
                Session::forget('guest_id');
            }
        } else {
            //$return = view('guest.dashboard')->withErrors(['error' => 'Code does not exist']);
            $return = redirect('/');
        }
        //hacer login IF (code exists)
        //{
        //if guest between (heckout_date and today){
        // hacer session
        ////return compact room guestId
        //} else {
        // room code = null
        // destroy session
        //}
        //} else { return mensaje de error }
        return $return;
    }

    public function logout()
    {
        Session::forget('guest_id');
        return redirect('/');
    }
}
