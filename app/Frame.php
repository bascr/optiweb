<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Frame extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'frames';
    public $timestamps = false;


    public function model() {

        return $this->belongsTo('App\Model');
    }

    public function color() {

        return $this->belongsTo('App\Color');
    }

    public function products() {

        return $this->morphMany('App\Product', 'productable');
    }

}
