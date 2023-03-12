<?php
$url = "https://uat.esewa.com.np/epay/main";
$data =[
    'amt'=> 100,//Amount of product or item or ticket etc
    'pdc'=> 0,//Delivery charge by merchant on product or item or ticket etc
    'psc'=> 0,//Service charge by merchant on product or item or ticket etc
    'txAmt'=> 0,//Tax amount on product or item or ticket etc
    'tAmt'=> 100,//Total payment amount including tax, service and deliver charge. [i.e tAmt = amt + txAmt + psc + tAmt
    'pid'=>'ee2c3ca1-696b-4cc5-a6be-2c40d929d453',//A unique ID of product or item or ticket etc
    'scd'=> 'EPAYTEST',//Merchant code provided by eSewa
    'su'=>'http://merchant.com.np/page/esewa_payment_success?q=su',//Success URL: a redirect URL of merchant application where customer will be redirected after SUCCESSFUL transaction
    'fu'=>'http://merchant.com.np/page/esewa_payment_failed?q=fu'//Failure URL: a redirect URL of merchant application where customer will be redirected after FAILURE or PENDING transaction
]

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);
        
?>