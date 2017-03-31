<?php

namespace App;

use Eloquent;

class Color extends Eloquent
{
    //
    protected $primaryKey = 'id';
    protected $table = 'colors';

    protected $fillable = [ 'name' ];

    public function frames() {

        return $this->hasMany('App\Frame');
    }
}
