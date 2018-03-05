<?php

include_once("config.php"); 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



$sql = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE requested_id='149' ");
$row = mysqli_fetch_array($sql);



$myString = $row['requester_id'];
$myArray = explode(',', $myString);
//print_r($myArray);







$index = array_search('111',$myArray);
//Found
if($index !== FALSE){
unset($myArray[$index]); //Delete userid
print_r($myArray);
$likes_userid = implode(',', $myArray);

print_r($likes_userid);

$sql_update = "UPDATE tbl_likes SET 
requester_id='".$likes_userid."',
Likes = Likes + 1   

WHERE requested_id='149'";

mysqli_query($connecDB, $sql_update);
  

}
















?>







