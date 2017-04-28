<?php

namespace App;

use Eloquent;

class SalePromotion extends Eloquent
{
    //
    protected $primaryKey = 'id';
    protected $table = 'sale_promotions';
    public $timestamps = false;

    public function sales() {

        return $this->hasMany('App\Sale');
    }
}
