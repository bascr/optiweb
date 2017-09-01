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
            'name' => 'required|max:45|regex:/^[a-zA-ZáéíóúñÑÁÉÍÓÚ ]+$/',
            'last_name' => 'required|max:45|regex:/^[a-zA-ZáéíóúñÑÁÉÍÓÚ ]+$/',
            'second_last_name' => 'required|max:45|regex:/^[a-zA-ZáéíóúñÑÁÉÍÓÚ ]+$/',
            'run' => 'required|numeric|unique:users',
            'digit' => 'required|max:1|regex:/^[0-9Kk]$/',
            'address' => 'required|max:255',
            'district' => 'required|not_in:0',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required|digits_between:9,10|numeric',
            'contract_state' => 'required',
            'base_wage' => 'required',
            'overtime_value' => 'required',
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
                'branch_office_id' => 1
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

    public function show() {

        $users = User::orderBy('last_name', 'asc')->paginate(7);

        return view('auth.show', compact('users'));

    }

    public function edit($username) {

        $user = User::where('username', $username)->get()->first();
        $districts = District::all();
        $user_types = UserType::all();

        return view('auth.editform', compact('user','districts', 'user_types'));


    }

    public function update(Request $request) {

        $this->validate($request, [

            'name' => 'required|max:45|regex:/^[a-zA-ZáéíóúñÑÁÉÍÓÚ ]+$/',
            'last_name' => 'required|max:45|regex:/^[a-zA-ZáéíóúñÑÁÉÍÓÚ ]+$/',
            'second_last_name' => 'required|max:45|regex:/^[a-zA-ZáéíóúñÑÁÉÍÓÚ ]+$/',
            'address' => 'required|max:255',
            'district' => 'required|not_in:0',
            'email' => 'required|email|max:255',
            'phone' => 'required|digits_between:9,10|numeric',
            'base_wage' => 'required|numeric',
            'overtime_value' => 'required|numeric',
            'user_type' => 'required|not_in:0',

        ]);

        try {

            $user = User::where('username', $request['username'])->get()->first();
            $user->name = $request['name'];
            $user->last_name = $request['last_name'];
            $user->second_last_name = $request['second_last_name'];
            $user->address = $request['address'];
            $user->district_id = $request['district'];
            $user->email = $request['email'];
            $user->phone = $request['phone'];
            $user->base_wage = $request['base_wage'];
            $user->overtime_value = $request['overtime_value'];
            $user->user_type_id = $request['user_type'];
            $user->save();

            $message = [
                'content' => 'El usuario ha sido editado exitosamente.',
                'messageNumber' => 1,
            ];

            return view('auth.editmessages', compact('message'));

        } catch(Exception $e) {

            $message = [
                'content' => 'Error al editar usuario, Error: '.$e->getMessage() ,
                'messageNumber' => 0,
            ];

            return view('auth.editmessages', compact('message'));

        }


    }

    public function find() {

        return view('auth.find');

    }

    public function account(Request $request) {

        $this->validate($request, [

            'username' => 'required|max:45',

        ]);

        try {
            $user = User::where('username', $request['username'])->get()->first();

            if($user == null) {
                $message = [
                    'content' => 'El nombre de usuario ingresado no es válido'
                ];

                return view('auth.accountmessages', compact('message'));
            }

            return view('auth.account', compact('user'));

        } catch(Exception $e) {

            $message = [
                'content' => 'Error al activar/desactivar cuenta, Error: '.$e->getMessage()
            ];

            return view('auth.accountmessages', compact('message'));

        }

    }

    public function updateAccount(Request $request) {

        try {
            $user = User::where('username', $request['username'])->get()->first();
            $user->contract_state = $request['contract_state'];
            $user->save();

            $state = $request['contract_state'] == 0 ? 'desactivada' : 'activada';

            $message = [
                'content' => 'La cuenta del usuario '. $user->username . ', perteneciente a ' . $user->name . ' ' . $user->last_name . ' ' . $user->second_last_name . ' ha sido ' . $state,
            ];

            return view('auth.accountmessages', compact('message'));


        } catch(Exception $e) {

            $message = [
                'content' => 'Error al activar/desactivar cuenta, Error: '.$e->getMessage()
            ];

            return view('auth.accountmessages', compact('message'));

        }


    }


}
