<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../base_path.php';
 include_once("../config.php"); 


if($_GET){


$sql = "UPDATE tbl_connections_entrepreneur SET 
status='accepted'

WHERE requester_id = '".$_GET['requester_id']."' AND requested_id = '".$_GET['requested_id']."'";

mysqli_query($connecDB, $sql);


$sql = "UPDATE tbl_connections_investor SET 
status='accepted'

WHERE requester_id = '".$_GET['requester_id']."' AND requested_id = '".$_GET['requested_id']."'";

mysqli_query($connecDB, $sql);

echo "good";


}

?>