<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spa_type extends Model
{
    public function spa()
    {
        return $this->hasMany('App\Spa_appointment');
    }
}
