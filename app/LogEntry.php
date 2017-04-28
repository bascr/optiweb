<?php

namespace App;

use Eloquent;

class LogEntry extends Eloquent
{
    //
    protected $primaryKey = 'id';
    protected $table = 'log_entries';
    public $timestamps = false;

    // Relationships
    public function user() {

        return $this->belongsTo('App\User', 'user_username', 'username');
    }

}
