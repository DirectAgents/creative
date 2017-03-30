<?php

session_start();
include ('../../config.php');


$ip = $_SERVER['REMOTE_ADDR'];

//echo $_SESSION['startupSession'];


if($_POST)
{



$the_date = date('Y-m-d'); 
date_default_timezone_set('America/New_York');
$the_time = date('h:i:s A');


$sql_participant = mysqli_query($connecDB,"SELECT * FROM tbl_meeting_archived_startup WHERE ProjectID = '".$_POST['projectid']."' AND userID = '".$_POST['userid']."'");
$row = mysqli_fetch_array($sql_participant);



$sql=mysqli_query($connecDB,"DELETE FROM tbl_meeting_archived_startup WHERE ProjectID = '".$_POST['projectid']."' AND userID = '".$_POST['userid']."'");



}	
	

	

?>