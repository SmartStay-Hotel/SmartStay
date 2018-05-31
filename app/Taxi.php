<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taxi extends Model
{

    protected $fillable
        = [
            'guest_id',
            'order_date',
            'day_hour',
            'status',
        ];

    protected $attributes
        = [
            'service_id' => 5,
        ];
}
