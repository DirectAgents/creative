<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../class.investor.php';
 require_once '../base_path.php';
 include_once("../config.php"); 
 require_once '../facebook-sdk-v5/autoload.php';


 $sql = "SELECT * FROM startups WHERE Name ='".$_GET['name']."'";  
 $result = mysqli_query($connecDB, $sql);  
 $row = mysqli_fetch_array($result);


  include 'startup-profile.php';
  exit();


?>