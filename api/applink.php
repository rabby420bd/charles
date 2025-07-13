<?php
$phn = $_REQUEST["phone"];
$url = "https://applink.com.bd/appstore-v4-server/login/otp/request";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/109.0",
   "Accept-Language: en-US,en;q=0.5",
   "Accept-Encoding: gzip, deflate, br",
   "Referer: https://applink.com.bd/",
   "Content-Type: application/json",
   "Content-Length: 26",
   "Origin: https://applink.com.bd",
   "Connection: keep-alive",
   "Sec-Fetch-Dest: empty",
   "Sec-Fetch-Mode: cors",
   "Sec-Fetch-Site: same-origin",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$ps = array(
"msisdn"=>"88" .$phn
);
$data = json_encode($ps);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
var_dump($resp);

?>

