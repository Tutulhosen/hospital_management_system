<?php

namespace App\Http\Controllers\Appoinment;

use App\Http\Controllers\Controller;
use App\Models\Appoinment;
use Illuminate\Http\Request;

class AppoinmentController extends Controller
{
    /**
     * show appoinment
     */
    public function index()
    {
        $appoinment_data= Appoinment::latest()->get();
        return view('admin.appoinment.index', compact('appoinment_data'));
    }

    /**
     * reject an Appoinment
     */
    public function RejectAppoinment($id)
    {
        $reject_id= Appoinment::findOrFail($id);
        $reject_id->update([
            'status'        =>'cancel'
        ]);
        return back();
    }

    /**
     * delete an appoinment
     */
    public function DeleteAppoinment($id)
    {
        $Delete_id=Appoinment::findOrFail($id);
        $Delete_id->delete();
        return back()->with('success-mid', 'Appoinment is deleted');
    }

    /**
     * accept Appoinment
     */
    public function AcceptAppoinment($id)
    {
        $accept_id= Appoinment::findOrFail($id);
        $accept_id->update([
            'status'            =>'On Schedule'
        ]);
        return back();
    }




}
