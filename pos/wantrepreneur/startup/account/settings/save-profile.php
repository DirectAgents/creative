<?php

session_start();
require_once '../../../class.startup.php';
include_once("../../../config.php");

//require( "phpmailer/class.phpmailer.php" );

$ip = $_SERVER['REMOTE_ADDR'];



if($_POST)
{


if($_POST['emailnotifications'] == ''){$emailnotifications = 'NULL';}else{$emailnotifications = $_POST['emailnotifications'];}
 


if($_POST['linkedin'] != ''){
if(strpos($_POST['linkedin'], "http://") !== false){
 $linkedin= $_POST['linkedin'];
}else{
 $linkedin= 'http://'.$_POST['linkedin'];
}
}else{
  $linkedin = '';
}


if($_POST['twitter'] != ''){
if(strpos($_POST['twitter'], "http://") !== false){
  $twitter= $_POST['twitter'];
}else{
  $twitter= 'http://'.$_POST['twitter'];
}
}else{
  $twitter= '';
}

if($_POST['facebook'] != ''){
if(strpos($_POST['facebook'], "http://") !== false){
  $facebook= $_POST['facebook'];
}else{
  $facebook= 'http://'.$_POST['facebook'];
}
}else{
  $facebook= '';
}


$formatted_number = preg_replace("/^(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $_POST['phone_number']);


//$all_game_value = implode(",",$_POST['testing']);

  $update_sql = mysqli_query($connecDB,"UPDATE tbl_startup SET 
  FirstName='".$_POST['firstname']."',
  LastName='".$_POST['lastname']."',
  userEmail='".$_POST['email']."',
  Phone='".$formatted_number."',
  City='".$_POST['city']."',
  State='".$_POST['state']."',
  Bio='".$_POST['bio']."',
  Linkedin='".$linkedin."',
  Twitter='".$twitter."',
  Facebook='".$facebook."',
  EmailNotifications='".$emailnotifications."'

  WHERE userID='".$_SESSION['startupSession']."'");




	
	    $output = json_encode(array('type'=>'message', 'text' => '<div class="success">Successfully Saved!</div>'));
		die($output);
	



}
?>