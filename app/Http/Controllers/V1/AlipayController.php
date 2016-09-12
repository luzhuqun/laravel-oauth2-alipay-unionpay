<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Omnipay;

class AlipayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function pay(){
        $date = date("Y-m-d H:i:s",time());
        $gateway = Omnipay::gateway();
        $gateway->setTimestamp($date);
        $options = [
            "out_trade_no" => date('YmdHis') . mt_rand(1000,9999),
            "total_amount" => "111",
            "subject" => "111",
        ];
        
        $response = $gateway->purchase($options)->send();
        $response->redirect();
      
    }

    public function query(){
        $date = date("Y-m-d H:i:s",time());
        $gateway = Omnipay::gateway();
        $gateway->setTimestamp($date);
        $options = [
            "out_trade_no" => '111',
        ];
        
        $response = $gateway->query($options)->send();
        $response->redirect();
      
    }

    public function refund(){
        $date = date("Y-m-d H:i:s",time());
        $gateway = Omnipay::gateway();
        $gateway->setTimestamp($date);
        $options = [
            "out_trade_no" => '111',
            "refund_amount" => '111',
        ];
        
        $response = $gateway->refund($options)->send();
        $response->redirect();
    }

    public function result(){

        $gateway = Omnipay::gateway();
        $gateway->setAlipayPublicKey('/key/rsa_public_key.pem');

        $options = [
            'request_params'=> array_merge($_POST, $_GET),
        ];

        $response = $gateway->completePurchase($options)->send();

        if ($response->isSuccessful() && $response->isTradeStatusOk()) {
            //支付成功后操作
            exit('支付成功');
        } else {
            //支付失败通知.
            exit('支付失败');
        }

    }
}
