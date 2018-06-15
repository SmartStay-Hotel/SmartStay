<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{

    public static function getServiceName($id)
    {
        $name = ($id == 2) ? 'snackdrink' : self::get()->where('id', $id)->first()->name;

        //$name = str_replace(' ', '', $name);

        return $name;
    }

    public static function getAllOrders()
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

        return $services;
    }

    public static function getLastFiveDaysOrders()
    {
        $orders     = self::getAllOrders();
        $lastOrders = [];
        for ($i = 5; $i >= 0; $i--) {
            $day                           = (new \Carbon\Carbon)->subDays($i);
            $ordersByDay                   = $orders->where('order_date', $day->toDateString());
            $lastOrders[$day->format('D')] = $ordersByDay->count();
        }

        return $lastOrders;
    }

    public static function getLastFiveDaysOrdersBuyers()
    {
        $orders     = self::getAllOrders();
        $lastOrders = [];
        for ($i = 5; $i >= 0; $i--) {
            $day                           = (new \Carbon\Carbon)->subDays($i);
            $ordersByDay                   = $orders->where('order_date', $day->toDateString())
                ->where('price', '>', 0);
            $lastOrders[$day->format('D')] = $ordersByDay->count();
        }

        return $lastOrders;
    }
}
