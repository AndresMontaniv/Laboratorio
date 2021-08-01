<?php

use App\Http\Controllers\LaboratoryController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\Auth\PatientController;
use App\Http\Controllers\BillsController;
use App\Http\Controllers\BinnacleController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProofsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TestCampaignController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnalysisController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserBuscadorController;
use App\Http\Controllers\UserSpecialityController;
use App\Models\Proof;
use App\Models\TestCampaign;
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
Route::get('patient/credentials/{id}',[PatientController::class, 'showCredentials'])->name('patients.credentials');

Route::get('binnacle/index',[BinnacleController::class, 'index'])->name('binnacle.index');
Route::get('binnacle/all',[BinnacleController::class, 'all'])->name('binnacle.all');
//-------------------------------------controladores xd ccc---------------------------
Route::resource('proofs', ProofsController::class)->names('proofs');
Route::get('proofshowall',[ProofsController::class, 'showall'])->name('proofshowall');
Route::resource('bills',BillsController::class)->names('bills');
Route::get('pdfactura/{id}',[ExcelController::class, 'Pdfactura'])->name('pdfactura');

//------------------------------------------------------------------------------------

Route::resource('role', RoleController::class)->names('roles');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('room', RoomController::class)->names('rooms');
//Route::resource('reservation', ReservationController::class)->names('reservations');
Route::resource('period', PeriodController::class)->names('periods');
Route::resource('user',UserController::class)->names('users');

Route::resource('userbuscador',UserBuscadorController::class)->names('userbuscador');
Route::resource('analysis',AnalysisController::class)->names('analysis'); 
Route::get('analysis/myAnalyses/{id}', [AnalysisController::class, 'myAnalyses'] )->name('analysis.myAnalyses');

Route::get('reservations_create', [ReservationController::class, 'create'] )->name('reservations_create');
Route::get('reservacion', [ReservationController::class, 'index'] )->name('reservations');
Route::post('reservacion_mostrar', [ReservationController::class, 'show'])->name('show_periods');
Route::get('registrar_reserva/{period}/{date}', [ReservationController::class, 'register'])->name('register_reservation');
Route::post('store_reservation', [ReservationController::class, 'store'])->name('store_reservation');
Route::delete('destroy_reservation/{id}', [ReservationController::class,'destroy'])->name('destroy_reservations');
Route::get('update_status/{id}', [ReservationController::class,'update'])->name('update_status');
Route::get('Laboratory/create/{plan_id}',[LaboratoryController::class, 'create'])->name('laboratory.create');
Route::post('Laboratory/store',[LaboratoryController::class, 'store'])->name('laboratory.store');
Route::get('exceluser',[ExcelController::class, 'exportExcel'])->name('exceluser');
Route::get('pdfuser',[ExcelController::class, 'PdfUser'])->name('pdfuser');

Route::get('reservation/periods',[ReservationController::class, 'menu'])->name('reservation.menu');
Route::post('reservation/searched/{id}',[ReservationController::class, 'searched'])->name('reservation.searched');
Route::get('reservation/myReservations/{id}',[ReservationController::class, 'myReservations'])->name('reservation.myReservations');
Route::get('reservation/desactivate/{id}',[ReservationController::class, 'desactivate'])->name('reservation.desactivate');
Route::get('reservation/select/{id}/{date}',[ReservationController::class, 'select'])->name('reservation.select');


Route::get('reservation/index/{id}',[UserSpecialityController::class, 'index'])->name('userSpeciality.index');
Route::get('reservation/index/{id}/{speciality}',[UserSpecialityController::class, 'setSpeciality'])->name('userSpeciality.setSpeciality');
Route::get('reservation/activateSpeciality/{id}',[UserSpecialityController::class, 'activateSpeciality'])->name('userSpeciality.activateSpeciality');
Route::get('reservation/desactivateSpeciality/{id}',[UserSpecialityController::class, 'desactivateSpeciality'])->name('userSpeciality.desactivateSpeciality');


Route::get('reservation/allUsers',[UserController::class, 'allUsers'])->name('user.allUsers')->middleware('superAdmin');
Route::get('laboratories/',[LaboratoryController::class, 'index'])->name('laboratories.index')->middleware('superAdmin');
Route::get('laboratories/active/{id}',[LaboratoryController::class, 'active'])->name('laboratories.active')->middleware('superAdmin');
Route::get('laboratories/desactive/{id}',[LaboratoryController::class, 'desactive'])->name('laboratories.desactive')->middleware('superAdmin');

Route::get('permissions/{id}',[PermissionController::class, 'index'])->name('permissions.index');
Route::get('permissions/set/{id}/{role}',[PermissionController::class, 'setPermission'])->name('permissions.setPermission');
Route::get('permissions/activate/{id}',[PermissionController::class, 'activate'])->name('permissions.activate');
Route::get('permissions/desactivate/{id}',[PermissionController::class, 'desactivate'])->name('permissions.desactivate');

Route::get('plans',[PlanController::class, 'index'])->name('plan.index');
Route::get('plans/show',[PlanController::class, 'show'])->name('plans.show');
Route::get('plans/create',[PlanController::class, 'create'])->name('plans.create');
Route::get('plans/edit/{id}',[PlanController::class, 'edit'])->name('plans.edit');
Route::get('plans/active/{id}',[PlanController::class, 'activate'])->name('plans.active');
Route::get('plans/desactive/{id}',[PlanController::class, 'desactivate'])->name('plans.desactive');
Route::post('plans/store',[PlanController::class, 'store'])->name('plans.store');
Route::post('plans/update/{id}',[PlanController::class, 'update'])->name('plans.update');

Route::get('campaign/index/{laboratory}',[CampaignController::class, 'index'])->name('campaign.index');
Route::get('campaign/all',[CampaignController::class, 'all'])->name('campaign.all');
Route::get('campaign/create',[CampaignController::class, 'create'])->name('campaign.create');
Route::post('campaign/store',[CampaignController::class, 'store'])->name('campaign.store');
Route::get('campaign/active/{id}',[CampaignController::class, 'active'])->name('campaign.active');
Route::get('campaign/desactive/{id}',[CampaignController::class, 'desactive'])->name('campaign.desactive');
Route::get('campaign/edit/{id}',[CampaignController::class, 'edit'])->name('campaign.edit');
Route::post('campaign/update/{id}',[CampaignController::class, 'update'])->name('campaign.update');

Route::get('testCampaign/index/{id}',[TestCampaignController::class, 'index'])->name('testCampaign.index');
Route::get('testCampaign/store/{proof}/{campaign}',[TestCampaignController::class, 'store'])->name('testCampaign.store');
Route::get('testCampaign/active/{testCampaign}',[TestCampaignController::class, 'active'])->name('testCampaign.active');
Route::get('testCampaign/desactive/{testCampaign}',[TestCampaignController::class, 'desactive'])->name('testCampaign.desactive');

Route::get('notification/index/{id}',[NotificationController::class, 'index'])->name('notification.index');
Route::get('notification/create/{id}',[NotificationController::class, 'create'])->name('notification.create');
Route::post('notification/store',[NotificationController::class, 'store'])->name('notification.store');
Route::get('notification/edit/{id}',[NotificationController::class, 'edit'])->name('notification.edit');
Route::post('notification/update',[NotificationController::class, 'update'])->name('notification.update');
