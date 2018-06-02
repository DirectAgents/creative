<?php

 session_start();
 include_once("../config.php");
 require_once '../base_path.php'; 


require_once('../algoliasearch-client-php-master/algoliasearch.php');



$sql = mysqli_query($connecDB,"SELECT * FROM startups WHERE id='100'");
$row = mysqli_fetch_array($sql);


$sql_entrepreneur = mysqli_query($connecDB,"SELECT * FROM tbl_entrepreneur WHERE userID='".$row['userID']."'");
$row_entrepreneur = mysqli_fetch_array($sql_entrepreneur);


$response = array();

$response[] = array(
	'objectID'=> $row_entrepreneur['userID'],
	'name'=> 'ABC', 
	'industry'=> 'Tech',
	'location'=> 'New York'.',' .'NY', 
	'logo'=> 'thelogo',
	'fullname'=> $row_entrepreneur['Fullname'],
	'position'=> $row_entrepreneur['Position'],
	'alternative_name'=> null
	 );

$fp = fopen('startups.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);

//echo var_dump($response);

//Upload to algolia
$client = new \AlgoliaSearch\Client("F3O2TAOV5W", "a48a018178dec80cadba88cee14f169b");
$index = $client->initIndex('startups');

$records = json_decode(file_get_contents('startups.json'), true);

$chunks = array_chunk($records, 1000);

foreach ($chunks as $batch) {
  $index->addObjects($batch);
}


?>