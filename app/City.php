<?php

namespace App;

use Eloquent;

class City extends Eloquent
{
    //
    protected $primaryKey = 'id';
    protected $table = 'cities';

    protected $fillable = [ 'name' ];

    public function districts() {

        return $this->hasMany('App\District');
    }
}
