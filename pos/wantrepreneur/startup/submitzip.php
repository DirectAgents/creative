<?php

session_start();
require_once '../class.startup.php';
include_once("../config.php");

//echo $_SESSION['startupSession'];


if($_POST)
{


$zip = mysqli_query($connecDB,"SELECT * FROM zip_state WHERE zip='".$_POST['zip']."' ");
$row = mysqli_fetch_array($zip);




$update_sql = mysqli_query($connecDB,"UPDATE tbl_startup SET 
  Zip='".$_POST['zip']."',
  City='".$row['city']."',
  State='".$row['state']."'

  WHERE userID='".$_SESSION['startupSession']."'");



 $output = json_encode(array('type'=>'message', 'text' => '<div class="success">Successfully Saved!</div>'));
        die($output);

}	
	
	
	

?>