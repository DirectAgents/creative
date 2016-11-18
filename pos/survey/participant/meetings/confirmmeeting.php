<?php

session_start();
include ('../../config2.php');
require( "../../phpmailer/class.phpmailer.php" );

$ip = $_SERVER['REMOTE_ADDR'];

//echo $_SESSION['researcherSession'];


if($_POST)
{



date_default_timezone_set('America/New_York');


$sql_participant = "SELECT * FROM tbl_project_request WHERE ProjectID = '".$_POST['projectid']."' AND userID = '".$_POST['userid']."'";
$result_participant=mysql_query($sql_participant);
$row = mysql_fetch_array($result_participant);





  $update_sql = "UPDATE tbl_project_request SET 
  Met = 'Yes'

  WHERE userID='".$_POST['userid']."' AND ProjectID= '".$_POST['projectid']."'";

  mysql_query($update_sql);



	
	   
	
    //header("Location: index.php?s=success"); 


$sql_participant = "SELECT * FROM tbl_participant WHERE userID='".$_POST['userid']."'";
$result_participant=mysql_query($sql_participant);
$row2 = mysql_fetch_array($result_participant);





}	
	

	

?>