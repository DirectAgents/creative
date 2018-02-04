<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../base_path.php';
 include_once("../config.php"); 


if($_POST){


$insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_connect_requests(requester_id, requested_id) 
	VALUES('".$_POST['requester_id']."','".$_POST['requested_id']."')");

}

?>