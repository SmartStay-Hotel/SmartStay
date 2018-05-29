<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{

    protected $fillable = ['firstname', 'lastname', 'nie', 'email', 'telephone', 'balance'];

    public function rooms()
    {
        return $this->belongsToMany(Room::class, 'guest_room', 'guest_id', 'room_id')
            ->withPivot('checkin_date', 'checkout_date')
            ->withTimestamps();
    }

    public static function getGuestsByCheckoutDate()
    {
        $guests = Guest::whereHas('rooms', function ($q) {
            $q->where('checkout_date', '=', \Carbon\Carbon::today()->toDateString());
        })->get();
        return $guests;
    }

    public static function getGuestsByCheckinDate(){
        $guests = Guest::whereHas('rooms', function ($q) {
            $q->where('checkin_date', '=', \Carbon\Carbon::today()->toDateString());
        })->get();
        return $guests;
    }
}
