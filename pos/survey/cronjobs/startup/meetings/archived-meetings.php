<?php


include("../../../config.php"); //include config file




$sql=mysqli_query($connecDB,"SELECT * FROM tbl_project_request WHERE Status = 'Meeting Set' AND Meeting_Status = 'Upcoming Meetings' AND Accepted_to_Participate = 'Accepted' ORDER BY id DESC ");
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

$date = date('Y-m-d h:m A');

$dtA = new DateTime($date);
$dtB = new DateTime($row2['Date_of_Meeting'].' '.$row2['Final_Time']);

//echo $row2['Date_of_Meeting'];

if ( $dtA > $dtB ) {



 $update_sql = mysqli_query($connecDB,"UPDATE tbl_project_request SET Meeting_Status='Archived Meetings'
  WHERE id = '".$row2['id']."' ");






}

} 

}


?>
