<?php
$phn = $_REQUEST["phone"];

$url = "https://moveon.com.bd/api/v1/customer/auth/phone/request-otp";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/109.0",
   "Origin: https://moveon.com.bd",
   "Alt-Used: moveon.com.bd",
   "Referer: https://moveon.com.bd/auth/register",
   "Cookie: _ga_859WPGTZ3G=GS1.1.1676461030.2.1.1676462180.60.0.0; _ga=GA1.1.721458614.1675951340; cw_conversation=eyJhbGciOiJIUzI1NiJ9.eyJzb3VyY2VfaWQiOiJmZWFjNGU1ZS05ZWFjLTRiNmUtOGE0NS0wYTZmZGIzYTEwM2IiLCJpbmJveF9pZCI6M30.LHi3LXYC1jwkCEToPcecMmbGAuswXhjwM0ezittu0I4; G_ENABLED_IDPS=google; _hjSessionUser_2677527=eyJpZCI6IjRhZWZjZDA3LTUzOWMtNTY3Yy05OWM3LWIyYmUwNDE0OTM4ZSIsImNyZWF0ZWQiOjE2NzY0NjEwNDIxMjMsImV4aXN0aW5nIjp0cnVlfQ==",
   "Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$ps = array(
   "phone" => $phn

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

