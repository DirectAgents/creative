<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../class.investor.php';
 require_once '../base_path.php';
 include_once("../config.php"); 


if($_POST){


$sql = mysqli_query($connecDB,"SELECT * FROM tbl_team WHERE id='".$_POST['id']."'");
$row = mysqli_fetch_array($sql);


if(mysqli_num_rows($sql)<=0) {

$insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_team(userID, Fullname, Position, About, Skills) VALUES('".$_POST['userid']."','".$_POST['fullname']."',
  '".$_POST['position']."', '".$_POST['about']."', '".$_POST['skills']."')");


}else{



$sql = "UPDATE tbl_team SET 
Fullname='".$_POST['fullname']."',
Position='".$_POST['position']."',
About='".$_POST['about']."',
Skills='".$_POST['skills']."'

WHERE id='".$_POST['id']."'";

mysqli_query($connecDB, $sql);


}


}

?>