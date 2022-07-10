<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * show index page
     */

     public function index()
     {
        return view('admin.index');
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
         } else {
            return back()->with('success-mid', 'Wrong email or password');
         }
         
      }




}
