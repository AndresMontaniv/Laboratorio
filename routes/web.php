<?php

use App\Http\Controllers\LaboratoryController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\Auth\PatientController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\SalasController;
use App\Models\Laboratory;
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
Route::view('login/patient', 'patients.login')->name('patient.login');
Route::post('patient/login',[PatientController::class, 'login'])->name('patients.login');
Route::post('patient/create',[PatientController::class, 'create'])->name('patients.create');
Route::get('patient/index/{id}',[PatientController::class, 'index'])->name('patients.index');



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
Route::get('plans',[PlanController::class, 'index'])->name('plan.index');
Route::get('Laboratory/create/{plan_id}',[LaboratoryController::class, 'create'])->name('laboratory.create');
Route::post('Laboratory/store',[LaboratoryController::class, 'store'])->name('laboratory.store');
