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

use App\HTTP\Controllers\SellerController;

Route::get('/', function () {
    return view('index');
});

Route::get('/create-sell', function () {
    return view('create-sell');
});

Route::get('/report', function () {
    return view('report');
});

Route::get('/sellers', [SellerController::class, 'sellers']);

Route::get('/sellers/create', [SellerController::class, 'createSeller']);
