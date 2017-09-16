<?php

session_start();
require_once '../../../class.participant.php';
include_once("../../../config.php");

//require( "phpmailer/class.phpmailer.php" );

$ip = $_SERVER['REMOTE_ADDR'];



if($_POST)
{


if($_POST['age'] >= 18){
$payment_method = 'Bank';
}else{
$payment_method = 'Cash';
}

if($_POST['emailnotifications'] == ''){$emailnotifications = '';}else{$emailnotifications = $_POST['emailnotifications'];}
 

if($_POST['age'] == ''){$age = '';}else{$age = $_POST['age'];}
if($_POST['height'] == ''){$height = '';}else{$height = $_POST['height'];}
if($_POST['status'] == ''){$status = '';}else{$status = $_POST['status'];}
if($_POST['gender'] == ''){$gender = '';}else{$gender = $_POST['gender'];}
if($_POST['ethnicity'] == ''){$ethnicity = '';}else{$ethnicity = $_POST['ethnicity'];}
if($_POST['smoke'] == ''){$smoke = '';}else{$smoke = $_POST['smoke'];}
if($_POST['drink'] == ''){$drink = '';}else{$drink = $_POST['drink'];}
if($_POST['diet'] == ''){$diet = '';}else{$diet = $_POST['diet'];}
if($_POST['religion'] == ''){$religion = '';}else{$religion = $_POST['religion'];}
if($_POST['education'] == ''){$education = '';}else{$education = $_POST['education'];}
if($_POST['job'] == ''){$job = '';}else{$job = $_POST['job'];}

if($_POST['interests'] == ''){$interests = '';}else{$interests = $_POST['interests'];}
if($_POST['languages'] == ''){$languages = '';}else{$languages = $_POST['languages'];}



$formatted_number = preg_replace("/^(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $_POST['phone_number']);


//$all_game_value = implode(",",$_POST['testing']);

  $update_sql = mysqli_query($connecDB,"UPDATE tbl_participant SET 
  FirstName='".$_POST['firstname']."',
  LastName='".$_POST['lastname']."',
  userEmail='".$_POST['email']."',
  Phone='".$formatted_number."',
  City='".$_POST['city']."',
  State='".$_POST['state']."',
  Bio='".$_POST['bio']."',
  Age='".$age."',
  Height='".$height."',
  Status='".$status."',
  Gender='".$gender."',
  Ethnicity='".$ethnicity."',
  Smoke='".$smoke."',
  Drink='".$drink."',
  Diet='".$diet."',
  Religion='".$religion."',
  Education='".$education."',
  Interests = '".$interests."',
  Languages = '".$languages."',
  Job='".$job."',
  Payment_Method='".$payment_method."',
  EmailNotifications='".$emailnotifications."'

  WHERE userID='".$_SESSION['participantSession']."'");


   


	
	  //$output = json_encode(array('type'=>'message', 'text' => '<div class="success">Successfully Saved!</div>'));
		//die($output);
	



}
?>