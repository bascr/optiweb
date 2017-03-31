<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'inventories';
    public $timestamps = false;

    public function user() {

        return $this->belongsTo('App\User', 'user_username', 'username');
    }

    public function product() {

        return $this->belongsTo('App\Product', 'product_productable_id', 'productable_id');
    }
}
