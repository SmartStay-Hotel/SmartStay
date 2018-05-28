<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{

    protected $fillable = ['code', 'status'];

    public function roomType()
    {
        return $this->belongsTo(RoomType::class, 'type_id');
    }

    public function guests()
    {
        return $this->belongsToMany(Guest::class, 'guest_room', 'room_id', 'guest_id')
            ->withPivot('checkin_date', 'checkout_date')
            ->withTimestamps();
    }

    public static function getRoomsByType($id, $disabled_adapted = null, $jacuzzi = null)
    {
        if ($disabled_adapted && $jacuzzi){
            $rooms = Room::where(['type_id' => $id, 'status' => null, 'disabled_adapted' => $disabled_adapted, 'jacuzzi' => $jacuzzi])->get();
        }elseif ($disabled_adapted){
            $rooms = Room::where(['type_id' => $id, 'status' => null, 'disabled_adapted' => $disabled_adapted])->get();
        }elseif ($jacuzzi){
            $rooms = Room::where(['type_id' => $id, 'status' => null, 'jacuzzi' => $jacuzzi])->get();
        }else{
            $rooms = Room::where(['type_id' => $id, 'status' => null])->get();
        }
        return $rooms;
    }
}
