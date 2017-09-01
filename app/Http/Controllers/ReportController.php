<?php

namespace App\Http\Controllers;

use App\Article;
use App\LogEntry;
use App\Product;
use App\RepairService;
use App\Sale;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Requests;
use App\Client;
use Excel;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;


class ReportController extends Controller
{
    //
    public function clientList() {

        $clients = Client::orderBy('run', 'asc')->paginate(10);

        return view('report.client_list')->with('clients', $clients);

    }

    public function clientListExport() {

        Excel::create('Cartera de clientes', function($excel) {

            $excel->sheet('Clientes', function($sheet) {

                $sheet->setOrientation('landscape');
                $sheet->mergeCells('A1:F1');
                $sheet->row(1, ['Cartera de clientes']);

                $sheet->row(1, function($row) {

                    // call cell manipulation methods
                    $row->setBackground('#045FB4');
                    $row->setFontColor('#FFFFFF');
                    $row->setAlignment('center');
                    $row->setFontSize(16);

                });


                $sheet->row(2, ['Run', 'Nombre', 'Fecha de nacimiento', 'Dirección', 'Email', 'Teléfono']);

                $clients = Client::orderBy('run', 'asc')->get();

                foreach($clients as $client) {

                    $row = [];
                    $row[0] = $client->run .'-'. $client->digit;
                    $row[1] = $client->name .' '. $client->last_name .' '. $client->second_last_name;
                    $row[2] = Carbon::parse($client->birth_date)->format('d-m-Y');
                    $row[3] = $client->address .', '. $client->district->name;
                    $row[4] = $client->email;
                    $row[5] = $client->phone;

                    $sheet->appendRow($row);
                }
            });
        })->export('xls');

    }

