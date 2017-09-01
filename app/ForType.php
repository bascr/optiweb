<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForType extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'ForType';

    protected $fillable = [ 'name' ];

    public function frames() {

        return $this->hasMany('App\Frame');
    }
}
