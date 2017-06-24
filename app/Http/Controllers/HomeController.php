<?php

namespace App\Http\Controllers;

use App\Client;
use App\Happy_message;
use App\Http\Requests;
use App\Prescription;
use App\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = (string) Carbon::now('America/Santiago')->format('Y/m/d');

        $cantidad = Prescription::where('created_at', '=' , $today)->count();

        $client = Client::whereDate('created_at', '=' ,$today)->count();

        $sales = Sale::whereDate('created_at', '=' ,$today)->where('sale_state', '3')->count();

        $message = Happy_message::all();

        $max = sizeof($message);
        $random = rand( 1 , $max);
        foreach($message as $mess){
            if($random == $mess->id){
                $mensaje = '"'. $mess->message . '"';
            }
        }

        return view('home', compact('cantidad', 'client', 'sales','mensaje'));
    }

    public function mail() {

        return view('mail.mail');

    }


}
