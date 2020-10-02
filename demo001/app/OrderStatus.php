<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    //
    protected $table = 'order_statuses';

    public function order()
    {
        return $this->belongsTo('App\order');
    }
    public function status()
    {
        return $this->belongsTo('App\status');
    }

    public function date()
    {
        return $this->belongsTo('App\date');
    }
}
