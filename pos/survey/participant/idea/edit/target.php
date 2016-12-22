<?php

session_start();
include ('../../../config2.php');

//require( "phpmailer/class.phpmailer.php" );

$ip = $_SERVER['REMOTE_ADDR'];



if($_POST)
{


//$all_game_value = implode(",",$_POST['testing']);

  $update_sql = "UPDATE tbl_startup_project SET 
  Name='".$_POST['projectname']."',
  Meetupchoice='".$_POST['meetupchoice']."',
  Screening='".$_POST['screeningquestion']."',
  Age='".$_POST['age']."',
  Gender='".$_POST['gender']."',
  MinHeight='".$_POST['minheight']."',
  MaxHeight='".$_POST['maxheight']."',
  Location='".$_POST['location']."',
  Status='".$_POST['status']."',
  Ethnicity='".$_POST['ethnicity']."',
  Smoke='".$_POST['smoke']."',
  Drink='".$_POST['drink']."',
  Diet='".$_POST['diet']."',
  Religion='".$_POST['religion']."',
  Education='".$_POST['education']."',
  Job='".$_POST['job']."'

  WHERE userID='".$_SESSION['startupSession']."' AND id= '".$_SESSION['projectid']."'";

  

mysql_query($update_sql);




$sql = "SELECT * FROM tbl_startup_screeningquestion WHERE userID='".$_SESSION['startupSession']."' AND ProjectID= '".$_SESSION['projectid']."'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);

if(mysql_num_rows($result)>0)
{

    

  $update_sql = "UPDATE tbl_startup_screeningquestion SET 
  PotentialAnswer1='".$_POST['potentialanswer1']."',
  PotentialAnswer2='".$_POST['potentialanswer2']."',
  PotentialAnswer3='".$_POST['potentialanswer3']."',
  Accepted='".$_POST['potentialansweraccepted']."'  
  WHERE userID='".$_SESSION['startupSession']."' AND ProjectID='".$_SESSION['projectid']."'";
  mysql_query($update_sql);



}else{



$insert_sql = "INSERT INTO tbl_startup_screeningquestion(userID, ProjectID, PotentialAnswer1, PotentialAnswer2,
PotentialAnswer3) VALUES('".$_SESSION['startupSession']."','".$_SESSION['projectid']."','".$_POST['potentialanswer1']."',
'".$_POST['potentialanswer2']."', '".$_POST['potentialanswer3']."')";
mysql_query($insert_sql);    

 

}





	
	    $output = json_encode(array('type'=>'message', 'text' => '<div style="text-align:center;font-size:18px; padding:10px; width:97.8%; background:#2bb90a; color:#fff; margin-bottom:15px;">Successfully Saved!</div>'));
		die($output);
	
    //header("Location: index.php?s=success"); 




	
	
	
	
	
}
?>