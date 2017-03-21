<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'colors';

    protected $fillable = [ 'name' ];

    public function frames() {

        return $this->hasMany('App\Frame');
    }
}
