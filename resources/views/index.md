#Api使用手册
##dingoApi
###access_token
>Http请求地址: http://192.168.10.147:8002/oauth/access_token  
>请求方式：post

| 参数          | 描述                    | 示例                            |  
| --------      | -----:                  | :----:                          |  
| client_id     | oauth_clients表中id     | f3d259ddd3ed8ff3843839b         |  
| client_secret | oauth_clients表中secret | 4c7f6f8fa93d59c45502c0ae8c4a95b |  
| grant_type    | 认证方式                | password                        |  
| username      | user表中email           | test@test.com                   |  
| password      | user表中password        | password                        |  

<form action="http://192.168.10.147:8002/oauth/access_token" method="post">
    <input type="text" name="client_id" value="f3d259ddd3ed8ff3843839b">
    <input type="text" name="client_secret" value="4c7f6f8fa93d59c45502c0ae8c4a95b">
    <input type="text" name="grant_type" value="password">
    <input type="text" name="username" value="test@test.com">
    <input type="text" name="password" value="password">
    <input type="submit" value="提交测试" />
</form>

##支付宝Alipay
###[手机网站支付wap](https://doc.open.alipay.com/docs/doc.htm?spm=a219a.7629140.0.0.oZ2neQ&treeId=193&articleId=105287&docType=1)
>config/laravel-omnipay.php中  

```php
// 默认支付网关
    'default' => 'alipay',

     'alipay' => [
            'driver' => 'Alipay_WapExpress',
```

| 地址                                                          | 描述                                                         |
| --------                                                      | -----:                                                       |
| http://192.168.10.147:8002/api/wap?access token=              | 发起支付,填入accesstoken，交易成功后回调地址中会附带交易信息 |
| http://192.168.10.147:8002/api/wap/query?access token=        | 交易查询，填入accesstoken                                    |
| http://192.168.10.147:8002/api/wap/refund?access token=       | 退款请求，填入accesstoken                                    |
| http://192.168.10.147:8002/api/wap/refundQuery?access token=  | 退款查询，填入accesstoken                                    |
| http://192.168.10.147:8002/api/wap/close?access token=        | 关闭交易，填入accesstoken                                    |
| http://192.168.10.147:8002/api/wap/billDownload?access token= | 账单下载，填入accesstoken                                  |

###[当面付alipay](https://doc.open.alipay.com/docs/doc.htm?spm=a219a.7629140.0.0.tVs2QN&treeId=193&articleId=105203&docType=1)
>config/laravel-omnipay.php中 

```php
// 默认支付网关
    'default' => 'alipay',

     'alipay' => [
            'driver' => 'Alipay_Express',
```

| 地址                                                          | 描述                                                         |
| --------                                                      | -----:                                                       |
| http://192.168.10.147:8002/api/alipay?access token=              | 发起支付,填入accesstoken，交易成功后回调地址中会附带交易信息 |
| http://192.168.10.147:8002/api/alipay/query?access token=        | 交易查询，填入accesstoken                                    |
| http://192.168.10.147:8002/api/alipay/refund?access token=       | 退款请求，填入accesstoken                                    |
| http://192.168.10.147:8002/api/alipay/refundQuery?access token=  | 退款查询，填入accesstoken                                    |
| http://192.168.10.147:8002/api/alipay/cancel?access token=        | 关闭交易，填入accesstoken                                    |
| http://192.168.10.147:8002/api/alipay/billDownload?access token= | 账单下载，填入accesstoken                                  |

##银联unionpay
>不同的交易类型取决于app\Http\Controllers\V1\UnionpayController.php中的bizType值。  
[手机控件支付](https://open.unionpay.com/ajweb/product/detail?id=3)、[网关支付](https://open.unionpay.com/ajweb/product/detail?id=1)、[手机网页支付（WAP支付）](https://open.unionpay.com/ajweb/product/detail?id=66)：000201  
[企业网银支付](https://open.unionpay.com/ajweb/product/detail?id=65)：000202  
[无跳转支付](https://open.unionpay.com/ajweb/product/detail?id=2)：标准版000301、Token版000902   

>config/laravel-omnipay.php中 

```php
// 默认支付网关
    'default' => 'unionpay',

    'unionpay' => [
        'driver' => 'UnionPay_Express',
```

| 地址                                                          | 描述                                                         |
| --------                                                      | -----:                                                       |
| http://192.168.10.147:8002/api/unionpay?access token=              | 消费,填入accesstoken，交易成功后回调地址中会附带交易信息 |
| http://192.168.10.147:8002/api/unionpay/query?access token=        | 交易状态查询，填入accesstoken                                    |
| http://192.168.10.147:8002/api/unionpay/consumeUndo?access token=       | 消费撤销，填入accesstoken                                    |
| http://192.168.10.147:8002/api/unionpay/refund?access token=  | 退款查询，填入accesstoken                                    |
| http://192.168.10.147:8002/api/unionpay/fileTransfer?access token=        | 关闭交易，填入accesstoken                                    |
| http://192.168.10.147:8002/api/unionpay/result?access token= | 交易结果，填入accesstoken                                  |