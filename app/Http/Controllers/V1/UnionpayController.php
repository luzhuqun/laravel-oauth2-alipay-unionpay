<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Omnipay;

class UnionpayController extends Controller
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

        $gateway = Omnipay::gateway('unionpay');

        $order = [
            'orderId' => date('YmdHis'),
            'txnTime' => date('YmdHis'),
            'orderDesc' => 'My test order title', //订单名称
            'txnAmt' => '100', //订单价格
            'orderTimeoutInterval' => '600000', //订单接收超时时间
            'bizType'        => '000202',//交易类型
        ];

        $response = $gateway->purchase($order)->send();
        $response->redirect();
    }

    public function result(){

        $gateway = Omnipay::gateway('unionpay');
        $response = $gateway->completePurchase(['request_params'=>$_REQUEST])->send();
        if ($response->isPaid()) {
            exit('支付成功！');
        }else{
            exit('支付失败！');
        }
    }


    
}
