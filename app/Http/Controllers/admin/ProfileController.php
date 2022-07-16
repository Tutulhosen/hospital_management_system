<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * show profile page
     */

     public function ShowProfile()
     {
        
        return view('admin.profile.index');
     }

     /**
      * upload photo
      */
      public function UploadPhoto(Request $request, $id)
      {
         
         $update_id= AdminUser::findOrFail($id);
         if ($request->hasFile('photo')) {
            $file= $request->file('photo');
            $file_name= md5(time() . rand()) . '.' . $file->clientExtension();
            $file->move(storage_path('app/public/admin'), $file_name);
            if ($update_id->photo !='avatar.png') {
               unlink(storage_path('app/public/admin/' . $update_id->photo));
            }
            $update_id->update([
               'photo'     => $file_name
            ]);
            return back()->with('success', 'successfully upload your profile');
         } else {
            return back()->with('success=mid', 'select a photo first');
         }
         
      }


      /**
       * admin user password change
       */
      public function changePassword(Request $request, $id)
      {
         $this->validate($request, [
            'old_password'                   =>'required',
            'password'                       =>'required|confirmed',
            'password_confirmation'          =>'required',
         ]);

         $user_id= AdminUser::findOrFail($id);

         if (password_verify($request->old_password, $user_id->password)==false) {
            return back()->with('success-mid', 'incorrect old password');
         }else {
           $user_id->update([
            'password'        =>Hash::make($request->password)
           ]);
           return back()->with('success', 'successfully change the password');
         }






      }





}
