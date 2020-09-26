<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Miners;
use App\Models\Settings;

class DashboardController extends Controller
{
    //

    public function index() {
        $miningLicences = Miners::where('user_id', Auth::user()->id);
        $data = [
            'miningLicences' => $miningLicences->count(),
            'coinPrice' => Settings::where('setting', 'coin_price')->first()->value,
        ];
     
        return view('dashboard.index', $data);
        
    }
}
