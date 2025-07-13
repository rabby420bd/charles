


<html >
<head>
    <title>Document</title>
</head>
<body bgcolor="#C417BA" >
    <h1>This Api Developed By Rabby Hossain</h1>
</body>
</html>
<?php

$phn = $_REQUEST['phone'];
$url = "https://eaccount.sjiblbd.com/VerifIDEXT/api/CustOnBoarding/VerifyMobileNumber";
$curl= curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
    "Content-Type: application/json",);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$ps = array(
    "AccessToken" => "",
    "TrackingNo" => "",
    "mobileNo" => $phn,
    "otpSms" => "",
    "product_id" => "121",
    "requestChannel" => "MOB",
    "trackingStatus" => 5);
$data = json_encode($ps);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
echo "<h2>$resp</h2>";
print "<h4>Copyright 2023 By Rabby Hossain <h4>";

?>

