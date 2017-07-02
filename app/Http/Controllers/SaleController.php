<?php

namespace App\Http\Controllers;

use App\Article;
use App\Product;
use App\ProductSale;
use App\Sale;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Exception;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class SaleController extends Controller
{
    //
    public function showArticleSaleForm() {

        return view('sale.showArticleSaleForm');

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

    public function createArticleSale(Request $request) {

        try {

            $user = $request->user();
            $date = Carbon::now('America/Santiago');


            $sale = new Sale();
            $sale->user_username = $user->username;
            $sale->client_run = 0;
            $sale->created_at = $date;
            $sale->sale_promotion_id = 1;   // sin promocion
            $sale->pay = 0;
            $sale->sale_state = 3;               // 1. pendiente, 2. en local 3. realizada 4. devolución
            $sale->sale_type_id = 1;        // 1. articulo, 2. receta, 3.reparacion interna, 4. reparacion externa
            $sale->save();

            // getting the last sale id inserted
            $sale_id = Sale::all()->last()->id;

            $cods_article = $request->codArticle;
            $name_articles = $request->article;
            $quantities = $request->quantity;
            $prices = $request->price;
            $total = $request->total;

            for($i = 0; $i < count($cods_article); $i++) {
                $product_sale = new ProductSale();
                $product_sale->sale_id = $sale_id;
                $product_sale->product_productable_id = $cods_article[$i];
                $product_sale->quantity = $quantities[$i];
                $product_sale->save();
            }


            return view('sale.ticket', compact('user','cods_article', 'name_articles', 'quantities', 'prices', 'total', 'date', 'sale_id'));

        } catch(Exception $e) {

            $message = [
                'content' => 'Hubo un error al efectuar la venta, error:' . $e->getMessage()
            ];

            return view('sale.errorsalemessages', compact('message'));
        }

    }

    public function listToday() {

        $today = (string) Carbon::now('America/Santiago')->format('Y/m/d');

        $sales = DB::table('sales')->join('product_sale', 'sales.id', '=', 'product_sale.sale_id')
            ->join('products', 'product_sale.product_productable_id', '=', 'products.productable_id')
            ->join('articles', 'products.productable_id', '=', 'articles.id')
            ->select(DB::raw('sales.id , time(sales.created_at) as hour, articles.name, articles.price, product_sale.quantity, articles.price * product_sale.quantity as subtotal'))->whereDate('sales.created_at', '=', $today)->where('sales.sale_state', 3)->get();

        return view('sale.listToday', compact('sales'));

    }

}
