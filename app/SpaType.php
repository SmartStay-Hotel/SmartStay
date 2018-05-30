<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpaType extends Model
{
    public function spaAppointment()
    {
        return $this->hasMany('App\SpaAppointment');
    }
}
