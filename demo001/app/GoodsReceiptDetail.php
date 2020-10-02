<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoodsReceiptDetail extends Model
{
    //
    protected $table = 'goods_receipt_details';

    public function goods_receipt()
    {
        return $this->belongsTo('App\goodsreceipt');
    }
    public function product_detail()
    {
        return $this->belongsTo('App\Productdetail');
    }
}
