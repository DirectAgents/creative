<?php

session_start();
require_once '../../../../class.participant.php';
include_once("../../../../config.php");

//require( "phpmailer/class.phpmailer.php" );

$ip = $_SERVER['REMOTE_ADDR'];



if($_POST)
{




//$all_game_value = implode(",",$_POST['testing']);

  $update_sql = mysqli_query($connecDB,"UPDATE tbl_customer SET 
  Date_Option1='".$_POST['date']."',
  Time_Option1='".$_POST['time']."'

  WHERE userID='".$_SESSION['customerSession']."'");




  
      $output = json_encode(array('type'=>'message', 'text' => '<div class="success">Successfully Saved!</div>'));
    die($output);
  



}
?>