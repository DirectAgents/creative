<?php

session_start();
include ('../../config2.php');

//require( "phpmailer/class.phpmailer.php" );

$ip = $_SERVER['REMOTE_ADDR'];

//echo $_SESSION['startupSession'];


if($_POST)
{



$update_sql = "UPDATE tbl_project_request SET 
  
  Accepted_To_Participate='Accepted'

  WHERE userID='".$_SESSION['participantSession']."' AND ProjectID = '".$_POST['projectid_accept']."'";

  

mysql_query($update_sql);


	
	    $output = json_encode(array('type'=>'message', 'text' => $_POST['projectid_accept']));
		die($output);
	
    //header("Location: index.php?s=success"); 



}	
	
	
	

?>