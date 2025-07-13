<?php
$phn = $_REQUEST["phone"];
$url = "https://chokrojan.com/api/v1/passenger/login/mobile";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/109.0",
   "domain-name: chokrojan.com",
   "user-platform: 3",
   "company-id: 1",
   "Origin: https://chokrojan.com",
   "Referer: https://chokrojan.com/login",
   "Cookie: _ga_TXX7J24H07=GS1.1.1681140800.3.1.1681142406.0.0.0; _ga=GA1.1.162112941.1678173405; _fbp=fb.1.1678173407195.536316567",
   "Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);


$ps = array(
  "mobile_number" => $phn
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

