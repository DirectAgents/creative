<?php

session_start();
require_once '../../../class.startup.php';
include_once("../../../config.php");

//require( "phpmailer/class.phpmailer.php" );

$ip = $_SERVER['REMOTE_ADDR'];



if($_POST)
{


if($_POST['emailnotifications'] == ''){$emailnotifications = 'NULL';}else{$emailnotifications = $_POST['emailnotifications'];}
 


//$all_game_value = implode(",",$_POST['testing']);

  $update_sql = mysqli_query($connecDB,"UPDATE tbl_startup SET 
  FirstName='".$_POST['firstname']."',
  LastName='".$_POST['lastname']."',
  userEmail='".$_POST['email']."',
  Phone='".$_POST['phone_number']."',
  City='".$_POST['city']."',
  State='".$_POST['state']."',
  Bio='".$_POST['bio']."',
  Linkedin='".$_POST['linkedin']."',
  Twitter='".$_POST['twitter']."',
  Facebook='".$_POST['facebook']."',
  EmailNotifications='".$emailnotifications."'

  WHERE userID='".$_SESSION['startupSession']."'");




	
	    $output = json_encode(array('type'=>'message', 'text' => '<div class="success">Successfully Saved!</div>'));
		die($output);
	



}
?>