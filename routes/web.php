<?php

use App\Http\Controllers\PeriodController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SalasController;
use App\Models\Reservation;
use GuzzleHttp\Middleware;
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
//Route::resource('reservation', ReservationController::class)->names('reservations');
Route::resource('period', PeriodController::class)->names('periods');

Route::get('reservations_create', [ReservationController::class, 'create'] )->name('reservations_create');
Route::get('reservacion', [ReservationController::class, 'index'] )->name('reservations');
Route::post('reservacion_mostrar', [ReservationController::class, 'show'])->name('show_periods');
Route::get('registrar_reserva/{period}/{date}', [ReservationController::class, 'register'])->name('register_reservation');
Route::post('store_reservation', [ReservationController::class, 'store'])->name('store_reservation');
Route::delete('destroy_reservation/{id}', [ReservationController::class,'destroy'])->name('destroy_reservations');
Route::get('update_status/{id}', [ReservationController::class,'update'])->name('update_status');