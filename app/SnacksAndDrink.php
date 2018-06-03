<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SnacksAndDrink extends Model
{
    protected $fillable =
        ['guest_id',
        'product_type_id',
        'order_date',
        'price',
        'quantity'];

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

    public static function getAllSnackAndDrinkOrders()
    {
        $snackDrinks = SnacksAndDrink::all();
        if (count($snackDrinks) > 0) {
            $serviceName = Services::getServiceName($snackDrinks[0]->service_id);
            foreach ($snackDrinks as $key => $snackDrink) {
                $snackDrink->serviceName = $serviceName;
                $snackDrink->roomNumber  = ($snackDrink->guest->rooms[0]->number) ? $snackDrink->guest->rooms[0]->number
                    : 'Snack and Drink id:' . $snackDrink->id;
            }
        } else {
            $snackDrink = [];
        }

        return $snackDrink;
    }
}
