<?php
$phn = $_REQUEST["phone"];
$url = "https://cokestudio23.sslwireless.com/api/store-and-send-otp";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$ps = array( "msisdn"=>'88'. $phn,"name"=>"Sharmin","email"=>"sharminshila220@gmail.com","dob"=>"2000-08-01","occupation"=>"Student","gender"=>"female"
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

