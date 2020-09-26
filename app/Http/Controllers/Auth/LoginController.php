<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    //

    public function loginPage(Request $request) {
        return view('auth.login');

    }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');
        Log::info($credentials);

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('dash');
        }
        else {
            return redirect('login')
            ->withErrors(['error' => 'Invalid email or password'])
            ->withInput();
        }
    }


    public function logout() {

        //admin logout
        if (Auth::guard('admin')->user()) {
            Auth::guard('admin')->logout();
            return redirect('admin/login');

        }

        //user logout
        else {
            Auth::Logout();
            return redirect('login');
        }
       
    }

   
}
