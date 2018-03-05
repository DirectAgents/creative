<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../base_path.php';
 include_once("../config.php"); 
 require_once('../algoliasearch-client-php-master/algoliasearch.php');


if($_POST){


$sql = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE requested_id='".$_POST['requested_id']."' ");
$row = mysqli_fetch_array($sql);




if(mysqli_num_rows($sql) > 0) {


$myString = $row['requester_id'];
$myArray = explode(',', $myString);

$index = array_search($_POST['requester_id'],$myArray);



//////////////////////////////FOUND/////////////////////////////////////
if($index !== FALSE){



////////////////Likes////////////////



unset($myArray[$index]); //Delete userid
//print_r($myArray);
$likes_userid = implode(',', $myArray);

$sql_update = "UPDATE tbl_likes SET 
requester_id='".$likes_userid."',
Likes = Likes - 1

WHERE requested_id='".$_POST['requested_id']."'";

mysqli_query($connecDB, $sql_update); 	



////////////////Likes////////////////


echo "dislike";




}




}else{



//////////////////////////////NOT FOUND/////////////////////////////////////


////////////////Likes////////////////



$insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_likes(requester_id, requested_id, Industry, Likes) VALUES('".$_POST['like']."','".$_POST['requested_id']."', 
	'".$_POST['industry']."', Likes + 1)");



////////////////Likes////////////////



echo "like";





}











}

?>