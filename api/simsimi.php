<?php
// Define the API URL and the question to ask
$apiUrl = "https://sadmananik.pro/simsimi/talk?ask=";
$question = $_GET['ask'];

// Function to make the API call
function getApiResponse($apiUrl, $question) {
    // Encode the question to be URL safe
    $encodedQuestion = urlencode($question);

    // Create the full API URL
    $fullUrl = $apiUrl . $encodedQuestion;

    // Initialize a cURL session
    $ch = curl_init();

    // Set the cURL options
    curl_setopt($ch, CURLOPT_URL, $fullUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute the cURL session and get the response
    $response = curl_exec($ch);

    // Close the cURL session
    curl_close($ch);

    return $response;
}

// Function to transform the response
function transformResponse($response) {
    // Decode the JSON response
    $responseData = json_decode($response, true);

    // Check if respSentence exists at the root level
    if (isset($responseData['respSentence'])) {
        // Assign respSentence to response
        $responseData['response'] = $responseData['respSentence'];
        // Remove the old respSentence
        unset($responseData['respSentence']);
    }

    // Return the modified response as JSON
    return json_encode($responseData);
}

// Get the API response
$apiResponse = getApiResponse($apiUrl, $question);

// Transform the API response
$transformedResponse = transformResponse($apiResponse);

// Print the transformed response
echo $transformedResponse;
?>
