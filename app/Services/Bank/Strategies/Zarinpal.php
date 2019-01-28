<?php

namespace App\Services\Bank\Strategies;

use App\Cash;
use App\Services\Bank\Bank;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;
use Validator;

class Zarinpal implements Bank
{
    public function __construct()
    {
        if (!extension_loaded('curl')) {
            die('cURL library is not loaded');
            exit;
        }
    }

    public function gatewayName(){
        return Cash::GATEWAY_ZARINPAL;
    }

    public function gateway(User $user,Cash $cash)
    {
        $client = new \SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

        $result = $client->PaymentRequest([
                'MerchantID' => config('bank.zarinpal.merchantId'),//Required
                'Amount' => $cash->Amount,//Amount will be based on Toman - Required
                'Description' => "پرداخت هزینه شرکت در استارت آپ",
                'Mobile' => $user->phoneNumber,
                'Email' => $user->email,
                'CallbackURL' => route('zarinpalRevertURL', ['user' => $user->id,'cash'=>$cash->id]),
            ]);
        //Redirect to URL You can do it also by creating a form
        if ($result->Status == 100) {
            $authority=ltrim($result->Authority, '0');
            Cache::put("zarinpalAuth:{$cash->id}", $authority, config('bank.zarinpal.request_lifetime', 17));
            return Redirect::to("https://www.zarinpal.com/pg/StartPay/{$authority}");

        } else {
            return view('dashboard.user.report', [
                'error' => $this->resultCode($result->Status),
            ]);
        }
    }

    function paymentVerification(Request $request, User $user,Cash $cash)
    {
        $cacheAuthority = Cache::pull("zarinpalAuth:{$cash->id}", null);
        $requestAuthority=ltrim($request->Authority, '0');
        if ($user->id==$cash->user_id && $cacheAuthority==$requestAuthority) {

            return [
                'msg' => ($request->Status == 'OK') ? "" : "تراکنش توسط کاربر لغو گردید.",
                'success' => ($request->Status == 'OK')
            ];   

        }
        return [
                'msg' => $this->resultCode($request->resultCode),
                'success' => false
            ];
    }

    public function paymentVerify(Request $request, Cash $cash)
    {
        $client = new \SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);
        $result = $client->PaymentVerification([
                'MerchantID' => config('bank.zarinpal.merchantId'),
                'Authority' => $request->Authority,
                'Amount' => $cash->Amount,
            ]);

        if ($result->Status == 100) {
            return [
                'success'=>true,
                'resultCode'=>$result->Status,
                'referenceId'=>$result->RefID
            ];
        } else {
            return  [
                'success'=>false,
                'resultCode'=>$result->Status,
                'referenceId'=>null
            ];
        }
    }

    public function resultCode($code)
    {
        return config("bank.zarinpal.status.{$code}", 'خطایی در پرداخت پیش امد. در صورت کم شدن مبلغ از حساب، به صورت خودکار بر خواهد گشت');
    }
}