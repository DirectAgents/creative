<?php

session_start();
include ('../../config2.php');

//require( "phpmailer/class.phpmailer.php" );

$ip = $_SERVER['REMOTE_ADDR'];

$the_date = date('Y-m-d'); 
date_default_timezone_set('America/New_York');


if($_POST)
{

if($_POST['firstname'] == ''){$firstname = '';}else{$firstname = $_POST['firstname'];}
if($_POST['lastname'] == ''){$lastname = '';}else{$lastname = $_POST['lastname'];}
if($_POST['user_email'] == ''){$email = '';}else{$email = $_POST['user_email'];}
if($_POST['country_code'] == ''){$country_code = '';}else{$country_code = $_POST['country_code'];}
if($_POST['phone_number'] == ''){$phone_number = '';}else{$phone_number = $_POST['phone_number'];}
if($_POST['location'] == ''){$location = '';}else{$location = $_POST['location'];}
if($_POST['timezone'] == ''){$timezone = '';}else{$timezone = $_POST['timezone'];}
if($_POST['short_bio'] == ''){$short_bio = '';}else{$short_bio = $_POST['short_bio'];}
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



//$all_game_value = implode(",",$_POST['testing']);



  $update_sql = "UPDATE tbl_participant SET 
  FirstName='".$firstname."',
  LastName='".$lastname."',
  userEmail='".$email."',
  CountryCode='".$country_code."',
  Phone='".$phone_number."',
  Location='".$location."',
  Timezone='".$timezone."',
  Bio='".$short_bio."',
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
  Job='".$job."'

  WHERE userID='".$_SESSION['participantSession']."'";

  

mysql_query($update_sql);



      $output = json_encode(array('type'=>'message', 'text' => '<div class="success">Successfully Saved!</div>'));
    die($output);
  
    //header("Location: index.php?s=success"); 


  
  
}
?>