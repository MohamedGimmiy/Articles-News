<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $fillable = [
        'user_id', 'city', 'about',
        ];
        
    public function User(){
        return $this->belongsTo('App\User');
    }
    /**
    * Get all of the profiles' comments.
    */
    public function comments(){
        return $this->morphMany('App\Comment', 'commentable');
    }
}
