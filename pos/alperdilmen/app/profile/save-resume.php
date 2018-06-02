<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../base_path.php';
 include_once("../config.php"); 


if($_POST){


$sql = mysqli_query($connecDB,"SELECT * FROM tbl_users WHERE userID='".$_POST['userid']."'");
$row = mysqli_fetch_array($sql);


$sql = "UPDATE tbl_users SET 
Resume='".$_POST['resume']."'

WHERE userID='".$_POST['userid']."'";

mysqli_query($connecDB, $sql);




}

?>