<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RepairService extends Model
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
}
