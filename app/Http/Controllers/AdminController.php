<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DataPurchase;
use App\Models\Miners;
use App\Models\Settings;
use App\Models\Support;

//admin password: Faruna@20#1
class AdminController extends Controller
{
    //
    public function index() {
        $counts = [
            'users' => User::count(),
            'data' => DataPurchase::count(),
            'mining_licences' => Miners::count(),
            'reserve_amount' => Settings::where('setting', 'reserve')->first()->value,
            'support_messages' => Support::count(),

        ];
       return view ('dashboard.admin.index', ['counts' => $counts]);
    }
}
