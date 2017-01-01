<?php

session_start();
include("../../config.php"); //include config file








if($_POST){

$sql = mysqli_query($connecDB, "SELECT * FROM tbl_project_request WHERE userID='".$_POST['participantid']."' AND ProjectID = '".$_POST['projectid']."'");

if(mysqli_num_rows($sql) == 0)
{


$the_date = date('Y-m-d'); 
date_default_timezone_set('America/New_York');
$the_time = date('h:i:s A');



$insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_project_request(userID, startupID, ProjectID, Meeting_Status, Day, Final_Time, Location, Accepted_to_Participate, Status, Requested_By, Date_Posted, Time_Posted) 
VALUES('".$_POST['participantid']."', '".$_SESSION['startupSession']."','".$_POST['projectid']."', 'Meeting Request' ,'".$_POST['days_availability_option']."', '".$_POST['final_time_option']."', '".$_POST['location_option']."' , 'Pending', 'Waiting for Participant to Accept or Decline', 'Startup' , '".$the_date."','".$the_time."')");




$output = json_encode(array('type'=>'message', 'text' => '<div class="success2">Request to meet sent!</div>'));
die($output);

}else{

$output = json_encode(array('type'=>'message', 'text' => '<div class="errorXYZ">Request to meet already sent!</div>'));
die($output);

}





}

	




	
?>