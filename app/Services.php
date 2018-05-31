<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{

    public static function getServiceName($id){
        return self::get()->where('id', $id)->first()->name;
    }
}
