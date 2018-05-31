<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpaAppointment extends Model
{
    protected $fillable = ['guest_id',
        'treatment_type_id',
        'day_hour',
        'order_date',
        'price',
        'status'];

    protected $attributes
        = [
            'service_id' => 3,
        ];

    public function spaType()
    {
        return $this->belongsTo('App\SpaType');
    }
}
