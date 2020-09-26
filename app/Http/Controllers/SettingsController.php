<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\EarningSettings;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    //
    public function index() {
        $settings = [
            'coin_price' => Settings::where('setting', 'coin_price')->first(),
            'licence_price' => Settings::where('setting', 'licence_price')->first(),
            'reserve' => Settings::where('setting', 'reserve')->first()
        ];

     

        return view ('dashboard.admin.settings', ['settings' => $settings]);
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'coin_price' => 'required',
            'licence_price' => 'required',
            'reserve' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('admin/settings')
                        ->withErrors($validator)
                        ->withInput();
        }

        Settings::where('setting', 'coin_price')->update(['value' => $request->coin_price]);
        Settings::where('setting', 'licence_price')->update(['value' => $request->licence_price]);
        Settings::where('setting', 'reserve')->update(['value' => $request->reserve]);
        return redirect ('admin')->with('success', 'Site settings updated successfully');

    }

   
}
