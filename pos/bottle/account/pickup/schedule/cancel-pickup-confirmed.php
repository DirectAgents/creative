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


$sql=mysqli_query($connecDB,"DELETE FROM tbl_pickup_confirmed WHERE userID = '".$_SESSION['customerSession']."' AND Pickup_Date = '".$_POST['confirmed_pickup_date']."' AND Pickup_Time = '".$_POST['confirmed_pickup_time']."' AND id = '".$_POST['confirmed_pickup_id']."'");








$output = json_encode(array('status' => 'success','text'=> '<div class="success">Successfully Pick Up Canceled!</div>'));
die($output);



}


?>