<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', 'ProductController@index')->name('ruta')  ;


//Route::get('/', function () {return view('home');}) -> name('home');

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});

use App\Http\Controllers\ProductController;
Route::get('/', [ProductController::class , 'catalogue']) -> name('home');
Route::resource('product',  ProductController::class )->middleware('auth');
Route::get('product_catalogue',  [ProductController::class , 'catalogue'] )->name('catalogue');

use App\Http\Controllers\ClientController;
Route::resource('client',  ClientController::class )->middleware('auth');
//Route::post('add_shipping_info/{client}',  [ClientController::class,'add_shipping_info'] ) ->name('add_shipping_info') ;

use App\Http\Controllers\ShippingInformationController;
Route::resource('shipping_information',  ShippingInformationController::class )->middleware('auth');

use App\Http\Controllers\OrderController;
Route::resource('order',  OrderController::class )->middleware('auth');
/////////////////////////////////
Route::get('chooseclient/{order}',          [OrderController::class,'chooseclient'] ) ->name('chooseclient')->middleware('auth') ;
Route::put('order.setclient/{order}',       [OrderController::class,'setclient'] ) ->name('order.setclient')->middleware('auth') ;
/////////////////////////////////
Route::get('chooseshippinginfo/{order}',    [OrderController::class,'chooseshippinginfo'] ) ->name('chooseshippinginfo')->middleware('auth') ;
Route::put('order.setshippinginfo/{order}', [OrderController::class,'setshippinginfo'] ) ->name('order.setshippinginfo')->middleware('auth') ;
/////////////////////////////////
Route::get('chooseproduct/{order}',    [OrderController::class,'chooseproduct'] ) ->name('chooseproduct')->middleware('auth') ;
Route::put('order.setproduct/{order}', [OrderController::class,'setproduct'] ) ->name('order.setproduct')->middleware('auth') ;
/////////////////////////////////
Route::put('order.changestatus/{order}', [OrderController::class,'changestatus'] ) ->name('order.changestatus')->middleware('auth') ;

use App\Http\Controllers\OrderLineController;
Route::resource('order_line',  OrderLineController::class )->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
