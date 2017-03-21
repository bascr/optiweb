<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiopterRange extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'diopter_ranges';

    protected $fillable = [ 'range' ];

    public function crystals() {

        return $this->hasMany('App\Crystal');
    }
}
