<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CrystalType extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'crystal_types';

    protected $fillable = [ 'type' ];

    public function crystals() {

        return $this->hasMany('App\Crystal');
    }
}
