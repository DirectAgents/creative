<?php

session_start();
include ('../../../config.php');

//require( "phpmailer/class.phpmailer.php" );

$ip = $_SERVER['REMOTE_ADDR'];


$sql = mysqli_query($connecDB,"SELECT * FROM tbl_startup WHERE userID='".$_SESSION['startupSession']."'");
$row = mysqli_fetch_array($sql);





if($_POST)
{

date_default_timezone_set('America/New_York');
$date = date('Y-m-d');  


if($_POST['phone'] != ''){

  $formatted_number = preg_replace("/^(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $_POST['phone']);


  $update_sql = mysqli_query($connecDB,"UPDATE tbl_startup_project SET 
  ProjectStatus = '".$_POST['projectstatus']."',
  Pay = '".$_POST['pay']."',
  Minutes = '".$_POST['minutes']."',
  Date_Created='".$date."', 
  NDA='No', 
  FinishedProcess='Y'

  WHERE startupID='".$_SESSION['startupSession']."' AND ProjectID= '".$_SESSION['projectid']."'");



  $update_sql = mysqli_query($connecDB,"UPDATE tbl_startup SET 
  Phone='".$formatted_number."'

  WHERE userID='".$_SESSION['startupSession']."'");


  }else{




  $update_sql = mysqli_query($connecDB,"UPDATE tbl_startup_project SET 
  ProjectStatus = '".$_POST['projectstatus']."',
  Pay = '".$_POST['pay']."',
  Minutes = '".$_POST['minutes']."',
  Date_Created='".$date."', 
  NDA='No', 
  FinishedProcess='Y'

  WHERE startupID='".$_SESSION['startupSession']."' AND ProjectID= '".$_SESSION['projectid']."'");




  }










	
	    $output = json_encode(array('type'=>'message', 'text' => '<div style="text-align:center; font-size:18px; padding:10px; width:100%; background:#2bb90a; color:#fff; margin-bottom:15px;">Successfully Saved!</div>'));
		die($output);
	
    //header("Location: index.php?s=success"); 




	
	
	
	
	
}
?>