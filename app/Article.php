<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'articles';
    public $timestamps = false;


    public function category() {

        return $this->belongsTo('App\Category', 'id');
    }

    public function products() {

        return $this->morphMany('App\Product', 'productable');
    }

}
