<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crystal extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'crystals';

    public function material() {

        return $this->belongsTo('App\Material');
    }

    public function focus() {

        return $this->belongsTo('App\Focus');
    }

    public function crystalTreatment() {

        return $this->belongsTo('App\CrystalTreatment');
    }

    public function crystalType() {

        return $this->belongsTo('App\CrystalType');
    }

    public function diopterRange() {

        return $this->belongsTo('App\DiopterRange');
    }

    public function laboratory() {

        return $this->belongsTo('App\Laboratory');
    }

    public function products() {

        return $this->morphMany('App\Product', 'productable');
    }
}
