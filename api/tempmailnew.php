<?php

// API request script by Kingi Charles

$url = 'https://tempmail-api-r6cw.onrender.com/gen';

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
}

curl_close($ch);

echo $response;

?>
