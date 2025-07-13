<?php

// API endpoint
$url = 'http://starxcc.com/sscresult/api.php';

// Data to be sent in the GET request
$board = urlencode($board); // Assuming $board, $year, and $roll are defined somewhere
$year = urlencode($year);
$roll = urlencode($roll);
$url .= "?board=$board&year=$year&roll=$roll";

// Headers for the request
$headers = array(
    'Host: starxcc.com',
    'Connection: keep-alive',
    'Accept: */*',
    'X-Requested-With: XMLHttpRequest',
    'User-Agent: Mozilla/5.0 (Linux; Android 14; 23021RAAEG Build/UKQ1.230917.001) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.6367.124 Mobile Safari/537.36',
    'Origin: http://starxcc.com',
    'Referer: http://starxcc.com/sscresult/',
    'Accept-Encoding: gzip, deflate',
    'Accept-Language: en-GB,en-US;q=0.9,en;q=0.8'
);

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the request
$response = curl_exec($ch);

// Check for errors
if($response === false) {
    echo 'Error: ' . curl_error($ch);
}

// Close cURL session
curl_close($ch);

// Process the response
echo $response;

?>
