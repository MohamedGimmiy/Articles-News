<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    // you can grab all articles written by the users belonging to the same country.
    protected $fillable = [
        'name'
    ];

    public function users() {
        return $this->hasMany('App\User');
    }

    public function articles(){
        return $this->hasManyThrough(
            'App\Article',
            'App\User',
            'country_id', // Foreign key on users table...
            'user_id', // Foreign key on articles table...
            'id', // Local key on countries table...
            'id' // Local key on users table...
        );
    }
}
