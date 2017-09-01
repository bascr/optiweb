<?php

namespace App;

use Eloquent;

class Product extends Eloquent
{
    //
    protected $primaryKey = 'productable_id';
    protected $morphClass = 'Product';
    protected $table = 'products';
    public $timestamps = false;


    public function productSale() {

        return $this->hasMany('App\ProductSale');
    }

    public function supplier() {

        return $this->belongsTo('App\Supplier');
    }

    public function brand() {

        return $this->belongsTo('App\Brand');
    }

    public function inventories() {

        return $this->hasMany('App\Inventory');
    }

    public function productable() {

        return $this->morphTo();
    }

    public function productSalePromotion() {

        return $this->hasMany('App\ProductSalePromotion');
    }
}
