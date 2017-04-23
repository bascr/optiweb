<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Supplier;

class ProviderController extends Controller
{
    //
    public function request() {

        $suppliers = Supplier::all();

        return view('provider.request', compact('suppliers'));

    }

    public function sendRequest(Request $request) {

        $supplier = Supplier::find($request['supplier']);
        $to = $supplier->email;
        $title = $request['subject'];
        $content = $request['mail_content'];


        echo $request['mail_content'];

    }

}
