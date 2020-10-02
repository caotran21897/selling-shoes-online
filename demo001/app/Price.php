<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    //
    protected $table = 'prices';

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function date()
    {
        return $this->belongsTo('App\date');
    }
}

