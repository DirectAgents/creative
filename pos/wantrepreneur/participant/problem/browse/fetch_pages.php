<?php
session_start();

require_once '../../../base_path.php';

include("../../../config.php"); //include config file
require_once '../../../class.participant.php';
require_once '../../../class.startup.php';



$startup_home = new STARTUP();

if($startup_home->is_logged_in())
{
  $startup_home->logout();
}



$participant_home = new PARTICIPANT();

if(!$participant_home->is_logged_in())
{
  $participant_home->redirect('../../login/');
}






//sanitize post value
$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);


//throw HTTP error if page number is not valid
if(!is_numeric($page_number)){
  header('HTTP/1.1 500 Invalid page number!');
  exit();
}

//get current starting point of records
$position = ($page_number * $item_per_page);

//echo $item_per_page;





$sql=mysqli_query($connecDB,"SELECT * FROM tbl_startup_project WHERE ProjectStatus = 'Public' AND FinishedProcess = 'Y' ORDER BY id DESC LIMIT $position, $item_per_page");
//$results=mysql_query($sql);



//$results = mysql_query("SELECT id,userID,FirstName, LastName, Gender FROM tbl_startup_project 
//WHERE Gender RLIKE '".$Gender."' OR Age RLIKE '".$Age."' OR Location RLIKE '".$Location."' OR Height = '".$Height."' OR Meetupchoice RLIKE '".$Meetupchoice."' ORDER BY id DESC LIMIT $position, $item_per_page");



//output results from database

echo '<div class="page_result">';


