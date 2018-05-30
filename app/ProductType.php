<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    public function SnackAndDrink()
    {
        return $this->hasMany('App\SnacksAndDrink');
    }
}
