<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
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
        'email'                 => 'required',
        'cell'                  => 'required',
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
       ]);
       return back()->with('success', 'Your registration is successfull. LogIn now');



    }





}
