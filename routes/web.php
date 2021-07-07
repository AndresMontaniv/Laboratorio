<?php

use App\Http\Controllers\LaboratoryController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SalasController;
use App\Models\Laboratory;
use App\Models\Reservation;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*P
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|n
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
Route::resource('room', RoomController::class)->names('rooms');
Route::resource('reservation', ReservationController::class)->names('reservations');
Route::resource('period', PeriodController::class)->names('periods');

Route::get('plans',[PlanController::class, 'index'])->name('plan.index');
Route::get('Laboratory/create/{plan_id}',[LaboratoryController::class, 'create'])->name('laboratory.create');
Route::post('Laboratory/store',[LaboratoryController::class, 'store'])->name('laboratory.store');
