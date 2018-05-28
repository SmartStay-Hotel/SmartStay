<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip_types extends Model
{
    public function Trip()
    {
        return $this->hasMany('App\Trip');
    }
}
