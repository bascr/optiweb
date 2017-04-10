<?php

namespace App\Http\Controllers;

use App\Client;
use App\Prescription;
use Illuminate\Http\Request;


class PrescriptionController extends Controller
{
    //

    public function index()
    {
        return view('prescription.find');
    }


    public function find(Request $request) {


        $run = $request -> run;

        try{
            $client = Client::all()->where('run', (int)$run)->first();

            $nombre = $client -> name . " " . $client -> last_name . " " . $client -> second_last_name;
            $datos = collect([$nombre, $run]);
            return view('prescription.register') -> with('datos', $datos);
           // dd($datos);

        }catch (Exception $e){

        }


    }

    public function create(Request $request) {



        $date = getdate();
        $year = $date['year'];
        $month = $date['mon'];
        $day = $date['mday'];
        if($month != 10 || $month != 11 || $month != 12 ) {
            $month = "0" . $month;
        }

        $register_date = $year . "-" . $month . "-" . $day;

       try{

           $prescription = new Prescription();
           $prescription->client_run = $request['client_run'];
           $prescription->far_right_eye_sphere = $request->far_right_eye_sphere;
           $prescription->far_right_eye_cyl = $request->far_right_eye_cyl;
           $prescription->far_right_eye_axis = $request->far_right_axis;
           $prescription->far_right_eye_prism = $request->far_right_prism;
           $prescription->far_right_eye_base = $request->far_right_base;
           $prescription->far_right_eye_pd = $request->far_right_pd;
           $prescription->far_left_eye_sphere = $request->far_left_eye_sphere;
           $prescription->far_left_eye_cyl = $request->far_left_eye_cyl;
           $prescription->far_left_eye_axis = $request->far_left_axis;
           $prescription->far_left_eye_prism = $request->far_left_prism;
           $prescription->far_left_eye_base = $request->far_left_base;
           $prescription->far_left_eye_pd = $request->far_left_pd;
           $prescription->near_right_eye_sphere = $request->near_right_eye_sphere;
           $prescription->near_right_eye_cyl = $request->near_right_eye_cyl;
           $prescription->near_right_eye_axis = $request->near_right_axis;
           $prescription->near_right_eye_prism = $request->near_right_prism;
           $prescription->near_right_eye_base = $request->near_right_base;
           $prescription->near_right_eye_pd = $request->near_right_pd;
           $prescription->near_left_eye_sphere = $request->near_left_eye_sphere;
           $prescription->near_left_eye_cyl = $request->near_left_eye_cyl;
           $prescription->near_left_eye_axis = $request->near_left_axis;
           $prescription->near_left_eye_prism = $request->near_left_prism;
           $prescription->near_left_eye_base = $request->near_left_base;
           $prescription->near_left_eye_pd = $request->near_left_pd;
           $prescription->doctor_name = $request->doctor_name;
           $prescription->created_at = $register_date;
           $prescription->observation = $request->observation;
           $prescription->save();

           $message = [
               'content' => 'La receta se ha ingresado exitosamente.',
               'messageNumber' => 1,
           ];

           return view('prescription.messages', compact('message'));

       }catch (\Exception $e){
            dd($e);
       }


    }

    public function findPrescription() {

        return view('prescription.findPrescription');

    }



    public function findPrescriptionRun(Request $request) {

        $run = $request->run;

        return redirect()->action('PrescriptionController@lista', ['run' => $run]);

    }



    public function lista($run){

        $listado = Prescription::where('client_run', (int)$run)->orderBy('id', 'DESC')->paginate(2);
        $client = Client::all()->where('run', (int)$run)->first();
        $nombre = $client->name . ' ' . $client->last_name . ' ' . $client->second_last_name;

        return view('prescription.list', compact('listado', 'nombre'));
    }
}
