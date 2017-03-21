<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalePromotion extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'sale_promotions';

    public function sales() {

        return $this->hasMany('App\Sale');
    }
}
