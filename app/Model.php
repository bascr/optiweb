<?php

namespace App;

use Eloquent;

class Model extends Eloquent
{
    //
    protected $primaryKey = 'id';
    protected $table = 'models';

    protected $fillable = [ 'name' ];

    public function frames() {

        return $this->hasMany('App\Frame');
    }
}
