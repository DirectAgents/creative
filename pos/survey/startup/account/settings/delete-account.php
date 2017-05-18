<?php

session_start();
require_once '../../../class.startup.php';
include_once("../../../config.php");

//require( "phpmailer/class.phpmailer.php" );

$ip = $_SERVER['REMOTE_ADDR'];



if($_POST)
{




$sql=mysqli_query($connecDB,"DELETE FROM tbl_startup WHERE userID = '".$_POST['userid']."'");



$sql1=mysqli_query($connecDB,"SELECT * FROM tbl_meeting_request WHERE startupID = '".$_POST['userid']."' ORDER BY id DESC ");

if(mysqli_num_rows($sql1)>0)
{

while($row2 = mysqli_fetch_array($sql1))
{ 
$sql=mysqli_query($connecDB,"DELETE FROM tbl_meeting_request WHERE startupID = '".$_POST['userid']."'");
}
}




$sql2=mysqli_query($connecDB,"SELECT * FROM tbl_meeting_upcoming WHERE startupID = '".$_POST['userid']."' ORDER BY id DESC ");

if(mysqli_num_rows($sql2)>0)
{

while($row2 = mysqli_fetch_array($sql2))
{ 
$sql=mysqli_query($connecDB,"DELETE FROM tbl_meeting_upcoming WHERE startupID = '".$_POST['userid']."'");
}
}



$sql3=mysqli_query($connecDB,"SELECT * FROM tbl_meeting_recent WHERE startupID = '".$_POST['userid']."' ORDER BY id DESC ");

if(mysqli_num_rows($sql3)>0)
{

while($row2 = mysqli_fetch_array($sql3))
{ 
$sql=mysqli_query($connecDB,"DELETE FROM tbl_meeting_recent WHERE startupID = '".$_POST['userid']."'");
}
}



$sql4=mysqli_query($connecDB,"SELECT * FROM tbl_meeting_archived_startup WHERE startupID = '".$_POST['userid']."' ORDER BY id DESC ");

if(mysqli_num_rows($sql4)>0)
{

while($row2 = mysqli_fetch_array($sql4))
{ 
$sql=mysqli_query($connecDB,"DELETE FROM tbl_meeting_archived_startup WHERE startupID = '".$_POST['userid']."'");
}
}



$sql5=mysqli_query($connecDB,"SELECT * FROM tbl_startup_project WHERE startupID = '".$_POST['userid']."' ORDER BY id DESC ");

if(mysqli_num_rows($sql5)>0)
{

while($row2 = mysqli_fetch_array($sql4))
{ 
$sql=mysqli_query($connecDB,"DELETE FROM tbl_startup_project WHERE startupID = '".$_POST['userid']."'");
}
}




$output = json_encode(array('type'=>'message', 'text' => '<div class="success">Account Successfully Deleted!</div>'));
die($output);
	



}
?>