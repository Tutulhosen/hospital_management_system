<?php

namespace App\Http\Controllers\admin;

use App\Models\Speciality;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpecialityController extends Controller
{
    /**
     * shohw index page
     */
    public function index()
    {   
        $speciality_data= Speciality::latest()->get();
        $form_type= 'add';
        return view('admin.speciality.index', compact('speciality_data','form_type'));
    }

    /**
     * shohw edit page
     */
    public function edit($id)
    {   
        $edit_data  = Speciality::findOrFail($id);
        $speciality_data= Speciality::latest()->get();
        $form_type= 'edit';
        return view('admin.speciality.index', compact('speciality_data','form_type','edit_data'));
    }

    /**
     * create a speciality 
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'name'          =>'required|unique:specialities'
        ]);

        Speciality::create([
            'name'          => $request->name,
            'slug'          => Str::slug($request->name)
        ]);
        return back()->with('success', 'successfully add a speciality');
    }

    /**
     * delete a speciality data
     */
    public function destroy($id)
    {
        $delete_id= Speciality::findOrFail($id);
        $delete_id->delete();
        return back()->with('success-mid', 'Delete the speciality data');
    }

    /**
     * update the speciality data
     */
    public function update(Request $request ,$id)
    {
        $this->validate($request, [
            'name'          => 'required'
        ]);

        $update_data= Speciality::findOrFail($id);
        $update_data->update([
            'name'          =>$request->name,
            'slug'          =>Str::slug($request->name)
        ]);
        return back()->with('success-mid', 'successfully update the speciality data');
    }






}
