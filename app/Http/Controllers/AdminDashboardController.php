<?php

namespace App\Http\Controllers;

use App\Alarm;
use App\Event;
use App\Guest;
use App\Housekeeping;
use App\PetCare;
use App\Restaurant;
use App\RoomType;
use App\SnacksAndDrink;
use App\SpaAppointment;
use App\Taxi;
use App\Trip;

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
        $restaurants    = Restaurant::getAllRestaurantOrders();
        $taxis          = Taxi::getAllTaxiOrders();
        $alarms         = Alarm::getAllAlarmOrders();
        $events         = Event::getAllEventOrders();
        $houseKeepings  = Housekeeping::getAllHousekeepingOrders();
        $petCare        = PetCare::getAllPetCareOrders();
        $snackAndDrinks = SnacksAndDrink::getAllSnackAndDrinkOrders();
        $spas           = SpaAppointment::getAllSpaAppointmentOrders();
        $trips          = Trip::getAllTripOrders();
        $services       = collect(array_collapse([
            $restaurants,
            $taxis,
            $alarms,
            $events,
            $houseKeepings,
            $petCare,
            $snackAndDrinks,
            $spas,
            $trips,
        ]));
        //dd($services);
        //$services = (is_array($services) && count($services) > 0) ? $services : [];

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

}
