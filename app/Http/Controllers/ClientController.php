<?php

namespace App\Http\Controllers;

use App\Prescription;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
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

        $register_date = Carbon::now('America/Santiago');

        $this->validate($request, [

            'run' => 'required|numeric|unique:clients',
            'digit' => 'required|max:1|regex:/^[0-9Kk]$/',
            'name' => 'required|max:45|regex:/^[a-zA-ZáéíóúñÑÁÉÍÓÚ ]+$/',
            'last_name' => 'required|max:45|regex:/^[a-zA-ZáéíóúñÑÁÉÍÓÚ ]+$/',
            'second_last_name' => 'required|max:45|regex:/^[a-zA-ZáéíóúñÑÁÉÍÓÚ ]+$/',
            'birth_date' => 'required',
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
            $client->birth_date = Carbon::parse($request->birth_date)->format('Y-m-d');
            $client->address = $request->address;
            $client->district_id = $request->district;
            $client->phone = $request->phone;
            $client->email = $request->email;
            $client->created_at = $register_date;
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

    public function lista(){

        $listado = Client::where('run', '<>' ,'NULL')->orderBy('second_last_name', 'ASC')->paginate(6);


        if($listado != null){
            return view('client.list', compact('listado'));
        }else{
            dd('Para ver lista de clientes debe tener clientes registrados');
        }


    }

    public function seeClient($run){

        $client = Client::where('run', $run)->get()->first();
        $districts = District::all();
        return view('client.seeClient', compact('client', 'districts'));
    }

    public function openUpdate($run){

        $client = Client::where('run', $run)->get()->first();

        $districts = District::all();
       //dd($client);
        return view('client.update', compact('client', 'districts'));
    }

    public function update(Request $request){

        $this->validate($request, [

            'name' => 'required|max:45|regex:/^[a-zA-ZáéíóúñÑÁÉÍÓÚ ]+$/',
            'last_name' => 'required|max:45|regex:/^[a-zA-ZáéíóúñÑÁÉÍÓÚ ]+$/',
            'second_last_name' => 'required|max:45|regex:/^[a-zA-ZáéíóúñÑÁÉÍÓÚ ]+$/',
            'birth_date' => 'required',
            'address' => 'required|max:255',
            'district' => 'required|not_in:0',
            'phone' => 'required|digits_between:9,10|numeric',
            'email' => 'required|email|max:255',

        ]);

        try {
            $client = Client::where('run', $request->run)->get()->first();

            $client->name = $request->name;
            $client->last_name = $request->last_name;
            $client->second_last_name = $request->second_last_name;
            $client->birth_date = Carbon::parse($request->birth_date)->format('Y-m-d');
            $client->address = $request->address;
            $client->district_id = $request->district;
            $client->phone = $request->phone;
            $client->email = $request->email;
            $client->save();


            $message = [
                'content' => 'El cliente ha sido modificado exitosamente.',
                'messageNumber' => 1,
            ];

            return view('client.messages2', compact('message'));

        } catch(Exception $e) {

            $message = [
                'content' => 'Error al modificar cliente, Error: '.$e->getMessage() ,
                'messageNumber' => 0,
            ];

            return view('client.messages2', compact('message'));
        }
    }

    public function find(){
        return view('client.find');
    }

    public function findClient(Request $request){
        $client = Client::where('run', $request->run)->get()->first();

        $districts = District::all();
        //dd($client);
        if($client != null){
            return view('client.update', compact('client', 'districts'));
        }else{
            $message = [
                'content' => 'Cliente no existe o ingresó mal el run.',
                'messageNumber' => 2,
            ];
            return view('client.messages', compact('message'));
        }

    }

    public function listToDay(){

        $register_date = (string) Carbon::now('America/Santiago')->format('Y/m/d');

        $listado = Client::whereDate('created_at', '=', $register_date )->orderBy('created_at', 'DESC')->paginate(6);

        //dd($listado);
        if($listado != null){
            return view('client.listToDay', compact('listado'));
        }else{
            return view('/home');
        }
    }

}
