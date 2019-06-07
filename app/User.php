<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'dob', 'type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /* Get products, rating and timestamp that have been reviewed by a user */
    function products() {
        return $this->belongsToMany('App\Product', 'reviews')->withPivot('rating')->withPivot('review')->withPivot('user_id')->withTimestamps();
    }
    
    function pictures() {
        return $this->belongsToMany('App\Product', 'pictures')->withPivot('image')->withTimestamps();
    }
    
    function follows() {
        return $this->belongsToMany('App\User', 'follows', 'user_id', 'follows_id')->withPivot('follows_id');
    }
}
