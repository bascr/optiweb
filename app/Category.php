<?php

namespace App;

use Eloquent;

class Category extends Eloquent
{
    //
    protected $primaryKey = 'id';
    protected $table = 'categories';

    protected $fillable = [ 'name' ];

    public function articles() {

        return $this->hasMany('App\Article');
    }
}
