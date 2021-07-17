<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIAnalisisController;
use App\Http\Controllers\APIInvoiceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('analysis', APIAnalisisController::class)->names('analysis');
Route::get('analysis/getAnalyses/{id}',[APIAnalisisController::class, 'getAnalyses'])->name('analysis.getAnalyses');
Route::resource('invoice', APIInvoiceController::class)->names('invoice');
Route::get('invoice/getInvoices/{id}',[APIInvoiceController::class, 'getInvoices'])->name('invoice.getInvoices');

