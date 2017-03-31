<?php

namespace App\Http\Controllers;

use App\Inventory;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model;
use App\Color;
use App\Category;
use App\Supplier;
use App\Brand;
use App\Product;
use App\Frame;
use App\Article;
use Exception;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProductController extends Controller
{
    //
    public function showFrameForm() {

        $models = Model::all();
        $colors = Color::all();
        $suppliers = Supplier::all();
        $brands = Brand::all();

        return view('product.frameform', compact(['models', 'colors', 'suppliers', 'brands']));

    }

    public function showArticleForm() {

        $categories = Category::all();
        $suppliers = Supplier::all();
        $brands = Brand::all();

        return view('product.articleform', compact(['categories', 'suppliers', 'brands']));

    }

    public function createFrame(Request $request) {

        try {

            $product = new Product();
            $product->productable_type = 'App\Frame';
            $product->brand_id = $request['brand'];
            $product->supplier_id = $request['supplier'];
            $product->save();

            $frame = new Frame();
            $frame->id = $product->productable_id;
            $frame->name = $request['name'];
            $frame->model_id = $request['model'];
            $frame->color_id = $request['color'];
            $frame->stock += $request['quantity'];
            $frame->price = $request['price'];
            $frame->save();

            $inventory = new Inventory();
            $inventory->user_username = $request->user()->username;
            $inventory->product_productable_id = $product->productable_id;
            $inventory->created_at = Carbon::now();
            $inventory->quantity = $request['quantity'];
            $inventory->save();

            $message = [
                'content' => 'El producto ha sido ingresado exitosamente.',
                'messageNumber' => 1,
            ];

            return view('product.messages', compact('message'));

        } catch(Exception $e) {

            $message = [
                'content' => 'Error al ingresar producto, Error: '.$e->getMessage() ,
                'messageNumber' => 0,
            ];

            return view('product.messages', compact('message'));

        }
    }

    public function createArticle(Request $request) {

        try {

            $product = new Product();
            $product->productable_type = 'App\Article';
            $product->brand_id = $request['brand'];
            $product->supplier_id = $request['supplier'];
            $product->save();

            $article = new Article();
            $article->id = $product->productable_id;
            $article->name = $request['name'];
            $article->category_id = $request['category'];
            $article->description = $request['description'];
            $article->stock += $request['quantity'];
            $article->price = $request['price'];
            $article->save();

            $inventory = new Inventory();
            $inventory->user_username = $request->user()->username;
            $inventory->product_productable_id = $product->productable_id;
            $inventory->created_at = Carbon::now();
            $inventory->quantity = $request['quantity'];
            $inventory->save();

            $message = [
                'content' => 'El producto ha sido ingresado exitosamente.',
                'messageNumber' => 1,
            ];

            return view('product.messages', compact('message'));

        } catch(Exception $e) {

            $message = [
                'content' => 'Error al ingresar producto, Error: '.$e->getMessage() ,
                'messageNumber' => 0,
            ];

            return view('product.messages', compact('message'));

        }

    }


}
