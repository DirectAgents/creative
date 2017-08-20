<?php


session_start();
require_once '../../class.admin.php';
include_once("../../config.php");

//require( "phpmailer/class.phpmailer.php" );

$ip = $_SERVER['REMOTE_ADDR'];






if($_POST)
{


$sql5 = mysqli_query($connecDB,"SELECT * FROM tbl_customer WHERE userID='".$_POST['userid']."'");
$row5 = mysqli_fetch_array($sql5);


$sql_participant = mysqli_query($connecDB,"SELECT * FROM tbl_pickup_upcoming WHERE id = '".$_POST['id']."' AND userID = '".$_POST['userid']."'");
$row = mysqli_fetch_array($sql_participant);





date_default_timezone_set('America/New_York');
$the_date = date('Y-m-d'); 
$the_time = date('h:i:s A');


$insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_pickup_finished(userID, taskID, Pickup_Date, Pickup_Time) 
VALUES('".$_POST['userid']."', '".$row['id']."','".$row['Pickup_Date']."', '".$row['Pickup_Time']."')");



$sql=mysqli_query($connecDB,"DELETE FROM tbl_pickup_upcoming WHERE userID = '".$_POST['userid']."'");







$date_of_pickup = date('F j, Y',strtotime($date_of_pickup)).' @ '.$time;










$output = json_encode(array('status' => 'success','text'=> '<div class="success">Successfully Confirmed Pick-up!</div>'));
die($output);



}


?>