<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoodsReceipt extends Model
{

    protected $table = 'goods_receipts';

    

    public function goods_receipt_details()
    {
        return $this->hasMany('App\goodsreceiptdetail');
    }

    public function supplier()
    {
        return $this->belongsTo('App\supplier');
    }

    public function date()
    {
        return $this->belongsTo('App\date');
    }
}
