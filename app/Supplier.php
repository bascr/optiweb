<?php

namespace App;

use Eloquent;

class Supplier extends Eloquent
{
    //
    protected $primaryKey = 'id';
    protected $table = 'suppliers';
    public $timestamps = false;

    protected $fillable = [
        'name', 'address',
        'district_id', 'phone',
        'email'
    ];

    public function district() {

        return $this->belongsTo('App\District');
    }

    public function products() {

        return $this->hasMany('App\Product');
    }

    public function supplierType() {

        return $this->belongsTo('App\SupplierType');

    }


}
