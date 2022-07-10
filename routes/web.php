<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\doctor\DoctorController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\frontend\loginController;
use App\Http\Controllers\patient\PatientController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\VarDumper\Caster\DoctrineCaster;

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

/**
 * frontend route
 */
Route::get('/',[FrontendController::class, 'index'])->name('home.index');
Route::get('login',[FrontendController::class, 'login'])->name('home.login');
Route::post('login', [loginController::class, 'logIn'])->name('user.login');






/**
 * admin route
 */
Route::get('admin-dashboard', [AdminController::class, 'index'])->name('admin.index');
Route::get('admin-login', [AdminController::class, 'login'])->name('admin.login');
Route::post('admin-logedin', [AdminController::class, 'adminLogin'])->name('admin.logedin');




/**
 * doctor route
 */
Route::get('doctor-reg', [DoctorController::class, 'showRegPage'])->name('doctor.register');
Route::post('doctor-reg', [DoctorController::class, 'doctorReg'])->name('register.doctor');



/**
 * patient route
 */
Route::get('patient-reg', [PatientController::class, 'showRegPage'])->name('patient.reg');
// Route::post('patient-register', [PatientController::class, 'patientReg'])->name('patient.register');