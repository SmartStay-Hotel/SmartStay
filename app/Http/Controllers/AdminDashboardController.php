<?php

namespace App\Http\Controllers;

use App\Guest;
use App\Room;
use App\RoomType;
use App\Services;

class AdminDashboardController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Services::getAllOrders();

        return view('admin.dashboard', compact('services'));
    }

    public function pendingOrders()
    {

    }

    public function dispatchedOrders()
    {

    }

    public function checkout()
    {
        $guests = Guest::getGuestsByCheckoutDate();
        foreach ($guests as $guest) {
            $guest->number        = $guest->rooms[0]->number;
            $guest->checkin_date  = $guest->rooms[0]->pivot->checkin_date;
            $guest->checkout_date = $guest->rooms[0]->pivot->checkout_date;
            $guest->roomType      = RoomType::find($guest->rooms[0]->type_id)->name;
        }

        return view('admin.checkout', compact('guests'));
    }

    public function checkin()
    {
        $guests = Guest::getGuestsByCheckinDate();
        foreach ($guests as $guest) {
            $guest->number        = $guest->rooms[0]->number;
            $guest->checkin_date  = $guest->rooms[0]->pivot->checkin_date;
            $guest->checkout_date = $guest->rooms[0]->pivot->checkout_date;
            $guest->roomType      = RoomType::find($guest->rooms[0]->type_id)->name;
        }

        return view('admin.checkin', compact('guests'));
    }

    public function indexStatistics()
    {
        $availables = Room::where('status', null)->count();
        $occupied = Room::where('status', '!=', null)->count();

        return view('admin.statistics', compact('availables', 'occupied'));
    }

    public function statistics()
    {
        $lastCheckin      = Guest::getLastFiveDaysCheckinDate();
        $lastcheckout     = Guest::getLastFiveDaysCheckoutDate();
        $lastOrders       = Services::getLastFiveDaysOrders();
        $lastOrdersBuyers = Services::getLastFiveDaysOrdersBuyers();
        $statistics       = [
            'lastCheckin'      => $lastCheckin,
            'lastCheckout'     => $lastcheckout,
            'lastOrders'       => $lastOrders,
            'lastOrdersBuyers' => $lastOrdersBuyers,
        ];

        return $statistics;
    }

}
