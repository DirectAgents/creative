<?php

session_start();
require_once '../../../class.customer.php';
include_once("../../../config.php");

//require( "phpmailer/class.phpmailer.php" );

$ip = $_SERVER['REMOTE_ADDR'];



if($_POST)
{




//$all_game_value = implode(",",$_POST['testing']);

  $update_sql = mysqli_query($connecDB,"UPDATE tbl_customer SET 
  Schedule_Date_Option1='".$_POST['date_option1']."',
  Schedule_Time_Option1='".$_POST['time_option1']."',
  Schedule_Date_Option2='".$_POST['date_option2']."',
  Schedule_Time_Option2='".$_POST['time_option2']."',
  Schedule_Date_Option3='".$_POST['date_option3']."',
  Schedule_Time_Option3='".$_POST['time_option3']."'

  WHERE userID='".$_SESSION['customerSession']."'");




  
      $output = json_encode(array('type'=>'message', 'text' => '<div class="success">Successfully Saved!</div>'));
    die($output);
  



}
?>