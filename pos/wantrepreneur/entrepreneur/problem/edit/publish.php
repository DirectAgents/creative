<?php

session_start();
include ('../../../config.php');

//require( "phpmailer/class.phpmailer.php" );

$ip = $_SERVER['REMOTE_ADDR'];

date_default_timezone_set('America/New_York');
$date = date('Y-m-d'); 




if($_POST)
{



//$all_game_value = implode(",",$_POST['testing']);


$sql = mysqli_query($connecDB,"SELECT * FROM tbl_startup_project WHERE startupID='".$_SESSION['startupSession']."' AND ProjectID= '".$_POST['projectid']."'");


if(mysqli_num_rows($sql)>0)
{


  $update_sql = mysqli_query($connecDB,"UPDATE tbl_startup_project SET 

  FinishedProcess = 'Y'

  WHERE startupID='".$_SESSION['startupSession']."' AND ProjectID= '".$_POST['projectid']."'");

  


}

}


?>