<?php

require_once ('../config.php');
require_once ('../config.inc.php');

$data = $_POST["payload"];
$retrievedData = json_decode($data, true);



$insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_feedbacks(data) VALUES('".$retrievedData."')");




$post = [
	  //'username' => 'mediaforce',
    //'password' => 'D!813media2017',
    'username' => 'offerweb',
    'password' => 'XVC32offerwebEr',
    //'username' => 'tenizen',
    //'password' => 'WqYktTenizenETR',
	//'username' => 'madrivo',
    //'password' => 'TRdCVUmadrivo250',
    //'username' => 'amobee',
    //'password' => 'ZYZ172amobeeHg',

    
    'firstname' => $_POST['firstname'],
    'lastname' => $_POST['lastname'],
    'email' => $_POST['email'],
    'zip' => $_POST['zip'],
    'phone' => $_POST['phone'],
    'pid' => $_POST['pid'],
    's1' => $_POST['s1'],
 
];



	$url = "http://misterpao.com/pipe/getvideo.php";
	$client = curl_init($url);
	curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($client, CURLOPT_POSTFIELDS, $post);
	$response = curl_exec($client);
	$result = json_decode($response);
	if( empty($result) ) {
		var_dump($response);
	} else {
		var_dump($response);
	}

?>