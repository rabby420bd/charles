<?php

$phn = $_REQUEST["phone"];
$url = "https://core.easy.com.bd/api/v1/registration";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/109.0",
   "Referer: https://easy.com.bd/",
   "Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);


$ps = array(
   "name" => "Shahidul Islam",
   "email" => "uyrlhkgxqw@emergentvillage.org",
   "mobile" => $phn,
   "password" => "boss#2022",
   "password_confirmation" => "boss#2022",
   "device_key"=> "9a28ae67c5704e1fcb50a8fc4ghjea4d"
);

$data = json_encode($ps);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
echo($resp);

?>

