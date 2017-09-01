<?php

namespace App\Http\Controllers;

use App\RepairService;
use App\Client;
use App\Workshop;
use App\Article;
use App\District;
use App\ArticleRepairService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Exception;
use Mail;
use phpDocumentor\Reflection\Types\Integer;

class RepairController extends Controller
{
    //
    public function index() {
        return view('repair.find');
    }


    public function find() {

        $run = Input::get('run');

        try {
            $client = Client::where('run', $run)->get()->first();

            if($client == null) {
                return view('prescription.clientnotfoundmessage');
            }

            $workshops = Workshop::all();

            return view('repair.repairservice', compact('client', 'workshops'));

        }catch (Exception $e) {

        }
    }

    public function createinternal(Request $request) {

        try{
            $user = $request->user();
            $date = Carbon::now('America/Santiago');

            $repairService = new RepairService();
            $repairService->user_username = $user->username;
            $repairService->client_run = $request->client_run;
            $repairService->workshop_id = $request->workshop;
            $repairService->created_at = $date;
            $repairService->state = 1; // 1. pendiente, 2. en local 3. realizada 4. devolución
            $repairService->delivery_date = "";
            $pay = $request->pay;
            if($pay == null){
                $pay = 0;
            }
            $repairService->pay = $pay;
            $repairService->price = $request->price;
            $repairService->observation = $request->observacion;
            $repairService->save();

            // getting the last sale id inserted
            $repairService_id = RepairService::all()->last()->id;

            $cods_article = $request->codArticle;
            $quantities = $request->quantity;

            for($i = 0; $i < count($cods_article); $i++) {
                $articleRepairService = new ArticleRepairService();
                $articleRepairService->repair_service_id = $repairService_id;
                $articleRepairService->article_id = $cods_article[$i];
                $articleRepairService->quantity = $quantities[$i];
                $articleRepairService->save();
            }

            //discounting stock
            for($i = 0; $i < count($cods_article); $i++){
                $article = Article::where('id', $cods_article[$i])->get()->first();
                if($article != null){
                    $article->stock -= $quantities[$i];
                    $article->save();
                }
            }
            $message = [
                'content' => 'La reparacion se ha ingresado exitosamente.',
                'messageNumber' => 1,
            ];

            return view('repair.messages', compact('message'));

        }catch (Exception $e){
            $message = [
                'content' => 'Error al ingresar la reparación.' . $e->getMessage(),
                'messageNumber' => 2,
            ];

            return view('repair.messages', compact('message'));
        }

    }

    public function getArticleName(Request $request) {

        $article = Article::where('id', $request['id'])->where('stock', '>', 0)->get()->first();

        $data = array();

        if($article != null) {

            $data = [
                'nameArticle' => $article->name,
                'price' => $article->price
            ];

        } else {

            $data =[
                'nameArticle' => 'Articulo no encontrado, o sin stock',
                'price' => 0
            ];

        }

        echo json_encode($data);
    }

    public function stateRepair() {

        $repairServices = DB::table('repair_services')
            ->join('clients', 'repair_services.client_run', '=', 'clients.run')
            ->select('repair_services.*', 'clients.run as run', 'clients.digit as digit',
                'clients.name as name', 'clients.last_name as last_name', 'clients.second_last_name', 'clients.phone')
            ->where('repair_services.state', '=', '1')
            ->orWhere('repair_services.state', '=', '2')
            ->orderBy('repair_services.state', 'asc')->paginate(7);


        return view('repair.repairstate', compact('repairServices'));
    }

    public function stateDate() {

        $repairServices = DB::table('repair_services')
            ->join('clients', 'repair_services.client_run', '=', 'clients.run')
            ->select('repair_services.*', 'clients.run as run', 'clients.digit as digit',
                'clients.name as name', 'clients.last_name as last_name', 'clients.second_last_name', 'clients.phone')
            ->where('repair_services.state', '=', '1')
            ->orWhere('repair_services.state', '=', '2')
            ->orderBy('repair_services.created_at', 'desc')->paginate(7);


        return view('repair.repairstatedate', compact('repairServices'));
    }

