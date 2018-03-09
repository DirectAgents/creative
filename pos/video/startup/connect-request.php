<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../base_path.php';
 include_once("../config.php"); 


if($_POST){

	

$sql = mysqli_query($connecDB,"SELECT * FROM tbl_users WHERE userID ='".$_POST['requester_id']."'");
if(mysqli_num_rows($sql) > 0 ) {
$row= mysqli_fetch_array($sql);

date_default_timezone_set('America/New_York');
$date = date("Y-m-d");
$time = date('h:i:s A');  


if($row['Type'] == 'Entrepreneur'){


$insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_connections_startup(my_id, requester_id, requested_id, Date, Time) 
	VALUES('".$_POST['requester_id']."','".$_POST['requester_id']."','".$_POST['requested_id']."', '".$date."', '".$time."' )");

$insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_connections_investor(my_id, requester_id, requested_id, Date, Time) 
	VALUES('".$_POST['requester_id']."','".$_POST['requester_id']."','".$_POST['requested_id']."', '".$date."', '".$time."' )");

}


if($row['Type'] == 'Investor'){

//echo $row['Type'];


$insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_connections_startup(my_id, requester_id, requested_id, Date, Time) 
	VALUES('".$_POST['requester_id']."','".$_POST['requester_id']."','".$_POST['requested_id']."', '".$date."', '".$time."' )");

$insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_connections_investor(my_id, requester_id, requested_id, Date, Time)
	VALUES('".$_POST['requester_id']."','".$_POST['requester_id']."','".$_POST['requested_id']."', '".$date."', '".$time."' )");

}



}

}

?>