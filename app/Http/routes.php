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

/* recetario */
Route::get('/prescription', 'PrescriptionController@index');

Route::post('/prescription/find', 'PrescriptionController@find');

Route::post('/prescription/register', 'PrescriptionController@register');
/* fin recetario */

Route::auth();

Route::get('/home', 'HomeController@index');


