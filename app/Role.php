<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //One role may belong to one user, and at the same time it may belong to many users.
    // So, you need to add two methods in your User model, as shown here:
    // I may be the admin or the customer
    protected $fillable = [
        'name'
        ];

        public function user() {
            return $this->belongsTo('App\User');
        }

        public function users() {
            return $this->belongsToMany('App\User');
        }
}
