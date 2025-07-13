<?php

$phn = $_REQUEST["phone"];
$url = "https://web.tallykhata.com/api/auth/init";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
     "okhttp/7.4",
   "Authorization: Basic c3luY191c2VyOlQhQjdZI0E5Jm48Y3M3QGM=",
   "Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);


$ps = array(
  "app_version_number" => "135","bp_code" =>"",
"device_id" =>"a50a63cf-2cef-4ced-bf9c-e7d24316d854",
"mobile" => $phn,
"request_type" => "LOGIN"

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