    public function confirmInLocal($id) {

        // Changing repair state
        $repairServices = DB::table('repair_services')
            ->join('clients', 'repair_services.client_run', '=', 'clients.run')
            ->select('repair_services.*', 'clients.run as run',
                'clients.name as name', 'clients.last_name as last_name', 'clients.second_last_name', 'clients.email')
            ->where('repair_services.id', '=', $id)->get();


        DB::table('repair_services')
            ->where('id', $id)
            ->update(['state' => 2]);


        // Sending email to client
        $email = $repairServices[0]->email;
        $subject = "Retiro de lente en reparación";
        $from = 'contacto@opticasalarcon.cl';
        $data = [
            'name' => 'Estimado(a): '. $repairServices[0]->name .' '. $repairServices[0]->last_name .' '.$repairServices[0]->second_last_name.', ',
            'content' => 'su receta está lista para ser retirada, le esperamos.',
            'pathToImage' => public_path().'/images/glasses_email.png'
        ];

        Mail::send('prescription.emailConfirmation', $data, function($message) use ($email, $subject) {

            $message->from('bastycr@gmail.com', 'Óptica Alarcón');
            $message->to($email)->subject($subject);

        });

        return redirect('/repair/repairstate');
    }

    public function confirmRepair($id) {

        $repairServices = DB::table('repair_services')
            ->join('clients', 'repair_services.client_run', '=', 'clients.run')
            ->join('article_repair_service', 'repair_services.id', '=', 'article_repair_service.repair_service_id' )
            ->select('repair_services.*', 'clients.run as run', 'clients.digit as digit',
                'clients.name as name', 'clients.last_name as last_name', 'clients.second_last_name', 'clients.email',
                'article_repair_service.article_id', 'article_repair_service.quantity')
            ->where('repair_services.id', '=', $id)->get();


        $articles = DB::table('articles')
            ->join('article_repair_service', 'articles.id', '=', 'article_repair_service.article_id')
            ->join('repair_services', 'article_repair_service.repair_service_id', '=', 'repair_services.id')
            ->select('articles.*','article_repair_service.quantity')
            ->where('article_repair_service.repair_service_id', '=', $id)->get();

        $total = 0;
        foreach ($articles as $article){
            $total += $article->price * $article->quantity;
        }

        $toPay = ($total + (int)$repairServices[0]->price) - (int)$repairServices[0]->pay;

        //dd($repairServices);
        return view('repair.confirmSaleRepair', compact('repairServices', 'articles', 'toPay'));
    }

    public function repairSale(Request $request) {

        $user = $request->user();
        $date = Carbon::now('America/Santiago');
        $id = $request->id;
        $toPay = $request->toPay;

        $articles = DB::table('articles')
            ->join('article_repair_service', 'articles.id', '=', 'article_repair_service.article_id')
            ->join('repair_services', 'article_repair_service.repair_service_id', '=', 'repair_services.id')
            ->select('articles.*','article_repair_service.quantity')
            ->where('article_repair_service.repair_service_id', '=', $id)->get();

        $repairServices = RepairService::find($id);
        $repairServices->delivery_date = $date;
        $repairServices->state = 3;
        $repairServices->save();
        //dd($articles);

        return view('repair.ticket', compact('user', 'date', 'id', 'articles', 'repairServices', 'toPay'));
    }

    public function indexRegister(){
        $districts = District::all();
        return view('/repair/register', compact('districts'));
    }

    public function createWorkshop(Request $request){

        try{
            $workshop = new Workshop();
            $workshop->name = $request->name;
            $workshop->address = $request->address;
            $workshop->district_id = $request->district;
            $workshop->phone = $request->phone;
            $workshop->email = $request->email;
            $workshop->save();

            $message = [
                'content' => 'El taller se ha ingresado exitosamente.',
                'messageNumber' => 1,
            ];

            return view('repair.messagesw', compact('message'));
        }catch (Exception $e){
            $message = [
                'content' => 'Error al ingresar el taller.' . $e->getMessage(),
                'messageNumber' => 2,
            ];

            return view('repair.messagesw', compact('message'));
        }

    }

    public function listWorkshop(){
        $lists = Workshop::where('id', '<>', 1)->paginate(6);
        return view('repair.list', compact('lists'));
    }

    public function edit($id) {

        $workshop = Workshop::where('id', $id)->get()->first();
        $districts = District::all();


        return view('repair.editform', compact('workshop', 'districts', 'id'));

    }


    public function update(Request $request){

        $id = $request->id;

        try{
            $workshop = Workshop::find($id);
            $workshop->name = $request['name'];
            $workshop->address = $request['address'];
            $workshop->district_id = $request['district'];
            $workshop->phone = $request['phone'];
            $workshop->email = $request['email'];
            $workshop->save();

            $message = [
                'content' => 'El taller se ha modificado exitosamente.',
                'messageNumber' => 1,
            ];

            return view('repair.messagesw', compact('message'));
        }catch (Exception $e){
            $message = [
                'content' => 'Error al modificar el taller.' . $e->getMessage(),
                'messageNumber' => 2,
            ];

            return view('repair.messagesw', compact('message'));
        }

    }
}
