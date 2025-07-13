<?php

$link = $_GET['link'];
$type = $_GET['type'];
$cookie = $_GET['cookie'];

$data = [
    'post_id' => $link,
    'react_type' => $type,
    'version' => 'v1.7'
];

$headers = [
    'User-Agent: Dalvik/2.1.0 (Linux; U; Android 12; V2134 Build/SP1A.210812.003)',
    'Connection: Keep-Alive',
    'Accept-Encoding: gzip',
    'Content-Type: application/json',
    'Cookie: ' . $cookie
];

$ch = curl_init("https://flikers.net/android/android_get_react.php");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if ($result === false) {
    $error = curl_error($ch);
    echo json_encode(['error' => 'an error occurred: ' . $error]);
} else {
    echo $result;
}

curl_close($ch);

?>
