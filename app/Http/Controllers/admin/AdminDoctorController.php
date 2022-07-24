<?php

namespace App\Http\Controllers\admin;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Speciality;
use Illuminate\Support\Facades\Hash;

class AdminDoctorController extends Controller
{
    /**
     * show doctor reg index page
     */
    public function index()
    {
        $doctor_data=Doctor::latest()->get();
        $room_data=Room::latest()->get();
        $speciality_data=Speciality::latest()->get();
        $form_type='add';
        return view('admin.doctor.index', compact('room_data','speciality_data','form_type','doctor_data'));
    }

    /**
     * show doctor edit index page
     */
    public function edit($id)
    {
        $doctor_id= Doctor::findOrfail($id);
        $doctor_data=Doctor::latest()->get();
        $room_data=Room::latest()->get();
        $speciality_data=Speciality::latest()->get();
        $form_type='edit';
        return view('admin.doctor.index', compact('room_data','speciality_data','form_type','doctor_data','doctor_id'));
    }

    /**
     * create doctor data
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'name'                  =>'required',
            'email'                 =>'required|email|unique:doctors',
            'cell'                  =>'required|unique:doctors',
            'password'              =>'required',
            'speciality'            =>'required',
            'room'                  =>'required',
        ]);
        Doctor::create([
            'name'                      =>$request->name,
            'email'                     =>$request->email,
            'cell'                      =>$request->cell,
            'password'                  =>Hash::make($request->password),
            'speciality'                =>$request->speciality,
            'room'                      =>$request->room,
            'photo'                     =>'avatar.png'
        ]);
        return back()->with('success', 'successfully add a doctor data');
    }


    /**
     * update doctor data
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'                  =>'required',
            'email'                 =>'required|email',
            'cell'                  =>'required',
            'speciality'            =>'required',
            'room'                  =>'required',
        ]);

        $update_id= Doctor::findOrFail($id);
        $update_id->update([
            'name'                      =>$request->name,
            'email'                     =>$request->email,
            'cell'                      =>$request->cell,
            'speciality'                =>$request->speciality,
            'room'                      =>$request->room,
        ]);
        return redirect()->route('admin.doctor.index')->with('success-mid', 'Successfully update doctor data');
    }

    /**
     * delete a doctor data
     */
    public function destroy($id)
    {
        $delete_id=Doctor::findOrFail($id);
        $delete_id->delete();
        return back()->with('success-mid', 'Doctor data is deleted');
    }








}
