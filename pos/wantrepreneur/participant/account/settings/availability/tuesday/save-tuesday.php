<?php

session_start();
require_once '../../../../../class.participant.php';
include_once("../../../../../config.php");

//require( "phpmailer/class.phpmailer.php" );

$ip = $_SERVER['REMOTE_ADDR'];



if($_POST)
{


 


//$all_game_value = implode(",",$_POST['testing']);

  $update_sql = "UPDATE tbl_participant SET 
  Tuesday_From='".$_POST['tuesday_from']."',
  Tuesday_To='".$_POST['tuesday_to']."',
  Tuesday_Location='".$_POST['location']."'

  WHERE userID='".$_SESSION['participantSession']."'";


   mysql_query($update_sql);


	
	    $output = json_encode(array('type'=>'message', 'text' => '<div class="success">Successfully Saved!</div>'));
		die($output);
	



}
?>