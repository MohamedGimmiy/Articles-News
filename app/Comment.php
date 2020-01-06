<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
        /**
    * Get all of the owning commentable models.
    */
    public function commentable(){
        return $this->morphTo();
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function users() {
        return $this->belongsToMany('App\User');
    }
    
    public function article() {
        return $this->belongsTo('App\Article');
    }

    public function articles() {
        return $this->belongsToMany('App\Article');
    }
}
