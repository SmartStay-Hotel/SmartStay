<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $fillable
        = [
            'guest_id',
            'event_type_id',
            'order_date',
            'status',
        ];

    public function eventTypes()
    {
        return $this->belongsTo('App\Event_types');
    }

    protected $attributes
        = [
            'service_id' => 8,
        ];
}
