<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
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
