<?php

session_start();
include ('../../../config.php');

//require( "phpmailer/class.phpmailer.php" );

$ip = $_SERVER['REMOTE_ADDR'];

date_default_timezone_set('America/New_York');
$date = date('Y-m-d'); 




if($_POST)
{





$_SESSION['projectid'] = $_POST['projectid'];


if($_POST['minreq'] == ''){$minreq = '';}else{$minreq = $_POST['minreq'];}




if($_POST['projectname'] == ''){$projectname = 'NULL';}else{$projectname = $_POST['projectname'];}
if($_POST['possibleanswer1'] == ''){$possibleanswer1 = '';}else{$possibleanswer1 = $_POST['possibleanswer1'];}
if($_POST['possibleanswer2'] == ''){$possibleanswer2 = '';}else{$possibleanswer2 = $_POST['possibleanswer2'];}
if($_POST['possibleanswer3'] == ''){$possibleanswer3 = '';}else{$possibleanswer3 = $_POST['possibleanswer3'];}
if($_POST['possibleanswer4'] == ''){$possibleanswer4 = '';}else{$possibleanswer4 = $_POST['possibleanswer4'];}
if($_POST['stage'] == ''){$stage = 'NULL';}else{$stage = $_POST['stage'];}
if($_POST['category'] == ''){$category = 'NULL';}else{$category = $_POST['category'];}
//if($_POST['meetupchoice'] == ''){$meetupchoice = 'NULL';}else{$meetupchoice = $_POST['meetupchoice'];}
if($_POST['screeningquestion'] == ''){$screeningquestion = 'NULL';}else{$screeningquestion = $_POST['screeningquestion'];}
if($_POST['age'] == ''){$age = 'NULL';}else{$age = $_POST['age'];}
if($_POST['gender'] == ''){$gender = 'NULL';}else{$gender = $_POST['gender'];}
if($_POST['minheight'] == ''){$minheight = 'NULL';}else{$minheight = $_POST['minheight'];}
if($_POST['maxheight'] == ''){$maxheight = 'NULL';}else{$maxheight = $_POST['maxheight'];}
//if($_POST['location'] == ''){$location = 'NULL';}else{$location = $_POST['location'];}
if($_POST['status'] == ''){$status = 'NULL';}else{$status = $_POST['status'];}
if($_POST['ethnicity'] == ''){$ethnicity = 'NULL';}else{$ethnicity = $_POST['ethnicity'];}
if($_POST['smoke'] == ''){$smoke = 'NULL';}else{$smoke = $_POST['smoke'];}
if($_POST['drink'] == ''){$drink = 'NULL';}else{$drink = $_POST['drink'];}
if($_POST['diet'] == ''){$diet = 'NULL';}else{$diet = $_POST['diet'];}
if($_POST['religion'] == ''){$religion = 'NULL';}else{$religion = $_POST['religion'];}
if($_POST['education'] == ''){$education = 'NULL';}else{$education = $_POST['education'];}
if($_POST['job'] == ''){$job = 'NULL';}else{$job = $_POST['job'];}

if($_POST['screening'] == ''){$screening = 'Disabled';}else{$screening = $_POST['screening'];}

if($_POST['interest'] == ''){$interests = 'NULL';}else{$interests = $_POST['interest'];}
if($_POST['language'] == ''){$languages = 'NULL';}else{$languages = $_POST['language'];}


if($_POST['potentialanswer1'] == ''){$potentialanswer1 = '';}else{$potentialanswer1 = $_POST['potentialanswer1'];}
if($_POST['potentialanswer2'] == ''){$potentialanswer2 = '';}else{$potentialanswer2 = $_POST['potentialanswer2'];}
if($_POST['potentialanswer3'] == ''){$potentialanswer3 = '';}else{$potentialanswer3 = $_POST['potentialanswer3'];}
if($_POST['potentialansweraccepted'] == ''){$potentialansweraccepted = 'NULL';}else{$potentialansweraccepted = $_POST['potentialansweraccepted'];}


//$all_game_value = implode(",",$_POST['testing']);


$sql = mysqli_query($connecDB,"SELECT * FROM tbl_startup_project WHERE startupID='".$_SESSION['startupSession']."' AND ProjectID= '".$_SESSION['projectid']."'");


if(mysqli_num_rows($sql)>0)
{


  $update_sql = mysqli_query($connecDB,"UPDATE tbl_startup_project SET 
  Problem='".$projectname."',
  PossibleAnswer1='".$possibleanswer1."',
  PossibleAnswer2='".$possibleanswer2."',
  PossibleAnswer3='".$possibleanswer3."',
  PossibleAnswer4='".$possibleanswer4."',
  Stage='".$stage."',
  Category='".$category."',
  MinReq='".$minreq."',
  Age='".$age."',
  Gender='".$gender."',
  MinHeight='".$minheight."',
  MaxHeight='".$maxheight."',
  Status='".$status."',
  Ethnicity='".$ethnicity."',
  Smoke='".$smoke."',
  Drink='".$drink."',
  Diet='".$diet."',
  Religion='".$religion."',
  Education='".$education."',
  Job='".$job."',
  Interests = '".$interests."',
  Languages = '".$languages."',
  ProjectStatus = 'Draft',
  Date_Created = '".$date."'

  WHERE startupID='".$_SESSION['startupSession']."' AND ProjectID= '".$_SESSION['projectid']."'");

  

 

}else{




$insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_startup_project(ProjectID, startupID, Problem,PossibleAnswer1,PossibleAnswer2,PossibleAnswer3,PossibleAnswer4, Stage, Category,MinReq,Age,Gender,MinHeight,MaxHeight,
Status, Ethnicity, Smoke,Drink, Diet,Religion,Education,Job, Interests, Languages, ProjectStatus, Date_Created) VALUES('".$_SESSION['projectid']."','".$_SESSION['startupSession']."',
  '".$projectname."','".$possibleanswer1."','".$possibleanswer2."','".$possibleanswer3."','".$possibleanswer4."', '".$stage."', '".$category."', '".$minreq."', '".$age."','".$gender."','".$minheight."','".$maxheight."',
  '".$status."','".$ethnicity."','".$smoke."','".$drink."','".$diet."',
  '".$religion."','".$education."','".$job."', '".$interests."' , '".$languages."', 'Draft','".$date."')");





}




$sql2 = mysqli_query($connecDB,"SELECT * FROM tbl_startup_screeningquestion WHERE userID='".$_SESSION['startupSession']."' AND ProjectID= '".$_SESSION['projectid']."'");



if(mysqli_num_rows($sql2)>0)
{

    

  $update_sql = mysqli_query($connecDB,"UPDATE tbl_startup_screeningquestion SET 
  ScreeningQuestion='".$screeningquestion."',
  PotentialAnswer1='".$potentialanswer1."',
  PotentialAnswer2='".$potentialanswer2."',
  PotentialAnswer3='".$potentialanswer3."',
  Accepted='".$potentialansweraccepted."',
  EnabledorDisabled='".$screening."'  
  WHERE userID='".$_SESSION['startupSession']."' AND ProjectID='".$_SESSION['projectid']."'");




}else{



$insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_startup_screeningquestion(userID, ProjectID, ScreeningQuestion, PotentialAnswer1, PotentialAnswer2,
PotentialAnswer3, Accepted, EnabledorDisabled) VALUES('".$_SESSION['startupSession']."','".$_SESSION['projectid']."','".$screeningquestion."','".$potentialanswer1."',
'".$potentialanswer2."', '".$potentialanswer3."', '".$potentialansweraccepted."' ,'".$screening."')");
  

 

}




    
  
    //header("Location: index.php?s=success"); 




  
  
  
  
}
?>