<?php

namespace App\Http\Controllers\patient;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    /**
     * show register page
     */
    public function showRegPage()
    {
        return view('frontend.patient.register');
    }

    /**
     * craete a patient data
     */
    public function patientReg(Request $request)
    {
        $this->validate($request, [
            'name'                      =>'required',
            'email'                     =>'required',
            'cell'                      =>'required',
            'password'                  =>'required',
        ]);
        Patient::create([
            'name'                      =>$request->name,
            'email'                     =>$request->email,
            'cell'                      =>$request->cell,
            'password'                  =>Hash::make($request->name),
        ]);
        return back()->with('success', 'Your registration is successfull');
    }







}
