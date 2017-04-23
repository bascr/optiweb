<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
|   Rutas Raíz
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    if(Auth::check()) {
       return Redirect::to('/home');
    } else {
        return view('welcome');
    }

});

/*
|--------------------------------------------------------------------------
|   Rutas Cliente
|--------------------------------------------------------------------------
*/

Route::get('/client', 'ClientController@index');

Route::post('/client/create', 'ClientController@create');


/*
|--------------------------------------------------------------------------
|   Rutas Recetario
|--------------------------------------------------------------------------
*/

Route::get('/prescription', 'PrescriptionController@index');

Route::post('/prescription/find', 'PrescriptionController@find');

Route::post('/prescription/register', 'PrescriptionController@create');

Route::get('/messages', function(){

    return view('prescription.messages');
});

Route::get('/prescription/findPrescription', 'PrescriptionController@findPrescription');


Route::post('/prescription/findPrescriptionRun', 'PrescriptionController@findPrescriptionRun');


Route::get('/prescription', function(){

    return view('prescription.find');
});

Route::get('/prescription/list/{run}', 'PrescriptionController@lista');

Route::get('/prescription/seePrescription/{id}','PrescriptionController@seePrescription');

/*
|--------------------------------------------------------------------------
|   Rutas Marcaje
|--------------------------------------------------------------------------
*/

Route::get('/marcaje', 'MarcajeController@index');

Route::post('/marcar', 'MarcajeController@log_entry');

//Route::post('/marcaje/marcar', 'MarcajeController@index');


/*
|--------------------------------------------------------------------------
|   Rutas Inventario y productos
|--------------------------------------------------------------------------
*/

Route::get('/product/frame', 'ProductController@showFrameForm');

Route::get('/product/article', 'ProductController@showArticleForm');

Route::post('/product/create_article', 'ProductController@createArticle');

Route::post('/product/create_frame', 'ProductController@createFrame');

Route::get('/inventory', 'InventoryController@show');

Route::get('/inventory/{date}', 'InventoryController@showBarCode');

Route::get('/product', 'ProductController@show');

Route::get('/product/{id}', 'ProductController@editForm');

Route::post('/product/update_article', 'ProductController@updateArticle');

Route::post('/product/update_frame', 'ProductController@updateFrame');

Route::get('product/stock/{id}', 'ProductController@stock');

Route::post('product/stock', 'ProductController@addStock');


/*
|--------------------------------------------------------------------------
|   Rutas Home y Auth (Login)
|--------------------------------------------------------------------------
*/


Route::auth();

Route::get('register', 'UserController@index');

Route::post('register', 'UserController@register');

Route::get('/home', 'HomeController@index');

/*
|--------------------------------------------------------------------------
|   Providers
|--------------------------------------------------------------------------
*/

Route::get('/request', 'ProviderController@request');

Route::post('/request', 'ProviderController@sendRequest');










