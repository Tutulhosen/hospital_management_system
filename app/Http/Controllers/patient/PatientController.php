<?php

namespace App\Http\Controllers\patient;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appoinment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    /**
     * show register page
     */
    public function showRegPage()
    {
        return view('frontend.patient.register');
    }

    /**
     * craete a patient data
     */
    public function patientReg(Request $request)
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
     * appoinment list
     */
    public function patientAppoinment()
    {
        $appointment_data= Appoinment::latest()->get();
        return view('frontend.patient.appoinment', compact('appointment_data'));
    }
    /**
     * appoinment create page
     */
    public function patientAppoinmentCreatePage()
    {
        $doctor_data= Doctor::latest()->get();
        return view('frontend.patient.appoinmentCreate', compact('doctor_data'));
    }

    /**
     * create an appoinment from a register 
     */
    public function patientAppoinmentCreate(Request $request)
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
            'status'                =>'In Progress',
            'user_id'               =>Auth::guard('patient')->user()->id, 
        ]);
        return redirect()->route('patient.appoinment')->with('success', 'Successfully submit your appoinment');
    }

    /**
     * delete an appoinment
     */
    public function patientAppoinmentDelete($id)
    {
        $delete_id= Appoinment::findOrFail($id);
        $delete_id->delete();
        return back()->with('success', 'Delete the appoinment');
    }

   

    /**
     * show appoinment edit page
     */
    public function patientAppoinmentedit($id)
    {
        $edit_id= Appoinment::findOrFail($id);
        $doctor_data= Doctor::latest()->get();
        return view('frontend.patient.appoinmentEdit', compact('edit_id','doctor_data'));
    }

    /**
     * update appoinment info
     */
    public function patientAppoinmentupdate(Request $request, $id)
    {
        $update_id= Appoinment::findOrFail($id);
        $this->validate($request, [
            'name'              =>'required',
            'email'             =>'required',
            'cell'              =>'required',
            'doctor'            =>'required',
            'date'              =>'required',
        ]);
        $update_id->update([
                'name'                  =>$request->name,
                'email'                 =>$request->email,
                'cell'                  =>$request->cell,
                'doctor'                =>$request->doctor,
                'date'                  =>$request->date,
                'message'               =>$request->message, 
                'status'                =>'In Progress',
                'user_id'               =>Auth::guard('patient')->user()->id, 
        ]);
        return redirect()->route('patient.appoinment');
    }


    /**
     * patient logout
     */
    public function LogOut()
    {
        Auth::guard('patient')->logout();
        return redirect()->route('home.index');
    }







}
