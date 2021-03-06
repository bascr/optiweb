<?php

namespace App;

use Eloquent;

class Client extends Eloquent
{
    //
    protected $primaryKey = 'run';
    public $incrementing = false;
    public $keyType = 'string';
    protected $table = 'clients';
    public $timestamps = false;

    public function district() {

        return $this->belongsTo('App\District');
    }

    public function prescriptions() {

        return $this->hasMany('App\Prescription', 'client_run', 'run');
    }

    public function repairServices() {

        return $this->hasMany('App\RepairService', 'client_run', 'run');
    }

    public function sales() {

        return $this->hasMany('App\Sale');
    }

}
