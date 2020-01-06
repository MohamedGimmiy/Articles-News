<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $fillable = [
        'user_id', 'title', 'body',
        ];

        // one to many
        public function user() {
            return $this->belongsTo('App\User');
        }

        public function users() {
            return $this->belongsToMany('App\User');
        }

        /**
        * Get the tags for the article
        */
        // many to many
        public function tags() {
            return $this->belongsToMany('App\Tag');
        }
        
/*         public function tags(){
            return $this->hasMany('App\Tag');
        } */

        /**
        * Get all of the Articles' comments.
        */
        public function comments(){
            return $this->morphMany('App\Comment', 'commentable');
        }


}
