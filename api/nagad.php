<?php
header('Content-Type: application/json');

if (isset($_GET['number'])) {
    $number = $_GET['number'];

    // Validate and sanitize the input
    $sanitizedNumber = filter_var($number, FILTER_SANITIZE_NUMBER_INT);

    $url = "https://app.mynagad.com:20002/api/user/check-user-status-for-log-in?msisdn=" . $sanitizedNumber;

    $headers = array(
        "X-KM-User-AspId: 100012345612345",
        "X-KM-User-Agent: ANDROID/1152",
        "X-KM-DEVICE-FGP: 780878C0DB69EAAB0553C3C6",
        "X-KM-Accept-language: bn",
        "X-KM-AppCode: 01",
    );

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);

    $response = curl_exec($ch);

    if ($response === false) {
        $error = curl_error($ch);
        // Handle the cURL error appropriately
        $errorResponse = array(
            'error' => 'cURL Error: ' . $error
        );
        echo json_encode($errorResponse, JSON_PRETTY_PRINT);
    } else {
        $decodedResponse = json_decode($response, true);

        // Check operator based on number prefix
        $operator = '';
        $prefix = substr($sanitizedNumber, 0, 3);
        switch ($prefix) {
            case '013':
            case '017':
                $operator = 'Grameenphone';
                break;
            case '014':
            case '019':
                $operator = 'Banglalink';
                break;
            case '015':
                $operator = 'Teletalk';
                break;
            case '016':
                $operator = 'Airtel';
                break;
            case '018':
                $operator = 'Robi';
                break;
            default:
                $operator = 'Unknown';
                break;
        }

        // Replace userType result with "Customer" or "Agent"
        if (isset($decodedResponse['userType'])) {
            switch ($decodedResponse['userType']) {
                case 'CU':
                    $decodedResponse['userType'] = 'Customer';
                    break;
                case 'AG':
                    $decodedResponse['userType'] = 'Agent';
                    break;
            }
        }

        $decodedResponse['operator'] = $operator;

        // Check if the number is one of the specified values
        if ($sanitizedNumber === '01401603157' || $sanitizedNumber === '01400603157') {
            // Update the 'name' field to 'Anonymous'
            $decodedResponse['name'] = 'Anonymous';
        }

        $formattedResponse = array(
            'Dev' => 'Kingi Charles',
            'Tools' => 'Nagad Info',
            'Info' => $decodedResponse,
        );

        echo json_encode($formattedResponse, JSON_PRETTY_PRINT);
    }

    curl_close($ch);
} else {
    $emptyResponse = array(
        'message' => 'Please provide a valid "number" parameter.'
    );
    echo json_encode($emptyResponse, JSON_PRETTY_PRINT);
}
?>
