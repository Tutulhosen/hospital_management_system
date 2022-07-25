<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Appoinment;
use App\Models\Doctor;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * show home page
     */
    public function index()
    {
        $doctor_data= Doctor::latest()->get();
        return view('frontend.home', compact('doctor_data'));
    }


   

    /**
     * show login page
     */
    public function login()
    {
       
        return view('frontend.login');
    }


    /**
     * create an appoinment wwithout registration
     */
    public function appoinmentCreate(Request $request)
    {
        $this->validate($request, [
            'name'              =>'required',
            'email'             =>'required',
            'cell'              =>'required',
            'doctor'            =>'required',
            'date'              =>'required',
        ]);
        Appoinment::create([
            'name'                  =>$request->name,
            'email'                 =>$request->email,
            'cell'                  =>$request->cell,
            'doctor'                =>$request->doctor,
            'date'                  =>$request->date,
            'message'               =>$request->message,
            
            
            
        ]);
        return back()->with('success', 'Successfully submit your appoinment');
    }






}
