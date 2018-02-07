<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../base_path.php';
 include_once("../config.php"); 


if($_POST){


$sql = "UPDATE tbl_connections_startup SET 
status='accepted'

WHERE requester_id = '".$_POST['requester_id']."' AND requested_id = '".$_POST['requested_id']."'";

mysqli_query($connecDB, $sql);


}

?>