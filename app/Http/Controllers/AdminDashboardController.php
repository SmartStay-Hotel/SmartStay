<?php

namespace App\Http\Controllers;

use App\Guest;
use App\Order;
use App\RoomType;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function checkout(){
        $guests = Guest::getGuestsByCheckoutDate();
        foreach ($guests as $guest){
            $guest->number = $guest->rooms[0]->number;
            $guest->checkin_date = $guest->rooms[0]->pivot->checkin_date;
            $guest->checkout_date = $guest->rooms[0]->pivot->checkout_date;
            $guest->roomType = RoomType::find($guest->rooms[0]->type_id)->name;
        }
        return view('admin.checkout', compact('guests'));
    }

    public function checkin(){
        $guests = Guest::getGuestsByCheckinDate();
        foreach ($guests as $guest){
            $guest->number = $guest->rooms[0]->number;
            $guest->checkin_date = $guest->rooms[0]->pivot->checkin_date;
            $guest->checkout_date = $guest->rooms[0]->pivot->checkout_date;
            $guest->roomType = RoomType::find($guest->rooms[0]->type_id)->name;
        }
        return view('admin.checkin', compact('guests'));
    }

}
