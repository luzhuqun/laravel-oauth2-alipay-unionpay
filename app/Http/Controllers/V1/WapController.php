<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Omnipay;
use Dingo\Api\Routing\Helpers;

class WapController extends Controller
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
            "product_code" => "QUICK_WAP_PAY"
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

    public function close(){
        $date = date("Y-m-d H:i:s",time());
        $gateway = Omnipay::gateway();
        $gateway->setTimestamp($date);
        $options = [
            "out_trade_no" => '111',
        ];
        
        $response = $gateway->close($options)->send();
        $response->redirect();
      
    }

    public function refundQuery(){
        $date = date("Y-m-d H:i:s",time());
        $gateway = Omnipay::gateway();
        $gateway->setTimestamp($date);
        $options = [
            "out_trade_no" => '111',
            "out_request_no" => '111',
        ];
        
        $response = $gateway->refundQuery($options)->send();
        $response->redirect();
      
    }

    public function billDownload(){
        $date = date("Y-m-d H:i:s",time());
        $gateway = Omnipay::gateway();
        $gateway->setTimestamp($date);
        $options = [
            "bill_type" => 'trade',
            "bill_date" => '2016-09',
        ];
        
        $response = $gateway->billDownload($options)->send();
        $response->redirect();
      
    }



    
}
