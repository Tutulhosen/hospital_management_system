<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    /**
     * login process
     */
    public function logIn(Request $request)
    {
        $this->validate($request, [
            'email'            => 'required',
            'password'         => 'required',
        ]);
       if (Auth::guard('doctor')->attempt([
        'email'         => $request->email,
        'password'      => $request->password,
       ])) {
        return redirect()->route('doctor.profile');
       }elseif (Auth::guard('adminUser')->attempt([
        'email'         => $request->email,
        'password'      => $request->password,
       ])) {
        return redirect()->route('admin.index');
       }elseif (Auth::guard('patient')->attempt([
        'email'         => $request->email,
        'password'      => $request->password,
       ])) {

        return redirect()->route('home.index');
       } else {
        return back()->with('success-mid', 'Wrong email or password');

       }
       
    }






}
