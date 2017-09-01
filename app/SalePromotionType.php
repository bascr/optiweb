<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalePromotionType extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'sale_promotion_types';

    protected $fillable = [ 'name' ];

    public function salePromotions() {

        return $this->hasMany('App\SalePromotion');
    }
}
