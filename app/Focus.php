<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Focus extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'focuses';

    protected $fillable = [ 'name' ];

    public function crystals() {

        return $this->hasMany('App\Crystal');
    }
}
