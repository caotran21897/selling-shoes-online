<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //
    protected $table ='suppliers';
    public function goods_recipts()
    {
        return $this->hasMany('App\goodsrecipt');
    }
}
