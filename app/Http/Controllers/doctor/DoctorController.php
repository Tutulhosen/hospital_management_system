<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    /**
     * show reguster page
     */
    public function showRegPage()
    {
        return view('frontend.doctor.register');
    }

    /**
     * doctor registration process
     */
    public function doctorReg(Request $request)
    {
       $this->validate($request, [
        'name'                  => 'required',
        'email'                 => 'required|unique:doctors',
        'cell'                  => 'required|unique:doctors',
        'password'              => 'required',
        'speciality'            => 'required',
        'room'                  => 'required',
       ]);

       Doctor::create([
        'name'                  =>$request->name,
        'email'                 =>$request->email,
        'cell'                  =>$request->cell,
        'password'              =>Hash::make($request->password),
        'speciality'            =>$request->speciality,
        'room'                  =>$request->room,
        'photo'                 =>'avatar.png'
       ]);
       return back()->with('success', 'Your registration is successfull. LogIn now');



    }

    /**
     * doctor profile page
     */
    public function profilePage()
    {
       return view('admin.doctor.profile');
    }


    /**
     * upload docotor profile photo
     */
    public function profilePhoto(Request $request, $id)
      {
         
         $update_id= Doctor::findOrFail($id);
         if ($request->hasFile('photo')) {
            $file= $request->file('photo');
            $file_name= md5(time() . rand()) . '.' . $file->clientExtension();
            $file->move(storage_path('app/public/doctor'), $file_name);
            if ($update_id->photo !='avatar.png') {
               unlink(storage_path('app/public/doctor/' . $update_id->photo));
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
       * change password
       */

       public function passwordChange(Request $request, $id)
       {
        $update_id= Doctor::findOrFail($id);
        $this->validate($request, [
            'old_password'                  =>'required',
            'password'                      =>'required|confirmed',
            'password_confirmation'         =>'required',
        ]);
        if (password_verify($request->old_password,$update_id->password )==false) {
            return back()->with('success-mid', 'Old password does no match');
        } else {
            $update_id->update([
                'password'      =>$request->password,
            ]);
            return back()->with('success'. 'successfully change your password');
        }
        
       }
    





}
