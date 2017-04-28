<?php

namespace App;

use Eloquent;

class Focus extends Eloquent
{
    //
    protected $primaryKey = 'id';
    protected $table = 'focuses';

    protected $fillable = [ 'name' ];

    public function crystals() {

        return $this->hasMany('App\Crystal');
    }
}
