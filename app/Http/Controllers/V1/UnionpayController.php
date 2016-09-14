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
            'bizType'        => '000201',//交易类型
        ];

        $response = $gateway->purchase($order)->send();
        $response->redirect();
    }

    public function query(){

        $gateway = Omnipay::gateway('unionpay');

        $order = [
            'orderId' => date('YmdHis'),
            'txnTime' => date('YmdHis'),
            'bizType'        => '000201',//交易类型
        ];

        $response = $gateway->query($order)->send();
        $response->redirect();
    }

    public function consumeUndo(){

        $gateway = Omnipay::gateway('unionpay');

        $order = [
            'orderId' => date('YmdHis'),
            'txnTime' => date('YmdHis'),
            'txnAmt' => '100', //订单价格
            'reqReserved' => '', //商户自定义保留域
            'bizType'        => '000201',//交易类型
        ];

        $response = $gateway->consumeUndo($order)->send();
        $response->redirect();
    }

    public function refund(){

        $gateway = Omnipay::gateway('unionpay');

        $order = [
            'orderId' => date('YmdHis'),
            'txnTime' => date('YmdHis'),
            'txnAmt' => '100', //订单价格
            'reqReserved' => '', //商户自定义保留域
            'bizType'        => '000201',//交易类型
        ];

        $response = $gateway->refund($order)->send();
        $response->redirect();
    }

    public function fileTransfer(){

        $gateway = Omnipay::gateway('unionpay');

        $order = [
            'txnTime' => date('YmdHis'),
            'fileType' => '00 ', //文件类型
            'bizType'        => '000201',//交易类型
        ];

        $response = $gateway->fileTransfer($order)->send();
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
