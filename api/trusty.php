<?php
$phn = $_REQUEST["phone"];
$url = "https://bmapi.social-trust.io/user/pin-codes";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/x-www-form-urlencoded",
   "User agent: okhttp/7.4"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);


$ps = array(
"phoneNumber" => $phn,
"country" => "BD"

);

$data = http_build_query($ps);

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
echo($resp);

?>

