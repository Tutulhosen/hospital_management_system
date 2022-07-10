<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        return 'okay';
       } else {
        return 'not okay';
       }
       
    }
}
