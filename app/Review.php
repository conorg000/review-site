<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $fillable = ['rating', 'review', 'created'];
    
    function revproduct() {
        return $this->belongsTo('App\Manufacturer', 'product_id');
    }
    
    function revuser() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
