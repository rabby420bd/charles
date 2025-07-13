<?php
$phn = $_REQUEST["phone"];
$url = "https://api.ghoorilearning.com/api/auth/signup/otp?_app_platform=web&_lang=bn";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/109.0",
   "Accept: application/json, text/plain, */*",
   "Accept-Language: en-US,en;q=0.5",
   "Accept-Encoding: gzip, deflate, br",
   "Content-Type: application/json",
   "Content-Length: 27",
   "Referer: https://ghoorilearning.com/",
   "Origin: https://ghoorilearning.com",
   "Sec-Fetch-Dest: empty",
   "Sec-Fetch-Mode: cors",
   "Sec-Fetch-Site: same-site",
   "Connection: keep-alive",
   "TE: trailers",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);


$ps = array(
"mobile_no" => $phn
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

