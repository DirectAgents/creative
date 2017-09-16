<?php

session_start();
include ('../../../config.php');

//require( "phpmailer/class.phpmailer.php" );

$ip = $_SERVER['REMOTE_ADDR'];



if($_POST)
{


//$all_game_value = implode(",",$_POST['testing']);

  $update_sql = mysqli_query($connecDB,"UPDATE tbl_startup_project SET 
  Details='".$_POST['details']."',
  Agenda_One='".$_POST['agenda_one']."'

  WHERE startupID='".$_SESSION['startupSession']."' AND ProjectID= '".$_SESSION['projectid']."'");



  











	
	    $output = json_encode(array('type'=>'message', 'text' => '<div class="success">Successfully Saved!</div>'));
		die($output);
	
    //header("Location: index.php?s=success"); 




	
	
	
	
	
}
?>