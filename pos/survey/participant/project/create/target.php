<?php

session_start();
include ('../../../config2.php');

//require( "phpmailer/class.phpmailer.php" );

$ip = $_SERVER['REMOTE_ADDR'];

$the_date = date('Y-m-d'); 
date_default_timezone_set('America/New_York');


if($_POST)
{

if($_POST['projectname'] == ''){$projectname = 'NULL';}else{$projectname = $_POST['projectname'];}
if($_POST['meetupchoice'] == ''){$meetupchoice = 'NULL';}else{$meetupchoice = $_POST['meetupchoice'];}
if($_POST['screeningquestion'] == ''){$screeningquestion = 'NULL';}else{$screeningquestion = $_POST['screeningquestion'];}
if($_POST['age'] == ''){$age = 'NULL';}else{$age = $_POST['age'];}
if($_POST['gender'] == ''){$gender = 'NULL';}else{$gender = $_POST['gender'];}
if($_POST['minheight'] == ''){$minheight = 'NULL';}else{$minheight = $_POST['minheight'];}
if($_POST['maxheight'] == ''){$maxheight = 'NULL';}else{$maxheight = $_POST['maxheight'];}
if($_POST['location'] == ''){$location = 'NULL';}else{$location = $_POST['location'];}
if($_POST['status'] == ''){$status = 'NULL';}else{$status = $_POST['status'];}
if($_POST['ethnicity'] == ''){$ethnicity = 'NULL';}else{$ethnicity = $_POST['ethnicity'];}
if($_POST['smoke'] == ''){$smoke = 'NULL';}else{$smoke = $_POST['smoke'];}
if($_POST['drink'] == ''){$drink = 'NULL';}else{$drink = $_POST['drink'];}
if($_POST['diet'] == ''){$diet = 'NULL';}else{$diet = $_POST['diet'];}
if($_POST['religion'] == ''){$religion = 'NULL';}else{$religion = $_POST['religion'];}
if($_POST['education'] == ''){$education = 'NULL';}else{$education = $_POST['education'];}
if($_POST['job'] == ''){$job = 'NULL';}else{$job = $_POST['job'];}

if($_POST['potentialanswer1'] == ''){$potentialanswer1 = 'NULL';}else{$potentialanswer1 = $_POST['potentialanswer1'];}
if($_POST['potentialanswer2'] == ''){$potentialanswer2 = 'NULL';}else{$potentialanswer2 = $_POST['potentialanswer2'];}
if($_POST['potentialanswer3'] == ''){$potentialanswer3 = 'NULL';}else{$potentialanswer3 = $_POST['potentialanswer3'];}
if($_POST['potentialansweraccepted'] == ''){$potentialansweraccepted = 'NULL';}else{$potentialansweraccepted = $_POST['potentialansweraccepted'];}


//$all_game_value = implode(",",$_POST['testing']);

  $update_sql = "UPDATE tbl_researcher_project SET 
  Name='".$projectname."',
  Meetupchoice='".$meetupchoice."',
  Screening='".$screeningquestion."',
  Age='".$age."',
  Gender='".$gender."',
  MinHeight='".$minheight."',
  MaxHeight='".$maxheight."',
  Location='".$location."',
  Status='".$status."',
  Ethnicity='".$ethnicity."',
  Smoke='".$smoke."',
  Drink='".$drink."',
  Diet='".$diet."',
  Religion='".$religion."',
  Education='".$education."',
  Job='".$job."',
  Date_Created = '".$the_date."'

  WHERE researcherID='".$_SESSION['researcherSession']."' AND id= '".$_SESSION['projectid']."'";

  

mysql_query($update_sql);




$sql = "SELECT * FROM tbl_researcher_potentialanswers WHERE userID='".$_SESSION['researcherSession']."' AND ProjectID= '".$_SESSION['projectid']."'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);

if(mysql_num_rows($result)>0)
{

    

  $update_sql = "UPDATE tbl_researcher_potentialanswers SET 
  PotentialAnswer1='".$potentialanswer1."',
  PotentialAnswer2='".$potentialanswer2."',
  PotentialAnswer3='".$potentialanswer3."',
  Accepted='".$potentialansweraccepted."'  
  WHERE userID='".$_SESSION['researcherSession']."' AND ProjectID='".$_SESSION['projectid']."'";
  mysql_query($update_sql);



}else{



$insert_sql = "INSERT INTO tbl_researcher_potentialanswers(userID, ProjectID, PotentialAnswer1, PotentialAnswer2,
PotentialAnswer3) VALUES('".$_SESSION['researcherSession']."','".$_SESSION['projectid']."','".$potentialanswer1."',
'".$potentialanswer2."', '".$potentialanswer3."')";
mysql_query($insert_sql);    

 

}





  
      $output = json_encode(array('type'=>'message', 'text' => '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#2bb90a; color:#fff; margin-bottom:15px;">Successfully Saved!</div>'));
    die($output);
  
    //header("Location: index.php?s=success"); 




  
  
  
  
  
}
?>