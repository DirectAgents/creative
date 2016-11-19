<?php

session_start();
require_once '../../../../config.php';

//require( "phpmailer/class.phpmailer.php" );

$ip = $_SERVER['REMOTE_ADDR'];

date_default_timezone_set('America/New_York');
$date = date('Y-m-d'); 


if($_POST)
{







$sql = mysqli_query($connecDB,"SELECT * FROM tbl_nda WHERE researcherID='".$_SESSION['researcherSession']."'");

if(mysqli_num_rows($sql)>0)
{
  
 
  $update_sql = mysqli_query($connecDB,"UPDATE tbl_nda SET 
  
  ProjectID = '".$_POST['projectid']."',
  researcher_sig_name = '".$_POST['researcher_sig_name']."',
  researcher_sig_title = '".$_POST['researcher_sig_title']."',
  researcher_sig_company = '".$_POST['researcher_sig_company']."',
  researcher_sig_date = '".$_POST['researcher_sig_date']."',
  researcherID='".$_SESSION['researcherSession']."'

  WHERE researcherID='".$_SESSION['researcherSession']."'");
  
  
 
  }else{

    
    $sql=mysqli_query($connecDB,"INSERT INTO tbl_nda (`researcherID`, `ProjectID`, `researcher_sig_name`, `researcher_sig_title`, `researcher_sig_company`, `researcher_sig_date` ) VALUES ('".$_SESSION['researcherSession']."', '".$_POST['projectid']."',
      '".$_POST['researcher_sig_name']."', '".$_POST['researcher_sig_title']."', '".$_POST['researcher_sig_company']."', '".$_POST['researcher_sig_date']."')");
      


  } 



	  $output = json_encode(array('type'=>'message', 'text' => '<div class="success">Successfully Saved!</div>'));
		die($output);
	
    //header("Location: index.php?s=success"); 


	
}
?>