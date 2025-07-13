<?php
$phn = $_REQUEST["phone"];
$url = "https://api.shadhinmusic.com/api/v5/otp/otpreq";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);


$ps = array(
"msisdn"=> "88". $phn,"user"=>"sh@dHinOTP","servicename"=>"Shadhin Music","action"=>"Registration"
);

$data = json_encode($ps);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);

$resp = curl_exec($curl);
curl_close($curl);
echo($resp);

?>

