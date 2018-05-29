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
            'price',
            'status',
        ];

    protected $attributes
        = [
            'service_id' => 1,
        ];
}
