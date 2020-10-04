<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;


class PageController extends Controller
{
    //

    public function index() {
        $data = [
            'reserve_amount' => Settings::where('setting', 'reserve')->first()->value
        ];
        return view ('site.index', $data);

    }
}
