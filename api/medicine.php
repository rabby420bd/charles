<?php

// Set the name of the medicine you want to search for
$name = $_GET['name'];

// URL to the API
$url = "https://api.medeasy.health/api/patient/search-medicines/?q=" . urlencode($name) . "&from=0";

// Initialize cURL session
$curl = curl_init();

// Set cURL options
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Execute the request
$response = curl_exec($curl);

// Check for errors
if(curl_errno($curl)){
    echo 'Curl error: ' . curl_error($curl);
}

// Close cURL session
curl_close($curl);

// Decode the JSON response
$data = json_decode($response, true);

// Update the medicine_image path
if (isset($data['medicines'][0]['medicine_image'])) {
    $data['medicines'][0]['medicine_image'] = "https://medeasy.health/_next/image?url=https://cdn.medeasy.health" . $data['medicines'][0]['medicine_image'] . "&w=1920&q=75";
}

// Output the response as JSON
header('Content-Type: application/json');
echo json_encode($data);

?>
