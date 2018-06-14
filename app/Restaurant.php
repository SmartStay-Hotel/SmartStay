<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{

    protected $fillable
        = [
            'guest_id',
            'quantity',
            'day_hour',
            'order_date',
            'status',
        ];

    protected $attributes
        = [
            'service_id' => 1,
        ];

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }

    /**
     * @return \___PHPSTORM_HELPERS\static|array|mixed
     */
    public static function getAllRestaurantOrders()
    {
        $restaurants = self::all();
        if (count($restaurants) > 0) {
            $serviceName = Services::getServiceName($restaurants[0]->service_id);
            foreach ($restaurants as $key => $restaurant) {
                $restaurant->serviceName = $serviceName;
                $restaurant->roomNumber  = ($restaurant->guest->rooms[0]->number) ? $restaurant->guest->rooms[0]->number
                    : 'RestaurantErr id:' . $restaurant->id;
            }
        } else {
            $restaurants = [];
        }

        return $restaurants;
    }

    public static function getOrderHistoryByGuest($guestId)
    {
        $restaurants = self::where('guest_id', $guestId)->get();
        if (count($restaurants) > 0) {
            $serviceName = Services::getServiceName($restaurants[0]->service_id);
            foreach ($restaurants as $key => $restaurant) {
                $restaurant->serviceName = $serviceName;
                $restaurant->roomNumber  = ($restaurant->guest->rooms[0]->number) ? $restaurant->guest->rooms[0]->number
                    : 'RestaurantErr id:' . $restaurant->id;
            }
        } else {
            $restaurants = [];
        }

        return $restaurants;
    }
}
