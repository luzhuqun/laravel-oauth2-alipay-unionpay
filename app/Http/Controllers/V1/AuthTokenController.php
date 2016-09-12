<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use Omnipay;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AuthTokenController extends Controller
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
        $gateway->setAppId('2016082000300403');
        $gateway->setMethod('alipay.trade.precreate');
        $gateway->setCharset('UTF-8');
        $gateway->setSignType('RSA');
        $gateway->setTimestamp($date);
        $gateway->setVersion('1.0');
       
        $options = [
            "grant_type" => 'authorization_code',
            "code" => "46eda8ff21d14572b60c89afe2f8dX31",//20160907 申请 "app_auth_token":"201609BBed818dacedcd4111b0132cfda8467A31","app_refresh_token":"201609BBf8732b9c9f3445cb820c479a866f7X31",
    
        ];
        
        $response = $gateway->purchase($options)->send();
        $response->redirect();
      
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
