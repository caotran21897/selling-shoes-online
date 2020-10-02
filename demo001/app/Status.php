<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //
    protected $table = 'statuses';

    public function order_statuses()
    {
        return $this->hasMany('App\orderstatus');
    }
    
}