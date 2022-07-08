<?php

namespace App\Http\Controllers\patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * show register page
     */
    public function showRegPage()
    {
        return view('frontend.patient.register');
    }
}
