<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * show index page
     */

     public function index()
     {
        return view('admin.index');
     }







}
