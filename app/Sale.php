<?php

namespace App;

use Eloquent;

class Sale extends Eloquent
{
    //
    protected $primaryKey = 'id';
    protected $table = 'sales';
    public $timestamps = false;

    public function user() {

        return $this->belongsTo('App\User', 'user_username', 'username');
    }

    public function client() {

        return $this->belongsTo('App\Client', 'client_run', 'run');
    }

    public function productSale() {

        return $this->hasMany('App\ProductSale');
    }

    public function salePromotion() {

        return $this->belongsTo('App\SalePromotion');
    }

    public function saleType() {

        return $this->belongsTo('App\SaleType');
    }

    public function prescriptions() {

        return $this->hasMany('App\Prescription');

    }
}
