<?php

// Function to make API request
function makeRequest($email) {
    $url = 'https://tempmail-api-r6cw.onrender.com/get/' . urlencode($email);

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
$email = $_REQUEST["email"];;

// Make request
$response = makeRequest($email);

// Output the response
echo $response;

?>
