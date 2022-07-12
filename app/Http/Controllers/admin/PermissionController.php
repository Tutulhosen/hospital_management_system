<?php

namespace App\Http\Controllers\admin;

use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    /**
     * show permission page
     */
    public function index()
    {
        $permission_data=Permission::latest()->get();
        $form_type= 'add';
        return view('admin.adminPanel.permission.index', compact('permission_data','form_type'));
    }

    /**
     * show permission edit page
     */
    public function edit($id)
    {
        $permission_id= Permission::findOrFail($id);
        $permission_data=Permission::latest()->get();
        $form_type= 'edit';
        return view('admin.adminPanel.permission.index', compact('permission_data','form_type','permission_id'));
    }

    /**
     * add permission process
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'name'          => 'required|unique:permissions'
        ]);
        Permission::create([
            'name'      => $request->name,
            'slug'      => Str::slug($request->name)
        ]);
        return back()->with('success', 'successfully add a permission');
    }

    /**
     * delete a permission data
     */
    public function destroy($id)
    {
        $delete_id= Permission::findOrFail($id);
        $delete_id->delete();
        return back()->with('success-mid', 'Delete the permission data');
    }


    /**
     * update permission data
     */
    public function update(Request $request, $id)
    {
       $this->validate($request, [
        'name'      =>'required'
       ]);
       $update_data= Permission::findOrFail($id);
       $update_data->update([
        'name'          =>$request->name,
        'slug'          =>Str::slug($request->name)
       ]);
       return redirect()->route('admin.permission')->with('success-mid', 'Successfully update the permission data');
    }








}
