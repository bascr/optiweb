<?php

namespace App;

use Eloquent;

class Workshop extends Eloquent
{
    //
    protected $primaryKey = 'id';
    protected $table = 'workshops';

    protected $fillable = [
        'name', 'address',
        'district_id', 'phone',
        'email'
    ];

    public function district() {

        return $this->belongsTo('App\District');
    }

    public function repairServices() {

        return $this->hasMany('App\RepairService');
    }
}
