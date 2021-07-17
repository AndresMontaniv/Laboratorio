<?php

use App\Http\Controllers\ApiCampaignController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
// estas rutas requiren de un token válido para poder accederse.
// Route::group(['middleware' => 'auth.jwt'], function () {
Route::post('/logout', [AuthController::class, 'logout']); 
Route::get('/getLaboratories', [AuthController::class, 'getLaboratories']);
// });
Route::apiResource('campaigns',ApiCampaignController::class);

