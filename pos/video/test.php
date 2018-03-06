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




//if Found
if($index !== FALSE){

//print_r($myArray);

echo "found";

unset($myArray[$index]); //Delete userid

$likes_userid = implode(',', $myArray);

$sql_update = "UPDATE tbl_likes SET 
requester_id='".$likes_userid."',
Likes = Likes - 1   

WHERE requested_id='149'";

mysqli_query($connecDB, $sql_update);
  

}else{


//unset($myArray[$index]); //Delete userid



echo "not found";

$sql_update = "UPDATE tbl_likes SET 
requester_id='111',
Likes = Likes + 1   

WHERE requested_id='149'";

mysqli_query($connecDB, $sql_update);


}
















?>







