<?php

$phn = $_GET["number"];
$sms = $_GET["sms"];

// Your API endpoint URL
$url = "http://202.51.182.198:8181/nbp/sms/code";

// Prepare headers
$headers = array(
    "Authorization: Bearer",
    "Language: en",
    "Timezone: Asia/Dhaka",
    "Content-Type: application/json; charset=utf-8",
    "Content-Length: 137",
    "Host: 202.51.182.198:8181",
    "Connection: Keep-Alive",
    "Accept-Encoding: gzip",
    "User-Agent: okhttp/3.11.0"
);

// Prepare data to be sent
$data = json_encode(array(
    "receiver" => $phn,
    "text" => $sms,
    "title" => "Register Account"
));

// Initialize cURL session
$ch = curl_init($url);

// Set cURL options
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute cURL session
$response = curl_exec($ch);

// Close cURL session
curl_close($ch);

// Echo the JSON response directly
echo '{"status":"✅SMS Sent Successfully!"}';

?>
