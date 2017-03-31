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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/client', 'ClientController@index');

Route::post('/client/create', 'ClientController@create');

<<<<<<< HEAD
/* recetario */
Route::get('/prescription', 'PrescriptionController@index');

Route::post('/prescription/find', 'PrescriptionController@find');

Route::post('/prescription/register', 'PrescriptionController@create');

Route::get('/messages', function(){

    return view('prescription.messages');
});

Route::get('/prescription', function(){

    return view('prescription.find');
});

/* fin recetario */

Route::get('/marcaje', 'MarcajeController@index');

//Route::post('/marcaje/marcar', 'MarcajeController@index');
=======
Route::get('/product/frame', 'ProductController@showFrameForm');

Route::get('/product/article', 'ProductController@showArticleForm');

Route::post('/product/create_article', 'ProductController@createArticle');

Route::post('/product/create_frame', 'ProductController@createFrame');
>>>>>>> 2d869cbcddd27e152d3f93f322709778d3434d86

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/messages', function(){

    return view('client.messages');
});


