<?php
/**
 * Created by PhpStorm.
 * User: Rodrigo
 * Date: 24-04-17
 * Time: 14:27
 */

namespace App;
use Eloquent;

class Happy_message extends Eloquent
{
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $table = 'happy_messages';
    public $timestamps = false;

}



