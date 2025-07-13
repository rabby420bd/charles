<?php
$phn = $_REQUEST["phone"];

$url = "https://api.eat-z.com/auth/customer/signin";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "User-Agent: Mozilla/5.0 (Linux; Android 13) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.5735.196 Mobile Safari/537.36",
   "Accept-Language: en-US,en;q=0.5",
   "Accept-Encoding: gzip, deflate, br",
   "Content-Type: application/json",
   "Content-Length: 29",
   "Origin: https://customer.khaodao.com",
   "Connection: keep-alive",
   "Referer: https://customer.khaodao.com/",
   "Sec-Fetch-Dest: empty",
   "Sec-Fetch-Mode: cors",
   "Sec-Fetch-Site: cross-site",
   "TE: trailers",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);


$ps = array(
"username" => "+88" . $phn
);
$data = json_encode($ps);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
printf($resp);

?>

