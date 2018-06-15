<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpaTreatmentType extends Model
{
    public function spaAppointment()
    {
        return $this->hasMany('App\SpaAppointment');
    }

    public static function getPriceById($id) {
        return self::find($id)->price;
    }

    public static function getNameById($id){
        return self::find($id)->name;
    }
}
