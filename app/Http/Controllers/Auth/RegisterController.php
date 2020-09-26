<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Utils\DateUtil;
use App\Http\Utils\WalletUtil;
use App\Models\User;

class RegisterController extends Controller
{
    //

    public function registerPage() {
        return view('auth.register');

    }

    protected function validateRequest(Request $request)
    {
        return $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:11', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ]);
    }


    public function register(Request $request) {
       
        $newUserData = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'full_name' => $request->first_name.' '.$request->last_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'status' => 'ACTIVE',
            'last_login' => DateUtil::mysqlTimeStamp(),
            'dp' => 'images/avatar.png',
            'password' => Hash::make($request->password),
            'coin_balance' => 0,
            'fac_wallet_address' => WalletUtil::generateFACWalletAddress(),


        ];
            $this->validateRequest($request);
       
        $user = User::create($newUserData);

         Auth::login($user);

          return redirect()->intended('dash');


    }
}
