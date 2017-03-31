<?php

namespace App;

use Eloquent;

class Supplier extends Eloquent
{
    //
    protected $primaryKey = 'id';
    protected $table = 'suppliers';

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
}
