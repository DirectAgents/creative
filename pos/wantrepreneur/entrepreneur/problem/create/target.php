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

if($_POST['possibleanswer1_question1'] == ''){$possibleanswer1_question1 = '';}else{$possibleanswer1_question1 = $_POST['possibleanswer1_question1'];}
if($_POST['possibleanswer1_question2'] == ''){$possibleanswer1_question2 = '';}else{$possibleanswer1_question2 = $_POST['possibleanswer1_question2'];}
if($_POST['possibleanswer1_question3'] == ''){$possibleanswer1_question3 = '';}else{$possibleanswer1_question3 = $_POST['possibleanswer1_question3'];}
if($_POST['possibleanswer1_question4'] == ''){$possibleanswer1_question4 = '';}else{$possibleanswer1_question4 = $_POST['possibleanswer1_question4'];}

if($_POST['possibleanswer2_question1'] == ''){$possibleanswer2_question1 = '';}else{$possibleanswer2_question1 = $_POST['possibleanswer2_question1'];}
if($_POST['possibleanswer2_question2'] == ''){$possibleanswer2_question2 = '';}else{$possibleanswer2_question2 = $_POST['possibleanswer2_question2'];}


if($_POST['possibleanswer3_question1'] == ''){$possibleanswer3_question1 = '';}else{$possibleanswer3_question1 = $_POST['possibleanswer3_question1'];}
if($_POST['possibleanswer3_question2'] == ''){$possibleanswer3_question2 = '';}else{$possibleanswer3_question2 = $_POST['possibleanswer3_question2'];}
if($_POST['possibleanswer3_question3'] == ''){$possibleanswer3_question3 = '';}else{$possibleanswer3_question3 = $_POST['possibleanswer3_question3'];}
if($_POST['possibleanswer3_question4'] == ''){$possibleanswer3_question4 = '';}else{$possibleanswer3_question4 = $_POST['possibleanswer3_question4'];}

if($_POST['possibleanswer4_question1'] == ''){$possibleanswer4_question1 = '';}else{$possibleanswer4_question1 = $_POST['possibleanswer4_question1'];}
if($_POST['possibleanswer4_question2'] == ''){$possibleanswer4_question2 = '';}else{$possibleanswer4_question2 = $_POST['possibleanswer4_question2'];}
if($_POST['possibleanswer4_question3'] == ''){$possibleanswer4_question3 = '';}else{$possibleanswer4_question3 = $_POST['possibleanswer4_question3'];}
if($_POST['possibleanswer4_question4'] == ''){$possibleanswer4_question4 = '';}else{$possibleanswer4_question4 = $_POST['possibleanswer4_question4'];}


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
  PossibleAnswer1_Question1='".$possibleanswer1_question1."',
  PossibleAnswer1_Question2='".$possibleanswer1_question2."',
  PossibleAnswer1_Question3='".$possibleanswer1_question3."',
  PossibleAnswer1_Question4='".$possibleanswer1_question4."',
  PossibleAnswer2_Question1='".$possibleanswer2_question1."',
  PossibleAnswer2_Question2='".$possibleanswer2_question2."',
  PossibleAnswer3_Question1='".$possibleanswer3_question1."',
  PossibleAnswer3_Question2='".$possibleanswer3_question2."',
  PossibleAnswer3_Question3='".$possibleanswer3_question3."',
  PossibleAnswer3_Question4='".$possibleanswer3_question4."',
  PossibleAnswer4_Question1='".$possibleanswer4_question1."',
  PossibleAnswer4_Question2='".$possibleanswer4_question2."',
  PossibleAnswer4_Question3='".$possibleanswer4_question3."',
  PossibleAnswer4_Question4='".$possibleanswer4_question4."',

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
  FinishedProcess = 'N',
  Date_Created = '".$date."'

  WHERE startupID='".$_SESSION['startupSession']."' AND ProjectID= '".$_SESSION['projectid']."'");

  

 

}else{




$insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_startup_project(ProjectID, startupID, Problem,PossibleAnswer1_Question1,PossibleAnswer1_Question2,PossibleAnswer1_Question3,PossibleAnswer1_Question4,PossibleAnswer2_Question1,
  PossibleAnswer2_Question2,PossibleAnswer3_Question1,PossibleAnswer3_Question2,PossibleAnswer3_Question3,PossibleAnswer3_Question4,
  PossibleAnswer4_Question1,PossibleAnswer4_Question2,PossibleAnswer4_Question3,PossibleAnswer4_Question4,Stage, Category,MinReq,Age,Gender,MinHeight,MaxHeight,
Status, Ethnicity, Smoke,Drink, Diet,Religion,Education,Job, Interests, Languages, FinishedProcess , Date_Created) VALUES('".$_SESSION['projectid']."','".$_SESSION['startupSession']."',
  '".$projectname."','".$possibleanswer1_question1."','".$possibleanswer1_question2."','".$possibleanswer1_question3."','".$possibleanswer1_question4."'
  ,'".$possibleanswer2_question1."','".$possibleanswer2_question2."','".$possibleanswer3_question1."','".$possibleanswer3_question2."','".$possibleanswer3_question3."','".$possibleanswer3_question4."','".$possibleanswer4_question1."','".$possibleanswer4_question2."','".$possibleanswer4_question3."','".$possibleanswer4_question4."','".$stage."', '".$category."', '".$minreq."', '".$age."','".$gender."','".$minheight."','".$maxheight."',
  '".$status."','".$ethnicity."','".$smoke."','".$drink."','".$diet."',
  '".$religion."','".$education."','".$job."', '".$interests."' , '".$languages."', 'N','".$date."')");





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