<?php

$fields = array(
    "sender_id" => "FSTSMS",
    "message" => "This is Test message",
    "language" => "english",
    "route" => "p",
    "numbers" => "9016647480",
    "flash" => "1"
);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($fields),
  CURLOPT_HTTPHEADER => array(
    "authorization: qeBhj1T9c0dypOXL6fso3Rni2Il7PFAbQgDSMJ5kW8ZtxvVHwuQ2hSCvWYMFpq5U7zrIJd4LfEGjPNTl",
    "accept: */*",
    "cache-control: no-cache",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}