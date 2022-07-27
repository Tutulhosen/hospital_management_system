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
        Route::get('login',[FrontendController::class, 'login'])->name('home.login')->middleware(['doctor.redirect', 'patient.redirect', 'admin.redirect']);
        Route::post('login', [loginController::class, 'logIn'])->name('user.login')->middleware(['doctor.redirect','patient.redirect', 'admin.redirect']);
        Route::get('documentation', [FrontendController::class, 'document'])->name('document.index');





/**
 * admin middleware
 */
Route::group(['middleware'  => 'admin'], function(){
    
        //adminuser route
        Route::get('admin-dashboard', [AdminController::class, 'index'])->name('admin.index');
        Route::get('admin-user', [AdminController::class, 'showCreatePage'])->name('adminuser.index');
        Route::post('admin-user', [AdminController::class, 'create'])->name('admin.user.create');
        Route::get('admin-user-delete/{id}', [AdminController::class, 'destroy'])->name('admin.user.delete');
        Route::get('admin-user-edit/{id}', [AdminController::class, 'edit'])->name('admin.user.edit');
        Route::post('admin-user-edit/{id}', [AdminController::class, 'update'])->name('admin.user.update');
        Route::get('adminuser-logout', [AdminController::class, 'logout'])->name('adminuser.logout');
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
        Route::get('admin-profile', [ProfileController::class, 'ShowProfile'])->name('admin.profile');
        Route::post('admin-profile/{id}', [ProfileController::class, 'UploadPhoto'])->name('admin.photo.upload');
        Route::post('admin-passwordChange/{id}', [ProfileController::class, 'changePassword'])->name('admin.password.change');

        //speciality route
        Route::get('speciality', [SpecialityController::class, 'index'])->name('admin.speciality');
        Route::post('speciality', [SpecialityController::class, 'create'])->name('admin.speciality.create');
        Route::get('speciality-delete/{id}', [SpecialityController::class, 'destroy'])->name('admin.speciality.delete');
        Route::get('speciality-edit/{id}', [SpecialityController::class, 'edit'])->name('admin.speciality.edit');
        Route::post('speciality-edit/{id}', [SpecialityController::class, 'update'])->name('admin.speciality.update');

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
        Route::get('admin-doctor', [AdminDoctorController::class, 'index'])->name('admin.doctor.index');
        Route::post('admin-doctor', [AdminDoctorController::class, 'create'])->name('admin.doctor.create');
        Route::get('admin-doctor-edit/{id}', [AdminDoctorController::class, 'edit'])->name('admin.doctor.edit');
        Route::post('admin-doctor-edit/{id}', [AdminDoctorController::class, 'update'])->name('admin.doctor.update');
        Route::get('admin-doctor-delete/{id}', [AdminDoctorController::class, 'destroy'])->name('admin.doctor.delete');

        //patient route from admin panel
        Route::get('admin-patient', [AdminPatientController::class, 'AdminPatientIndex'])->name('admin.patient.index');
        Route::post('admin-patient-create', [AdminPatientController::class, 'AdminPatientCreate'])->name('admin.patient.create');
        Route::get('admin-patient-delete/{id}', [AdminPatientController::class, 'AdminPatientDelete'])->name('admin.patient.delete');
        Route::get('admin-patient-edit/{id}', [AdminPatientController::class, 'AdminPatientEdit'])->name('admin.patient.edit');
        Route::post('admin-patient-update/{id}', [AdminPatientController::class, 'AdminPatientUpdate'])->name('admin.patient.update');

});


/**
 * admin redirect middleware
 */

 Route::group(['middleware'  => 'admin.redirect'], function(){
        //admin user route
        Route::get('admin-login', [AdminController::class, 'login'])->name('admin.login');
        Route::post('admin-login', [AdminController::class, 'adminLogin'])->name('admin.logedin');

 });



 /**
  * doctor middleware
  */
  Route::group(['middleware'  =>'doctor'], function(){

        //doctor route
        Route::get('doctor-logout', [loginController::class, 'logout'])->name('doctor.logout');
        Route::get('doctor-dashboard', [DoctorController::class, 'profilePage'])->name('doctor.profile');
        Route::post('doctor-profile-photo/{id}', [DoctorController::class, 'profilePhoto'])->name('doctor.profile.photo');
        Route::post('doctor-password-change/{id}', [DoctorController::class, 'passwordChange'])->name('doctor.password.change');
        Route::get('doctor-appoinment', [DoctorController::class, 'DoctorAppoinment'])->name('doctor.appoinment');
        Route::get('doctor-appoinment-complete/{id}', [DoctorController::class, 'AppoinmentComplete'])->name('doctor.appoinment.complete');
        Route::get('doctor-patient-list', [DoctorController::class, 'DoctorPatient'])->name('doctor.patient');
        Route::get('doctor-logout', [DoctorController::class, 'logout'])->name('doctor.logout');

  });


  /**
   * doctor redirect middleware
   */
  Route::group(['middleware'  =>'doctor.redirect'], function(){
       //doctor route
        Route::get('doctor-reg', [DoctorController::class, 'showRegPage'])->name('doctor.register');
        Route::post('doctor-reg', [DoctorController::class, 'doctorReg'])->name('register.doctor');

  });



  /**
   * patient middleware
   */
  Route::group(['middleware'  => 'patient'], function(){

        //patient route
        Route::get('patient-appointment', [PatientController::class, 'patientAppoinment'])->name('patient.appoinment');
        Route::get('patient-appointment-create', [PatientController::class, 'patientAppoinmentCreatePage'])->name('patient.appoinment.create.index');
        Route::post('patient-appointment-create', [PatientController::class, 'patientAppoinmentCreate'])->name('patient.appoinment.create');
        Route::get('patient-appointment-delete/{id}', [PatientController::class, 'patientAppoinmentDelete'])->name('patient.appoinment.delete');
        Route::get('patient-appointment-edit/{id}', [PatientController::class, 'patientAppoinmentedit'])->name('patient.appoinment.edit');
        Route::post('patient-appointment-update/{id}', [PatientController::class, 'patientAppoinmentupdate'])->name('patient.appoinment.update');
        Route::get('patient-logout', [PatientController::class, 'LogOut'])->name('patient.logout');
  });


/**
 * patient redirect middleware
 */

 Route::group(['middleware'  => 'patient.redirect'], function(){
       //patient route
        Route::get('patient-reg', [PatientController::class, 'showRegPage'])->name('patient.reg');
        Route::post('patient-register', [PatientController::class, 'patientReg'])->name('patient.register');
 });
