<?php


include("../../../config.php"); //include config file

require_once '../../../base_path.php';


$sql=mysqli_query($connecDB,"SELECT * FROM tbl_meeting_recent ORDER BY id DESC ");

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
$dtB = new DateTime($row2['Date_of_Meeting']);



$interval = $dtA->diff($dtB);


//check meeting after 7 days passed then put to archived meetings


if($interval->days >= 7) {



  //$update_sql = mysqli_query($connecDB,"UPDATE tbl_project_request SET Meeting_Status='Upcoming Meetings'
  //WHERE id = '".$row2['id']."' ");




$the_date = date('Y-m-d'); 
date_default_timezone_set('America/New_York');
$the_time = date('h:i:s A');




$insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_meeting_archived_startup(userID, startupID, ProjectID, Viewed_by_Startup, Viewed_by_Participant, Date_of_Meeting, Final_Time, Location, Met, Payment, Status, Date_Posted, Time_Posted) VALUES('".$rowparticipant['userID']."','".$rowstartup['userID']."',
  '".$row2['ProjectID']."', 'No', 'No', '".$row2['Date_of_Meeting']."', '".$row2['Final_Time']."','".$row2['Location']."', '".$row2['Met']."','".$row2['Payment']."', '".$row2['Status']."', '".$the_date."','".$the_time."')");


$insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_meeting_archived_participant(userID, startupID, ProjectID, Viewed_by_Startup, Viewed_by_Participant, Date_of_Meeting, Final_Time, Location, Met, Payment, Status, Date_Posted, Time_Posted) VALUES('".$rowparticipant['userID']."','".$rowstartup['userID']."',
  '".$row2['ProjectID']."', 'No', 'No', '".$row2['Date_of_Meeting']."', '".$row2['Final_Time']."','".$row2['Location']."', '".$row2['Met']."','".$row2['Payment']."', '".$row2['Status']."', '".$the_date."','".$the_time."')");



$sql=mysqli_query($connecDB,"DELETE FROM tbl_meeting_recent WHERE ProjectID = '".$row2['ProjectID']."' AND startupID = '".$rowstartup['userID']."' AND userID = '".$rowparticipant['userID']."'");





}

} 

}


?>

</body>
</html>
