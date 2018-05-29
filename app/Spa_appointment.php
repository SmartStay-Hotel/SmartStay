<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spa_appointment extends Model
{
    protected $fillable = ['guest_id',
        'service_id',
        'treatment_type_id',
        'day_hour',
        'order_date',
        'price',
        'status'];
    public function spa_Type()
    {
        return $this->belongsTo('App\Spa_type');
    }
}
