<?php

// Function to make API request
function makeRequest($link) {
    $url = 'https://terabox-test1.vercel.app/api?data=' . urlencode($link);

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
$link = $_REQUEST["link"];;

// Make request
$response = makeRequest($link);

// Output the response
echo $response;

?>
