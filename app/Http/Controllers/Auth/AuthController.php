<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [

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
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([

            'username' => $data['username'],
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'second_last_name' => $data['second_last_name'],
            'run' => $data['run'],
            'digit' => $data['digit'],
            'address' => $data['address'],
            'district_id' => $data['district'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => bcrypt($data['password']),
            'contract_state' => $data['contract_state'],
            'base_wage' => $data['base_wage'],
            'overtime_value' => $data['overtime_value'],
            'user_type_id' => $data['user_type'],
            'branch_office_id' => 1,

        ]);
    }
}
