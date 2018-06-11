<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{

    public static function getServiceName($id)
    {
        $name = ($id == 2) ? 'snackdrink' : self::get()->where('id', $id)->first()->name;

        return $name;
    }
}
