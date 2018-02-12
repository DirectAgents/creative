<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../base_path.php';
 include_once("../config.php"); 


if($_POST){

	

$sql = mysqli_query($connecDB,"SELECT * FROM tbl_users WHERE userID ='".$_POST['requester_id']."'");
if(mysqli_num_rows($sql) ) {
$row= mysqli_fetch_array($sql);



if($row['Type'] == 'Startup'){


$insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_connections_startup(my_id, requester_id, requested_id) 
	VALUES('".$_POST['requester_id']."','".$_POST['requester_id']."','".$_POST['requested_id']."')");

$insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_connections_investor(my_id, requester_id, requested_id) 
	VALUES('".$_POST['requested_id']."','".$_POST['requester_id']."','".$_POST['requested_id']."')");

}


if($row['Type'] == 'Investor'){

echo $row['Type'];


$insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_connections_startup(my_id, requester_id, requested_id) 
	VALUES('".$_POST['requested_id']."','".$_POST['requester_id']."','".$_POST['requested_id']."')");

$insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_connections_investor(my_id, requester_id, requested_id) 
	VALUES('".$row['userID']."','".$_POST['requester_id']."','".$_POST['requested_id']."')");

}



}

}

?>