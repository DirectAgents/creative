<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../base_path.php';
 include_once("../config.php"); 
 require_once('../algoliasearch-client-php-master/algoliasearch.php');


if($_POST){


$sql = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE requested_id='".$_POST['requested_id']."' ");
$row = mysqli_fetch_array($sql);


$myString = $row['requester_id'];
$myArray = explode(',', $myString);

$index = array_search($_POST['requester_id'],$myArray);

//if startup found
if(mysqli_num_rows($sql) > 0) {



//////////////////////////////FOUND/////////////////////////////////////
if($index !== FALSE){


unset($myArray[$index]); //Delete userid
//print_r($myArray);
$likes_userid = implode(',', $myArray);

//print_r($likes_userid);

$sql_update = "UPDATE tbl_likes SET 
requester_id='".$likes_userid."',
Likes = Likes - 1   

WHERE requested_id='".$_POST['requested_id']."'";

mysqli_query($connecDB, $sql_update);



$sql1 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE requested_id='".$_POST['requested_id']."' ");
$row1 = mysqli_fetch_array($sql1);
//echo "dislike";

echo $row1['Likes'];





}else{




//////////////////////////////NOT FOUND/////////////////////////////////////


////////////////Likes////////////////



$sql_update = "UPDATE tbl_likes SET 
requester_id='".$_POST['requester_id']."' ',' '".$row['requester_id']."',
Likes = Likes + 1   

WHERE requested_id='".$_POST['requested_id']."'";

mysqli_query($connecDB, $sql_update);


$sql2 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE requested_id='".$_POST['requested_id']."' ");
$row2 = mysqli_fetch_array($sql2);


//echo "like";
echo $row2['Likes'];


////////////////Likes////////////////





}


//if startup not found
}else{



$insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_likes(requester_id, requested_id, Industry, Likes) VALUES('".$_POST['requester_id']."','".$_POST['requested_id']."', 
	'".$_POST['industry']."', Likes + 1)");


$sql3 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE requested_id='".$_POST['requested_id']."' ");
$row3 = mysqli_fetch_array($sql3);


echo $row3['Likes'];


}




////////////////////////Algolia////////////////////////////

$sql_startup = mysqli_query($connecDB,"SELECT * FROM tbl_users LEFT JOIN startups ON startups.userID=tbl_users.userID WHERE tbl_users.userID='".$_POST['requested_id']."'");
$row_startup = mysqli_fetch_array($sql_startup);


$sql4 = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE requested_id='".$_POST['requested_id']."' ");
$row4 = mysqli_fetch_array($sql4);

//if($row['Likes'] == 0){$likes = '0';}else{$likes = $row['Likes'];}


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
	'likes'=> $row4['Likes'],
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

?>