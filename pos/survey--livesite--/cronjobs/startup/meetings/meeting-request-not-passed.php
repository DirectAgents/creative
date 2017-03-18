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




$sql=mysqli_query($connecDB,"SELECT * FROM tbl_meeting_request WHERE ScreeningQuestion = 'Not Passed' ORDER BY id DESC ");

//$result=mysql_query($sql);
//$row=mysql_fetch_array($result);

  //if username exists
if(mysqli_num_rows($sql)>0)
{
  //echo "asdf";


//get all records from add_delete_record table
while($row = mysqli_fetch_array($sql))
{ 


$sqlparticipant=mysqli_query($connecDB,"SELECT * FROM tbl_participant WHERE userID = '".$row['userID']."'");
$rowparticipant=mysqli_fetch_array($sqlparticipant);   

$sqlstartup=mysqli_query($connecDB,"SELECT * FROM tbl_startup WHERE userID = '".$row['startupID']."'");
$rowstartup=mysqli_fetch_array($sqlstartup);    

date_default_timezone_set('America/New_York');	

$date = date('Y-m-d h:m A');

$dtA = new DateTime($date);




//echo $row2['Date_of_Meeting'];







  $insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_meeting_archived(userID, startupID, ProjectID, Status, Viewed_by_Startup, Viewed_by_Participant, Date_of_Meeting, Final_Time, Location, Date_Posted, Time_Posted) VALUES('".$row['userID']."','".$row['startupID']."',
  '".$row['ProjectID']."','Screening Question Not Passed', 'No', 'No', '0000-00-00', 'Not Set','".$row['Location']."','".$row['Date_Accepted']."','".$row['Time_Accepted']."')");



$sql=mysqli_query($connecDB,"DELETE FROM tbl_meeting_request WHERE ProjectID = '".$row['ProjectID']."' AND userID = '".$row['userID']."'");






} 

}


?>

</body>
</html>