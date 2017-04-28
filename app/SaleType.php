<?php

namespace App;

use Eloquent;

class SaleType extends Eloquent
{
    //
    protected $primaryKey = 'id';
    protected $table = 'sale_types';

    protected $fillable = [ 'name' ];

    public function sales() {

        return $this->hasMany('App\Sale');

    }
}
