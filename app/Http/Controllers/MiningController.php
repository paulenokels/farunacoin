<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Ledger;
use App\Models\Miners;
use App\Models\Settings;
use App\Http\Utils\PaymentVerifier;




class MiningController extends Controller
{
    //

    public function minningActivityPage() {
        $user = Auth::user();
        $transactions = Ledger::where(['receiver_address' =>  $user->fac_wallet_address, 'channel' => 'MINING'])->get();
       
        $miningAcount = Miners::where('user_id', $user->id)->get();
        $licencePrice = Settings::where('setting','licence_price')->select('value')->first()->value;


        return view('dashboard.minningactivity',
         ['transactions' => $transactions, 'miningAccount' => $miningAcount, 'licencePrice' => $licencePrice ]);
    }

    public function confirmLicencePayment(Request $request) {
        $paymentVerified = PaymentVerifier::verifyPaystackPayment($request->reference);
        if ($paymentVerified) {
           $data = [
               'user_id' => Auth::user()->id,
               'licence_type' => 'BASIC',
               'status' => 'ACTIVE',
               'expiry_date' =>date('Y-m-d', strtotime(date('Y-m-d'). ' + 90 days'))
           ];
           for ($i = 0; $i<$request->licences; $i++) {
               Miners::create($data);
           }
            return \json_encode(['success'=>true]);
        }
        else{
            return \json_encode(['success'=>false, 'msg'=>"Transaction could not be confirmed. Please contact support if problem persists"]);
        }

    }

    //admin action
    public function getMiners() {
        $miners = Miners::all();

        if ($miners->count()) {
            foreach ($miners as $miner) {
                $miner->full_name = User::where('id', $miner->user_id)->first()->full_name;
            }
        }
        return view ('dashboard.admin.miners', ['miners' => $miners]);
    }

}
