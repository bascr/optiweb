<?php

namespace App;

use Eloquent;

class ArticleRepairService extends Eloquent
{
    //
    protected $table = 'article_repair_service';
    public $timestamps = false;

    public function repairService() {
        return $this->belongsTo('App\RepairService');
    }

    public function Article() {
        return $this->belongsTo('App\Article');
    }
}
