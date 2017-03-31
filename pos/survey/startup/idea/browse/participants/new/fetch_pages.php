<?php
session_start();
require_once '../../../../../base_path.php'; 

include("../../../../../config.php"); //include config file
require_once '../../../../../class.startup.php';
//sanitize post value
$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);

//echo $page_number;

//throw HTTP error if page number is not valid
if(!is_numeric($page_number)){
  header('HTTP/1.1 500 Invalid page number!');
  exit();
}

//get current starting point of records
$position = ($page_number * $item_per_page);



$sql = mysqli_query($connecDB,"SELECT * FROM tbl_startup_project WHERE ProjectID = '".$_GET['id']."' AND startupID='".$_SESSION['startupSession']."'");
$row = mysqli_fetch_array($sql);



$Min_Req = str_replace(",","|",$row['MinReq']);

$Meetupchoice = str_replace(",","|",$row['Meetupchoice']);
$Age = str_replace(",","|",$row['Age']);
$Gender = str_replace(",","|",$row['Gender']);
$Height = $row['MinHeight'];
$City = str_replace(",","|",$row['City']);
$Status = str_replace(",","|",$row['Status']); 
$Ethnicity = str_replace(",","|",$row['Ethnicity']);
$Smoke = str_replace(",","|",$row['Smoke']);
$Drink = str_replace(",","|",$row['Drink']);
$Diet = str_replace(",","|",$row['Diet']);
$Religion = str_replace(",","|",$row['Religion']);
$Education = str_replace(",","|",$row['Education']);
$Job = str_replace(",","|",$row['Job']);
$Interest = str_replace(",","|",$row['Interest']);
$Languages = str_replace(",","|",$row['Languages']);


//if($Meetupchoice != 'NULL'){$themeetupchoice = "AND Meetupchoice RLIKE '[[:<:]]".$Meetupchoice."[[:>:]]'";}else{$themeetupchoice = '';}


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
if($Height != 'NULL' && $Height != ''){$theheight = "AND Height Between '".$row['MinHeight']."' AND '".$row['MaxHeight']."'";}else{$theheight = '';}
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


if (strpos($Min_Req, 'Interest') !== false) {
if($Interest != 'NULL' && $Interest != ''){$interest = "AND Interest RLIKE '[[:<:]]".$Interest."[[:>:]]'";}else{$interest = '';}
}else{
  $interest = '';
}

if (strpos($Min_Req, 'Languages') !== false) {
if($Languages != 'NULL' && $Languages != ''){$languages = "AND Languages RLIKE '[[:<:]]".$Languages."[[:>:]]'";}else{$languages = '';}
}else{
  $languages = '';
}



//Limit our results within a specified range. 

$results = mysqli_query($connecDB,"SELECT * FROM tbl_participant WHERE userID NOT IN (SELECT userID FROM tbl_participant_meeting_participated WHERE ProjectID = '".$_GET['id']."') $theage $thegender $theheight $thecity $thestatus $theethnicity $thesmoke $thedrink $thediet $thereligion $theeducation $thejob $interest $languages ORDER BY userID DESC LIMIT $position, $item_per_page");




//Check if Screening Question is required for this idea






//$results = mysql_query("SELECT id,userID, Gender FROM tbl_participant_project 
//WHERE Gender RLIKE '".$Gender."' OR Age RLIKE '".$Age."' ORDER BY id DESC LIMIT $position, $item_per_page");

if(mysqli_num_rows($results)<1)
{
echo "<div class='no-participants'>";
echo "<h3>";
echo "No potential Participants available!";
echo "</h3>";
echo "<h4>";
echo "Check back later!";
echo "</h4>";
echo "</div>";

echo '
<script type="text/javascript">
$(".load_more").hide();
</script>
';

}else{


echo "</div>";





//output results from database
echo '<ul class="page_result">';


echo '<div class="col-lg-12" style="margin-bottom:50px; margin-top:30px;">';


//while($results->fetch()){ //fetch values
while($row2 = mysqli_fetch_array($results))
{ 

//echo $row2['userID'];



//echo $row['userID'];


$sql3 = mysqli_query($connecDB,"SELECT * FROM tbl_participant WHERE userID = '".$row2['userID']."' ");
$row3 = mysqli_fetch_array($sql3);









echo '


 



  <div class="col-lg-3" style="background:#eee; margin-right:20px; padding:10px 0 10px 0;">';

echo '
<table class="table-no-border">
   <tbody>
<tr><td>

<a href="'.BASE_PATH.'/profile/participant/?id='.$row2['userID'].'&p='.$_GET['id'].'">';




if($row3['google_picture_link'] != ''){
        echo '<img src="'.$row3['google_picture_link'].'" class="thumbnail-profile-browse"/>';
 }

if($row3['facebook_id'] != '0'){ 
        echo '<img src="https://graph.facebook.com/'.$row3['facebook_id'].'/picture?width=150&height=150" class="thumbnail-profile-browse"/>';
}
       
if($row3['google_picture_link'] == '' && $row3['facebook_id'] == '0'){

if($row3['profile_image'] != ''){ 
        echo '<img src="'.BASE_PATH.'/images/profile/participant/'.$row3['profile_image'].'" class="thumbnail-profile-browse"/>';
}else{
        echo '<img src="'.BASE_PATH.'/images/profile/thumbnail.jpg" class="thumbnail-profile-browse"/>';
 }

}

echo '</td> </tr>';
   
   echo '  
  <tr><td>
   <a href="'.BASE_PATH.'/profile/participant/?id='.$row2['userID'].'&p='.$_GET['id'].'" class="notextdecoration"><h4>'.$row2['FirstName'].'</h4></a>'.$row2['Age'].' - '.$row2['City'].', '.$row2['State'].'
   </td></tr>

    </tbody>
  </table>



   ';


echo '</a>';

  echo '</div>';

  ?>




  <form action="" id="contact-form" class="form-horizontal" method="post">

        
           
              <input type="hidden" name="userid" id="userid" value="<?php echo $row2['userID']; ?>">
              <input type="hidden" name="projectid" id="projectid" value="<?php echo $_GET['id']; ?>">
          

          </form>







<?php 




}

}

?>

</div>

<input type="hidden" name="firstname" id="firstname" value="'.$row2['FirstName'].'"/>
<input type="hidden" name="userid'.$row2['userID'].'" id="userid" value="'.$row2['userID'].'"/>
<input type="hidden" name="projectid" id="projectid" value="'.$_GET['id'].'"/>



    


















