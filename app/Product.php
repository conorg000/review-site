<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // allow mass assignments
    protected $fillable = ['name', 'price', 'image', 'url'];
    
    function manufacturer() {
        return $this->belongsTo('App\Manufacturer');
    }
    
    function reviews() {
        return $this->belongsToMany('App\User', 'reviews')->withPivot('rating')->withPivot('review')->withPivot('id')->withPivot('created')->withPivot('upvotes')->withPivot('downvotes')->withTimestamps();
    }
    
    function reviewsbyrating() {
        return $this->belongsToMany('App\User', 'reviews')->withPivot('rating')->withPivot('review')->withPivot('id')->withPivot('created')->withPivot('upvotes')->withPivot('downvotes')->withTimestamps()->orderBy('rating', 'DESC');
    }
    
    function reviewsbytime() {
        return $this->belongsToMany('App\User', 'reviews')->withPivot('rating')->withPivot('review')->withPivot('id')->withPivot('created')->withPivot('upvotes')->withPivot('downvotes')->withTimestamps()->orderBy('created', 'DESC');
    }
    
    function pictures() {
        return $this->belongsToMany('App\User', 'pictures')->withPivot('image')->withPivot('id')->withTimestamps();
    }
}
