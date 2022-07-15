<?php

namespace App\Http\Controllers\admin;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
   /**
    * show role page
    */
    public function index()
    {
        $permission_data=Permission::latest()->get();
        $role_data= Role::latest()->get();
        $form_type= 'add';
       return view('admin.adminPanel.role.index', compact('permission_data', 'form_type', 'role_data'));
    }

    /**
    * show role edit page
    */
    public function edit($id)
    {   $role_id=Role::findOrFail($id);
        $permission_data=Permission::latest()->get();
        $role_data= Role::latest()->get();
        $form_type= 'edit';
       return view('admin.adminPanel.role.index', compact('permission_data', 'form_type', 'role_data', 'role_id'));
    }

    /**
     * create role data
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'name'      =>'required|unique:roles',
            
        ]);
        if ($request->per==true) {
            Role::create([
                'name'              =>$request->name,
                'slug'              =>Str::slug($request->name),
                'permission'        =>json_encode($request->per)
            ]);
            return back()->with('success', 'Successfully add permission');
        }else {
            Role::create([
                'name'              =>$request->name,
                'slug'              =>Str::slug($request->name),
                'permission'        =>json_encode([])
            ]);
            return back()->with('success', 'Successfully add permission');
        }

    }

    

    /**
     * delete a permission
     */
    public function destroy($id)
    {
        $delete_id= Role::findOrFail($id);
        $delete_id->delete();
        return back()->with('success-mid', 'Permission is deleted');
    }

    /**
     * update role data
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'      =>'required',

        ]);
        $update_data= Role::findOrFail($id);
        if ($request->per==true) {
            $update_data->update([
                'name'              =>$request->name,
                'slug'              =>Str::slug($request->name),
                'permission'        => json_encode($request->per)
            ]);
            return redirect()->route('admin.role')->with('success-mid', 'successfully update role');

        } else {
            $update_data->update([
                'name'              =>$request->name,
                'slug'              =>Str::slug($request->name),
                'permission'        => json_encode([])
                
            ]);
            return redirect()->route('admin.role')->with('success-mid', 'successfully update role');

        }
        
        
        
    }





}
