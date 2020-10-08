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
                'network' => $request->network,
                'phone_number' => $request->phone_number,
                'amount' => $request->plan_size,
                'status' => 'SUCCESS'
            ]);
            //check if user registered with via an ambassador
            $registrationAmbCode = Auth::user()->registration_amb_code;
            if ($registrationAmbCode) {
                //credit ambassador with 0.3 coins
                $ambassadorWallet = User::where('amb_code', $registrationAmbCode)->select('fac_wallet_address')->first();
                WalletUtil::sendFAC("9FHIWNESTXKY7ZMA4STQSADZM6IQDHFHKEJYH2LUZT", $ambassadorWallet->fac_wallet_address, 0.3, 'AMBASSADOR-BONUS', $request->reference);

            }
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
