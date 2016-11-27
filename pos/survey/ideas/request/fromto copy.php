<?php

session_start();
include("../../config.php"); //include config file



$day = $_GET['day'];

$query = mysql_query("SELECT * FROM tbl_participant WHERE userID='".$_SESSION['participantSession']."'");

$results = array();

while($row = mysql_fetch_array($query))
{
   $results[] = array(
      'from' => $row[''.$day.'_From'],
      'to' => $row[''.$day.'_To']
   );
}

$json = json_encode($results);

echo $json;


	
?>