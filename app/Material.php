<?php

namespace App;

use Eloquent;

class Material extends Eloquent
{
    //
    protected $primaryKey = 'id';
    protected $table = 'materials';

    protected $fillable = [ 'name' ];

    public function crystals() {

        return $this->hasMany('App\Crystal');
    }
}