    public function monthSales(Request $request) {

        $month = (string) Carbon::now('America/Santiago')->format('m');

        // listing prescriptions sales
        $prescription_sales = Sale::whereMonth('created_at', '=', $month)->where('sale_type_id', 2)->where('sale_state', 3)->get();
        $prescription_sales_array = [];
        $prescription_row = [];

        for($i = 0; $i < count($prescription_sales); $i++) {

            $prescription_row[0] = $prescription_sales[$i]->id;
            $prescription_row[1] = ucfirst($prescription_sales[$i]->user->name) . ' ' . ucfirst($prescription_sales[$i]->user->last_name) . ' ' . ucfirst($prescription_sales[$i]->user->second_last_name);
            $prescription_row[2] = ucfirst($prescription_sales[$i]->client->name) . ' ' . ucfirst($prescription_sales[$i]->client->last_name) . ' ' . ucfirst($prescription_sales[$i]->client->second_last_name);
            $prescription_row[3] = Carbon::parse($prescription_sales[$i]->created_at)->format('d/m/Y H:i');
            $prescription_row[4] = $prescription_sales[$i]->pay;
            $prescription_row[5] = $prescription_sales[$i]->saleType->name;
            $prescription_row[6] = 'N/A';
            $prescription_row[7] = 'N/A';
            $prescription_row[8] = 0; // total
            for($j = 0; $j < count($prescription_sales[$i]->productSale); $j++) {

                $product = Product::where('productable_id', $prescription_sales[$i]->productSale[$j]->product_productable_id)->get()->first();

                if($product->productable_type == 'App\Frame') {
                    $prescription_row[6] = $product->productable->name . ' ' . $product->productable->model->name;
                    $prescription_row[8] += ($product->productable->price * $prescription_sales[$i]->productSale[$j]->quantity);
                }
                if($product->productable_type == 'App\Crystal') {
                    $prescription_row[7] = $product->productable->material->name . ' ' . $product->productable->crystalTreatment->name;
                    $prescription_row[8] += ($product->productable->price * $prescription_sales[$i]->productSale[$j]->quantity);
                }
            }

            array_push($prescription_sales_array, $prescription_row);
        }

        $paginated_prescription_sales_array = $this->paginate($prescription_sales_array);


        // listing articles sales
        $article_sales = Sale::whereMonth('created_at', '=', $month)->where('sale_type_id', 1)->where('sale_state', 3)->get();
        $article_sales_array = [];
        $article_row = [];


        for($i = 0; $i < count($article_sales); $i++) {
            for($j = 0; $j < count($article_sales[$i]->productSale); $j++) {

                $article_row[0] = $article_sales[$i]->id;
                $article_row[1] = ucfirst($article_sales[$i]->user->name) . ' ' . ucfirst($article_sales[$i]->user->last_name) . ' ' . ucfirst($article_sales[$i]->user->second_last_name);
                $article_row[2] = Carbon::parse($article_sales[$i]->created_at)->format('d/m/Y H:i');
                $article_row[3] = $article_sales[$i]->saleType->name;

                $product = Product::where('productable_id', $article_sales[$i]->productSale[$j]->product_productable_id)->get()->first();

                $article_row[4] = $product->productable->name;
                $article_row[5] = $article_sales[$i]->productSale[$j]->quantity;
                $article_row[6] = ($product->productable->price * $article_sales[$i]->productSale[$j]->quantity);
                array_push($article_sales_array, $article_row);
            }
        }

        $paginated_article_sales_array = $this->paginate($article_sales_array);

        // listing repairing service sales
        $repair_sales = RepairService::whereMonth('created_at', '=', $month)->where('state', 3)->get();
        $repair_sales_array = [];
        $repair_row = [];


        for($i = 0; $i < count($repair_sales); $i++) {

            if(count($repair_sales[$i]->articleRepairService) > 0) {

                for($j = 0; $j < count($repair_sales[$i]->articleRepairService); $j++) {

                    $repair_row[0] = $repair_sales[$i]->id;
                    $repair_row[1] = ucfirst($repair_sales[$i]->user->name) . ' ' . ucfirst($repair_sales[$i]->user->last_name) . ' ' . ucfirst($repair_sales[$i]->user->second_last_name);
                    $repair_row[2] = ucfirst($repair_sales[$i]->client->name) . ' ' . ucfirst($repair_sales[$i]->client->last_name) . ' ' . ucfirst($repair_sales[$i]->client->second_last_name);
                    $repair_row[3] = $repair_sales[$i]->workshop->name;
                    $repair_row[4] = Carbon::parse($repair_sales[$i]->delivery_date)->format('d/m/Y H:i');
                    $repair_row[5] = $repair_sales[$i]->pay;
                    $repair_row[6] = $repair_sales[$i]->price;
                    $repair_row[7] = 'Reparación';

                    $article = Article::where('id', $repair_sales[$i]->articleRepairService[$j]->article_id)->get()->first();
                    $repair_row[8] = $article['name'];
                    $repair_row[9] = $repair_sales[$i]->articleRepairService[$j]->quantity;
                    $repair_row[10] = ($article['price'] * $repair_sales[$i]->articleRepairService[$j]->quantity);
                    $repair_row[11] = 0; // total
                    $repair_row[11] += $repair_sales[$i]->price;
                    $repair_row[11] += ($article['price'] * $repair_sales[$i]->articleRepairService[$j]->quantity);
                }
            } else {
                $repair_row[0] = $repair_sales[$i]->id;
                $repair_row[1] = ucfirst($repair_sales[$i]->user->name) . ' ' . ucfirst($repair_sales[$i]->user->last_name) . ' ' . ucfirst($repair_sales[$i]->user->second_last_name);
                $repair_row[2] = ucfirst($repair_sales[$i]->client->name) . ' ' . ucfirst($repair_sales[$i]->client->last_name) . ' ' . ucfirst($repair_sales[$i]->client->second_last_name);
                $repair_row[3] = $repair_sales[$i]->workshop->name;
                $repair_row[4] = Carbon::parse($repair_sales[$i]->delivery_date)->format('d/m/Y H:i');
                $repair_row[5] = $repair_sales[$i]->pay;
                $repair_row[6] = $repair_sales[$i]->price;
                $repair_row[7] = 'Reparación';
                $repair_row[8] = 'N/A';
                $repair_row[9] = 0;
                $repair_row[10] = 0;
                $repair_row[11] = 0; // total
                $repair_row[11] += $repair_sales[$i]->price;
            }

            array_push($repair_sales_array, $repair_row);
        }

        $paginated_repair_sales_array = $this->paginate($repair_sales_array);


        return view('report.month_sales', compact('paginated_prescription_sales_array', 'paginated_article_sales_array', 'paginated_repair_sales_array'));
    }

