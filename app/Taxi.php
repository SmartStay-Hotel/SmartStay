<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taxi extends Model
{
    protected $fillable = ['guest_id',
        'service_id',
        'order_date',
        'day_hour',
        'status'];
}
