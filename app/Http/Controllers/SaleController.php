<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

use App\Http\Requests;

class SaleController extends Controller
{
    //
    public function showArticleSaleForm() {

        return view('sale.showArticleSaleForm');

    }

    public function createArticleSale() {

        return 'ok';

    }

    public function getArticleName(Request $request) {

        $article = Article::where('id', $request['id'])->get()->first();

        $data = array();

        if($article != null) {

            $data['nameArticle'] = $article->name;

        } else {

            $data['nameArticle'] = 'Articulo no encontrado';

        }

        echo json_encode($data);

    }
}
