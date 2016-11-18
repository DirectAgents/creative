<?php

session_start();
require_once '../../../class.researcher.php';
include_once("../../../config.php");

//require( "phpmailer/class.phpmailer.php" );

$ip = $_SERVER['REMOTE_ADDR'];



if($_POST)
{


if($_POST['emailnotifications'] == ''){$emailnotifications = 'NULL';}else{$emailnotifications = $_POST['emailnotifications'];}
 


//$all_game_value = implode(",",$_POST['testing']);

  $update_sql = "UPDATE tbl_researcher SET 
  FirstName='".$_POST['firstname']."',
  LastName='".$_POST['lastname']."',
  userEmail='".$_POST['email']."',
  Phone='".$_POST['phone_number']."',
  Location='".$_POST['location']."',
  Bio='".$_POST['bio']."',
  Linkedin='".$_POST['linkedin']."',
  Twitter='".$_POST['twitter']."',
  Facebook='".$_POST['facebook']."',
  EmailNotifications='".$emailnotifications."'

  WHERE userID='".$_SESSION['researcherSession']."'";


   mysql_query($update_sql);


	
	    $output = json_encode(array('type'=>'message', 'text' => '<div class="success">Successfully Saved!</div>'));
		die($output);
	



}
?>