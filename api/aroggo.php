
<html >
<head>
    <title>Document</title>
</head>
<body bgcolor="#57B0F4" >
    <h1>This Api Developed By Rabby Hossain</h1>
</body>
</html>
<?php

$phn = $_REQUEST['phone'];
$url = "https://api.arogga.com/v1/auth/sms/send?f=app&v=5.0.4&os=android&osv=23";
$curl= curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
    "Content-Type: application/x-www-form-urlencoded");
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
$data = "mobile=$phn&fcmToken=coLxIbnmQXO4InFPBKfX0p%253AAPA91bFRehhW-SXtS2smUqIMPxzC0k3aKo-PH2qVOu4d-HrHx6bc9MgKrFfXZH0OH0Y0pGTQWdBK6o1WqlGrXKgR-2NYNFCKewy-nxm4ADrA9ULKvy5MS6IoBYBVBkSt1sUOYhwLDOZj&referral=";
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
echo "<h2>$resp</h2>";
print "<h4>Copyright 2023 By Rabby Hossain <h4>";

?>
