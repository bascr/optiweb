<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleType extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'sale_types';

    protected $fillable = [ 'name' ];
}
