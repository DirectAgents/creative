<?php

session_start();
include("../../config.php"); //include config file


$sql4 = mysql_query("SELECT * FROM tbl_participant  WHERE userID = '".$_SESSION['participantSession']."' ");
$row4 = mysql_fetch_array($sql4);





$sql = "SELECT * FROM tbl_project_request WHERE userID='".$_SESSION['participantSession']."' AND ProjectID = '".$_POST['projectid']."'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);

if(mysql_num_rows($result)<1)
{

$the_date = date('Y-m-d'); 
date_default_timezone_set('America/New_York');
$the_time = date('h:i:s A');


$insert_sql = "INSERT INTO tbl_project_request(userID, researcherID, ProjectID, Day, From_Time, To_Time, Location, Accepted_To_Participate, Requested_By, Date_Posted, Time_Posted) 
VALUES('".$_SESSION['participantSession']."', '".$_POST['researcherid']."','".$_POST['projectid']."','".$_POST['day']."', '".$_POST['fromtime']."', '".$_POST['totime']."', '".$_POST['location']."' , 'Pending', 'Participant' ,'".$the_date."','".$the_time."')";
mysql_query($insert_sql);    

$output = json_encode(array('type'=>'message', 'text' => '<div class="success2">Request sent!</div>'));
die($output);


 

}else{

$output = json_encode(array('type'=>'message', 'text' => '<div class="errorXYZ">Request already sent!</div>'));
die($output);

}






	




	
?>