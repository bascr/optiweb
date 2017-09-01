<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSalePromotion extends Model
{
    //
    protected $table = 'product_sale_promotion';
    public $timestamps = false;

    public function salePromotion() {

        return $this->belongsTo('App\SalePromotion');
    }

    public function product() {

        return $this->belongsTo('App\Product');
    }


}
