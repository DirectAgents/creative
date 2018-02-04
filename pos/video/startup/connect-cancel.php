<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../base_path.php';
 include_once("../config.php"); 


if($_POST){


$sql=mysqli_query($connecDB,"DELETE FROM tbl_connect_requests WHERE requester_id = '".$_POST['requester_id']."' AND requested_id = '".$_POST['requested_id']."'");


}

?>