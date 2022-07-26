<?php

namespace App\Http\Controllers\Admin;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminPatientController extends Controller
{
    /**
     * show index page
     */
    public function AdminPatientIndex()
    {
        $patient_data= Patient::latest()->get();
        $form_type='add';
        return view('admin.patient.index',compact('patient_data','form_type'));
    }

    /**
     * create a new patient
     */
    public function AdminPatientCreate(Request $request)
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
            'password'                  =>Hash::make($request->password),
        ]);
        return back()->with('success', 'Your registration is successfull');
    }


    /**
     * delete a patient data
     */
    public function AdminPatientDelete($id)
    {
       $delete_id= Patient::findOrFail($id);
       $delete_id->delete();
       return back()->with('success-mid', 'Delete a patient data');
    }

    /**
     * show edit page
     */
    public function AdminPatientEdit($id)
    {
        $edit_data= Patient::findOrFail($id);
        $patient_data= Patient::latest()->get();
        $form_type='edit';
        return view('admin.patient.index',compact('patient_data','form_type', 'edit_data'));
    }

    /**
     * update a patient data
     */
    public function AdminPatientUpdate(Request $request, $id)
    {
        $edit_id= Patient::findOrFail($id);
        $this->validate($request, [
            'name'                      =>'required',
            'email'                     =>'required',
            'cell'                      =>'required',

        ]);
        $edit_id->update([
            'name'                      =>$request->name,
            'email'                     =>$request->email,
            'cell'                      =>$request->cell,
        ]);
        return redirect()->route('admin.patient.index')->with('success-mid', 'Successfully update the patient data');
    }





}
