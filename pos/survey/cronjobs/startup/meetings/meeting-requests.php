<!DOCTYPE html>
<html>
<head>
<title>A Responsive Email Template</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />

</head>

<body>


<?php


include("../../../config.php"); //include config file




$sql=mysqli_query($connecDB,"SELECT * FROM tbl_meeting_request ORDER BY id DESC ");
//$result=mysql_query($sql);
//$row=mysql_fetch_array($result);

  //if username exists
if(mysqli_num_rows($sql)>0)
{
  //echo "asdf";


//get all records from add_delete_record table
while($row2 = mysqli_fetch_array($sql))
{ 


$sqlparticipant=mysqli_query($connecDB,"SELECT * FROM tbl_participant WHERE userID = '".$row2['userID']."'");
$rowparticipant=mysqli_fetch_array($sqlparticipant);   

$sqlstartup=mysqli_query($connecDB,"SELECT * FROM tbl_startup WHERE userID = '".$row2['startupID']."'");
$rowstartup=mysqli_fetch_array($sqlstartup);    

date_default_timezone_set('America/New_York');	

$date = date('Y-m-d');

$dtA = new DateTime($date);
$dtB = new DateTime($row2['Date_Option_Three']);

//echo $row2['Date_of_Meeting'];

if ( $dtA >  $dtB ) {


  //$update_sql = mysqli_query($connecDB,"UPDATE tbl_project_request SET Meeting_Status='Upcoming Meetings'
  //WHERE id = '".$row2['id']."' ");


date_default_timezone_set('America/New_York');
$the_date = date('Y-m-d'); 
$the_time = date('h:i:s A');



$insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_meeting_archived_startup(userID, startupID, ProjectID, Status, Viewed_by_Startup, Viewed_by_Participant, Date_of_Meeting, Final_Time, Location, Startup_Email_Recent_Meeting_Reminder_Sent ,Date_Posted, Time_Posted) VALUES('".$rowparticipant['userID']."','".$rowstartup['userID']."',
  '".$row2['ProjectID']."', 'Meeting Never Happened', '".$row2['Viewed_by_Startup']."', '".$row2['Viewed_by_Participant']."', '0000-00-00', '','', '', '".$the_date."','".$the_time."')");



$insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_meeting_archived_participant(userID, startupID, ProjectID, Status, Viewed_by_Startup, Viewed_by_Participant, Date_of_Meeting, Final_Time, Location, Startup_Email_Recent_Meeting_Reminder_Sent ,Date_Posted, Time_Posted) VALUES('".$rowparticipant['userID']."','".$rowstartup['userID']."',
  '".$row2['ProjectID']."', 'Meeting Never Happened', '".$row2['Viewed_by_Startup']."', '".$row2['Viewed_by_Participant']."', '0000-00-00', '','', '', '".$the_date."','".$the_time."')");


$sql=mysqli_query($connecDB,"DELETE FROM tbl_meeting_request WHERE ProjectID = '".$row2['ProjectID']."' AND userID = '".$row2['userID']."'");


}

} 

}


?>

</body>
</html>