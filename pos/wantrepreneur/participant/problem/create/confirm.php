<?php

session_start();
include ('../../../config2.php');

//require( "phpmailer/class.phpmailer.php" );

$ip = $_SERVER['REMOTE_ADDR'];



if($_POST)
{

//$statusY = "Y";

//$all_game_value = implode(",",$_POST['testing']);

date_default_timezone_set('America/New_York');
$date = date('Y-m-d');  


  $update_sql = "UPDATE tbl_startup_project SET 
  ProjectStatus = '".$_POST['projectstatus']."',
  Date='".$date."', 
  Confirmed='Y'

  WHERE startupID='".$_SESSION['startupSession']."' AND id= '".$_SESSION['projectid']."'";



  

mysql_query($update_sql);










	
	    $output = json_encode(array('type'=>'message', 'text' => '<div style="text-align:center; font-size:18px; padding:10px; width:100%; background:#2bb90a; color:#fff; margin-bottom:15px;">Successfully Saved!</div>'));
		die($output);
	
    //header("Location: index.php?s=success"); 




	
	
	
	
	
}
?>