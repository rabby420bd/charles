<?php
$phn = $_REQUEST["phone"]; //get from url
$url = "https://webapi.robi.com.bd/v1/account/login/otp";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Host: webapi.robi.com.bd",
   "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/109.0",
   "Accept: application/json, text/plain, */*",
   "Accept-Language: en-US,en;q=0.5",
   "Accept-Encoding: gzip, deflate, br",
   "Content-Type: application/json",
   "Content-Length: 62",
   "Referer: https://www.robi.com.bd/",
   "X-CSRF-TOKEN: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJqdGkiOiJnaGd4eGM5NzZoaiIsImlhdCI6MTY5MDcwMzkxMywibmJmIjoxNjkwNzAzOTEzLCJleHAiOjE2OTA3MDc1MTMsInVpZCI6IjU3OGpmZkBoZ2hoaiIsInN1YiI6IlJvYmlXZWJTaXRlVjIifQ.Qqk0GtbGYcoisfonJQ3ZA_kyFCRuihCrEYk90Yhm0Y4",
   "Origin: https://www.robi.com.bd",
   "Sec-Fetch-Dest: empty",
   "Sec-Fetch-Mode: cors",
   "Sec-Fetch-Site: same-site",
   "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJqdGkiOiJnaGd4eGM5NzZoaiIsImlhdCI6MTY5MDcwMzkxMywibmJmIjoxNjkwNzAzOTEzLCJleHAiOjE2OTA3MDc1MTMsInVpZCI6IjU3OGpmZkBoZ2hoaiIsInN1YiI6IlJvYmlXZWJTaXRlVjIifQ.Qqk0GtbGYcoisfonJQ3ZA_kyFCRuihCrEYk90Yhm0Y4",
   "Connection: keep-alive",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);


$ps = array(
"phone_number"=>$phn,"password"=>"","redirectTo"=>null
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

