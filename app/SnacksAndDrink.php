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
}
