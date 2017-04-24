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
            $supplier->district_id = $request['district'];
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

    public function show() {

        $suppliers = Supplier::paginate(6);

        return view('supplier.show', compact('suppliers'));

    }

    public function edit($id) {

        $supplier = Supplier::where('id', $id)->get()->first();
        $districts = District::all();


        return view('supplier.editform', compact('supplier', 'districts'));

    }

    public function update(Request $request) {

        $this->validate($request, [

            'name' => 'required|max:45|regex:/^[a-zA-ZáéíóúñÑ ]+$/',
            'address' => 'required|max:255',
            'district' => 'required|not_in:0',
            'phone' => 'required|digits_between:9,10|numeric',
            'email' => 'required|email|max:255|unique:clients',

        ]);

        try{


            $supplier = Supplier::where('id', $request['id'])->get()->first();
            $supplier->name = $request['name'];
            $supplier->address = $request['address'];
            $supplier->district_id = $request['district'];
            $supplier->phone = $request['phone'];
            $supplier->email = $request['email'];
            $supplier->save();

            $message = [
                'content' => 'El proveedor ha sido editado exitosamente.',
                'messageNumber' => 1,
            ];

            return view('supplier.editmessages', compact('message'));


        } catch(Exception $e) {

            $message = [
                'content' => 'Error al editar el proveedor, Error: '.$e->getMessage() ,
                'messageNumber' => 0,
            ];

            return view('supplier.editmessages', compact('message'));

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

        $email = $supplier->email;
        $subject = $request['subject'];
        $content = $request['mail_content'];
        $data = [
            'content' => $content
        ];

        Mail::send('supplier.email', $data, function($message) use ($email, $subject) {
            $message->from('contacto@opticasalarcon.cl', 'Using OptiWeb');
            $message->to($email)->subject($subject);
        });


    }

}
