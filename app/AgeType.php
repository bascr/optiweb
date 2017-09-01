<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgeType extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'AgeType';

    protected $fillable = [ 'name' ];

    public function frames() {

        return $this->hasMany('App\Frame');
    }
}
