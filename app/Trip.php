<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{

    protected $fillable
        = [
            'guest_id',
            'trip_type_id',
            'order_date',
            'price',
            'status',
        ];

    protected $attributes
        = [
            'service_id' => 7,
        ];

    public function tripTypes()
    {
        return $this->belongTo('App\Trip_types');
    }
}
