<?php

namespace App;

use Eloquent;

class UserType extends Eloquent
{
    //
    protected $primaryKey = 'id';
    protected $table = 'user_types';

    protected $fillable = [ 'name' ];

    // Relationships
    public function users() {

        return $this->hasMany('App\User');
    }
}
