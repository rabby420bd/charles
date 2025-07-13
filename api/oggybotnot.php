<?php

// Function to check if a bad word is present in the response
function hasBadWord($response) {
    $badWords = array("fuck", "fuck you", "Matherchod", "voda", "cudi", "bokachoda", "choda", "চুষবো", "চুদবো", "chusbo", "bainchood", "choda", "dick", "চুদি", "খানকি", "মাগি", "মাদারচোদ", "শাউয়া", "চোদ", "মাদারচুদ", "বাইন্সুদ", "motherchod", "magir", "motherchood", "khankirpola", "khanki", "bessa", "matherchod", "madarchod", "motharchod", "bhoda", "chusbo", "magi", "চোদা", "khankir", "khanki", "খানকির", "পুটকি", "পুটকির", "putki", "putkir", "bainchod", "chude", "চুদে", "চোদে", "চুদ", "tor mare", "chuida", "chuiida", "চুইদা", "Chudbo", "chudbo", "ভোদা", "বোদা", "pussy", "cdi", "chudi");
    foreach ($badWords as $badWord) {
        if (strpos($response, $badWord) !== false) {
            return true;
        }
    }
    return false;
}

// Function to make request to the API
function talkToSimSimi($message) {
    $url = "https://simsimi.fun/api/v2/?mode=talk&lang=bn&message=" . urlencode($message) . "&filter=true";
    $response = file_get_contents($url);
    return $response;
}

// Get the request message
$message = $_GET['message'];

// Make request to the API
$response = talkToSimSimi($message);

// Check if bad word is present in the response
if (hasBadWord($response)) {
    // Bad word detected, show alert
    $alert = json_encode(array("success" => "আমি সুশীল অগি"));
    echo $alert;
} else {
    // No bad word detected, show the response
    echo $response;
}
?>
