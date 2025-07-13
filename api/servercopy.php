<?php

$num = $_GET["nid"];
$msg = $_GET["dob"];

$url = "https://api2.pilgrimdb.org:8092/pilgrim/auth/get-token";

$postData = array(
    "username" => "haj_client_mobile",
    "password" => "egov.prp@2023.ba"
);

$headers = array(
    'User-Agent: Dart/3.0 (dart:io)',
    'Content-Type: application/x-www-form-urlencoded; charset=utf-8',
);

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 

$response = curl_exec($ch);
if(curl_errno($ch)){
    error_log('cURL error during the first request: ' . curl_error($ch));
}

$data = json_decode($response, true);
$token = $data['data']['token'];

if (isset($token)) {
    $secondUrl = "https://api2.pilgrimdb.org:8092/pilgrim/nid-verify";

    $secondPostData = array(
        "dob" => $msg,
        "nid" => $num,
    );

    $secondHeaders = array(
        'Content-Type: application/json; charset=utf-8',
        'apiauthorization: Bearer ' . $token,
    );

    $ch = curl_init($secondUrl);

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($secondPostData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $secondHeaders);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $secondResponse = curl_exec($ch);

    if(curl_errno($ch)){
        error_log('cURL error during the second request: ' . curl_error($ch));
    }

    curl_close($ch);
    echo ($secondResponse);

} else {
    echo json_encode(array("success" => false, "message" => "I don't know. Have error? Contact https://t.me/Api_zone_admin"));
    error_log('Access token not present in the response.');
}

?>
