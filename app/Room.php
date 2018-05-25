<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['capacity', 'disabled_adapted', 'jacuzzi', 'code', 'status'];

    public function roomType()
    {
        //return $this->hasMany();
    }

    public function guests(){
        return $this->belongsToMany(Guest::class, 'guest_room', 'room_id', 'guest_id')
            ->withPivot('checkin_date', 'checkout_date')
            ->withTimestamps();
    }
}
