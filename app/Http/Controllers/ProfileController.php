<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Models\User;

class ProfileController extends Controller
{
    //
    public function index() {
        return view('dashboard.profile');
    }

 

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone_number' => 'required|min:11|max:11',

        ]);

        if ($validator->fails()) {
            return redirect('dashboard/profile')
                        ->withErrors($validator)
                        ->withInput();
        }
        else {
            $duplicateEmail = User::where(['email' => $request->email])->where('id','!=',Auth::user()->id)->first();
            if ($duplicateEmail) {
                return redirect('dashboard/profile')
                        ->withErrors(['message'=> 'Email already in user by another user'])
                        ->withInput();
            }
            $duplicatePhone = User::where(['phone_number' => $request->phone_number])->where('id','!=',Auth::user()->id)->first();
            if ($duplicatePhone) {
                return redirect('dashboard/profile')
                        ->withErrors(['message'=> 'Phone Number already in user by another user'])
                        ->withInput();
            }
            $data = [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'full_name' => $request->first_name.' '.$request->last_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,

            ];

            if ($request->hasFile('profile_picture')) {
                $file = $request->profile_picture;
                $fileName = time().Str::random(10).'.'.$file->extension();  
                $request->file('profile_picture')->move(public_path('uploads/profile_pictures'), $fileName);
                $data['dp'] = "uploads/profile_pictures/$fileName"; 
            }

            User::where('id', Auth::user()->id)->update($data);
            return redirect ('dash')->with('success', 'Profile updated successfully');
        }
    }
   
}