    public function monthSalesExport() {

        $month = (string) Carbon::now('America/Santiago')->format('m');

        Excel::create('Ventas del mes', function($excel) use ($month) {

            $excel->sheet('Ventas de recetas ', function($sheet) use ($month) {

                $sheet->setOrientation('landscape');
                $sheet->mergeCells('A1:I1');
                $sheet->row(1, ['Ventas de recetas, mes:' . $month]);

                $sheet->row(1, function($row) {

                    // call cell manipulation methods
                    $row->setBackground('#045FB4');
                    $row->setFontColor('#FFFFFF');
                    $row->setAlignment('center');
                    $row->setFontSize(16);

                });


                $sheet->row(2, ['Id', 'Vendedor', 'Cliente', 'Fecha', 'Abono', 'Tipo de venta', 'Armazón', 'Cristal', 'Total']);

                $prescription_sales = Sale::whereMonth('created_at', '=', $month)->where('sale_type_id', 2)->where('sale_state', 3)->get();
                $prescription_row = [];

                for($i = 0; $i < count($prescription_sales); $i++) {

                    $prescription_row[0] = $prescription_sales[$i]->id;
                    $prescription_row[1] = ucfirst($prescription_sales[$i]->user->name) . ' ' . ucfirst($prescription_sales[$i]->user->last_name) . ' ' . ucfirst($prescription_sales[$i]->user->second_last_name);
                    $prescription_row[2] = ucfirst($prescription_sales[$i]->client->name) . ' ' . ucfirst($prescription_sales[$i]->client->last_name) . ' ' . ucfirst($prescription_sales[$i]->client->second_last_name);
                    $prescription_row[3] = Carbon::parse($prescription_sales[$i]->created_at)->format('d/m/Y H:i');
                    $prescription_row[4] = $prescription_sales[$i]->pay;
                    $prescription_row[5] = $prescription_sales[$i]->saleType->name;
                    $prescription_row[6] = 'N/A';
                    $prescription_row[7] = 'N/A';
                    $prescription_row[8] = 0; // total
                    for($j = 0; $j < count($prescription_sales[$i]->productSale); $j++) {

                        $product = Product::where('productable_id', $prescription_sales[$i]->productSale[$j]->product_productable_id)->get()->first();

                        if($product->productable_type == 'App\Frame') {
                            $prescription_row[6] = $product->productable->name . ' ' . $product->productable->model->name;
                            $prescription_row[8] += ($product->productable->price * $prescription_sales[$i]->productSale[$j]->quantity);
                        }
                        if($product->productable_type == 'App\Crystal') {
                            $prescription_row[7] = $product->productable->material->name . ' ' . $product->productable->crystalTreatment->name;
                            $prescription_row[8] += ($product->productable->price * $prescription_sales[$i]->productSale[$j]->quantity);
                        }
                    }

                    $sheet->appendRow($prescription_row);
                }
            });

            $excel->sheet('Ventas de artículos', function($sheet) use ($month) {

                $sheet->setOrientation('landscape');
                $sheet->mergeCells('A1:G1');
                $sheet->row(1, ['Ventas de artículos, mes:' . $month]);

                $sheet->row(1, function($row) {

                    // call cell manipulation methods
                    $row->setBackground('#045FB4');
                    $row->setFontColor('#FFFFFF');
                    $row->setAlignment('center');
                    $row->setFontSize(16);

                });


                $sheet->row(2, ['Id', 'Vendedor', 'Fecha','Tipo de venta', 'Artículo', 'Cantidad', 'Total']);

                // listing articles sales
                $article_sales = Sale::whereMonth('created_at', '=', $month)->where('sale_type_id', 1)->where('sale_state', 3)->get();
                $article_row = [];

                for($i = 0; $i < count($article_sales); $i++) {
                    for($j = 0; $j < count($article_sales[$i]->productSale); $j++) {

                        $article_row[0] = $article_sales[$i]->id;
                        $article_row[1] = ucfirst($article_sales[$i]->user->name) . ' ' . ucfirst($article_sales[$i]->user->last_name) . ' ' . ucfirst($article_sales[$i]->user->second_last_name);
                        $article_row[2] = Carbon::parse($article_sales[$i]->created_at)->format('d/m/Y H:i');
                        $article_row[3] = $article_sales[$i]->saleType->name;

                        $product = Product::where('productable_id', $article_sales[$i]->productSale[$j]->product_productable_id)->get()->first();

                        $article_row[4] = $product->productable->name;
                        $article_row[5] = $article_sales[$i]->productSale[$j]->quantity;
                        $article_row[6] = ($product->productable->price * $article_sales[$i]->productSale[$j]->quantity);

                        $sheet->appendRow($article_row);
                    }
                }

            });

            $excel->sheet('Reparaciones', function($sheet) use ($month) {

                $sheet->setOrientation('landscape');
                $sheet->mergeCells('A1:F1');
                $sheet->row(1, ['Reparaciones, mes:' . $month]);

                $sheet->row(1, function($row) {

                    // call cell manipulation methods
                    $row->setBackground('#045FB4');
                    $row->setFontColor('#FFFFFF');
                    $row->setAlignment('center');
                    $row->setFontSize(16);

                });


                $sheet->row(2, ['Id', 'Vendedor', 'Cliente', 'Taller', 'Fecha', 'Abono', 'Mano de obra', 'Tipo de venta', 'Artículo', 'Cantidad', 'Subtotal', 'Total']);

                // listing repairing service sales
                $repair_sales = RepairService::whereMonth('created_at', '=', $month)->where('state', 3)->get();
                $repair_row = [];

                for($i = 0; $i < count($repair_sales); $i++) {

                    if(count($repair_sales[$i]->articleRepairService) > 0) {

                        for($j = 0; $j < count($repair_sales[$i]->articleRepairService); $j++) {

                            $repair_row[0] = $repair_sales[$i]->id;
                            $repair_row[1] = ucfirst($repair_sales[$i]->user->name) . ' ' . ucfirst($repair_sales[$i]->user->last_name) . ' ' . ucfirst($repair_sales[$i]->user->second_last_name);
                            $repair_row[2] = ucfirst($repair_sales[$i]->client->name) . ' ' . ucfirst($repair_sales[$i]->client->last_name) . ' ' . ucfirst($repair_sales[$i]->client->second_last_name);
                            $repair_row[3] = $repair_sales[$i]->workshop->name;
                            $repair_row[4] = Carbon::parse($repair_sales[$i]->delivery_date)->format('d/m/Y H:i');
                            $repair_row[5] = $repair_sales[$i]->pay;
                            $repair_row[6] = $repair_sales[$i]->price;
                            $repair_row[7] = 'Reparación';

                            $article = Article::where('id', $repair_sales[$i]->articleRepairService[$j]->article_id)->get()->first();

                            $repair_row[8] = $article['name'];
                            $repair_row[9] = $repair_sales[$i]->articleRepairService[$j]->quantity;
                            $repair_row[10] = ($article['price'] * $repair_sales[$i]->articleRepairService[$j]->quantity);
                            $repair_row[11] = 0; // total
                            $repair_row[11] += $repair_sales[$i]->price;
                            $repair_row[11] += ($article['price'] * $repair_sales[$i]->articleRepairService[$j]->quantity);



                        }
                    } else {
                        $repair_row[0] = $repair_sales[$i]->id;
                        $repair_row[1] = ucfirst($repair_sales[$i]->user->name) . ' ' . ucfirst($repair_sales[$i]->user->last_name) . ' ' . ucfirst($repair_sales[$i]->user->second_last_name);
                        $repair_row[2] = ucfirst($repair_sales[$i]->client->name) . ' ' . ucfirst($repair_sales[$i]->client->last_name) . ' ' . ucfirst($repair_sales[$i]->client->second_last_name);
                        $repair_row[3] = $repair_sales[$i]->workshop->name;
                        $repair_row[4] = Carbon::parse($repair_sales[$i]->delivery_date)->format('d/m/Y H:i');
                        $repair_row[5] = $repair_sales[$i]->pay;
                        $repair_row[6] = $repair_sales[$i]->price;
                        $repair_row[7] = $repair_sales[$i]->saleType->name;
                        $repair_row[8] = 'N/A';
                        $repair_row[9] = 0;
                        $repair_row[10] = 0;
                        $repair_row[11] = 0; // total
                        $repair_row[11] += $repair_sales[$i]->price;
                    }

                    $sheet->appendRow($repair_row);
                }
            });

        })->export('xls');
    }

