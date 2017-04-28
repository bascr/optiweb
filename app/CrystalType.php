<?php

namespace App;

use Eloquent;

class CrystalType extends Eloquent
{
    //
    protected $primaryKey = 'id';
    protected $table = 'crystal_types';

    protected $fillable = [ 'name' ];

    public function crystals() {

        return $this->hasMany('App\Crystal');
    }
}
