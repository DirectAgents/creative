<?php

session_start();
require_once '../../../class.researcher.php';
include_once("../../../config.php");
include("../../../config.inc.php");

require( "../../../phpmailer/class.phpmailer.php" );


$results = mysql_query("SELECT * FROM tbl_project_request WHERE ProjectID = '167741111' AND Accepted_to_Participate = 'Accepted'");


$row = mysql_fetch_array($results); 

echo "Date: ";
echo $row['Date_of_Meeting'];
echo "<br>";
echo "researcherID: ";
echo $row['researcherID'];
echo $row['ProjectID'];


$date = date_create($row[0]);


$researcher = mysql_query("SELECT * FROM tbl_researcher WHERE userID = '".$row['researcherID']."'");
$row2 = mysql_fetch_array($researcher);

$participant = mysql_query("SELECT * FROM tbl_participant WHERE userID = '".$row['userID']."'");
$row3 = mysql_fetch_array($participant);


$researcher_project = mysql_query("SELECT * FROM tbl_researcher_project WHERE ProjectID = '".$row['ProjectID']."'");
$row4 = mysql_fetch_array($researcher_project);


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


