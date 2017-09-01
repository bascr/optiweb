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

Route::get('/client/list', 'ClientController@lista');

Route::get('/client/seeClient/{run}', 'ClientController@seeClient');

Route::get('/client/update/{run}', 'ClientController@openUpdate');

Route::post('/client/update/', 'ClientController@update');

Route::get('/client/find', 'ClientController@find');

Route::post('/client/find', 'ClientController@findClient');

Route::get('/client/listToDay', 'ClientController@listToDay');

/*
|--------------------------------------------------------------------------
|   Rutas Recetario
|--------------------------------------------------------------------------
*/

Route::get('/prescription', 'PrescriptionController@index');

Route::get('/prescription/crystal_contact', 'PrescriptionController@indexCrystalContact');

Route::get('/prescription/find/', 'PrescriptionController@find');

Route::get('/prescription/find/crystal_contact', 'PrescriptionController@findCrystalContact');

Route::post('/prescription/register', 'PrescriptionController@create');

Route::post('/prescription/register/crystal_Contact', 'PrescriptionController@createCrystalContact');

Route::get('/messages', function(){

    return view('prescription.messages');
});

Route::get('/messages', function(){

    return view('prescription.messages2');
});

Route::get('/prescription/findPrescription', 'PrescriptionController@findPrescription');


Route::post('/prescription/findPrescriptionRun', 'PrescriptionController@findPrescriptionRun');


Route::get('/prescription', function(){

    return view('prescription.find');
});

Route::get('/prescription/list/{run}', 'PrescriptionController@lista');

Route::get('/prescription/seePrescription/{id}','PrescriptionController@seePrescription');

Route::get('/prescription/update/{id}','PrescriptionController@update');

Route::post('/prescription/update', 'PrescriptionController@updatePresc');

Route::get('/prescription/listToDay','PrescriptionController@listToDay');

Route::get('/prescription/listToDay/RetiredPrescription', 'PrescriptionController@listToDayRetiredPrescription');

// Ajax request to get frame name
Route::post('/get_frame_name', 'PrescriptionController@getFrameName');

Route::get('/prescription/state', 'PrescriptionController@state');

Route::get('/prescription/state/date', 'PrescriptionController@stateDate');

Route::get('/prescription/state/change/{id}', 'PrescriptionController@confirmInLocal');

Route::get('/prescription/confirm/{id}', 'PrescriptionController@confirmPrescription');

Route::post('/prescription/confirmPrescriptionSale', 'PrescriptionController@prescriptionSale');

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

Route::get('/user/register', 'UserController@index');

Route::post('/user/register', 'UserController@register');

Route::get('/user/show', 'UserController@show');

Route::get('/user/edit/{username}', 'UserController@edit');

Route::post('/user/edit', 'UserController@update');

Route::get('/user/find', 'UserController@find');

Route::post('/user/find', 'UserController@account');

Route::post('/user/edit/account', 'UserController@updateAccount');

Route::get('/home', 'HomeController@index');

/*
|--------------------------------------------------------------------------
|   Suppliers
|--------------------------------------------------------------------------
*/

Route::get('/supplier', 'SupplierController@index');

Route::post('/supplier/create', 'SupplierController@create');

Route::get('/supplier/show', 'SupplierController@show');

Route::get('/supplier/edit/{id}', 'SupplierController@edit');

Route::post('/supplier/edit', 'SupplierController@update');

Route::get('/supplier/request', 'SupplierController@request');

Route::post('/supplier/request', 'SupplierController@sendRequest');

Route::get('/register', 'SupplierController@index');

Route::get('/request', 'SupplierController@request');

Route::post('/request', 'SupplierController@sendRequest');

/*
|--------------------------------------------------------------------------
|   Mail
|--------------------------------------------------------------------------
*/

Route::get('/mail', 'HomeController@mail');

/*
|--------------------------------------------------------------------------
|   Article Sale
|--------------------------------------------------------------------------
*/

Route::get('/article_sale', 'SaleController@showArticleSaleForm');

Route::post('/article_sale', 'SaleController@createArticleSale');

// Ajax request to get article name
Route::post('/get_article_name', 'SaleController@getArticleName');

Route::get('/article_sale/list_today', 'SaleController@listToday');


/*
|--------------------------------------------------------------------------
|   Repair
|--------------------------------------------------------------------------
*/

Route::get('/repair/find', 'RepairController@index');

Route::post('/repair/find', 'RepairController@find');

Route::post('/repair/repairservice', 'RepairController@createinternal');

Route::get('/repair/repairstate', 'RepairController@stateRepair');

Route::get('/repair/repairstatedate', 'RepairController@stateDate');

Route::get('/repair/repairstate/change/{id}', 'RepairController@confirmInLocal');

Route::get('/repair/confirm/{id}', 'RepairController@confirmRepair');

Route::post('/repair/confirmSaleRepair', 'RepairController@repairSale');

Route::get('/repair/register', 'RepairController@indexRegister');

Route::post('/repair/register', 'RepairController@createWorkshop');

Route::get('/repair/list', 'RepairController@listWorkshop');

Route::get('/repair/editform/{id}', 'RepairController@edit');

Route::post('/repair/editform', 'RepairController@update');

// Ajax request to get article name
Route::post('/get_article_name', 'RepairController@getArticleName');


/*
|--------------------------------------------------------------------------
|   Report
|--------------------------------------------------------------------------
*/

Route::get('/report/client_list', 'ReportController@clientList');

Route::get('/report/client_list/export', 'ReportController@clientListExport');

Route::get('/report/month_sales', 'ReportController@monthSales');

Route::get('/report/month_sales/export', 'ReportController@monthSalesExport');

Route::get('/report/annual_sales', 'ReportController@annualSales');

Route::get('/report/annual_sales/export', 'ReportController@annualSalesExport');

Route::get('/report/month_access_control', 'ReportController@monthAccessControl');

Route::get('/report/month_access_control/export', 'ReportController@monthAccessControlExport');

