<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
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
