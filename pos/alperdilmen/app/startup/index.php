<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../class.investor.php';
 require_once '../base_path.php';
 include_once("../config.php"); 


 $sql = "SELECT * FROM startups WHERE Name ='".$_GET['name']."'";  
 $result = mysqli_query($connecDB, $sql);  
 $row = mysqli_fetch_array($result);


if($row_startup['Name'] == ''){
  header("Location: ".BASE_PATH."/404/");
  exit();
}else{
include 'profile.php';
exit();	
}




?>