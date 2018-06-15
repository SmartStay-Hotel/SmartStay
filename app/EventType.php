<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{

    public function Event()
    {
        return $this->hasMany('App\Event');
    }

    public static function getMaxPeopleByEvent($id) {
        return self::find($id)->max_num_people;
    }
}
