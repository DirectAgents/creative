<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../class.investor.php';
 require_once '../base_path.php';
 include_once("../config.php"); 
 require_once '../facebook-sdk-v5/autoload.php';


 $sql = "SELECT * FROM tbl_users WHERE username ='".$_GET['username']."'";  
 $result = mysqli_query($connecDB, $sql);  
 $row = mysqli_fetch_array($result);

 $username = $_GET['username'];

include 'profile.php';
/*
if($row['Type'] == 'Entrepreneur'){
  include 'profile-entrepreneur.php';
  exit();
}

if($row['Type'] == 'Investor'){

  include 'profile-investor.php';
  exit();
}
*/
?>