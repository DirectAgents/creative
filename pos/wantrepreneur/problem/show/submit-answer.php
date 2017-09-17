<?php

session_start();
include("../../config.php"); //include config file


require_once '../../base_path.php';


date_default_timezone_set('America/New_York');
$the_date = date('Y-m-d'); 
$the_time = date('h:i:s A');


if($_POST){





if ($_SESSION['startupSession'] != '') {

$insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_answers(startupID, Answer, ProblemID, Date, Time) 
VALUES('".$_SESSION['startupSession']."', '".$_POST['possibleanswers']."', '".$_POST['problemid']."', '".$the_date."','".$the_time."')");

}


if ($_SESSION['participantSession'] != '') {

$insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_answers(userID, Answer, ProblemID, Date, Time) 
VALUES('".$_SESSION['participantSession']."', '".$_POST['possibleanswers']."', '".$_POST['problemid']."', '".$the_date."','".$the_time."')");

}


}

	
	
?>