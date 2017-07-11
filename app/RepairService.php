<?php

namespace App;

use Eloquent;

class RepairService extends Eloquent
{
    //
    protected $primaryKey = 'id';
    protected $table = 'repair_services';

    public function workshop() {

        return $this->belongsTo('App\Workshop');
    }

    public function client() {

        return $this->belongsTo('App\Client', 'client_run', 'run');
    }

    public function articleRepairService() {

        return $this->hasMany('App\ArticleRepairService');
    }
}
