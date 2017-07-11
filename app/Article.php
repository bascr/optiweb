<?php

namespace App;

use Eloquent;

class Article extends Eloquent
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

    public function articleRepairService() {

        return $this->hasMany('App\ArticleRepairService');
    }

}
