<?php

$username ='b35d7f9044fcdb2a785b3b1ab0d7ebfd2eaa7ae887efee9a06231a60c8394e44';
$password = '7e1b19f4e8f2f0cd9f9bbd60e139c351b5dbf77d4b07a4a99253ca83a15540b2';

//Contains encoded string to pass along for basic authentication purposes 
$auth_token = base64_encode($username . '-' . $password);


//Target URL - the URL you want to submit a form to
$target_url = "http://rc.lendio.com/?business_zip=10003&finance_amount=$1-$5,000&credit_score=(499 or Below) Poor&time_in_business=Not yet in business, still in planning stages&
annual_revenue=$0,  No Revenues&monthly_charges=None, I don't accept credit cards&accounts_receivable_amount=Do not have accounts receivable&equipment=Yes&real_estate=No&
full_name=Alper D&email=testDA@test.com&primary_phone=2129256558";



$ch = curl_init($target_url);


curl_setopt($ch, CURLOPT_USERPWD, $username . ':' . $password);



curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);

curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);

curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);


curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_MAXREDIRS, 5);


$response_data = curl_exec($ch);


echo $response_data;


echo processData($response_data);


if (curl_errno($ch)> 0){
die('There was a cURL error: ' . curl_error($ch));
} else {

curl_close($ch);
}

?>