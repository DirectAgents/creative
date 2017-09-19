<?php

session_start();
include ('../../config2.php');

//require( "phpmailer/class.phpmailer.php" );

$ip = $_SERVER['REMOTE_ADDR'];

//echo $_SESSION['startupSession'];


if($_POST)
{



// Delete data in mysql from row that has this id 
$sql = "DELETE FROM tbl_project_request WHERE userID='".$_SESSION['participantSession']."' AND ProjectID = '".$_POST['projectid']."'";
$result=mysql_query($sql);


	
	    $output = json_encode(array('type'=>'message', 'text' => $_POST['projectid']));
		die($output);
	
    //header("Location: index.php?s=success"); 



}	
	
	
	

?>