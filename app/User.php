<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'username';
    public $incrementing = false;
    public $keyType = 'string';
    protected $table = 'users';

    protected $fillable = [

        'username', 'name',
        'last_name', 'second_last_name',
        'run', 'digit',
        'address','email',
        'district_id', 'phone',
        'password', 'contract_state',
        'base_wage', 'overtime_value',
        'user_type_id', 'branch_office_id',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Relationships
    public function userType() {

        return $this->belongsTo('App\UserType');
    }

    public function logEntries() {

        return $this->hasMany('App\LogEntry', 'user_username', 'username');
    }

    public function branchOffice() {

        return $this->belongsTo('App\BranchOffice');
    }

    public function district() {

        return $this->belongsTo('App\District');
    }

    public function inventories() {

        return $this->hasMany('App\Inventory', 'user_username', 'username');
    }

    public function  sales() {

        return $this->hasMany('App\Sale', 'user_username', 'username');
    }
}
