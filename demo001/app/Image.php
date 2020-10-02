<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    //
    protected $table = 'images';
    public function product_color()
    {
        return $this->belongsTo('App\productcolor');
    }
    
}
