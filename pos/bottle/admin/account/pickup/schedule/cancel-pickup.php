<?php


session_start();
require_once '../../../class.customer.php';
include_once("../../../config.php");

//require( "phpmailer/class.phpmailer.php" );

$ip = $_SERVER['REMOTE_ADDR'];






if($_POST)
{


$sql5 = mysqli_query($connecDB,"SELECT * FROM tbl_customer WHERE userID='".$_SESSION['customerSession']."'");
$row5 = mysqli_fetch_array($sql5);


//$all_game_value = implode(",",$_POST['testing']);


$sql=mysqli_query($connecDB,"DELETE FROM pickups WHERE userID = '".$_SESSION['customerSession']."' AND Confirmed_Pickup_Date = '".$_POST['confirmed_pickup_date']."' 
    AND Confirmed_Pickup_Time = '".$_POST['confirmed_pickup_time']."'");



  $update_sql = mysqli_query($connecDB,"UPDATE tbl_customer SET 
  Confirmed_Pickup_Date='',
  Confirmed_Pickup_Time='',
  Schedule_Date_Option1='',
  Schedule_Time_Option1='',
  Schedule_Date_Option2='',
  Schedule_Time_Option2='',
  Schedule_Date_Option3='',
  Schedule_Time_Option3=''

  WHERE userID='".$_SESSION['customerSession']."'");










$output = json_encode(array('status' => 'success','text'=> '<div class="success">Successfully Pick Up Requested!</div>'));
die($output);



}


?>