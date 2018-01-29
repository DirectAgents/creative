<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../class.investor.php';
 require_once '../base_path.php';
 include_once("../config.php"); 


if($_POST){

$sql = mysqli_query($connecDB,"SELECT * FROM tbl_entrepreneur WHERE linkedin_id='".$_POST['userid']."'");
$row = mysqli_fetch_array($sql);


$fullname = $_POST['firstname'].' '.$_POST['lastname'];

if(mysqli_num_rows($sql)<=0) {


$insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_entrepreneur(linkedin_id, Fullname, Email, linkedin_picture_link) 
	VALUES('".$_POST['userid']."', '".$fullname."', '".$_POST['email']."', '".$_POST['picture']."')");


$sql = mysqli_query($connecDB,"SELECT * FROM tbl_entrepreneur ORDER BY userID DESC");
$row = mysqli_fetch_array($sql);

$_SESSION['entrepreneurSession'] = $row['userID'];


}else{


$sql = "UPDATE tbl_entrepreneur SET 
Fullname='".$fullname."',
Email='".$_POST['email']."',
linkedin_picture_link='".$_POST['picture']."'


WHERE id='".$_SESSION['entrepreneurSession']."'";

mysqli_query($connecDB, $sql);


}

}


?>