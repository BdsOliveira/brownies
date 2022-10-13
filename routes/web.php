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
use App\HTTP\Controllers\CompanyController;
use App\HTTP\Controllers\OrderController;
use App\HTTP\Controllers\ReportController;

// Route::get('/', function () {
//     return view('index');
//     // Add a rota para o ReportController e retorna a view Index com a função de relatório sendo executada
// });

Route::get('/', [ReportController::class, 'index']);
Route::get('/report', [ReportController::class, 'report']);

Route::get('/create-order', [OrderController::class, 'orders']);
Route::post('/create-order', [OrderController::class, 'store']);

Route::get('/sellers', [SellerController::class, 'sellers']);
Route::post('/sellers', [SellerController::class, 'store']);

Route::get('/sellers/create', [SellerController::class, 'createSeller']);

Route::get('/company', [CompanyController::class, 'company']);
Route::post('/company', [CompanyController::class, 'store']);

Route::get('/company/create', [CompanyController::class, 'createCompany']);
