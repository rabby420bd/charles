<?php
// replace with the actual phone number variable
$phone = $_GET['mobileNumber'];

// create the API endpoint URL
$api_url = "https://online.udvash-unmesh.com/Registration?nickName=Anonymous&mobileNumber=".$phone."&isResendOtp=True";

// use file_get_contents to make a GET request to the API endpoint
$response = file_get_contents($api_url);

// check for errors
if($response === FALSE) {
  // handle error
  echo "Error: Unable to connect to the API endpoint.";
  exit;
}

// process the response
// depending on the API's response format, you may need to parse the response here
// for example, if the response is in JSON format, you can use json_decode() to parse it

// for example, if the response is in JSON format, you can use json_decode() to parse it
$response_data = json_decode($response, TRUE);

// check if the API request was successful
if($response_data['status'] == 'success') {
  // handle success
  echo "Success: The OTP has been resent to the mobile number.";
} else {
  // handle error
  echo "Error: ".$response_data['message'];
}
?>
