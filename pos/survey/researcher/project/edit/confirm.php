<?php

session_start();
include ('../../../config.php');

//require( "phpmailer/class.phpmailer.php" );

$ip = $_SERVER['REMOTE_ADDR'];



if($_POST)
{

//$statusY = "Y";

//$all_game_value = implode(",",$_POST['testing']);

date_default_timezone_set('America/New_York');
$date = date('Y-m-d');  


  $update_sql = mysqli_query($connecDB,"UPDATE tbl_researcher_project SET 
  ProjectStatus = '".$_POST['projectstatus']."',
  Pay = '".$_POST['pay']."',
  Minutes = '".$_POST['minutes']."',
  Date_Created='".$date."', 
  Confirmed='Y'

  WHERE researcherID='".$_SESSION['researcherSession']."' AND ProjectID= '".$_SESSION['projectid']."'");



  





if($_POST['fileToUpload'] != ''){


$photo = $_SESSION['projectid'].'_'.$_POST['fileToUpload'];


$sql2 = "SELECT * FROM tbl_researcher_project WHERE researcherID='".$_SESSION['researcherSession']."' 
AND ProjectID = '".$_SESSION['projectid']."'";
$result=mysql_query($sql2);
$row=mysql_fetch_array($result);

if(mysql_num_rows($result)>0)
{


$update_sql = "UPDATE tbl_researcher_project SET project_image='".$photo."'
  WHERE researcherID='".$_SESSION['researcherSession']."' AND ProjectID = '".$_SESSION['projectid']."' ";
  mysql_query($update_sql);


  
}


} 
  







  
    $output = json_encode(array('type'=>'message', 'text' => '<div class="success">Successfully Saved!</div>'));
 die($output);  
  
    //header("Location: index.php?s=success"); 




  
  
  
  
  
}
?>