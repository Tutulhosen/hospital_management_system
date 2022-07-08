<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * show reguster page
     */
    public function showRegPage()
    {
        return view('frontend.doctor.register');
    }
}
