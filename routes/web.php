<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\POS\OrderController;
use App\Http\Controllers\POS\ProductController;
use App\Http\Controllers\POS\SettingController;
use App\Http\Controllers\POS\CompaniesController;
use App\Http\Controllers\POS\SuppliersController;
use App\Http\Controllers\POS\TranscationController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    Route::resource('/orders',OrderController::class); //orders index
    Route::resource('/product',ProductController::class); //Product Index
    Route::resource('/order_details',Order_DetailsController::class); //Order_details Index
    Route::resource('/companies',CompaniesController::class); //Compaines Index
    Route::resource('/setting',SettingController::class); //Setting Index
    Route::resource('/supplirs',SuppliersController::class); //Suppliers Index
    Route::resource('/transcation',TranscationController::class); //Transcation Index
    Route::resource('users',UserController::class); //Users Index