<?php
/**
 * Created by PhpStorm.
 * User: bascr
 * Date: 26-04-2017
 * Time: 17:20
 */


namespace App;

use Eloquent;


class SupplierType extends Eloquent
{
    protected $primaryKey = 'id';
    protected $table = 'supplier_types';
    public $timestamps = false;

    public function suppliers() {

        return $this->hasMany('App\Supplier');

    }


}