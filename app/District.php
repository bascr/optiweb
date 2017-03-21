<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'districts';

    protected $fillable = [ 'name' , 'city_id'];

    public function city() {

        return $this->belongsTo('App\City');
    }

    public function users() {

        return $this->hasMany('App\User');
    }

    public function branchOffices() {

        return $this->hasMany('App\BranchOffice');
    }

    public function  laboratories() {

        return $this->hasMany('App\Laboratory');
    }

    public function  workshops() {

        return $this->hasMany('App\Workshop');
    }

    public function suppliers() {

        return $this->hasMany('App\Supplier');
    }

    public function clients() {

        return $this->hasMany('App\Client');
    }



}
