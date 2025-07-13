<?php
$phn1 = $_REQUEST["phone"];
$url = "https://api.pathao.com/v2/auth/register";
$phn = ltrim($phn1, '0');  //to remove 0 from 11 digit number
$ch = curl_init();
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "app-agent: ride/android/419",
   "android-os: 10",
   "Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);


$ps = array(
"country_prefix"=> "880","national_number"=> $phn,"country_id"=>1
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

