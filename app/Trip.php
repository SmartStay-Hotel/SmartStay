<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    //
    protected $fillable = ['trip_type_id',
        'service_id',
        'order_date',
        'day_hour',
        'status'];
}
