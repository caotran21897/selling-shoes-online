<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    //
    protected $table = 'colors';

    public function product_colors()
    {
        return $this->hasMany('App\ProductColor');
    }
}
