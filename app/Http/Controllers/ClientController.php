<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\District;
use App\UserType;

class ClientController extends Controller
{
    //

    public function index() {

        $districts = District::orderBy('name', 'asc')->get();
        $user_types = UserType::all();

        return view('client.register', compact(['districts', 'user_types']));
    }

    public function create() {

        return 'it\'s ok';
    }
}
