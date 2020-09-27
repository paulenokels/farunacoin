<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Utils\DataBundleUtil;
use Illuminate\Support\Facades\Log;


class TestController extends Controller
{
    //

    public function checkClubKashBalance() {
      echo  DataBundleUtil::checkWalletBalance();
    }
}


