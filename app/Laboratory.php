<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'laboratories';

    protected $fillable = [
        'name', 'address',
        'district_id', 'phone',
        'email'
    ];

    public function district() {

        return $this->belongsTo('App\Laboratory');
    }

    public function crystals() {

        return $this->hasMany('App\Crystal');
    }
}
