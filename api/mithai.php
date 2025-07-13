<?php
$phn = $_REQUEST["phone"];
$url = "https://mithaibd.com/api/login/?lang_code=en¤cy_code=BDT";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "user-agent: okhttp/4.2.2",
   "Authorization: Bearer bWlzNTdAcHJhbmdyb3VwLmNvbTpJWE94N1NVUFYwYUE0Rjg4Nmg4bno5V2I2STUzNTNBQQ==",
   "Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);


$ps = array(
"company_id"=>"2","password2"=>"Rahu333@@","currency_code"=>"BDT","user_type"=>"C","email"=>"fuckyoubro@gmail.com","g_id"=>"","lang_code"=>"en","operating_system"=>"Android","otp_verify"=>false,"password1"=>"Rahu333@@","phone"=>$phn,"storefront_id"=>"5"

);

$data = json_encode($ps);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
echo($resp);

?>