    public function annualSales() {

        $year = (string) Carbon::now('America/Santiago')->format('Y');

        // listing prescriptions sales
        $prescription_sales = Sale::whereYear('created_at', '=', $year)->where('sale_type_id', 2)->where('sale_state', 3)->get();
        $prescription_sales_array = [];
        $prescription_row = [];

        for($i = 0; $i < count($prescription_sales); $i++) {

            $prescription_row[0] = $prescription_sales[$i]->id;
            $prescription_row[1] = ucfirst($prescription_sales[$i]->user->name) . ' ' . ucfirst($prescription_sales[$i]->user->last_name) . ' ' . ucfirst($prescription_sales[$i]->user->second_last_name);
            $prescription_row[2] = ucfirst($prescription_sales[$i]->client->name) . ' ' . ucfirst($prescription_sales[$i]->client->last_name) . ' ' . ucfirst($prescription_sales[$i]->client->second_last_name);
            $prescription_row[3] = Carbon::parse($prescription_sales[$i]->created_at)->format('d/m/Y H:i');
            $prescription_row[4] = $prescription_sales[$i]->pay;
            $prescription_row[5] = $prescription_sales[$i]->saleType->name;
            $prescription_row[6] = 'N/A';
            $prescription_row[7] = 'N/A';
            $prescription_row[8] = 0; // total
            for($j = 0; $j < count($prescription_sales[$i]->productSale); $j++) {

                $product = Product::where('productable_id', $prescription_sales[$i]->productSale[$j]->product_productable_id)->get()->first();

                if($product->productable_type == 'App\Frame') {
                    $prescription_row[6] = $product->productable->name . ' ' . $product->productable->model->name;
                    $prescription_row[8] += ($product->productable->price * $prescription_sales[$i]->productSale[$j]->quantity);
                }
                if($product->productable_type == 'App\Crystal') {
                    $prescription_row[7] = $product->productable->material->name . ' ' . $product->productable->crystalTreatment->name;
                    $prescription_row[8] += ($product->productable->price * $prescription_sales[$i]->productSale[$j]->quantity);
                }
            }

            array_push($prescription_sales_array, $prescription_row);
        }

        $paginated_prescription_sales_array = $this->paginate($prescription_sales_array);


        // listing articles sales
        $article_sales = Sale::whereYear('created_at', '=', $year)->where('sale_type_id', 1)->where('sale_state', 3)->get();
        $article_sales_array = [];
        $article_row = [];

        for($i = 0; $i < count($article_sales); $i++) {
            for($j = 0; $j < count($article_sales[$i]->productSale); $j++) {

                $article_row[0] = $article_sales[$i]->id;
                $article_row[1] = ucfirst($article_sales[$i]->user->name) . ' ' . ucfirst($article_sales[$i]->user->last_name) . ' ' . ucfirst($article_sales[$i]->user->second_last_name);
                $article_row[2] = Carbon::parse($article_sales[$i]->created_at)->format('d/m/Y H:i');
                $article_row[3] = $article_sales[$i]->saleType->name;

                $product = Product::where('productable_id', $article_sales[$i]->productSale[$j]->product_productable_id)->get()->first();

                $article_row[4] = $product->productable->name;
                $article_row[5] = $article_sales[$i]->productSale[$j]->quantity;
                $article_row[6] = ($product->productable->price * $article_sales[$i]->productSale[$j]->quantity);
                array_push($article_sales_array, $article_row);
            }
        }

        $paginated_article_sales_array = $this->paginate($article_sales_array);

        // listing repairing service sales
        $repair_sales = RepairService::whereYear('created_at', '=', $year)->where('state', 3)->get();
        $repair_sales_array = [];
        $repair_row = [];

        for($i = 0; $i < count($repair_sales); $i++) {

            if(count($repair_sales[$i]->articleRepairService) > 0) {

                for($j = 0; $j < count($repair_sales[$i]->articleRepairService); $j++) {

                    $repair_row[0] = $repair_sales[$i]->id;
                    $repair_row[1] = ucfirst($repair_sales[$i]->user->name) . ' ' . ucfirst($repair_sales[$i]->user->last_name) . ' ' . ucfirst($repair_sales[$i]->user->second_last_name);
                    $repair_row[2] = ucfirst($repair_sales[$i]->client->name) . ' ' . ucfirst($repair_sales[$i]->client->last_name) . ' ' . ucfirst($repair_sales[$i]->client->second_last_name);
                    $repair_row[3] = $repair_sales[$i]->workshop->name;
                    $repair_row[4] = Carbon::parse($repair_sales[$i]->delivery_date)->format('d/m/Y H:i');
                    $repair_row[5] = $repair_sales[$i]->pay;
                    $repair_row[6] = $repair_sales[$i]->price;
                    $repair_row[7] = 'Reparación';

                    $article = Article::where('id', $repair_sales[$i]->articleRepairService[$j]->article_id)->get()->first();

                    $repair_row[8] = $article['name'];
                    $repair_row[9] = $repair_sales[$i]->articleRepairService[$j]->quantity;
                    $repair_row[10] = ($article['price'] * $repair_sales[$i]->articleRepairService[$j]->quantity);
                    $repair_row[11] = 0; // total
                    $repair_row[11] += $repair_sales[$i]->price;
                    $repair_row[11] += ($article['price'] * $repair_sales[$i]->articleRepairService[$j]->quantity);



                }
            } else {
                $repair_row[0] = $repair_sales[$i]->id;
                $repair_row[1] = ucfirst($repair_sales[$i]->user->name) . ' ' . ucfirst($repair_sales[$i]->user->last_name) . ' ' . ucfirst($repair_sales[$i]->user->second_last_name);
                $repair_row[2] = ucfirst($repair_sales[$i]->client->name) . ' ' . ucfirst($repair_sales[$i]->client->last_name) . ' ' . ucfirst($repair_sales[$i]->client->second_last_name);
                $repair_row[3] = $repair_sales[$i]->workshop->name;
                $repair_row[4] = Carbon::parse($repair_sales[$i]->delivery_date)->format('d/m/Y H:i');
                $repair_row[5] = $repair_sales[$i]->pay;
                $repair_row[6] = $repair_sales[$i]->price;
                $repair_row[7] = 'Reparación';
                $repair_row[8] = 'N/A';
                $repair_row[9] = 0;
                $repair_row[10] = 0;
                $repair_row[11] = 0; // total
                $repair_row[11] += $repair_sales[$i]->price;
            }

            array_push($repair_sales_array, $repair_row);
        }

        $paginated_repair_sales_array = $this->paginate($repair_sales_array);


        return view('report.annual_sales', compact('paginated_prescription_sales_array', 'paginated_article_sales_array', 'paginated_repair_sales_array'));

    }

