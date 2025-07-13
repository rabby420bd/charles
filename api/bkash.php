<?php

$phn = $_REQUEST["phone"];
$url = "https://api.ims.bka.sh/v1.0.0/api/self/otp/send";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
    'user-agent: Dart/2.18 (dart:io)',
    'accept: application/json',
    'accept-encoding: gzip',
    'content-length: ',
    'host: api.ims.bka.sh',
    'content-type: application/json',
    'devicefingerprint: Android_5ffe7040c291d6851'
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



