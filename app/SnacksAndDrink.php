<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SnacksAndDrink extends Model
{

    protected $fillable
        = [
            'guest_id',
            'product_type_id',
            'order_date',
            'price',
            'quantity',
            'status',
        ];

    protected $attributes
        = [
            'service_id' => 2,
        ];

    public function productType()
    {
        return $this->belongsTo('App\ProductType');
    }

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }

    /**
     * @return \___PHPSTORM_HELPERS\static|array|mixed
     */
    public static function getAllSnackAndDrinkOrders()
    {
        $snackDrinks = self::all();
        if (count($snackDrinks) > 0) {
            $serviceName = Services::getServiceName($snackDrinks[0]->service_id);
            foreach ($snackDrinks as $key => $snackDrink) {
                $snackDrink->serviceName = $serviceName;
                $snackDrink->roomNumber  = ($snackDrink->guest->rooms[0]->number) ? $snackDrink->guest->rooms[0]->number
                    : 'Snack and DrinkErr id:' . $snackDrink->id;
            }
        } else {
            $snackDrinks = [];
        }

        return $snackDrinks;
    }

    public static function getOrderHistoryByGuest($guestId)
    {
        $snackDrinks = self::where('guest_id', $guestId)->get();
        if (count($snackDrinks) > 0) {
            $serviceName = Services::getServiceName($snackDrinks[0]->service_id);
            foreach ($snackDrinks as $key => $snackDrink) {
                $snackDrink->snackTypeName = $snackDrink->productType->name;
                $snackDrink->serviceName = $serviceName;
                $snackDrink->roomNumber  = ($snackDrink->guest->rooms[0]->number) ? $snackDrink->guest->rooms[0]->number
                    : 'Snack and DrinkErr id:' . $snackDrink->id;
            }
        } else {
            $snackDrinks = [];
        }

        return $snackDrinks;
    }

    public static function getOrderByGuestDate($guest_id, $date){
        return self::where('guest_id', $guest_id, 'created_at', $date)->get();
    }
}
