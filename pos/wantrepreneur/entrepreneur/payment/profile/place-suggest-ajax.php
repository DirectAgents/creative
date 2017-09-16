<?php

include("../../../../config.php"); //include config file


$sql4 = mysql_query("SELECT * FROM tbl_participant  WHERE userID = '".$_POST['userid']."' ");
$row4 = mysql_fetch_array($sql4);





$sql = "SELECT * FROM tbl_participant_request WHERE userID='".$_POST['userid']."' AND ProjectID = '".$_POST['projectid']."'
AND Day = '".$_POST['day']."'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);

if(mysql_num_rows($result)<1)
{

$the_date = date('Y-m-d'); 
date_default_timezone_set('America/New_York');
$the_time = date('h:i:s A');

$insert_sql = "INSERT INTO tbl_participant_request(userID, ProjectID, Accepted_to_Participate, Day, Time, Location, Date_Posted, Time_Posted) 
VALUES('".$_POST['userid']."','".$_POST['projectid']."','Pending' ,'".$_POST['day']."', '".$_POST['time_to_meet']."', '".$_POST['location']."' ,'".$the_date."', '".$the_time."')";
mysql_query($insert_sql);    

$output = json_encode(array('type'=>'message', 'text' => '<div class="success2">Request sent!</div>'));
die($output);
 
 

}else{

$output = json_encode(array('type'=>'message', 'text' => '<div class="errorXYZ">Request already sent!</div>'));
die($output);

}






	




	
?>