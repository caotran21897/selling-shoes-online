<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalePromotion extends Model
{
    //
     protected $table = 'sale_promotions';
     
     public function products()
    {
        return $this->belongsToMany('App\Product','product_sale');
    }

    public function date()
    {
        return $this->belongsTo('App\date');
    }
}
