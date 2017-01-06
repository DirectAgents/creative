<?php

session_start();
require_once '../../../class.startup.php';
include_once("../../../config.php");
include("../../../config.inc.php");

require( "../../../phpmailer/class.phpmailer.php" );


$results = mysql_query("SELECT * FROM tbl_project_request WHERE ProjectID = '167741111' AND Accepted_to_Participate = 'Accepted'");


$row = mysql_fetch_array($results); 

echo "Date: ";
echo $row['Date_of_Meeting'];
echo "<br>";
echo "startupID: ";
echo $row['startupID'];
echo $row['ProjectID'];


$date = date_create($row[0]);


$startup = mysql_query("SELECT * FROM tbl_startup WHERE userID = '".$row['startupID']."'");
$row2 = mysql_fetch_array($startup);

$participant = mysql_query("SELECT * FROM tbl_participant WHERE userID = '".$row['userID']."'");
$row3 = mysql_fetch_array($participant);


$startup_project = mysql_query("SELECT * FROM tbl_startup_project WHERE ProjectID = '".$row['ProjectID']."'");
$row4 = mysql_fetch_array($startup_project);


echo $row2['userEmail'];


echo "<br><br>";

date_default_timezone_set('America/New_York');

$date = date('Y-m-d h:m A', strtotime('+1 hours'));

echo $date;

//echo $row['Date_of_Meeting'];

$dtA = new DateTime($date);
$dtB = new DateTime($row['Date_of_Meeting']+$row['Time']);

if ( $dtB > $dtA ) {
echo "<br><br>";    
echo "Date met is 1 hour later than current date and time";
}

?>


