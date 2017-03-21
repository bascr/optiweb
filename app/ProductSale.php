<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSale extends Model
{
    //
    protected $primaryKey = null;
    protected $table = 'product_sale';

    public function sale() {

        return $this->belongsTo('App\Sale');
    }

    public function product() {

        return $this->belongsTo('App\Product');
    }

    public function saleType() {

        return $this->belongsTo('App\SaleType');
    }
}
