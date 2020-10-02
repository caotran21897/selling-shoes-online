<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    //
    protected $table = 'dates';

   public function orders()
   {
       return $this->hasMany('App\order');
   }

   public function prices()
   {
       return $this->hasMany('App\price');
   }

   public function sale_promotions()
   {
       return $this->hasMany('App\salepromotion');
   }

   public function goods_receipts()
   {
       return $this->hasMany('App\goodsreceipt');
   }

   public function order_statuses()
   {
       return $this->hasMany('App\orderstatus');
   }
}
