<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Auth;



class LoginController extends Controller 
{


    //
    public function showAdminLoginForm()
    {

        $admin = Auth::guard('admin')->user();
        if ($admin) {
            return redirect('/admin');
        }
        return view('auth.admin.login');
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], null)) {

            return redirect()->intended('/admin');
        }
        return back()->withInput($request->only('email', 'remember'))->withErrors(['error' => 'Invalid Email or Password']);
    }
}
