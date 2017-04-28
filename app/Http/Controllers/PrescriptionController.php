<?php

namespace App\Http\Controllers;

use App\Client;
use App\Crystal;
use App\Frame;
use App\Prescription;
use App\Product;
use App\ProductSale;
use App\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;


class PrescriptionController extends Controller
{
    //

    public function index()
    {
        return view('prescription.find');
    }


    public function find() {

        $run = Input::get('run');

        try{
            $client = Client::where('run', $run)->get()->first();

            if($client == null) {
                return view('prescription.clientnotfoundmessage');
            }

            $crystals = Crystal::all();

            return view('prescription.register', compact('client', 'crystals'));

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

           // add sale
           $sale = new Sale();
           $sale->user_username = Auth::user()->username;
           $sale->client_run = $request->client_run;
           $sale->created_at = Carbon::now();
           $sale->sale_promotion_id = 1; // sin promoción
           $sale->pay = $request->pay;
           $sale->sale_state = 1; // 1 = pendiente
           $sale->sale_type_id = 2; // 2 = receta
           $sale->save();

           // getting the last sale id inserted
           $sale_id = Sale::all()->last()->id;

           // add prescription
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
           $prescription->sale_id = $sale_id;
           $prescription->save();

           // add frame to product_sale
           $product_sale = new ProductSale();
           $product_sale->sale_id = $sale_id;
           $product_sale->product_productable_id = $request->frame;
           $product_sale->quantity = 1;
           $product_sale->save();

           // reduce frame stock
           $frame = Frame::where('id', $request['frame'])->get()->first();
           $stock = $frame->stock;
           $frame->stock = ($stock - 1);
           $frame->save();

           // add crystal to product_sale
           $product_sale = new ProductSale();
           $product_sale->sale_id = $sale_id;
           $product_sale->product_productable_id = (int) Input::get('crystals');
           $product_sale->quantity = 1; // un par
           $product_sale->save();

           $message = [
               'content' => 'La receta se ha ingresado exitosamente.',
               'messageNumber' => 1,
           ];

           return view('prescription.messages', compact('message'));

       }catch (Exception $e){
           $message = [
               'content' => 'Error al ingresar la receta.' . $e->getMessage(),
               'messageNumber' => 2,
           ];

           return view('prescription.messages', compact('message'));
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

        $valida = Client::where('run', (int)$run)->first();

        if($valida != null){
            $listado = Prescription::where('client_run', (int)$run)->orderBy('id', 'DESC')->paginate(6);
            $client = Client::all()->where('run', (int)$run)->first();
            $nombre = $client->name . ' ' . $client->last_name . ' ' . $client->second_last_name;

            return view('prescription.list', compact('listado', 'nombre'));
        }else{
            $message = [
                'content' => 'El run ingresado no se encuentra registrado.',
                'messageNumber' => 1,
            ];
            return view('prescription.messages2', compact('message'));
        }

    }

    public function seePrescription($id){

        $presc = Prescription::where('id', $id)->first();
        $client = Client::where('run', $presc->client_run)->first();
        $name = $client->name . ' ' . $client->last_name . ' ' . $client->second_last_name;
        $run = $presc->client_run;

        // getting product_sale record from prescription, passing through sale
        $product_sales = $presc->sale->productSale;

        // creating new object to store the resultant objects
        $product = new Product();
        $frame = new Frame();
        $crystal = new Crystal();

        // identify if the record from product_sale is frame or crystal
        foreach ( $product_sales as $product_sale) {
            $productable_id = $product_sale->product_productable_id;

            $product = Product::where('productable_id', $productable_id)->get()->first();
            if($product->productable_type == 'App\\Frame') {
                $frame = $product->productable;
            }
            if($product->productable_type == 'App\\Crystal') {
                $crystal = $product->productable;
            }
        }

        return view('prescription.seePrescription', compact('presc', 'name', 'run', 'frame', 'crystal'));
    }

    public function update($id){

        $presc = Prescription::where('id', $id)->first();
        $client = Client::where('run', $presc->client_run)->first();
        $name = $client->name . ' ' . $client->last_name . ' ' . $client->second_last_name;
        $run = $presc->client_run;

        return view('prescription.update', compact('presc', 'name', 'run'));
    }

    public function updatePresc(Request $request) {

        $this->validate($request, [

            'doctor_name' => 'required|max:100',
            //'frame' => 'required|not_in:0',
            //'crystal' => 'required|max:500',
            'observation' => 'required|max:500',
        ]);

        try{

            $prescription = Prescription::where('client_run', $request->client_run )->where('id', $request->presc_id)->first();

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
            $prescription->observation = $request->observation;
            $prescription->save();

            $message = [
                'content' => 'La receta se ha modificado exitosamente.',
                'messageNumber' => 1,
            ];

            return view('prescription.messages', compact('message'));

        }catch (Exception $e){
            dd($e);
        }


    }

    public function pdf(){

        $pdf = PDF::loadView('seePrescription');

        return $pdf->download('receta.pdf');

    }

    public function listToDay(){

        $date = getdate();
        $year = $date['year'];
        $month = $date['mon'];
        $day = $date['mday'];
        if($month != 10 || $month != 11 || $month != 12 ) {
            $month = "0" . $month;
        }

        $register_date = $year . "-" . $month . "-" . $day;

        $prescriptions = Prescription::where('created_at', $register_date )->orderBy('id', 'DESC')->paginate(6);
        if($prescriptions != null){
            return view('prescription.listToDay', compact('prescriptions'));
        }else{
            return view('/home');
        }
    }
}
