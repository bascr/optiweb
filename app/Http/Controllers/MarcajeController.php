<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\LogEntry;
use App\Prescription;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\Flysystem\Exception;
use App\Client;


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

        if($day < 10){

            $toDay = $year . "-" . $month . "-" . "0" . $day;
        }else{
            $toDay = $year . "-" . $month . "-" . $day;
        }

        //<<<<<<<< hora >>>>>>>>>
        date_default_timezone_set("Chile/Continental");
        $hora = date ("H:i:s",time());


        $nombreUsuario = $request -> user();

        $usuario = $nombreUsuario->username;


        $entrada = $toDay . " " . $hora;
        $cero = '0000-00-00 00:00:00';

        $diaLaboral = LogEntry::all()->where('out_date',  $cero, 'user_username', $usuario, 'entry_date', $entrada)->count();

        //dd($diaLaboral);

        $entrada = '__ : __';
        $salida = '__ : __';

       //dd($diaLaboral[2]->entry_date);
        $array = [$entrada, $salida];
       // return view('marcaje.marcar', compact('array'));


         if($diaLaboral == null){
            $array = [$entrada, $salida];
            return view('marcaje.marcar', compact('array'));
        }
        else{
            $diaLaboral = LogEntry::all()->where('out_date',  $cero, 'user_username', $usuario, 'entry_date', $entrada)->first();
            //dd($diaLaboral->entry_date);
            $entrada = $diaLaboral->entry_date;
            $ar = explode(" ", $entrada);
            $salida = '__ : __';
            $array = [$ar[1], $salida];
            return view('marcaje.marcar', compact('array'));
        }


    }

    public function log_entry(Request $request){

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

        if($day < 10){

            $toDay = $year . "-" . $month . "-" . "0" . $day;
        }else{
            $toDay = $year . "-" . $month . "-" . $day;
        }

        //<<<<<<<< hora >>>>>>>>>
        date_default_timezone_set("Chile/Continental");
        $hora = date ("H:i:s",time());


        $nombreUsuario = $request -> user();

        $usuario = $nombreUsuario->username;


        $entrada = $toDay . " " . $hora;

        $cero = '0000-00-00 00:00:00';

        $diaLaboral = LogEntry::all()->where('out_date',  $cero, 'user_username', $usuario, 'entry_date', $entrada)->count();

        if($diaLaboral == null){
            $marcaje = new LogEntry();
            $marcaje->user_username = $usuario;
            $marcaje->entry_date = $entrada;
            $marcaje->out_date = "";
            $marcaje->save();

            $diaLaboral = LogEntry::all()->where('out_date',  $cero, 'user_username', $usuario, 'entry_date', $entrada)->first();
            //dd($diaLaboral->entry_date);
            $entrada = $diaLaboral->entry_date;
            $ar = explode(" ", $entrada);
            $salida = '__ : __';
            $array = [$ar[1], $salida];










            //$salida = '__ : __';

            //$array = [$entrada, $salida];
            return view('marcaje.marcar', compact('array'));

        }
        else{

            try{
                $marcarsalida = LogEntry::all()->where('out_date',  $cero, 'user_username', $usuario)->first();
                $marcarsalida->out_date = $entrada;
                //dd($marcarsalida);
                $marcarsalida->save();

                $cantidad = Prescription::all()->where('created_at', $toDay)->count();

                $client = Client::all()->where('created_at', $toDay)->count();

                $array = [$cantidad, $client];

                //return view('home', compact('array'));


                $horaDeSalida = explode(" ", $entrada);
                //dd($horaDeSalida[1]);

                $message = [
                    'content' => 'Tu hora de salida es: ',
                    'hora' => $horaDeSalida[1],
                    'messageNumber' => 1,
                ];
                return view('marcaje.messages', compact('message'));










            }catch (Exception $e){

            }

            return view('home');


        }
    }

}
