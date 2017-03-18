<?php

session_start();
require_once '../../../../class.participant.php';
include_once("../../../../config.php");

//require( "phpmailer/class.phpmailer.php" );

$ip = $_SERVER['REMOTE_ADDR'];



if($_POST)
{



$date = new DateTime($_POST['date']);
$thedate =  $date->format('Y-m-d');


//$all_game_value = implode(",",$_POST['testing']);

  $update_sql = "UPDATE tbl_participant SET 
  Date_Availability='".$thedate."',
  From_Time='".$_POST['from_time']."',
  To_Time='".$_POST['to_time']."',
  Location='".$_POST['location']."'

  WHERE userID='".$_SESSION['participantSession']."'";


   mysql_query($update_sql);


	
	    $output = json_encode(array('type'=>'message', 'text' => '<div class="success">Successfully Saved!</div>'));
		die($output);
	



}
?>