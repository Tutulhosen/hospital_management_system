<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\doctor\DoctorController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\patient\PatientController;
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

/**
 * frontend route
 */
Route::get('/',[FrontendController::class, 'index'])->name('home.index');
Route::get('login',[FrontendController::class, 'login'])->name('home.login');





/**
 * admin controller
 */
Route::get('admin-dashboard', [AdminController::class, 'index'])->name('admin.index');



/**
 * doctor controller
 */
Route::get('doctor-reg', [DoctorController::class, 'showRegPage'])->name('doctor.register');



/**
 * patient controller
 */
Route::get('patient-reg', [PatientController::class, 'showRegPage'])->name('patient.reg');