<?php

namespace App;

use Eloquent;

class DiopterRange extends Eloquent
{
    //
    protected $primaryKey = 'id';
    protected $table = 'diopter_ranges';

    protected $fillable = [ 'range' ];

    public function crystals() {

        return $this->hasMany('App\Crystal');
    }
}
