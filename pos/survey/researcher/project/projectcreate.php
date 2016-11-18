<?php

session_start();
include ('../../config2.php');

//require( "phpmailer/class.phpmailer.php" );

$ip = $_SERVER['REMOTE_ADDR'];


date_default_timezone_set('America/New_York');
$date = date('Y-m-d');  

$insert_sql = "INSERT INTO tbl_researcher_project(researcherID, Name) VALUES('".$_SESSION['researcherSession']."',
  '".$_POST['projectname']."')";
mysql_query($insert_sql);    



$sql = "SELECT * FROM tbl_researcher_project WHERE researcherID='".$_SESSION['researcherSession']."' ORDER BY id DESC";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);




	
	    $output = json_encode(array('type'=>'message', 'text' => $row['id']));
		die($output);
	
    //header("Location: index.php?s=success"); 




	
	
	
	

?>