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
            'status',
        ];

    protected $attributes
        = [
            'service_id' => 1,
        ];

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }
}
