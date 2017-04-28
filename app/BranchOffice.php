<?php

namespace App;

use Eloquent;

class BranchOffice extends Eloquent
{
    //
    protected $primaryKey = 'id';
    protected $table = 'branch_offices';

    protected $fillable = [ 'name', 'address', 'phone', 'district_id' ];

    public function users() {

        return $this->hasMany('App\User');
    }

    public function district() {

        return $this->belongsTo('App\District');
    }
}
