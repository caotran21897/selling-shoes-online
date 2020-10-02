<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    //
    protected $table = 'product_colors';

    public function images()
    {
        return $this->hasMany('App\image');
    }

    public function product()
    {
        return $this->belongsTo('App\product');
    }

    public function color()
    {
        return $this->belongsTo('App\color');
    }
    public function product_details()
    {
        return $this->hasMany('App\productdetail');
    }
}
