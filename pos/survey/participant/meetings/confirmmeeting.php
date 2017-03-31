<?php

session_start();
include ('../../config.php');


$ip = $_SERVER['REMOTE_ADDR'];

//echo $_SESSION['startupSession'];


if($_POST)
{



date_default_timezone_set('America/New_York');


$sql_participant = mysqli_query($connecDB,"SELECT * FROM tbl_meeting_recent WHERE ProjectID = '".$_POST['projectid']."' AND userID = '".$_POST['userid']."' AND startupID = '".$_POST['startupid']."'");
$row = mysqli_fetch_array($sql_participant);





  $update_sql = mysqli_query($connecDB,"UPDATE tbl_meeting_recent SET 
  Met = 'Yes'

  WHERE userID='".$_POST['userid']."' AND ProjectID= '".$_POST['projectid']."'");


 $insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_participant_meeting_participated(userID, ProjectID) VALUES('".$_POST['userid']."',
  '".$row['ProjectID']."')");

	

}	
	

	

?>