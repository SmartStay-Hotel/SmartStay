<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpaTreatmentType extends Model
{
    public function spaAppointment()
    {
        return $this->hasMany('App\SpaAppointment');
    }
}
