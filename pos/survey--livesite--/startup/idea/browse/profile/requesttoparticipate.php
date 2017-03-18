<?php

include("../../../../config.php"); //include config file


$sql4 = mysql_query("SELECT * FROM tbl_participant  WHERE userID = '".$_POST['userid']."' ");
$row4 = mysql_fetch_array($sql4);





$sql = "SELECT * FROM tbl_participant_project WHERE userID='".$_POST['userid']."' AND ProjectID= '".$_POST['projectid']."'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);

if(mysql_num_rows($result)<1)
{

$the_date = date('Y-m-d'); 
date_default_timezone_set('America/New_York');


$insert_sql = "INSERT INTO tbl_participant_project(userID, ProjectID, Requested_to_Participate, Monday, Tuesday, Wednesday, Thursday, Friday, Saturday, Sunday, Date) 
VALUES('".$_POST['userid']."','".$_POST['projectid']."','Yes', '".$_POST['monday']."', '".$_POST['tuesday']."' ,
	'".$_POST['wednesday']."', '".$_POST['thursday']."', '".$_POST['friday']."', '".$_POST['saturday']."', '".$_POST['sunday']."' ,'".$the_date."')";
mysql_query($insert_sql);    

$output = json_encode(array('type'=>'message', 'text' => '<div class="success">Request sent to '.$row4['FirstName'].' successfully!</div>'));
die($output);
 

}






	




	
?>