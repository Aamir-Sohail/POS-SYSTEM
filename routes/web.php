<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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


    Route::resource('/orders','OrderController'); //orders index
    Route::resource('/product','ProductController'); //Product Index
    Route::resource('/product','Order_DetailsController'); //Product Index
    Route::resource('/product','CompaniesController'); //Product Index
    Route::resource('/product','SettingController'); //Product Index
    Route::resource('/product','SuppliersController'); //Product Index
    Route::resource('/product','TranscationController'); //Product Index