<?php

namespace App;

use Eloquent;

class Prescription extends Eloquent
{
    //
    protected $primaryKey = 'id';
    protected $table = 'prescriptions';
    public $timestamps = false;

    protected $fillable = [
        'client_run',
        'far_right_eye_sphere',
        'far_right_eye_cyl',
        'far_right_eye_axis',
        'far_right_eye_prism',
        'far_right_eye_base',
        'far_right_eye_pd',
        'far_left_eye_sphere',
        'far_left_eye_cyl',
        'far_left_eye_axis',
        'far_left_eye_prism',
        'far_left_eye_base',
        'far_left_eye_pd',
        'near_right_eye_sphere',
        'near_right_eye_cyl',
        'near_right_eye_axis',
        'near_right_eye_prism',
        'near_right_eye_base',
        'near_right_eye_pd',
        'near_left_eye_sphere',
        'near_left_eye_cyl',
        'near_left_eye_axis',
        'near_left_eye_prism',
        'near_left_eye_base',
        'near_left_eye_pd',
        'doctor_name',
        'created_at',
        'observation'
    ];

    public function client() {

        return $this->belongsTo('App\Client', 'client_run', 'run');
    }

    public function sale() {

        return $this->belongsTo('App\Sale');

    }
}
