<?php

session_start();
include ('../../config.php');


$ip = $_SERVER['REMOTE_ADDR'];

//echo $_SESSION['startupSession'];


if($_POST)
{




$sql=mysqli_query($connecDB,"DELETE FROM tbl_meeting_archived_startup WHERE id = '".$_POST['id']."' AND ProjectID = '".$_POST['projectid']."' AND startupID = '".$_POST['startupid']."'");



}	
	

	

?>