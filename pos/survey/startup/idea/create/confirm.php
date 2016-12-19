<?php

session_start();
include ('../../../config.php');

//require( "phpmailer/class.phpmailer.php" );

$ip = $_SERVER['REMOTE_ADDR'];



if($_POST)
{

//$statusY = "Y";

//$all_game_value = implode(",",$_POST['testing']);

date_default_timezone_set('America/New_York');
$date = date('Y-m-d');  


  $update_sql = mysqli_query($connecDB,"UPDATE tbl_startup_project SET 
  ProjectStatus = '".$_POST['projectstatus']."',
  Pay = '".$_POST['pay']."',
  Minutes = '".$_POST['minutes']."',
  Date_Created='".$date."', 
  FinishedProcess='Y'

  WHERE startupID='".$_SESSION['startupSession']."' AND ProjectID= '".$_SESSION['projectid']."'");



  










	
	    $output = json_encode(array('type'=>'message', 'text' => '<div style="text-align:center; font-size:18px; padding:10px; width:100%; background:#2bb90a; color:#fff; margin-bottom:15px;">Successfully Saved!</div>'));
		die($output);
	
    //header("Location: index.php?s=success"); 




	
	
	
	
	
}
?>