<?php

session_start();
include("../../config.php"); //include config file








if($_POST){

$sql = mysqli_query($connecDB, "SELECT * FROM tbl_meeting_request WHERE userID='".$_POST['participantid']."' AND ProjectID = '".$_POST['projectid']."'");

if(mysqli_num_rows($sql) == 0)
{


$the_date = date('Y-m-d'); 
date_default_timezone_set('America/New_York');
$the_time = date('h:i:s A');


$date_option_one = new DateTime($_POST['date_option_one']);
$date_option_two = new DateTime($_POST['date_option_two']);
$date_option_three = new DateTime($_POST['date_option_three']);

if(!empty($_POST['date_option_one'])){
$date_option_one =  $date_option_one->format('Y-m-d');
}else{
$date_option_one = '0000-00-00';    
}

if(!empty($_POST['date_option_two'])){
$date_option_two =  $date_option_two->format('Y-m-d');
}else{
$date_option_two = '0000-00-00';    
}


if(!empty($_POST['date_option_three'])){
$date_option_three =  $date_option_three->format('Y-m-d');
}else{
$date_option_three = '0000-00-00';    
}



$insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_meeting_request(userID, startupID, ProjectID, Meeting_Status, Date_Option_One,Date_Option_Two,Date_Option_Three, Time_Option_One,Time_Option_Two,Time_Option_Three, Location, Accepted_to_Participate, Status, Requested_By, Date_Posted, Time_Posted) 
VALUES('".$_POST['participantid']."','".$_SESSION['startupSession']."', '".$_POST['projectid']."', 'Meeting Request' , '".$date_option_one."','".$date_option_two."','".$date_option_three."', '".$_POST['time_suggested_one']."','".$_POST['time_suggested_two']."','".$_POST['time_suggested_three']."', '".$_POST['location']."' , 'Pending', 'Waiting for Participant to Accept or Decline', 'Startup' , '".$the_date."','".$the_time."')");




$output = json_encode(array('type'=>'message', 'text' => '<div class="success2">Request to meet sent!</div>'));
die($output);

}else{

$output = json_encode(array('type'=>'message', 'text' => '<div class="errorXYZ">Request to meet already sent!</div>'));
die($output);

}





}

	




	
?>