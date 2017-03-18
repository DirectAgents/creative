<?php

session_start();
include ('../../../config2.php');
require_once '../../../config.php';

//require( "phpmailer/class.phpmailer.php" );

$ip = $_SERVER['REMOTE_ADDR'];



if($_POST)
{

//$statusY = "Y";

//$all_game_value = implode(",",$_POST['testing']);

date_default_timezone_set('America/New_York');
$date = date('Y-m-d');  


  $update_sql = "UPDATE tbl_startup_project SET 
  ProjectStatus = '".$_POST['projectstatus']."',
  Date_Updated='".$date."'

  WHERE startupID='".$_SESSION['startupSession']."' AND ProjectID= '".$_SESSION['projectid']."'";



 mysql_query($update_sql);






$sql = mysql_query("SELECT * FROM tbl_startup_project WHERE ProjectID = '".$_SESSION['projectid']."' 
	AND startupID='".$_SESSION['startupSession']."'");
$row = mysql_fetch_array($sql);





$Meetupchoice = str_replace(",","|",$row['Meetupchoice']);
$Age = str_replace(",","|",$row['Age']);
$Gender = str_replace(",","|",$row['Gender']);
$Height = $row['MinHeight'];
$Location = str_replace(",","|",$row['Location']);
$Status = str_replace(",","|",$row['Status']); 
$Ethnicity = str_replace(",","|",$row['Ethnicity']);
$Smoke = str_replace(",","|",$row['Smoke']);
$Drink = str_replace(",","|",$row['Drink']);
$Diet = str_replace(",","|",$row['Diet']);
$Religion = str_replace(",","|",$row['Religion']);
$Education = str_replace(",","|",$row['Education']);
$Job = str_replace(",","|",$row['Job']);


//if($Meetupchoice != 'NULL'){$themeetupchoice = "AND Meetupchoice RLIKE '[[:<:]]".$Meetupchoice."[[:>:]]'";}else{$themeetupchoice = '';}
if($Age != 'NULL'){$theage = "AND Age NOT RLIKE '[[:<:]]".$Age."[[:>:]]'";}else{$theage = '';}
if($Gender != 'NULL'){$thegender = "AND Gender NOT RLIKE '[[:<:]]".$Gender."[[:>:]]'";}else{$thegender = '';}
if($Height != 'NULL'){$theheight = "AND Height NOT RLIKE '[[:<:]]".$Height."[[:>:]]'";}else{$theheight = '';}
if($Location != 'NULL'){$thelocation = "AND Location NOT RLIKE '[[:<:]]".$Location."[[:>:]]'";}else{$thelocation = '';}
if($Status != 'NULL'){$thestatus = "AND Status NOT RLIKE '[[:<:]]".$Status."[[:>:]]'";}else{$thestatus = '';}
if($Ethnicity != 'NULL'){$theethnicity = "AND Ethnicity NOT RLIKE '[[:<:]]".$Ethnicity."[[:>:]]'";}else{$theethnicity = '';}
if($Smoke != 'NULL'){$thesmoke = "AND Smoke NOT RLIKE '[[:<:]]".$Smoke."[[:>:]]'";}else{$thesmoke = '';}
if($Drink != 'NULL'){$thedrink = "AND Drink NOT RLIKE '[[:<:]]".$Drink."[[:>:]]'";}else{$thedrink = '';}
if($Diet != 'NULL'){$thediet = "AND Diet NOT RLIKE '[[:<:]]".$Diet."[[:>:]]'";}else{$thediet = '';}
if($Religion != 'NULL'){$thereligion = "AND Religion NOT RLIKE '[[:<:]]".$Religion."[[:>:]]'";}else{$thereligion = '';}
if($Education != 'NULL'){$theeducation = "AND Education NOT RLIKE '[[:<:]]".$Education."[[:>:]]'";}else{$theeducation = '';}
if($Job != 'NULL'){$thejob = "AND Job NOT RLIKE '[[:<:]]".$Job."[[:>:]]'";}else{$thejob = '';}



$results = mysql_query("SELECT userID,FirstName, LastName,Meetupchoice, Age, Gender, Height, City, State, Status, Ethnicity, Smoke, Drink, Diet, Religion, Education, Job, Bio 
  FROM tbl_participant WHERE userID IN (SELECT userID FROM tbl_participant_request WHERE ProjectID = '".$_SESSION['projectid']."') AND Meetupchoice RLIKE '[[:<:]]".$Meetupchoice."[[:>:]]' $theage $thegender $theheight $thelocation 
  $thestatus $theethnicity $thesmoke $thedrink $thediet $thereligion $theeducation $thejob 
  ORDER BY userID DESC");



//Limit our results within a specified range. 


//$results = mysql_query("SELECT id,userID, Gender FROM tbl_participant_project 
//WHERE Gender RLIKE '".$Gender."' OR Age RLIKE '".$Age."' ORDER BY id DESC LIMIT $position, $item_per_page");

if(mysql_num_rows($results)>0)
{


while($row2 = mysql_fetch_array($results))
{ 

	


  $update_sql_qualified = "UPDATE tbl_participant_request SET 
  Not_Qualified_Anymore = 'Not Qualified Anymore'

  WHERE userID='".$row2['userID']."' AND ProjectID= '".$_SESSION['projectid']."'";



  

mysql_query($update_sql_qualified);


 }

}






//if($Meetupchoice != 'NULL'){$themeetupchoice = "AND Meetupchoice RLIKE '[[:<:]]".$Meetupchoice."[[:>:]]'";}else{$themeetupchoice = '';}
if($Age != 'NULL'){$theage2 = "AND Age RLIKE '[[:<:]]".$Age."[[:>:]]'";}else{$theage2 = '';}
if($Gender != 'NULL'){$thegender2 = "AND Gender RLIKE '[[:<:]]".$Gender."[[:>:]]'";}else{$thegender2 = '';}
if($Height != 'NULL'){$theheight2 = "AND Height RLIKE '[[:<:]]".$Height."[[:>:]]'";}else{$theheight2 = '';}
if($Location != 'NULL'){$thelocation2 = "AND Location RLIKE '[[:<:]]".$Location."[[:>:]]'";}else{$thelocation2 = '';}
if($Status != 'NULL'){$thestatus2 = "AND Status RLIKE '[[:<:]]".$Status."[[:>:]]'";}else{$thestatus2 = '';}
if($Ethnicity != 'NULL'){$theethnicity2 = "AND Ethnicity RLIKE '[[:<:]]".$Ethnicity."[[:>:]]'";}else{$theethnicity2 = '';}
if($Smoke != 'NULL'){$thesmoke2 = "AND Smoke RLIKE '[[:<:]]".$Smoke."[[:>:]]'";}else{$thesmoke2 = '';}
if($Drink != 'NULL'){$thedrink2 = "AND Drink RLIKE '[[:<:]]".$Drink."[[:>:]]'";}else{$thedrink2 = '';}
if($Diet != 'NULL'){$thediet2 = "AND Diet RLIKE '[[:<:]]".$Diet."[[:>:]]'";}else{$thediet2 = '';}
if($Religion != 'NULL'){$thereligion2 = "AND Religion RLIKE '[[:<:]]".$Religion."[[:>:]]'";}else{$thereligion2 = '';}
if($Education != 'NULL'){$theeducation2 = "AND Education RLIKE '[[:<:]]".$Education."[[:>:]]'";}else{$theeducation2 = '';}
if($Job != 'NULL'){$thejob2 = "AND Job RLIKE '[[:<:]]".$Job."[[:>:]]'";}else{$thejob2 = '';}



$results2 = mysql_query("SELECT userID,FirstName, LastName,Meetupchoice, Age, Gender, Height, City, State, Status, Ethnicity, Smoke, Drink, Diet, Religion, Education, Job, Bio 
  FROM tbl_participant WHERE userID IN (SELECT userID FROM tbl_participant_request WHERE ProjectID = '".$_SESSION['projectid']."') AND Meetupchoice RLIKE '[[:<:]]".$Meetupchoice."[[:>:]]' $theage2 $thegender2 $theheight2 $thelocation2 
  $thestatus2 $theethnicity2 $thesmoke2 $thedrink2 $thediet2 $thereligion2 $theeducation2 $thejob2 
  ORDER BY userID DESC");



//Limit our results within a specified range. 


//$results = mysql_query("SELECT id,userID, Gender FROM tbl_participant_project 
//WHERE Gender RLIKE '".$Gender."' OR Age RLIKE '".$Age."' ORDER BY id DESC LIMIT $position, $item_per_page");

if(mysql_num_rows($results2)>0)
{


while($row3 = mysql_fetch_array($results2))
{ 

	


  $update_sql_qualified = "UPDATE tbl_participant_request SET 
  Not_Qualified_Anymore = ''

  WHERE userID='".$row3['userID']."' AND ProjectID= '".$_SESSION['projectid']."'";



  

mysql_query($update_sql_qualified);


 }

}



if($_POST['imagestatus'] = '1' && $_POST['imagestatus'] != '0' && $_POST['imagestatus'] != ''){



$sql2 = "SELECT * FROM tbl_startup_project WHERE startupID='".$_SESSION['startupSession']."' 
AND ProjectID = '".$_SESSION['projectid']."'";
$result=mysql_query($sql2);
$row=mysql_fetch_array($result);

if(mysql_num_rows($result)>0)
{


$update_sql = "UPDATE tbl_startup_project SET project_image='".$_POST['fileToUpload']."'
  WHERE startupID='".$_SESSION['startupSession']."' AND ProjectID = '".$_SESSION['projectid']."' ";
  mysql_query($update_sql);


	
}else{

$sqlinsert="INSERT INTO tbl_startup_project (startupID, ProjectID, project_image) VALUES ('".$_SESSION['startupSession']."', '".$_SESSION['projectid']."' ,'".$_POST['fileToUpload']."')";
		mysql_query($sqlinsert);




}



} 
	
	   
	
    //header("Location: index.php?s=success"); 




	$output = json_encode(array('type'=>'message', 'text' => '<div class="success">Successfully Saved!</div>'));
 die($output);	
	
	
	
	
}
?>










