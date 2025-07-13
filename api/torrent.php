<?php

// Get input text
$input = $_GET['input']; // Assuming input is sent via GET parameter

// URL to the API endpoint
$url = "https://tpb-visit.me/api.php?url=/q.php?q={$input}&cat=200";

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Bypass CORS errors
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Origin: tpb-visit.me',
    'Referer: null',
]);

// Execute cURL session
$response = curl_exec($ch);

// Check for errors
if(curl_errno($ch)){
    echo 'Curl error: ' . curl_error($ch);
}

// Close cURL session
curl_close($ch);

// Output the response
echo $response;

?>
