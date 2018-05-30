<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PetCare extends Model
{
    protected $fillable =['guest_id',
        'order_date',
        'service_id',
        'water',
        'standard_food',
        'premium_food',
        'price',
        'snacks',
        'status'];
}
