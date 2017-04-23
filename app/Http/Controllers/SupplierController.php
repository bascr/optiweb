<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Supplier;
use App\District;

class SupplierController extends Controller
{
    //
    public function index() {

        $districts = District::all();

        return view('supplier.register', compact('districts'));

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
