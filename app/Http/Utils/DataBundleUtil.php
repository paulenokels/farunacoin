<?php
namespace App\Http\Utils;
use Illuminate\Support\Facades\Log;


class DataBundleUtil {

    private static $userId = "CK100200689";
    private static $apiKey = "16T24343P26ZRW3KHHYTZ5I5Y42A8SUNC3P64N9UH413R71V89MXG5SN445N7I8S";

    public static function purchaseBundle( $networkCode, $planSize, $mobileNumber, $reference) {
        //Log::Info($request->reference);
        //Log::Info($request->units);
        $result = array();
        //The parameter after verify/ is the transaction reference to be verified
        $url = "https://www.nellobytesystems.com/APIDatabundleV1.asp?UserID=".DataBundleUtil::$userId."&APIKey=".DataBundleUtil::$apiKey."&MobileNetwork=$networkCode&DataPlan=$planSize&MobileNumber=$mobileNumber&RequestID=$reference&callback_url=farunacoin.com";
        Log::info($url);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      
        $request_ = curl_exec($ch);
        if(curl_error($ch)){
        echo 'error:' . curl_error($ch);
        }
        curl_close($ch);

        if ($request_) {
        $result = json_decode($request_, true);
        Log::Info($result);

        }
       
        if ($result && array_key_exists('statuscode', $result) && $result['statuscode'] == '100') {
            
            return true;
        }
       
        return false;
    }

    public static function checkWalletBalance() {
        $result = array();
        //The parameter after verify/ is the transaction reference to be verified
        $url = "https://www.nellobytesystems.com/APIWalletBalanceV1.asp?UserID=".DataBundleUtil::$userId."&APIKey=".DataBundleUtil::$apiKey;
        Log::info($url);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      
        $request_ = curl_exec($ch);
        if(curl_error($ch)){
        echo 'error:' . curl_error($ch);
        }
        curl_close($ch);

        if ($request_) {
        $result = json_decode($request_, true);
        Log::Info($result);

        }
       

        if (array_key_exists('balance', $result)) {
            Log::info("Balance is ".$result['balance']);
            return TRUE;
        }
        return FALSE;

    }
}