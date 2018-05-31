<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{

    protected $fillable = ['name', 'description'];


    public function rooms()
    {
        return $this->hasMany(Room::class, 'type_id');
    }
}
