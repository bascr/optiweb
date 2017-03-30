<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\LogEntry;
use App\Prescription;
use App\User;
use Illuminate\Http\Request;


class MarcajeController extends Controller
{

    public function index(Request $request)
    {
        //<<<<<<< fecha >>>>>>>>>
        $date = getdate();
        $year = $date['year'];
        $month = $date['mon'];
        $day = $date['mday'];
        $hour = $date['hours'];
        $min = $date['minutes'];

        if($month != 10 || $month != 11 || $month != 12 ) {
            $month = "0" . $month;
        }

        $toDay = $year . "-" . $month . "-" . $day;

        //<<<<<<<< hora >>>>>>>>>
        date_default_timezone_set("Chile/Continental");
        $hora = date ("H:i:s",time());


        $nombreUsuario = $request -> user();

        $usuario = $nombreUsuario->username;


        $entrada = $toDay . " " . $hora;
        $cero = '0000-00-00 00:00:00';

        //$diaLaboral = LogEntry::all()->where('out_date',  $cero, 'user_username', $usuario, 'entry_date', $entrada);


        $entrada = '__ : __';
        $salida = '__ : __';

       //dd($diaLaboral[0]->entry_date);
        $array = [$entrada, $salida];
        return view('marcaje.marcar', compact('array'));

        /*
         if($diaLaboral == null){
            $array = [$entrada, $salida];
            return view('marcaje.marcar', compact('array'));
        }
        else{

            $entrada = $diaLaboral[0]->entry_date;
            $ar = explode(" ", $entrada);
            $salida = '__ : __';
            $array = [$ar[1], $salida];
            return view('marcaje.marcar', compact('array'));
        }
        */

    }

    public function log_entry(){

        //<<<<<<< fecha >>>>>>>>>
        $date = getdate();
        $year = $date['year'];
        $month = $date['mon'];
        $day = $date['mday'];
        $hour = $date['hours'];
        $min = $date['minutes'];

        if($month != 10 || $month != 11 || $month != 12 ) {
            $month = "0" . $month;
        }

        $toDay = $year . "-" . $month . "-" . $day;

        //<<<<<<<< hora >>>>>>>>>
        date_default_timezone_set("Chile/Continental");
        $hora = date ("H:i:s",time());


        $nombreUsuario = $request -> user();

        $usuario = $nombreUsuario->username;


        $entrada = $toDay . " " . $hora;


        $diaLaboral = LogEntry::all()->where('user_username', $usuario, 'entry_date', $entrada );

        $entrada = '__ : __';
        $salida = '__ : __';

        // dd($usuario);


        if(emptyArray($diaLaboral)) {
            $array = [$entrada, $salida];
            //dd("hola");
            return view('marcaje.marcar', compact('array'));
        }
        else{

            $marcaje = new LogEntry();
            $marcaje->user_username = $usuario;
            $marcaje->entry_date = $entrada;
            $marcaje->out_date = "";
            $marcaje->save();

            $diaLaboral = LogEntry::all()->where('user_username', $usuario, 'entry_date', $entrada );

            $entrada = $diaLaboral -> entry_date;
            $salida = '__ : __';

            return view('marcaje.marcar');
        }




    }

}
