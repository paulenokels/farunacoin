<?php
namespace App\Http\Utils;

class PaymentVerifier {

    public static function verifyPaystackPayment(string $reference) {
        //Log::Info($request->reference);
        //Log::Info($request->units);
        $result = array();
        //The parameter after verify/ is the transaction reference to be verified
        $url = 'https://api.paystack.co/transaction/verify/'.$reference;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt(
        $ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer sk_live_99376caa69ac6ad68ad6b22079b2d75c69be6fd7']
        );
        $request_ = curl_exec($ch);
        if(curl_error($ch)){
        echo 'error:' . curl_error($ch);
        }
        curl_close($ch);

        if ($request_) {
        $result = json_decode($request_, true);
        //Log::Error($result);

        }
       

        if (array_key_exists('data', $result) && array_key_exists('status', $result['data']) && ($result['data']['status'] === 'success')) {
            return TRUE;
        }
        return FALSE;
    }
}