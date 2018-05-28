<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event_types extends Model
{
    public function Event()
    {
        return $this->hasMany('App\Event');
    }
}
