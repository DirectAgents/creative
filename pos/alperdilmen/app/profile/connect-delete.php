<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../base_path.php';
 include_once("../config.php"); 


if($_GET){


$sql = "SELECT * FROM tbl_users WHERE userID='".$_SESSION['entrepreneurSession']."'";  
$result = mysqli_query($connecDB, $sql);  
$row_entrepreneur = mysqli_fetch_array($result);

if($row_entrepreneur['Type'] == 'StartupE'){

$sql=mysqli_query($connecDB,"DELETE FROM tbl_connections_startup WHERE requester_id = '".$_GET['requester_id']."' AND requested_id = '".$_GET['requested_id']."'");

}


if($row_entrepreneur['Type'] == 'Investor'){

$sql=mysqli_query($connecDB,"DELETE FROM tbl_connections_investor WHERE requester_id = '".$_GET['requester_id']."' AND requested_id = '".$_GET['requested_id']."'");

}



}

?>