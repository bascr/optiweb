<?php

namespace App;

use Eloquent;

class ProductSale extends Eloquent
{
    //
//    protected $primaryKey = null;
    protected $table = 'product_sale';
    public $timestamps = false;

    public function sale() {

        return $this->belongsTo('App\Sale');
    }

    public function product() {

        return $this->belongsTo('App\Product');
    }

}
