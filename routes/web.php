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
use App\HTTP\Controllers\ManagementController;

Route::get('/', [ReportController::class, 'viewIindex'])->middleware('auth');

Route::get('/report', [ReportController::class, 'viewReport'])->middleware('auth');
Route::post('/report', [ReportController::class, 'viewReportFromDate'])->middleware('auth');
Route::post('/pdfReport', [ReportController::class, 'pdfReport'])->middleware('auth');

Route::get('/orders/create', [OrderController::class, 'viewOrders'])->middleware('auth');
Route::post('/order/create', [OrderController::class, 'store'])->middleware('auth');
Route::delete('/order/{id}', [OrderController::class, 'destroy'])->middleware('auth');
Route::get('/order/edit/{id}', [OrderController::class, 'edit'])->middleware('auth');
Route::put('/order/update/{id}', [OrderController::class, 'update'])->middleware('auth');

Route::get('/management', [ManagementController::class, 'management'])->middleware('auth');

Route::get('/management/sellers', [SellerController::class, 'viewSellers'])->middleware('auth');
Route::get('/management/seller/create', [SellerController::class, 'viewCreateSeller'])->middleware('auth');
Route::post('/management/seller/create', [SellerController::class, 'store'])->middleware('auth');
Route::delete('/management/seller/{id}', [SellerController::class, 'destroy'])->middleware('auth');
Route::get('/management/seller/edit/{id}', [SellerController::class, 'edit'])->middleware('auth');
Route::put('/management/seller/update/{id}', [SellerController::class, 'update'])->middleware('auth');

Route::get('/management/companies', [CompanyController::class, 'companies'])->middleware('auth');
Route::get('/management/company/create', [CompanyController::class, 'viewCreateCompany'])->middleware('auth');
Route::post('/management/company/create', [CompanyController::class, 'store'])->middleware('auth');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
