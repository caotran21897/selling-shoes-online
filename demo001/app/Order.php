<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = 'orders';
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function bill()
    {
        return $this->belongsTo('App\bill');
    }

    public function order_statuses()
    {
        return $this->hasMany('App\orderstatus');
    }

    public function order_details()
    {
        return $this->hasMany('App\orderdetail');
    }

    public function date()
    {
        return $this->belongsTo('App\date');
    }
}
