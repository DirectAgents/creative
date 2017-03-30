<?php

session_start();
include ('../../config.php');


$ip = $_SERVER['REMOTE_ADDR'];

//echo $_SESSION['startupSession'];


if($_POST)
{



$sql=mysqli_query($connecDB,"DELETE FROM tbl_meeting_archived_participant WHERE ProjectID = '".$_POST['projectid']."' AND userID = '".$_POST['userid']."'");



}	
	

	

?>