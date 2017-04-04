<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogEntry extends Model
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
