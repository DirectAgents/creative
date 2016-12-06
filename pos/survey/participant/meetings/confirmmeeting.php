<?php

session_start();
include ('../../config.php');
require( "../../phpmailer/class.phpmailer.php" );

$ip = $_SERVER['REMOTE_ADDR'];

//echo $_SESSION['startupSession'];


if($_POST)
{



date_default_timezone_set('America/New_York');


$sql_participant = mysqli_query($connecDB,"SELECT * FROM tbl_project_request WHERE ProjectID = '".$_POST['projectid']."' AND userID = '".$_POST['userid']."'");
$row = mysqli_fetch_array($sql_participant);





  $update_sql = mysqli_query($connecDB,"UPDATE tbl_project_request SET 
  Met = 'Yes'

  WHERE userID='".$_POST['userid']."' AND ProjectID= '".$_POST['projectid']."'");




	
	   
	
    //header("Location: index.php?s=success"); 


$sql_participant = mysqli_query($connecDB,"SELECT * FROM tbl_participant WHERE userID='".$_POST['userid']."'");
$row2 = mysqli_fetch_array($sql_participant);





}	
	

	

?>