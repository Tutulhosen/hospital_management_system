<?php

namespace App\Http\Controllers\admin;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use App\Models\Appoinment;
use App\Models\Patient;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * show index page
     */

     public function index()
     {
      $doctor_data= Doctor::latest()->get();
      $patient_data=Patient::latest()->get();
      $appoinment_data= Appoinment::latest()->get();

        return view('admin.index', compact('doctor_data', 'patient_data', 'appoinment_data'));
     }

     /**
      * show login page
      */
      public function login()
      {
         return view('admin.login');
      }



      /**
       * login process
       */
      public function adminLogin(Request $request)
      {
         $this->validate($request, [
            'email'            =>'required',
            'password'         =>'required',
         ]);

         if (Auth::guard('adminUser')->attempt([
            'email'              =>$request->email,
            'password'           =>$request->password,
         ])) {
            return redirect()->route('admin.index');
         }elseif (Auth::guard('doctor')->attempt([
            'email'              =>$request->email,
            'password'           =>$request->password,
         ])) {
            return redirect()->route('admin.index');
         } else {
            return back()->with('success-mid', 'Wrong email or password');
         }
         
      }
      public function Logout()
      {
         Auth::guard('adminUser')->logout();
         return redirect()->route('home.index');
      }



      /**
       * show adminuser add apge
       */
      public function showCreatePage()
      {
         $role_data= Role::latest()->get();
         $admin_user_data=AdminUser::latest()->get();
         $form_type='add';
         return view('admin.adminPanel.index', compact('role_data', 'admin_user_data','form_type'));
      }

      /**
       * show adminuser edit apge
       */
      public function edit($id)
      {
         $edit_id= AdminUser::findOrFail($id);
         $role_data= Role::latest()->get();
         $admin_user_data=AdminUser::latest()->get();
         $form_type='edit';
         return view('admin.adminPanel.index', compact('role_data', 'admin_user_data','edit_id', 'form_type'));
      }

      /**
       * create a adminuser data
       */
      public function create(Request $request)
      {
         $this->validate($request, [
            'name'                  =>'required',
            'email'                 =>'required|unique:admin_users',
            'cell'                  =>'required|unique:admin_users',
            'username'              =>'required|unique:admin_users',
            
         ]);
         AdminUser::create([
            'name'                     =>$request->name,
            'email'                    =>$request->email,
            'cell'                     =>$request->cell,
            'username'                 =>$request->username,
            'role_id'                  =>$request->role,
            'password'                 =>Hash::make('123456789'),
            'photo'                    =>'avatar.png'
         ]);
         return back()->with('success', 'successfully add a user data');
      }


      /**
       * delete a admin data
       */
      public function destroy($id)
      {
         $delete_id= AdminUser::findOrFail($id);
         $delete_id->delete();
         return back()->with('success-mid', 'Admin data is Deleted');
      }

      /**
       * update admin User id
       */
      public function update(Request $request, $id)
      {
         $this->validate($request, [
            'name'                  =>'required',
            'email'                 =>'required',
            'cell'                  =>'required',
            'username'              =>'required',           
         ]);

         $update_id= AdminUser::findOrFail($id);
         $update_id->update([
            'name'                     =>$request->name,
            'email'                    =>$request->email,
            'cell'                     =>$request->cell,
            'username'                 =>$request->username,
            'role_id'                  =>$request->role,
            'password'                 =>Hash::make('123456789')
         ]);
         return redirect()->route('adminuser.index')->with('success-mid', 'Successfully update user data');
      }


     



}
