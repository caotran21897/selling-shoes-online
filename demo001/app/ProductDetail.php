<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    
    protected $table = 'product_details';

    public function size()
    {
        return $this->belongsTo('App\size');
    }

    public function product_color()
    {
        return $this->belongsTo('App\productcolor');
    }

    public function order_details()
    {
        return $this->hasMany('App\orderdetail');
    }
    public function goods_receipt_details()
    {
        return $this->hasMany('App\goodsreceiptdetail');
    }
}
