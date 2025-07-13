<?php

$phn = $_REQUEST["phone"];
$url = "https://us-central1-doctime-465c7.cloudfunctions.net/sendAuthenticationOTPToPhoneNumber";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
    'user-agent: Mozilla/5.0 (Linux; Android 14; 23021RAAEG Build/UKQ1.230917.001) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.6167.164 Mobile Safari/537.36',
    'accept: application/json',
    'accept-encoding: gzip, deflate, br, zstd',
    'content-length: ',
    'host: us-central1-doctime-465c7.cloudfunctions.net',
    'content-type: application/json'
    'accept: */*'
    'sec-ch-ua: "Not A(Brand";v="99", "Android WebView";v="121", "Chromium";v="121"'
   
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$ps = array(
    "phone" => $phn
);

$data = json_encode($ps);

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
die($resp);

?>

