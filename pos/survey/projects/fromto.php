<?php

session_start();
include("../config.php"); //include config file



if($_GET['option'] != ''){

$option = $_GET['option'];

$query = mysql_query("SELECT * FROM tbl_participant WHERE userID='".$_SESSION['participantSession']."'");

$results = array();

while($row = mysql_fetch_array($query))
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