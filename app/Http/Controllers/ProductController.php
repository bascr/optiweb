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
    public function show() {

        $products = Product::paginate(7);
        return view('product.show', compact('products'));

    }

    public function editForm($id) {

        $product = Product::where('productable_id', $id)->get()->first();
        $models = Model::all();
        $categories = Category::all();
        $colors = Color::all();
        $suppliers = Supplier::all();
        $brands = Brand::all();

        return view('product.editform', compact(['product', 'models','categories', 'colors','suppliers', 'brands']));
    }

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

        $this->validate($request, [

            'name' => 'required|max:45|unique:frames',
            'model' => 'required|not_in:0',
            'color' => 'required|not_in:0',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'brand' => 'required|not_in:0',
            'supplier' => 'required|not_in:0',
        ]);


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

        $this->validate($request, [

            'name' => 'required|max:45|unique:articles',
            'category' => 'required|not_in:0',
            'description' => 'required|max:500',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'brand' => 'required|not_in:0',
            'supplier' => 'required|not_in:0',
        ]);

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

    public function updateArticle(Request $request) {

        $this->validate($request, [

            'name' => 'required|max:45',
            'category' => 'required|not_in:0',
            'description' => 'required|max:500',
            'price' => 'required|numeric',
            'brand' => 'required|not_in:0',
            'supplier' => 'required|not_in:0',
        ]);

        try {

            $product = Product::where('productable_id', $request['id'])->get()->first();
            $product->brand_id = $request['brand'];
            $product->supplier_id = $request['supplier'];
            $product->save();

            $article = Article::where('id', $request['id'])->get()->first();
            $article->name = $request['name'];
            $article->category_id = $request['category'];
            $article->description = $request['description'];
            $article->price = $request['price'];
            $article->save();

            $message = [
                'content' => 'El producto ha sido editado exitosamente.',
                'messageNumber' => 1,
            ];

            return view('product.editmessages', compact('message'));

        } catch(Exception $e) {

            $message = [
                'content' => 'Error al editar producto, Error: '.$e->getMessage() ,
                'messageNumber' => 0,
            ];

            return view('product.editmessages', compact('message'));

        }

    }

    public function updateFrame(Request $request) {

        $this->validate($request, [

            'name' => 'required|max:45',
            'model' => 'required|not_in:0',
            'color' => 'required|not_in:0',
            'price' => 'required|numeric',
            'brand' => 'required|not_in:0',
            'supplier' => 'required|not_in:0',

        ]);

        try {

            $product = Product::where('productable_id', $request['id'])->get()->first();
            $product->brand_id = $request['brand'];
            $product->supplier_id = $request['supplier'];
            $product->save();

            $frame = Frame::where('id', $request['id'])->get()->first();
            $frame->name = $request['name'];
            $frame->model_id = $request['model'];
            $frame->color_id = $request['color'];
            $frame->price = $request['price'];
            $frame->save();

            $message = [
                'content' => 'El producto ha sido editado exitosamente.',
                'messageNumber' => 1,
            ];

            return view('product.editmessages', compact('message'));

        } catch(Exception $e) {

            $message = [
                'content' => 'Error al editar producto, Error: '.$e->getMessage() ,
                'messageNumber' => 0,
            ];

            return view('product.editmessages', compact('message'));

        }

    }

    public function stock($id) {

        $product = Product::where('productable_id', $id)->get()->first();

        return view('product.stock', compact('product'));

    }

    public function addStock(Request $request) {

        $this->validate($request, [

            'quantity' => 'required|integer|min:1',

        ]);

        $product = Product::where('productable_id', $request['id'])->get()->first();

        if($product->productable_type == 'App\Article') {

            $article = Article::find($product->productable_id);
            $article->stock += $request['quantity'];
            $article->save();
        } else {
            $frame = Frame::find($product->productable_id);
            $frame->stock += $request['quantity'];
            $frame->save();
        }

        $inventory = new Inventory();
        $inventory->user_username = $request->user()->username;
        $inventory->product_productable_id = $product->productable_id;
        $inventory->created_at = Carbon::now();
        $inventory->quantity = $request['quantity'];
        $inventory->save();

        return 'ok';

    }


}
