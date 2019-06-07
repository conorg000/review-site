<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = ['image'];
    
    function picproduct() {
        return $this->belongsTo('App\Manufacturer', 'product_id');
    }
    
    function picuser() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
