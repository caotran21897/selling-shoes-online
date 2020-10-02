<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //

    protected $table = 'order_details';

    public function order()
    {
        return $this->belongsTo('App\order');
    }

    public function product_detail()
    {
        return $this->belongsTo('App\productdetail');
    }
}
