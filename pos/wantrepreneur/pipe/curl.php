<?php

require_once ('../config.php');
require_once ('../config.inc.php');


$post = ['userid' => '1'];



	$url = "https://misterpao.com/pipe/getvideo.php";
	$client = curl_init($url);
	curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($client, CURLOPT_POSTFIELDS, $post);
	$response = curl_exec($client);
	$result = json_decode($response);
	if( empty($result) ) {
		//var_dump($response);
        echo $response;
	} else {
		//var_dump($response);
        echo $response;
	}

?>