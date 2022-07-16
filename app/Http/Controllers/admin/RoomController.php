<?php

namespace App\Http\Controllers\admin;

use App\Models\Room;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    /**
     * room index page
     */
    public function index()
    {
        $room_data= Room::latest()->get();
        $form_type='add';
        return view('admin.room.index', compact('room_data','form_type'));
    }

    /**
     * room edit page
     */
    public function edit($id)
    {
        $edit_id=Room::findOrFail($id);
        $room_data= Room::latest()->get();
        $form_type='edit';
        return view('admin.room.index', compact('room_data','form_type','edit_id'));
    }

    /**
     * create a room data
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'name'      =>'required'
        ]);
        Room::create([
            'name'      => $request->name,
            'slug'      =>Str::slug($request->name)
        ]);
        return back()->with('success', 'successfully add a room data');
    }

    /**
     * delete a room data
     */
    public function destroy($id)
    {
        $delete_id= Room::findOrFail($id);
        $delete_id->delete();
        return back()->with('success-mid', 'Delete the room data');
    }

    /**
     * update room data
     */
    public function update(Request $request ,$id)
    {
        $this->validate($request, [
            'name'          =>'required'
        ]);
        $update_data= Room::findOrFail($id);
        $update_data->update([
            'name'          =>$request->name,
            'slug'          =>Str::slug($request->name)
        ]);
        return redirect()->route('room.index')->with('success-mid', 'successfully update the room data');
    }





}
