<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    public function snackAndDrinks()
    {
        return $this->hasMany('App\SnacksAndDrink');
    }
}
