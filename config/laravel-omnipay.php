<?php

return [

    // 默认支付网关
    'default' => 'alipay',

    // 各个支付网关配置
    'gateways' => [
        'paypal' => [
            'driver' => 'PayPal_Express',
            'options' => [
                'solutionType' => '',
                'landingPage' => '',
                'headerImageUrl' => ''
            ]
        ],

        'alipay' => [
            'driver' => 'Alipay_WapExpress',
            'options' => [
                "app_id" => '2016082000300403',
                "charset" => 'UTF-8',
                "sign_type" => 'RSA',
                "version" => '1.0',
            ]
        ],

        'unionpay' => [
            'driver' => 'UnionPay_Express',
            'options' => [
                'merId' => '777290058137526',
                'certPath' => '../public/unionpay/certs/700000000000001_acp.p12',
                'certPassword' =>'000000',
                'certDir'=>'../public/unionpay/certs',
                'returnUrl' => 'http://127.0.0.1:8888/unionpay/return',//frontUrl
                'notifyUrl' => 'http://127.0.0.1:8888',//backUrl
            ]
        ]
    ]

];