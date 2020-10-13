<?php

namespace App\Http\Utils;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use App\Models\Ledger;
use App\Models\User;






/*
``This class is responsible for crediting the user account and
    also update the user earnings
*/

class WalletUtil {
    public static $systemAddress = "9FHIWNESTXKY7ZMA4STQSADZM6IQDHFHKEJYH2LUZT";

    public static function generateFACWalletAddress( ) {
       return  "9F".Str::upper(Str::random(30));


    }

    public static function sendFAC($senderAddress, $receiverAddress, $amount, $channel, $reference) {
        $sender = User::where('fac_wallet_address', $senderAddress)->first();
        $receiver = User::where('fac_wallet_address', $receiverAddress)->first();

        Log::info($receiver);
        //debit sender
        if ($sender) {
            $coinBalance = $sender->coin_balance - $amount;
            User::where('fac_wallet_address', $senderAddress)->update(['coin_balance' => $coinBalance]);
        }

        //credit receiver
        if ($receiver) {
            $coinBalance = $receiver->coin_balance + $amount;
            User::where('fac_wallet_address', $receiverAddress)->update(['coin_balance' => $coinBalance]);
        }

        //store transaction in ledger
        return Ledger::create([
            'sender_address' => $senderAddress, 
            'receiver_address' => $receiverAddress,
            'fac_amount' => $amount,
            'channel' => $channel,
            'reference' => $reference
        ]);
    }
}