<?php

session_start();
include ('../../config2.php');

//require( "phpmailer/class.phpmailer.php" );

$ip = $_SERVER['REMOTE_ADDR'];




$insert_sql = "INSERT INTO tbl_startup_project(startupID, Name) VALUES('".$_SESSION['startupSession']."',
  '".$_POST['projectname']."')";
mysql_query($insert_sql);    



$sql = "SELECT * FROM tbl_startup_project WHERE startupID='".$_SESSION['startupSession']."' ORDER BY id DESC";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);




	
	    $output = json_encode(array('type'=>'message', 'text' => $row['id']));
		die($output);
	
    //header("Location: index.php?s=success"); 




	
	
	
	

?>