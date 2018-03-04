<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../base_path.php';
 include_once("../config.php"); 
 require_once('../algoliasearch-client-php-master/algoliasearch.php');


if($_POST){


$sql = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE requester_id='".$_POST['requester_id']."' AND requested_id='".$_POST['requested_id']."' ");
$row = mysqli_fetch_array($sql);


if(mysqli_num_rows($sql)<=0) {	


$insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_likes(requester_id, requested_id) VALUES('".$_POST['requester_id']."','".$_POST['requested_id']."')");

//echo "good";

$result_count = mysqli_query($connecDB,"SELECT requested_id, COUNT(DISTINCT requested_id) AS count FROM tbl_likes WHERE requested_id = '".$_POST['requested_id']."' GROUP BY requested_id");
$row_count = mysqli_fetch_assoc($result_count);
$count = $row_count['count'];


$sql_startup = mysqli_query($connecDB,"SELECT * FROM tbl_users LEFT JOIN startups ON startups.userID=tbl_users.userID WHERE tbl_users.userID='".$_POST['requested_id']."'");
$row_startup = mysqli_fetch_array($sql_startup);







if($count > 0 ){


//Update Popular Startups
$sql_update = "UPDATE tbl_top_rated_startups SET 
Likes='1'

WHERE Industry='Technology'";

mysqli_query($connecDB, $sql_update);


echo $count;


$response = array();

$response[] = array(
	'objectID'=> $row_startup['userID'],
	'startupID'=> $row_startup['userID'],
	'name'=> $row_startup['Name'], 
	'industry'=> $row_startup['Industry'],
	'location'=> $row_startup['City'].', '.$row_startup['State'], 
	'logo'=> $row_startup['Logo'],
	'video'=> $row_startup['Video'],
	'screenshot'=> $row_startup['Screenshot'],
	'fullname'=> $row_startup['Fullname'],
	'position'=> $row_startup['Position'],
	'likes'=> $count,
	'date'=> $row_startup['Date_Posted']
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




}


}else{

echo "no good";

}


}

?>