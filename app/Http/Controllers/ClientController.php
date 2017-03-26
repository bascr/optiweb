<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\District;
use App\UserType;
use App\Client;
use Exception;

class ClientController extends Controller
{
    //

    public function index() {

        $districts = District::orderBy('name', 'asc')->get();
        $user_types = UserType::all();

        return view('client.register', compact(['districts', 'user_types']));
    }

    public function create(Request $request) {

        $this->validate($request, [

            'run' => 'required|numeric|unique:clients',
            'digit' => 'required|max:1|regex:/^[0-9Kk]$/',
            'name' => 'required|max:45|regex:/^[a-zA-ZáéíóúñÑ ]+$/',
            'last_name' => 'required|max:45|regex:/^[a-zA-ZáéíóúñÑ ]+$/',
            'second_last_name' => 'required|max:45|regex:/^[a-zA-ZáéíóúñÑ ]+$/',
            'address' => 'required|max:255',
            'district' => 'required|not_in:0',
            'phone' => 'required|digits_between:9,10|numeric',
            'email' => 'required|email|max:255|unique:clients',

        ]);

        try {
            $client = new Client();
            $client->run = $request->run;
            $client->digit = $request->digit;
            $client->name = $request->name;
            $client->last_name = $request->last_name;
            $client->second_last_name = $request->second_last_name;
            $client->address = $request->address;
            $client->district_id = $request->district;
            $client->phone = $request->phone;
            $client->email = $request->email;
            $client->save();


            $message = [
                'content' => 'El cliente ha sido registrado exitosamente.',
                'messageNumber' => 1,
            ];

            return view('client.messages', compact('message'));

        } catch(Exception $e) {

            $message = [
                'content' => 'Error al registrar cliente, Error: '.$e->getMessage() ,
                'messageNumber' => 0,
            ];

            return view('client.messages', compact('message'));
        }

    }
}
