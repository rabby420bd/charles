<?php
$phn = $_REQUEST["phone"];
$url = "https://chinaonlineapi.com/api/v1/get/otp?phone=".$phn;

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/109.0",
   "Accept: application/json, text/plain, */*",
   "Accept-Language: en-US,en;q=0.5",
   "Accept-Encoding: gzip, deflate, br",
   "token: gwkne73882b40gwgkef5150e91759f7a1282303230000000001utnhjglowjhmfl2585gfkiugmwp56092219",
   "Origin: https://chinaonlinebd.com",
   "Connection: keep-alive",
   "Referer: https://chinaonlinebd.com/",
   "Sec-Fetch-Dest: empty",
   "Sec-Fetch-Mode: cors",
   "Sec-Fetch-Site: cross-site",
   "TE: trailers",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
echo($resp);

?>

