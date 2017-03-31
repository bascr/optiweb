<?php

namespace App;

use Eloquent;

class Brand extends Eloquent
{
    //
    protected $primaryKey = 'id';
    protected $table = 'brands';

    protected $fillable = [ 'name' ];

    public function products() {

        return $this->hasMany('App\Product');
    }
}
