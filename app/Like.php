<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['user_id', 'review_id'];
    
    function review() {
        return $this->belongsTo('App\Review', 'review_id');
    }
    
    function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
