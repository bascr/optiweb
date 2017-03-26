<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\District;
use App\UserType;

class PrescriptionController extends Controller
{
    //

    public function index()
    {
        return view('prescription.find');
    }


    public function find() {

        return view('prescription.register');
    }

    public function register() {

        return 'it\'s ok';
    }
}
