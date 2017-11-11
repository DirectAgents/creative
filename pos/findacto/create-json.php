<?php

 session_start();
 include_once("config.php");
 require_once 'base_path.php'; 


require_once('algoliasearch-client-php-master/algoliasearch.php');


$response = array();
//$posts = array();
$sql=mysqli_query($connecDB,"SELECT * FROM profile limit 20 ");
while($row=mysqli_fetch_array($sql)) 
{ 



$response[] = array(
	'objectID'=> $row['id'],
	'name'=> $row['Firstname'].' '.$row['Lastname'], 
	'profileimage'=> $row['ProfileImage'],
	'about'=> 'I am etc...', 
	'skills'=> explode(',', $row['Skills']),
	'workexamples'=> 'testing app',
	'interestedindustries'=> 'Finance',
	'position'=> 'CEO', 
	'lookingfor'=> 'Technical Co-Founder', 
	'location'=> 'New York, NY', 
	'asa'=> 'CTO',
	'for'=> 'Equity',
	'rating'=> 4875,
	'alternative_name'=> null
	
	 );

} 


$fp = fopen('results.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);

//echo var_dump($response);

//Upload to algolia
$client = new \AlgoliaSearch\Client("F3O2TAOV5W", "a48a018178dec80cadba88cee14f169b");
$index = $client->initIndex('developers');

$records = json_decode(file_get_contents('results.json'), true);

$chunks = array_chunk($records, 1000);

foreach ($chunks as $batch) {
  $index->addObjects($batch);
}


?>