if(mysqli_num_rows($sql)>0)
{

//while($results->fetch()){ //fetch values
while($row = mysqli_fetch_array($sql))
{ 



$Min_Req = str_replace(",","|",$row['MinReq']);

$Meetupchoice = str_replace(",","|",$row['Meetupchoice']);
$Age = str_replace(",","|",$row['Age']);
$Gender = str_replace(",","|",$row['Gender']);
$Height = str_replace(",","|",$row['MinHeight']);
$City = str_replace(",","|",$row['City']);
$Status = str_replace(",","|",$row['Status']); 
$Ethnicity = str_replace(",","|",$row['Ethnicity']);
$Smoke = str_replace(",","|",$row['Smoke']);
$Drink = str_replace(",","|",$row['Drink']);
$Diet = str_replace(",","|",$row['Diet']);
$Religion = str_replace(",","|",$row['Religion']);
$Education = str_replace(",","|",$row['Education']);
$Job = str_replace(",","|",$row['Job']);
$Interests = str_replace(",","|",$row['Interests']);
$Languages = str_replace(",","|",$row['Languages']);


$sql2=mysqli_query($connecDB,"SELECT * FROM tbl_participant WHERE userID='".$_SESSION['participantSession']."'");
//$results2=mysql_query($sql2);
$row2 = mysqli_fetch_array($sql2);



if(($row2['Height'] >= $row['MinHeight']) && ($row2['Height'] <= $row['MaxHeight'])) {

$Height_Final = $row2['Height'];

}else{

$Height_Final = $row2['Height'] + 1;	

}


//echo $Min_Req;
//if (strpos($Min_Req, 'Age') !== false) {echo "yes";}

if (strpos($Min_Req, 'Age') !== false) {

if($Age != 'NULL' && $Age != ''){$theage = "AND Age RLIKE '[[:<:]]".$Age."[[:>:]]'";}else{$theage = "";}
}else{
	$theage = '';
}


if (strpos($Min_Req, 'Gender') !== false) {
if($Gender != 'NULL' && $Gender != ''){$thegender = "AND Gender RLIKE '[[:<:]]".$Gender."[[:>:]]'";}else{$thegender = '';}
}else{
	$thegender = '';
}

if (strpos($Min_Req, 'Height') !== false) {
if($Height != 'NULL' && $Height != ''){$theheight = "AND Height RLIKE '[[:<:]]".$Height_Final."[[:>:]]'";}else{$theheight = '';}
}else{
	$theheight = '';
}

if (strpos($Min_Req, 'City') !== false) {
if($City != 'NULL' && $City != ''){$thecity = "AND City RLIKE '[[:<:]]".$City."[[:>:]]'";}else{$thecity = '';}
}else{
	$thecity = '';
}


if (strpos($Min_Req, 'Status') !== false) {
if($Status != 'NULL' && $Status != ''){$thestatus = "AND Status RLIKE '[[:<:]]".$Status."[[:>:]]'";}else{$thestatus = '';}
}else{
	$thestatus = '';
}


if (strpos($Min_Req, 'Ethnicity') !== false) {
if($Ethnicity != 'NULL' && $Ethnicity != ''){$theethnicity = "AND Ethnicity RLIKE '[[:<:]]".$Ethnicity."[[:>:]]'";}else{$theethnicity = '';}
}else{
	$theethnicity = '';
}


if (strpos($Min_Req, 'Smoke') !== false) {
if($Smoke != 'NULL' && $Smoke != ''){$thesmoke = "AND Smoke RLIKE '[[:<:]]".$Smoke."[[:>:]]'";}else{$thesmoke = '';}
}else{
	$thesmoke = '';
}


if (strpos($Min_Req, 'Drink') !== false) {
if($Drink != 'NULL' && $Drink != ''){$thedrink = "AND Drink RLIKE '[[:<:]]".$Drink."[[:>:]]'";}else{$thedrink = '';}
}else{
	$thedrink = '';
}


if (strpos($Min_Req, 'Diet') !== false) {
if($Diet != 'NULL' && $Diet != ''){$thediet = "AND Diet RLIKE '[[:<:]]".$Diet."[[:>:]]'";}else{$thediet = '';}
}else{
	$thediet = '';
}

if (strpos($Min_Req, 'Religion') !== false) {
if($Religion != 'NULL' && $Religion != ''){$thereligion = "AND Religion RLIKE '[[:<:]]".$Religion."[[:>:]]'";}else{$thereligion = '';}
}else{
	$thereligion = '';
}


if (strpos($Min_Req, 'Education') !== false) {
if($Education != 'NULL' && $Education != ''){$theeducation = "AND Education RLIKE '[[:<:]]".$Education."[[:>:]]'";}else{$theeducation = '';}
}else{
	$theeducation = '';
}


if (strpos($Min_Req, 'Job') !== false) {
if($Job != 'NULL' && $Job != ''){$thejob = "AND Job RLIKE '[[:<:]]".$Job."[[:>:]]'";}else{$thejob = '';}
}else{
	$thejob = '';
}


if (strpos($Min_Req, 'Interests') !== false) {
if($Interests != 'NULL' && $Interests != ''){$interests = "AND Interests RLIKE '[[:<:]]".$Interests."[[:>:]]'";}else{$interests = '';}
}else{
  $interests = '';
}

if (strpos($Min_Req, 'Languages') !== false) {
if($Languages != 'NULL' && $Languages != ''){$languages = "AND Languages RLIKE '[[:<:]]".$Languages."[[:>:]]'";}else{$languages = '';}
}else{
  $languages = '';
}






/*

$sql4 = mysqli_query($connecDB,"SELECT * 
from (
    select userID, ProjectID, Met from tbl_meeting_request
    union all
    select userID, ProjectID, Met from tbl_meeting_upcoming
    union all
    select userID, ProjectID, Met from tbl_meeting_recent
    union all
    select userID, ProjectID, Met from tbl_meeting_archived_startup
    union all
    select userID, ProjectID, Met from tbl_meeting_archived_participant
    union all
    select userID, ProjectID, Met from tbl_participant_meeting_participated
   
) tbl_participant
where userID != '".$_SESSION['participantSession']."' AND ProjectID != '".$row['ProjectID']."' AND Met != 'yes' ");


if(mysqli_num_rows($sql4) == false)
{





  $sql3 = mysqli_query($connecDB,"SELECT * FROM tbl_participant WHERE userID = '".$_SESSION['participantSession']."' $theage $thegender $theheight $thecity $thestatus $theethnicity $thesmoke $thedrink $thediet $thereligion $theeducation $thejob $interests $languages ORDER BY userID DESC LIMIT $position, $item_per_page");

*/


$sql3 = mysqli_query($connecDB,"SELECT * FROM tbl_participant WHERE userID NOT IN (SELECT userID FROM tbl_participant_feedback_participated WHERE ProjectID = '".$row['ProjectID']."') AND userID NOT IN (SELECT userID FROM tbl_feedback_request WHERE ProjectID = '".$row['ProjectID']."') AND userID NOT IN (SELECT userID FROM tbl_feedback_upcoming WHERE ProjectID = '".$row['ProjectID']."') AND userID NOT IN (SELECT userID FROM tbl_feedback_recent WHERE ProjectID = '".$row['ProjectID']."') AND userID NOT IN (SELECT userID FROM tbl_feedback_archived_participant WHERE ProjectID = '".$row['ProjectID']."' AND Met != 'yes') AND userID NOT IN (SELECT userID FROM tbl_feedback_archived_startup WHERE ProjectID = '".$row['ProjectID']."' AND Met != 'yes') $theage $thegender $theheight $thecity $thestatus $theethnicity $thesmoke $thedrink $thediet $thereligion $theeducation $thejob $interests $languages AND userID = '".$_SESSION['participantSession']."' ORDER BY userID DESC LIMIT $position, $item_per_page");



if(mysqli_num_rows($sql3)>0)
{







$row3 = mysqli_fetch_array($sql3); 


echo '


<div style="background:#fdfdfd; margin-bottom:20px;">
<div class="row-fluid">
<div class="therow">
  <div class="col-lg-2">';

  if($row['project_image'] != ''){
  
  echo '<img src="'.BASE_PATH.'/problem/uploads/'.$row['project_image'].'" class="img-circle-profile"/>';

}else{

 echo '<img src="'.BASE_PATH.'/problem/uploads/thumbnail.jpg" class="img-circle-profile"/>';
}
  echo '</div>
  <div class="col-lg-7"><p><h4>'.$row['Problem'].'</h4></p>
  <p>Payout: $'.$row['Pay'].'</p></div>
   <div class="col-lg-3">
<div style="margin-top:30px">
   <a href="'.BASE_PATH.'/problem/p/'.$row['Category'].'/?id='.$row['ProjectID'].'"><button type="button" class="btn-request">View Problem</button></a> </div></div>
</div>
</div>


</div>
</div>





';


}



//}


}


}





echo '</div>';




?>

