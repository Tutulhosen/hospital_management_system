<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
   /**
    * show role page
    */
    public function index()
    {
        $permission_data=Permission::latest()->get();
       return view('admin.adminPanel.role.index', compact('permission_data'));
    }
}
