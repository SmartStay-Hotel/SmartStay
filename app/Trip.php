<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    //
    protected $fillable = ['guest_id',
        'trip_type_id',
        'service_id',
        'order_date',
        'price',
        'status'];
    public function tripTypes()
    {
        return $this->belongTo('App\Trip_types');
    }
}
