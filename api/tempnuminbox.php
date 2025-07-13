<?php

// Function to make API request
function makeRequest($number) {
    $url = 'https://toolsyep.com/en/webpage-to-plain-text/?u=https://receive-smss.com/sms/' . urlencode($number);

    // Initialize cURL session
    $curl = curl_init($url);

    // Set cURL options
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    // Execute cURL session
    $response = curl_exec($curl);

    // Check for errors
    if ($response === false) {
        echo 'Error: ' . curl_error($curl);
    }

    // Close cURL session
    curl_close($curl);

    return $response;
}

// Example prompt
$number = $_REQUEST["number"];;

// Make request
$response = makeRequest($number);

// Output the response
echo $response;

?>
