<?php





// jSON URL which should be requested
$json_url = 'http://rc.lendio.com/';
 
$username ='b35d7f9044fcdb2a785b3b1ab0d7ebfd2eaa7ae887efee9a06231a60c8394e44';
$password = '7e1b19f4e8f2f0cd9f9bbd60e139c351b5dbf77d4b07a4a99253ca83a15540b2';
 
// jSON String for request
//$json_string = '[your json string here]';

$json_string = array("affiliate" => "79967108", "campaign_info" => "campaign:partner" , "business_zip" => "10003","full_name" => "John D",
"business_zip"=>"10003", "business_zip"=>"10003", "finance_amount"=>"$1 - $5,000", "mobile_opt_in" => "1", "primary_line" => "mobile" );
 
// Initializing curl
$ch = curl_init( $json_url );
 
// Configuring curl options
$options = array(
CURLOPT_RETURNTRANSFER => true,
CURLOPT_USERPWD => $username . ":" . $password,   // authentication
CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
CURLOPT_POSTFIELDS => $json_string
);
 
// Setting curl options
curl_setopt_array( $ch, $options );
 
// Getting results
$result =  curl_exec($ch); // Getting jSON result string



echo json_encode($json_string);

?>