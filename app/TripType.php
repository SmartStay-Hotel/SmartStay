<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TripType extends Model
{

    public function Trip()
    {
        return $this->hasMany('App\Trip');
    }
}
