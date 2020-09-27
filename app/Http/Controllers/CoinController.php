<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Settings;
use App\Models\User;
use App\Models\Ledger;
use Illuminate\Support\Facades\Log;
use App\Http\Utils\PaymentVerifier;
use App\Http\Utils\WalletUtil;
use Illuminate\Support\Str;



class CoinController extends Controller
{
    //
    public $systemAddress = "9FHIWNESTXKY7ZMA4STQSADZM6IQDHFHKEJYH2LUZT";
    public $networkFeeAddress ="9FOFWT8OXZQBJBU4QEHVMPG9YNJDL1Q0";

    public function purchasePage() {
        $price = Settings::where('setting','coin_price')->select('value')->first()->value;
      
        return view('dashboard.purchasecoin', ['price' => $price]);
    }

    public function confirmPayment(Request $request) {
        $verifyPayment = PaymentVerifier::verifyPaystackPayment($request->reference);
        if ($verifyPayment) {
            WalletUtil::sendFAC($this->systemAddress, Auth::user()->fac_wallet_address, $request->units, 'PAYSTACK-PURCHASE', $request->reference);
            return \json_encode(['success'=>true]);
        }
        else{
            return \json_encode(['success'=>false, 'msg'=>"Transaction could not be confirmed. Please contact support if problem persists"]);
        }

    }

    public function transferPage() {
        if (Auth::guard('admin')->user()) {
            return view('dashboard.admin.transfercoin');

        }
        return view('dashboard.transfercoin');
    }

    public function transfer(Request $request) {
        $receiverAddress = $request->receiver_address;
        $amount = $request->amount;

        $isAdmin = Auth::guard('admin')->user();

         //check if receiver wallet address does not exists
         if (!User::where('fac_wallet_address', $receiverAddress)->first()) {
             $location = $isAdmin ? 'admin/coin/transfer' : 'dash/coin/transfer';
            return redirect($location)->with('error', 'Receiver wallet addresss not found');

        }

        //if admin is transferring
        if ($isAdmin) {
            WalletUtil::sendFAC($this->systemAddress, $receiverAddress, $amount, 'ADMIN-TRANSFER', Str::random(10));
            return redirect('admin/coin/transfer')->with('success', 'Transfer successful');

        }


        $senderAddress = Auth::user()->fac_wallet_address;
     

        //check if user hass enough balance to send
        if ($amount > Auth::user()->coin_balance) {
            return redirect('dash/coin/transfer')->with('error', 'Insufficent coins in account balance')->withInput();
        }

        else {
            //deduct network fee
            $networkFee = $this->calculateNetworkFee($amount);
            WalletUtil::sendFAC($senderAddress, $this->networkFeeAddress, $networkFee, 'NETWORK-FEE', Str::random(10));

            //send coins
            WalletUtil::sendFAC($senderAddress, $receiverAddress, $amount, 'TRANSFER', Str::random(10));
            return redirect('dash/coin/transfer')->with('success', 'Transfer successful');


        }

    }

    private function calculateNetworkFee($amount) {
        return (3/100) * $amount;
    }

    public function receivePage() {
        return view('dashboard.receivecoin');
    }

    public function transactionHistoryPage() {
        if (Auth::guard('admin')->user()) {
            $transactions = Ledger::all();
            return view('dashboard.admin.transactionhistory', ['transactions' => $transactions]);
        }

        $user = Auth::user();
        $transactions = Ledger::where('receiver_address', $user->fac_wallet_address)
                                ->orWhere('sender_address', $user->fac_wallet_address)
                                ->get();
       
        return view('dashboard.transactionhistory', ['transactions' => $transactions]);
    }

   
}
