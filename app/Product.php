<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $primaryKey = 'productable_id';
    protected $morphClass = 'Product';
    protected $table = 'products';

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
}
