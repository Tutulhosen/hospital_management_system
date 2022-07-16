<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\SpecialityController;
use App\Http\Controllers\doctor\DoctorController;
use App\Http\Controllers\frontend\loginController;
use App\Http\Controllers\patient\PatientController;
use App\Http\Controllers\frontend\FrontendController;
use GuzzleHttp\Middleware;
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
 * 
 */
Route::get('/',[FrontendController::class, 'index'])->name('home.index');
Route::get('login',[FrontendController::class, 'login'])->name('home.login')->middleware(['doctor.redirect','admin.redirect']);
Route::post('login', [loginController::class, 'logIn'])->name('user.login')->middleware('doctor.redirect');







/**
 * admin route
 * 
 */


// some problem is unsolved in here
Route::get('admin-dashboard', [AdminController::class, 'index'])->name('admin.index')->middleware('admin');
Route::get('admin-login', [AdminController::class, 'login'])->name('admin.login')->middleware(['admin.redirect','doctor.redirect']);
Route::post('admin-logedin', [AdminController::class, 'adminLogin'])->name('admin.logedin');
Route::get('admin-user', [AdminController::class, 'showCreatePage'])->name('adminuser.index');
Route::post('admin-user', [AdminController::class, 'create'])->name('admin.user.create');
Route::get('admin-user-delete/{id}', [AdminController::class, 'destroy'])->name('admin.user.delete');
Route::get('admin-user-edit/{id}', [AdminController::class, 'edit'])->name('admin.user.edit');
Route::post('admin-user-edit/{id}', [AdminController::class, 'update'])->name('admin.user.update');

//admin permission route
Route::get('permission', [PermissionController::class, 'index'])->name('admin.permission');
Route::post('permission',[PermissionController::class, 'create'])->name('permission.create');
Route::get('permission-delete/{id}', [PermissionController::class, 'destroy'])->name('permission.delete');
Route::get('permission-edit/{id}', [PermissionController::class, 'edit'])->name('permission.edit');
Route::post('permission-update/{id}', [PermissionController::class, 'update'])->name('permission.update');

//admin role route
Route::get('role', [RoleController::class, 'index'])->name('admin.role');
Route::post('role', [RoleController::class, 'create'])->name('admin.role.create');
Route::get('role-delete/{id}', [RoleController::class, 'destroy'])->name('admin.role.delete');
Route::get('role-edit/{id}', [RoleController::class, 'edit'])->name('admin.role.edit');
Route::post('role-update/{id}', [RoleController::class, 'update'])->name('admin.role.update');

//admin user profile route
Route::get('admin-profile', [ProfileController::class, 'ShowProfile'])->name('admin.profile')->Middleware('admin');
Route::post('admin-profile/{id}', [ProfileController::class, 'UploadPhoto'])->name('admin.photo.upload')->Middleware('admin');
Route::post('admin-passwordChange/{id}', [ProfileController::class, 'changePassword'])->name('admin.password.change')->Middleware('admin');

//speciality route
Route::get('speciality', [SpecialityController::class, 'index'])->name('admin.speciality')->middleware('admin');
Route::post('speciality', [SpecialityController::class, 'create'])->name('admin.speciality.create')->middleware('admin');
Route::get('speciality-delete/{id}', [SpecialityController::class, 'destroy'])->name('admin.speciality.delete')->middleware('admin');
Route::get('speciality-edit/{id}', [SpecialityController::class, 'edit'])->name('admin.speciality.edit')->middleware('admin');
Route::post('speciality-edit/{id}', [SpecialityController::class, 'update'])->name('admin.speciality.update')->middleware('admin');

/**
 * doctor route
 */
Route::get('doctor-reg', [DoctorController::class, 'showRegPage'])->name('doctor.register')->middleware('doctor.redirect');
Route::post('doctor-reg', [DoctorController::class, 'doctorReg'])->name('register.doctor')->middleware('doctor.redirect');
Route::get('doctor-logout', [loginController::class, 'logout'])->name('doctor.logout');



/**
 * patient route
 */
Route::get('patient-reg', [PatientController::class, 'showRegPage'])->name('patient.reg');
// Route::post('patient-register', [PatientController::class, 'patientReg'])->name('patient.register');