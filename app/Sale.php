<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'sales';

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
}
