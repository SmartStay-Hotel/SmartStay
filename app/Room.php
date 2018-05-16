<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['capacity', 'disabled_adapted', 'jacuzzi', 'code'];

    public function roomType()
    {
        return $this->hasMany();
    }
}
