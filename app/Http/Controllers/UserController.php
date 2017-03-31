<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\District;
use App\UserType;
use Exception;
use App\User;

class UserController extends Controller
{
    //
    public function index() {

        $districts = District::orderBy('name', 'asc')->get();
        $user_types = UserType::all();
        return view('auth.register', compact(['districts', 'user_types']));
    }

    public function register(Request $request) {

        $this->validate($request, [

            'username' => 'required|max:45|unique:users',
            'password' => 'required|min:6|confirmed',
            'name' => 'required|max:45|regex:/^[a-zA-ZáéíóúñÑ ]+$/',
            'last_name' => 'required|max:45|regex:/^[a-zA-ZáéíóúñÑ ]+$/',
            'second_last_name' => 'required|max:45|regex:/^[a-zA-ZáéíóúñÑ ]+$/',
            'run' => 'required|numeric|unique:users',
            'digit' => 'required|max:1|regex:/^[0-9Kk]$/',
            'address' => 'required|max:255',
            'district' => 'required|not_in:0',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required|digits_between:9,10|numeric',
            'contract_state' => 'required',
            'base_wage' => 'required|numeric',
            'overtime_value' => 'required|numeric',
            'user_type' => 'required|not_in:0',

        ]);

        try {
            User::create([

                'username' => $request['username'],
                'name' => $request['name'],
                'last_name' => $request['last_name'],
                'second_last_name' => $request['second_last_name'],
                'run' => $request['run'],
                'digit' => $request['digit'],
                'address' => $request['address'],
                'district_id' => $request['district'],
                'email' => $request['email'],
                'phone' => $request['phone'],
                'password' => bcrypt($request['password']),
                'contract_state' => $request['contract_state'],
                'base_wage' => $request['base_wage'],
                'overtime_value' => $request['overtime_value'],
                'user_type_id' => $request['user_type'],
                'branch_office_id' => 1,

            ]);

            $message = [
                'content' => 'El usuario ha sido registrado exitosamente.',
                'messageNumber' => 1,
            ];

            return view('auth.messages', compact('message'));

        } catch(Exception $e) {

            $message = [
                'content' => 'Error al registrar usuario, Error: '.$e->getMessage() ,
                'messageNumber' => 0,
            ];

            return view('auth.messages', compact('message'));

        }
    }
}
