<?php

namespace App;

use Eloquent;

class CrystalTreatment extends Eloquent
{
    //
    protected $primaryKey = 'id';
    protected $table = 'crystal_treatments';

    protected $fillable = [ 'name' ];

    public function crystals() {

        return $this->hasMany('App\Crystal');
    }
}
