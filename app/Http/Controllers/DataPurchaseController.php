<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\DataPurchase;
use Illuminate\Support\Facades\Log;
use App\Http\Utils\PaymentVerifier;
use App\Http\Utils\DataBundleUtil;
use Illuminate\Support\Str;

class DataPurchaseController extends Controller
{
    //
    public function dataPurchasePage() {
        //DataBundleUtil::purchaseBundle('01', '1000', '07061097224', 'SOMERXAD');
        return view('dashboard.purchasedata');
    }

    public function confirmPayment(Request $request) {
        $verifyPayment = PaymentVerifier::verifyPaystackPayment($request->reference);
        if ($verifyPayment) {
            DataBundleUtil::purchaseBundle($request->network_code, $request->plan_size, $request->phone_number, $request->reference);
            DataPurchase::create([
                'user_id' => Auth::user()->id,
                'network' => 'MTN',
                'phone_number' => $request->phone_number,
                'amount' => $request->plan_size,
                'status' => 'SUCCESS'
            ]);
            return \json_encode(['success'=>true]);
        }
        else{
            return \json_encode(['success'=>false, 'msg'=>"Transaction could not be confirmed. Please contact support if problem persists"]);
        }

    }

    public function dataPurchaseHistoryPage() {
        $transactions = DataPurchase::all();
        return view('dashboard.admin.datapurchasehistory', ['transactions' => $transactions]);
    }


}
