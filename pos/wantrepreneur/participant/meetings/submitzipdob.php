<?php

session_start();
require_once '../../class.participant.php';
include_once("../../config.php");

//echo $_SESSION['startupSession'];


if($_POST)
{


$zip = mysqli_query($connecDB,"SELECT * FROM zip_state WHERE zip='".$_POST['zip']."' ");
$row = mysqli_fetch_array($zip);


$dob= $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
$age = (date('Y') - date('Y',strtotime($dob))); 


$update_sql = mysqli_query($connecDB,"UPDATE tbl_participant SET 
  Zip='".$_POST['zip']."',
  City='".$row['city']."',
  State='".$row['state']."',
  Age='".$age."',
  Month='".$_POST['month']."',
  Day='".$_POST['day']."',
  Year='".$_POST['year']."'

  WHERE userID='".$_SESSION['participantSession']."'");



 $output = json_encode(array('type'=>'message', 'text' => '<div class="success">Successfully Saved!</div>'));
        die($output);

}	
	
	
	

?>