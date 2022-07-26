<?php

use GuzzleHttp\Middleware;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminDoctorController;
use App\Http\Controllers\Admin\AdminPatientController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\doctor\DoctorController;
use App\Http\Controllers\frontend\loginController;
use App\Http\Controllers\patient\PatientController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\admin\RoomController;
use App\Http\Controllers\admin\SpecialityController;
use App\Http\Controllers\Appoinment\AppoinmentController;
use App\Http\Controllers\frontend\FrontendController;
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
Route::post('/',[FrontendController::class, 'appoinmentCreate'])->name('home.appoinment.create');
Route::get('login',[FrontendController::class, 'login'])->name('home.login')->middleware(['doctor.redirect','patient.redirect']);
Route::post('login', [loginController::class, 'logIn'])->name('user.login')->middleware('doctor.redirect');







/**
 * admin route
 * 
 */


Route::get('admin-dashboard', [AdminController::class, 'index'])->name('admin.index')->middleware('admin');
Route::get('admin-login', [AdminController::class, 'login'])->name('admin.login')->middleware(['admin.redirect','doctor.redirect']);
Route::post('admin-login', [AdminController::class, 'adminLogin'])->name('admin.logedin');
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

//room route
Route::get('room', [RoomController::class, 'index'])->name('room.index')->middleware('admin');
Route::post('room', [RoomController::class, 'create'])->name('room.create')->middleware('admin');
Route::get('room-delete/{id}', [RoomController::class, 'destroy'])->name('room.delete')->middleware('admin');
Route::get('room-edit/{id}', [RoomController::class, 'edit'])->name('room.edit')->middleware('admin');
Route::post('room-update/{id}', [RoomController::class, 'update'])->name('room.update')->middleware('admin');

//appoinment route from admin panel
Route::get('appoinment', [AppoinmentController::class, 'index'])->name('admin.appoinment.index');
Route::get('appoinment-reject/{id}', [AppoinmentController::class, 'RejectAppoinment'])->name('admin.appoinment.reject');
Route::get('appoinment-delete/{id}', [AppoinmentController::class, 'DeleteAppoinment'])->name('admin.appoinment.delete');
Route::get('appoinment-accrpt/{id}', [AppoinmentController::class, 'AcceptAppoinment'])->name('admin.appoinment.accept');

//doctor route from admin panel
Route::get('admin-doctor', [AdminDoctorController::class, 'index'])->name('admin.doctor.index')->middleware('admin');
Route::post('admin-doctor', [AdminDoctorController::class, 'create'])->name('admin.doctor.create')->middleware('admin');
Route::get('admin-doctor-edit/{id}', [AdminDoctorController::class, 'edit'])->name('admin.doctor.edit')->middleware('admin');
Route::post('admin-doctor-edit/{id}', [AdminDoctorController::class, 'update'])->name('admin.doctor.update')->middleware('admin');
Route::get('admin-doctor-delete/{id}', [AdminDoctorController::class, 'destroy'])->name('admin.doctor.delete')->middleware('admin');

//patient route from admin panel
Route::get('admin-patient', [AdminPatientController::class, 'AdminPatientIndex'])->name('admin.patient.index');
Route::post('admin-patient-create', [AdminPatientController::class, 'AdminPatientCreate'])->name('admin.patient.create');
Route::get('admin-patient-delete/{id}', [AdminPatientController::class, 'AdminPatientDelete'])->name('admin.patient.delete');
Route::get('admin-patient-edit/{id}', [AdminPatientController::class, 'AdminPatientEdit'])->name('admin.patient.edit');
Route::post('admin-patient-update/{id}', [AdminPatientController::class, 'AdminPatientUpdate'])->name('admin.patient.update');

/**
 * doctor route
 */
Route::get('doctor-reg', [DoctorController::class, 'showRegPage'])->name('doctor.register')->middleware('doctor.redirect');
Route::post('doctor-reg', [DoctorController::class, 'doctorReg'])->name('register.doctor')->middleware('doctor.redirect');
Route::get('doctor-logout', [loginController::class, 'logout'])->name('doctor.logout');
Route::get('doctor-dashboard', [DoctorController::class, 'profilePage'])->name('doctor.profile')->middleware('doctor');
Route::post('doctor-profile-photo,{id}', [DoctorController::class, 'profilePhoto'])->name('doctor.profile.photo')->middleware('doctor');
Route::post('doctor-password-change,{id}', [DoctorController::class, 'passwordChange'])->name('doctor.password.change')->middleware('doctor');



/**
 * patient route
 */
Route::get('patient-reg', [PatientController::class, 'showRegPage'])->name('patient.reg');
Route::post('patient-register', [PatientController::class, 'patientReg'])->name('patient.register');
Route::get('patient-appointment', [PatientController::class, 'patientAppoinment'])->name('patient.appoinment');
Route::get('patient-appointment-create', [PatientController::class, 'patientAppoinmentCreatePage'])->name('patient.appoinment.create.index');
Route::post('patient-appointment-create', [PatientController::class, 'patientAppoinmentCreate'])->name('patient.appoinment.create');
Route::get('patient-appointment-delete/{id}', [PatientController::class, 'patientAppoinmentDelete'])->name('patient.appoinment.delete');
Route::get('patient-appointment-edit/{id}', [PatientController::class, 'patientAppoinmentedit'])->name('patient.appoinment.edit');
Route::post('patient-appointment-update/{id}', [PatientController::class, 'patientAppoinmentupdate'])->name('patient.appoinment.update');