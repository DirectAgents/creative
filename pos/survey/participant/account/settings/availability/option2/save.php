<?php

session_start();
require_once '../../../../../class.participant.php';
include_once("../../../../../config.php");

//require( "phpmailer/class.phpmailer.php" );

$ip = $_SERVER['REMOTE_ADDR'];



if($_POST)
{






$date = new DateTime($_POST['date']);
$thedate =  $date->format('Y-m-d');


//$all_game_value = implode(",",$_POST['testing']);

  $update_sql = mysqli_query($connecDB,"UPDATE tbl_participant SET 
  Date_Availability_Option2='".$thedate."',
  From_Time_Option2='".$_POST['from_time']."',
  To_Time_Option2='".$_POST['to_time']."',
  Location_Option2='".$_POST['location']."'

  WHERE userID='".$_SESSION['participantSession']."'");




  
      $output = json_encode(array('type'=>'message', 'text' => '<div class="success">Successfully Saved!</div>'));
    die($output);
  



}
?>