    public function annualSalesExport() {

        $year = (string) Carbon::now('America/Santiago')->format('Y');

        Excel::create('Venta Anual', function($excel) use ($year) {

            $excel->sheet('Ventas de recetas ', function($sheet) use ($year) {

                $sheet->setOrientation('landscape');
                $sheet->mergeCells('A1:I1');
                $sheet->row(1, ['Venta de recetas, año:' . $year]);

                $sheet->row(1, function($row) {

                    // call cell manipulation methods
                    $row->setBackground('#045FB4');
                    $row->setFontColor('#FFFFFF');
                    $row->setAlignment('center');
                    $row->setFontSize(16);

                });


                $sheet->row(2, ['Id', 'Vendedor', 'Cliente', 'Fecha', 'Abono', 'Tipo de venta', 'Armazón', 'Cristal', 'Total']);

                $prescription_sales = Sale::whereYear('created_at', '=', $year)->where('sale_type_id', 2)->where('sale_state', 3)->get();
                $prescription_row = [];

                for($i = 0; $i < count($prescription_sales); $i++) {

                    $prescription_row[0] = $prescription_sales[$i]->id;
                    $prescription_row[1] = ucfirst($prescription_sales[$i]->user->name) . ' ' . ucfirst($prescription_sales[$i]->user->last_name) . ' ' . ucfirst($prescription_sales[$i]->user->second_last_name);
                    $prescription_row[2] = ucfirst($prescription_sales[$i]->client->name) . ' ' . ucfirst($prescription_sales[$i]->client->last_name) . ' ' . ucfirst($prescription_sales[$i]->client->second_last_name);
                    $prescription_row[3] = Carbon::parse($prescription_sales[$i]->created_at)->format('d/m/Y H:i');
                    $prescription_row[4] = $prescription_sales[$i]->pay;
                    $prescription_row[5] = $prescription_sales[$i]->saleType->name;
                    $prescription_row[6] = 'N/A';
                    $prescription_row[7] = 'N/A';
                    $prescription_row[8] = 0; // total
                    for($j = 0; $j < count($prescription_sales[$i]->productSale); $j++) {

                        $product = Product::where('productable_id', $prescription_sales[$i]->productSale[$j]->product_productable_id)->get()->first();

                        if($product->productable_type == 'App\Frame') {
                            $prescription_row[6] = $product->productable->name . ' ' . $product->productable->model->name;
                            $prescription_row[8] += ($product->productable->price * $prescription_sales[$i]->productSale[$j]->quantity);
                        }
                        if($product->productable_type == 'App\Crystal') {
                            $prescription_row[7] = $product->productable->material->name . ' ' . $product->productable->crystalTreatment->name;
                            $prescription_row[8] += ($product->productable->price * $prescription_sales[$i]->productSale[$j]->quantity);
                        }
                    }

                    $sheet->appendRow($prescription_row);
                }
            });

            $excel->sheet('Ventas de artículos', function($sheet) use ($year) {

                $sheet->setOrientation('landscape');
                $sheet->mergeCells('A1:G1');
                $sheet->row(1, ['Ventas de artículos, año:' . $year]);

                $sheet->row(1, function($row) {

                    // call cell manipulation methods
                    $row->setBackground('#045FB4');
                    $row->setFontColor('#FFFFFF');
                    $row->setAlignment('center');
                    $row->setFontSize(16);

                });


                $sheet->row(2, ['Id', 'Vendedor', 'Fecha','Tipo de venta', 'Artículo', 'Cantidad', 'Total']);

                // listing articles sales
                $article_sales = Sale::whereYear('created_at', '=', $year)->where('sale_type_id', 1)->where('sale_state', 3)->get();
                $article_row = [];

                for($i = 0; $i < count($article_sales); $i++) {
                    for($j = 0; $j < count($article_sales[$i]->productSale); $j++) {

                        $article_row[0] = $article_sales[$i]->id;
                        $article_row[1] = ucfirst($article_sales[$i]->user->name) . ' ' . ucfirst($article_sales[$i]->user->last_name) . ' ' . ucfirst($article_sales[$i]->user->second_last_name);
                        $article_row[2] = Carbon::parse($article_sales[$i]->created_at)->format('d/m/Y H:i');
                        $article_row[3] = $article_sales[$i]->saleType->name;

                        $product = Product::where('productable_id', $article_sales[$i]->productSale[$j]->product_productable_id)->get()->first();

                        $article_row[4] = $product->productable->name;
                        $article_row[5] = $article_sales[$i]->productSale[$j]->quantity;
                        $article_row[6] = ($product->productable->price * $article_sales[$i]->productSale[$j]->quantity);

                        $sheet->appendRow($article_row);
                    }
                }

            });

            $excel->sheet('Reparaciones', function($sheet) use ($year) {

                $sheet->setOrientation('landscape');
                $sheet->mergeCells('A1:F1');
                $sheet->row(1, ['Reparaciones, año:' . $year]);

                $sheet->row(1, function($row) {

                    // call cell manipulation methods
                    $row->setBackground('#045FB4');
                    $row->setFontColor('#FFFFFF');
                    $row->setAlignment('center');
                    $row->setFontSize(16);

                });


                $sheet->row(2, ['Id', 'Vendedor', 'Cliente', 'Taller', 'Fecha', 'Abono', 'Mano de obra', 'Tipo de venta', 'Artículo', 'Cantidad', 'Subtotal', 'Total']);

                // listing repairing service sales
                $repair_sales = RepairService::whereYear('created_at', '=', $year)->where('state', 3)->get();
                $repair_row = [];

                for($i = 0; $i < count($repair_sales); $i++) {

                    if(count($repair_sales[$i]->articleRepairService) > 0) {

                        for($j = 0; $j < count($repair_sales[$i]->articleRepairService); $j++) {

                            $repair_row[0] = $repair_sales[$i]->id;
                            $repair_row[1] = ucfirst($repair_sales[$i]->user->name) . ' ' . ucfirst($repair_sales[$i]->user->last_name) . ' ' . ucfirst($repair_sales[$i]->user->second_last_name);
                            $repair_row[2] = ucfirst($repair_sales[$i]->client->name) . ' ' . ucfirst($repair_sales[$i]->client->last_name) . ' ' . ucfirst($repair_sales[$i]->client->second_last_name);
                            $repair_row[3] = $repair_sales[$i]->workshop->name;
                            $repair_row[4] = Carbon::parse($repair_sales[$i]->delivery_date)->format('d/m/Y H:i');
                            $repair_row[5] = $repair_sales[$i]->pay;
                            $repair_row[6] = $repair_sales[$i]->price;
                            $repair_row[7] = 'Reparación';

                            $article = Article::where('id', $repair_sales[$i]->articleRepairService[$j]->article_id)->get()->first();

                            $repair_row[8] = $article['name'];
                            $repair_row[9] = $repair_sales[$i]->articleRepairService[$j]->quantity;
                            $repair_row[10] = ($article['price'] * $repair_sales[$i]->articleRepairService[$j]->quantity);
                            $repair_row[11] = 0; // total
                            $repair_row[11] += $repair_sales[$i]->price;
                            $repair_row[11] += ($article['price'] * $repair_sales[$i]->articleRepairService[$j]->quantity);



                        }
                    } else {
                        $repair_row[0] = $repair_sales[$i]->id;
                        $repair_row[1] = ucfirst($repair_sales[$i]->user->name) . ' ' . ucfirst($repair_sales[$i]->user->last_name) . ' ' . ucfirst($repair_sales[$i]->user->second_last_name);
                        $repair_row[2] = ucfirst($repair_sales[$i]->client->name) . ' ' . ucfirst($repair_sales[$i]->client->last_name) . ' ' . ucfirst($repair_sales[$i]->client->second_last_name);
                        $repair_row[3] = $repair_sales[$i]->workshop->name;
                        $repair_row[4] = Carbon::parse($repair_sales[$i]->delivery_date)->format('d/m/Y H:i');
                        $repair_row[5] = $repair_sales[$i]->pay;
                        $repair_row[6] = $repair_sales[$i]->price;
                        $repair_row[7] = 'Reparación';
                        $repair_row[8] = 'N/A';
                        $repair_row[9] = 0;
                        $repair_row[10] = 0;
                        $repair_row[11] = 0; // total
                        $repair_row[11] += $repair_sales[$i]->price;
                    }

                    $sheet->appendRow($repair_row);
                }
            });

        })->export('xls');

    }

