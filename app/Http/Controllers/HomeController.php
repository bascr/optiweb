<?php

namespace App\Http\Controllers;

use App\Client;
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

        $toDay = $year . "-" . $month . "-" . $day;

        $cantidad = Prescription::all()->where('created_at', $toDay)->count();

        $client = Client::all()->where('created_at', $toDay)->count();

        $array = [$cantidad, $client];

        return view('home', compact('array'));
    }
/*
    function prescription_of_day(){

        $date = getdate();
        $year = $date['year'];
        $month = $date['mon'];
        $day = $date['mday'];
        if($month != 10 || $month != 11 || $month != 12 ) {
            $month = "0" . $month;
        }

        $toDay = $year . "-" . $month . "-" . $day;

        $cantidad = Prescription::all()->where('created_at', $toDay)->count();

        //return view('home', compact('cantidad'));
        dd($cant[0]);
    }

*/

}
