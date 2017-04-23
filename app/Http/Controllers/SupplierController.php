<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Supplier;
use App\District;
use Exception;

class SupplierController extends Controller
{
    //
    public function index() {

        $districts = District::all();

        return view('supplier.register', compact('districts'));

    }


    public function create(Request $request) {

        $this->validate($request, [

            'name' => 'required|max:45|regex:/^[a-zA-ZáéíóúñÑ ]+$/',
            'address' => 'required|max:255',
            'district' => 'required|not_in:0',
            'phone' => 'required|digits_between:9,10|numeric',
            'email' => 'required|email|max:255|unique:clients',

        ]);

        try {

            $supplier = new Supplier();
            $supplier->name = $request['name'];
            $supplier->address = $request['address'];
            $supplier->distric_id = $request['district'];
            $supplier->phone = $request['phone'];
            $supplier->email = $request['email'];
            $supplier->save();

            $message = [
                'content' => 'El proveedor ha sido registrado exitosamente.',
                'messageNumber' => 1,
            ];

            return view('supplier.messages', compact('message'));

        } catch(Exception $e) {

            $message = [
                'content' => 'Error al registrar proveedor, Error: '.$e->getMessage() ,
                'messageNumber' => 0,
            ];

            return view('client.messages', compact('message'));

        }

    }


    public function request() {

        $suppliers = Supplier::all();

        return view('supplier.request', compact('suppliers'));

    }

    public function sendRequest(Request $request) {

        $supplier = Supplier::find($request['supplier']);
        $to = $supplier->email;
        $title = $request['subject'];
        $content = $request['mail_content'];


        echo $request['mail_content'];

    }

}
