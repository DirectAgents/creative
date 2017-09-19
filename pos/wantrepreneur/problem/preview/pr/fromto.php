<?php

session_start();
include("../config.php"); //include config file




if($_GET['option'] != ''){

$option = $_GET['option'];

$sql = mysqli_query($connecDB,"SELECT * FROM tbl_participant WHERE userID='".$_SESSION['participantSession']."'");

$results = array();

while($row = mysqli_fetch_array($sql))
{
   $results[] = array(
      'date' => $row['Date_Availability_'.$option.''],
      'from' => $row['From_Time_'.$option.''],
      'to' => $row['To_Time_'.$option.'']
   );
}

$json = json_encode($results);

echo $json;


}

	
?>