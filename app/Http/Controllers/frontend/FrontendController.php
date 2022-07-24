<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
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






}
