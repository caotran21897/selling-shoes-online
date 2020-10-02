<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    
    protected $table = 'sizes';

    public function product_details()
    {
        return $this->hasMany('App\productdetail');
    }
}
