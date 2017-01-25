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
  $participant_home->redirect('../../login.php');
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







$sql=mysqli_query($connecDB,"SELECT * FROM tbl_startup_project WHERE ProjectStatus = 'Public' ORDER BY id DESC LIMIT $position, $item_per_page");
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





$sql3 = mysqli_query($connecDB,"SELECT * FROM tbl_participant WHERE userID NOT IN (SELECT userID FROM tbl_meeting_request WHERE ProjectID = '".$row['ProjectID']."') AND userID='".$_SESSION['participantSession']."' $theage $thegender $theheight
	$thecity $thestatus $theethnicity $thesmoke $thedrink $thediet $thereligion $theeducation $thejob
  ");



if(mysqli_num_rows($sql3)>0)
{




while($row3 = mysqli_fetch_array($sql3))
{ 


echo '



<div class="row-fluid">
<div class="therow">
  <div class="col-lg-2">';

  if($row['project_image'] != ''){
  
  echo '<img src="'.BASE_PATH.'/ideas/uploads/'.$row['project_image'].'" class="img-circle-profile"/>';

}else{

 echo '<img src="'.BASE_PATH.'/ideas/uploads/thumbnail.jpg" class="img-circle-profile"/>';
}
  echo '</div>
  <div class="col-lg-7"><p><h4>'.$row['Name'].'</h4></p><p>'.$row['Details'].'</p>
  <p>Payout: $'.$row['Pay'].' for '.$row['Minutes'].' minutes </p></div>
   <div class="col-lg-3"><a href="../../../ideas/p/'.$row['Category'].'/?id='.$row['ProjectID'].'"><button type="button" class="btn-request">View Idea</button></a> </div>
</div>
</div>



</div>





';


}



}


}






}






echo '</div>';




?>