    public function monthAccessControl() {

        $month = (string) Carbon::now('America/Santiago')->format('m');

        $access_controls = LogEntry::whereMonth('entry_date', '=', $month)->paginate(10);

        return view('report.month_access_control', compact('access_controls'));

    }

    public function monthAccessControlExport() {

        $month = (string) Carbon::now('America/Santiago')->format('m');

        $access_controls = LogEntry::whereMonth('entry_date', '=', $month)->get();

        Excel::create('Control de acceso del mes', function($excel) use ($month, $access_controls) {

            $excel->sheet('Mes ' . $month , function($sheet) use ($month, $access_controls){

                $sheet->setOrientation('landscape');
                $sheet->mergeCells('A1:E1');
                $sheet->row(1, ['Control de acceso, Mes:' . $month]);

                $sheet->row(1, function($row) {

                    // call cell manipulation methods
                    $row->setBackground('#045FB4');
                    $row->setFontColor('#FFFFFF');
                    $row->setAlignment('center');
                    $row->setFontSize(16);

                });


                $sheet->row(2, ['Nombre de usuario', 'Nombre', 'Fecha', 'Hora de entrada', 'Hora de salida']);

                foreach($access_controls as $access_control) {

                    $row = [];
                    $row[0] = $access_control->user_username;
                    $row[1] = ucfirst($access_control->user->name) .' '. ucfirst($access_control->user->last_name) .' '. ucfirst($access_control->user->second_last_name);
                    $row[2] = Carbon::parse($access_control->entry_date)->format('d-m-Y') ;
                    $row[3] = Carbon::parse($access_control->entry_date)->format('H:i:s');
                    $row[4] = Carbon::parse($access_control->out_date)->format('H:i:s');

                    $sheet->appendRow($row);
                }
            });
        })->export('xls');

    }

    public function paginate($array) {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $col = new Collection($array);
        $perPage = 7;
        $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginator = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);
        return $paginator;
    }

}
