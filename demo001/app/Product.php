<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    // protected $table = 'products';
    protected $table = 'products';



    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

    public function prices()
    {
        return $this->hasMany('App\Price');
    }

    public function sale_promotions()
    {
        return $this->belongsToMany('App\SalePromotion','product_sale');
    }

    public function product_colors()
    {
        return $this->hasMany('App\productcolor');
    }
 



}
