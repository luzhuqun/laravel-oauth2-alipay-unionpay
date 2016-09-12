<?php
//Add the following lines to your routes.php

/**
 * OAuth
 */

//Get access_token
/**
 * client_id:f3d259ddd3ed8ff3843839b
 * client_secret:4c7f6f8fa93d59c45502c0ae8c4a95b
 * grant_type:password
 * username:test@test.com
 * password:password
 */
Route::post('oauth/access_token', function() {
 return Response::json(Authorizer::issueAccessToken());
});

//Create a test user, you don't need this if you already have.
Route::get('/register',function(){$user = new App\User();
 $user->name="tester";
 $user->email="test@test.com";
 $user->password = \Illuminate\Support\Facades\Hash::make("password");
 $user->save();
});

/**
 * Api
 */
$api = app('Dingo\Api\Routing\Router');

//Show user info via restful service.
$api->version('v1', ['namespace' => 'App\Http\Controllers'], function ($api) {
    $api->get('users', 'UsersController@index');
    $api->get('users/{id}', 'UsersController@show');

});

//Just a test with auth check.
$api->version('v1', ['middleware' => 'api.auth'] , function ($api) {
    $api->get('time', function () {
        return ['now' => microtime(), 'date' => date('Y-M-D',time())];
    });

	//支付宝支付处理   Dingo Api 控制器路径必须全 https://github.com/dingo/api/wiki/Creating-API-Endpoints
	$api->get('alipay', ['uses' => 'App\Http\Controllers\V1\AlipayController@pay']);
    $api->get('wap',  'App\Http\Controllers\V1\WapController@pay');
	$api->get('wap/query','App\Http\Controllers\V1\WapController@query');
	$api->get('wap/refund','App\Http\Controllers\V1\WapController@refund');
	$api->get('wap/refundQuery','App\Http\Controllers\V1\WapController@refundQuery');
	$api->get('wap/close','App\Http\Controllers\V1\WapController@close');
	$api->get('wap/billDownload','App\Http\Controllers\V1\WapController@billDownload');

	//银联支付处理
	$api->get('unionpay/pay','App\Http\Controllers\V1\UnionpayController@pay');
	//支付后回调页面
	$api->post('unionpay/return','App\Http\Controllers\V1\UnionpayController@result');
});