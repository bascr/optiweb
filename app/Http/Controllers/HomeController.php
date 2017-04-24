<?php

namespace App\Http\Controllers;

use App\Client;
use App\Happy_message;
use App\Http\Requests;
use App\Prescription;
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
        $date = getdate();
        $year = $date['year'];
        $month = $date['mon'];
        $day = $date['mday'];
        if($month != 10 || $month != 11 || $month != 12 ) {
            $month = "0" . $month;
        }

        if($day < 10){

            $toDay = $year . "-" . $month . "-" . "0" . $day;
        }else{
            $toDay = $year . "-" . $month . "-" . $day;
        }


        $cantidad = Prescription::all()->where('created_at', $toDay)->count();

        $client = Client::all()->where('created_at', $toDay)->count();

        $message = Happy_message::all();

        $max = sizeof($message);
        $random = rand( 1 , $max);
        foreach($message as $mess){
            if($random == $mess->id){
                $mensaje = '"'. $mess->message . '"';
            }
        }

        $array = [$cantidad, $client];

        return view('home', compact('array', 'mensaje'));
    }


}
