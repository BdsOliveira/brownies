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

Route::get('/', [ReportController::class, 'viewIindex'])->middleware('auth');
Route::get('/report', [ReportController::class, 'viewReport'])->middleware('auth');
Route::post('/pdfReport', [ReportController::class, 'pdfReport'])->middleware('auth');
Route::post('/report', [ReportController::class, 'viewReportFromDate'])->middleware('auth');

Route::get('/create-order', [OrderController::class, 'orders'])->middleware('auth');
Route::post('/create-order', [OrderController::class, 'store'])->middleware('auth');
Route::delete('/order/{id}', [OrderController::class, 'destroy'])->middleware('auth');
Route::get('/order/edit/{id}', [OrderController::class, 'edit'])->middleware('auth');
Route::put('/order/update/{id}', [OrderController::class, 'update'])->middleware('auth');

Route::get('/sellers', [SellerController::class, 'sellers'])->middleware('auth');
Route::post('/sellers', [SellerController::class, 'store'])->middleware('auth');

Route::get('/sellers/create', [SellerController::class, 'createSeller'])->middleware('auth');

Route::get('/company', [CompanyController::class, 'company'])->middleware('auth');
Route::post('/company', [CompanyController::class, 'store'])->middleware('auth');

Route::get('/company/create', [CompanyController::class, 'createCompany'])->middleware('auth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
