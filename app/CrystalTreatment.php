<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CrystalTreatment extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'crystal_treatments';

    protected $fillable = [ 'name' ];

    public function crystals() {

        return $this->hasMany('App\Crystal');
    }
}
