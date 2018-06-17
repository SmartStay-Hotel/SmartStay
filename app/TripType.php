<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TripType extends Model
{

    public function Trip()
    {
        return $this->hasMany('App\Trip');
    }

    public static function getPriceById($id) {
        return self::find($id)->price;
    }

    public static function getMaxPeopleByTrip($id) {
        return self::find($id)->max_num_people;
    }
}
