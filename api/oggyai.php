<?php
// Set the content type to JSON
header('Content-Type: application/json');

// Check if the 'ask' parameter is provided in the request
if (empty($_REQUEST["ask"])) {
    $errorResponse = array("error" => "No input question provided");
    echo json_encode($errorResponse);
    exit;
}

$ask = $_REQUEST["ask"];
$url = "https://deku-rest-api.gleeze.com/gpt4?prompt=" . urlencode($ask) . "&uid=999";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_URL, $url);

$headers = array(
   "User-Agent: okhttp/4.7.0",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

// For debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);

// Check if the cURL request was successful
if ($httpCode != 200) {
    $errorResponse = array("error" => "cURL error: HTTP code " . $httpCode);
    echo json_encode($errorResponse);
    exit;
}

// Decode the JSON response
$responseData = json_decode($resp, true);

// Check if json_decode was successful
if (json_last_error() !== JSON_ERROR_NONE) {
    $errorResponse = array("error" => "JSON decode error: " . json_last_error_msg());
    echo json_encode($errorResponse);
    exit;
}

// Check if the 'gpt4' key exists in the JSON data
if (isset($responseData["gpt4"])) {
    $output = array("response" => $responseData["gpt4"]);
    echo json_encode($output);
} else {
    $errorResponse = array("error" => "Invalid response from API");
    echo json_encode($errorResponse);
}
?>
