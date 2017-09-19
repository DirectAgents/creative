<?php
session_start();

require_once '../../../base_path.php';

require_once '../../../class.participant.php';
require_once '../../../class.startup.php';
include_once("../../../config.php");
include("../../../config.inc.php");



$Project = mysqli_query($connecDB,"SELECT * FROM tbl_startup_project WHERE ProjectID='".$_GET['id']."'");
$rowproject = mysqli_fetch_array($Project);


$startupprofile = mysqli_query($connecDB,"SELECT * FROM tbl_startup WHERE userID='".$_SESSION['startupSession']."'");
$rowstartupprofile = mysqli_fetch_array($startupprofile);



$Screening = mysqli_query($connecDB,"SELECT * FROM tbl_startup_screeningquestion WHERE ProjectID='".$_GET['id']."' AND EnabledorDisabled = 'Enabled'");
$rowscreening = mysqli_fetch_array($Screening);





$participant_home = new PARTICIPANT();


if($participant_home->is_logged_in())
{
  header("Location:../../../participant/");
 }


$startup_home = new STARTUP();

if(!$startup_home->is_logged_in())
{
 header("Location:../../../entrepreneur/");
}


if(!isset($_GET['id'])){
header("Location:../../../entrepreneur/");
}


if($startup_home->is_logged_in())
{
//exit();
//echo $_SESSION['startupSession'];

$startup = mysqli_query($connecDB,"SELECT * FROM tbl_startup_project WHERE startupID='".$_SESSION['startupSession']."' AND ProjectID = '".$_GET['id']."'");
$rowstartup = mysqli_fetch_array($startup);


if($rowstartup == false ){
  //header("Location:".BASE_PATH."/participant/feedbacks/");
  header("Location:".BASE_PATH."/404.php");
  exit();
}else{



if(isset($_GET['p'])){
$participant = mysqli_query($connecDB,"SELECT * FROM tbl_participant WHERE userID='".$_GET['p']."'");
$rowparticipant= mysqli_fetch_array($participant);
}


$Screening = mysqli_query($connecDB,"SELECT * FROM tbl_startup_screeningquestion WHERE ProjectID='".$_GET['id']."' AND userID='".$_SESSION['startupSession']."' ");
$screeningquestion = mysqli_fetch_array($Screening);


if(isset($_GET['p'])){
$sqlparticipantanswer = mysqli_query($connecDB,"SELECT * FROM tbl_participant_potentialanswer WHERE userID='".$_GET['p']."' AND ProjectID = '".$_GET['id']."'");
//$result=mysql_query($sql);
$rowparticipantanswer=mysqli_fetch_array($sqlparticipantanswer);


$sqlarchived = mysqli_query($connecDB,"SELECT * FROM tbl_feedback_archived_startup WHERE startupID='".$_SESSION['startupSession']."' AND ProjectID = '".$_GET['id']."' AND userID = '".$_GET['p']."' AND Met = 'Yes'");
//$result=mysql_query($sql);
$rowarchived=mysqli_fetch_array($sqlarchived);


$sqlparticipated = mysqli_query($connecDB,"SELECT * FROM tbl_participant_feedback_participated WHERE ProjectID = '".$_GET['id']."' AND userID = '".$_GET['p']."'");
//$result=mysql_query($sql);
$rowparticipated=mysqli_fetch_array($sqlparticipated);

}


if(isset($_GET['p'])){
$sql = mysqli_query($connecDB,"SELECT * FROM tbl_feedback_request WHERE startupID='".$_SESSION['startupSession']."' AND userID='".$_GET['p']."' AND ProjectID = '".$_GET['id']."'");
//$result=mysql_query($sql);
$rowfeedbackrequest=mysqli_fetch_array($sql);
}

if(isset($_GET['p'])){
$sqlupcoming = mysqli_query($connecDB,"SELECT * FROM tbl_feedback_upcoming WHERE startupID='".$_SESSION['startupSession']."' AND userID='".$_GET['p']."' AND ProjectID = '".$_GET['id']."'");
//$result=mysql_query($sql);
$rowfeedbackupcoming=mysqli_fetch_array($sqlupcoming);
}


if(isset($_GET['p'])){
$sqlrecent = mysqli_query($connecDB,"SELECT * FROM tbl_feedback_recent WHERE startupID='".$_SESSION['startupSession']."' AND userID='".$_GET['p']."' AND ProjectID = '".$_GET['id']."'");
//$result=mysql_query($sql);
$rowfeedbackrecent=mysqli_fetch_array($sqlrecent);
}



$update_sql = mysqli_query($connecDB,"UPDATE tbl_feedback_request SET Viewed_by_Startup='Yes'
  WHERE startupID='".$_SESSION['startupSession']."' AND ProjectID = '".$_GET['id']."' ");

  $update_sql = mysqli_query($connecDB,"UPDATE tbl_feedback_upcoming SET Viewed_by_Startup='Yes'
  WHERE startupID='".$_SESSION['startupSession']."' AND ProjectID = '".$_GET['id']."' ");

  $update_sql = mysqli_query($connecDB,"UPDATE tbl_feedback_recent SET Viewed_by_Startup='Yes'
  WHERE startupID='".$_SESSION['startupSession']."' AND ProjectID = '".$_GET['id']."' ");



$Min_Req = str_replace(",","|",$rowproject['MinReq']);

$Meetupchoice = str_replace(",","|",$rowproject['Meetupchoice']);
$Age = str_replace(",","|",$rowproject['Age']);
$Gender = str_replace(",","|",$rowproject['Gender']);
$Height = $rowproject['MinHeight'];
$City = str_replace(",","|",$rowproject['City']);
$Status = str_replace(",","|",$rowproject['Status']); 
$Ethnicity = str_replace(",","|",$rowproject['Ethnicity']);
$Smoke = str_replace(",","|",$rowproject['Smoke']);
$Drink = str_replace(",","|",$rowproject['Drink']);
$Diet = str_replace(",","|",$rowproject['Diet']);
$Religion = str_replace(",","|",$rowproject['Religion']);
$Education = str_replace(",","|",$rowproject['Education']);
$Job = str_replace(",","|",$rowproject['Job']);
$Interests = str_replace(",","|",$rowproject['Interests']);
$Languages = str_replace(",","|",$rowproject['Languages']);





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




if(isset($_GET['p'])){

$results = mysqli_query($connecDB,"SELECT * FROM tbl_participant WHERE userID = '".$_GET['p']."' $theage $thegender $theheight $thecity $thestatus $theethnicity $thesmoke $thedrink $thediet $thereligion $theeducation $thejob $interests $languages ORDER BY userID DESC");






if(mysqli_num_rows($startup)<0)
{
  //$startup_home->logout();
  header("Location:../../../startup/");
 }

}

}







?>

<!DOCTYPE html>
<html lang="en" id="features" class="tablet mobile">
    
    <head>



<?php include("../../../header.php"); ?>



        
    </head>
    
    <body>

<!--TopNav-->
         <header id="main-header" class='transparent'>
  <div class="inner-col">
   


<?php include("../../../nav.php"); ?>

   
  </div>
</header>


<!--TopNav-->




 <div class="clearer"></div>


<!-- Main -->
<div class="container">
   <div class="container">


<div class="row-fluid">
  <div class="span12">



<div id="white-container">
      <div id="dashboardSurveyTargetingContainerLogic">





<div class="container">



<?php 

if($startup_home->is_logged_in())
{


if(isset($_GET['p'])){

if($rowfeedbackrequest['startupID'] == $_SESSION['startupSession'] && $rowfeedbackrequest['ProjectID'] == $_GET['id'] && $rowfeedbackrequest['ScreeningQuestion'] != 'Not Passed' ){

//echo $rowrequest['ProjectID'];

 ?>


<div class="col-lg-11">

<div class="request-sent">  


<?php if($rowfeedbackrequest['Status'] == 'Waiting for Participant to Accept or Decline'){ ?>
  Already Request sent to Participate. Waiting for <strong><?php echo $rowparticipant['FirstName']; ?></strong> to respond.
<?php } ?>
<?php if($rowfeedbackrequest['Status'] == 'Waiting for Startup to Accept or Decline'){ ?>
  Already received a request to meet. Waiting for you to accept or decline. 
<?php } ?>


</div>
<p>&nbsp;</p>

</div>


<?php } ?> 

<?php } ?>

<?php } ?>



<div class="col-lg-12">





<?php 
if(isset($_GET['p'])){
if(mysqli_num_rows($results) == 0) { ?>


<!--<center><h3><?php echo $rowparticipant['FirstName']; ?> does not qualify for this idea to provide feedback</h3></center>-->


<?php }else{ ?>



<?php if(mysqli_num_rows($sql) == 1) { ?>


<?php if($rowfeedbackrequest['Requested_By'] == 'Startup'){ ?>

<div class="col-lg-11" style="padding:0px; margin-bottom:30px;">
 <div class="success2">
You have sent <?php echo $rowparticipant['FirstName']; ?> a request to meet.

</div>
</div>

<?php } ?>

<?php } ?>





<?php if(mysqli_num_rows($sqlupcoming) == 1) { ?>

<div class="col-lg-11" style="padding:0px;">
 <div class="success2">
You will meet <?php echo $rowparticipant['FirstName']; ?> on  <?php echo date('F j, Y',strtotime($rowfeedbackupcoming['Date_of_feedback'])); ?> 
at <?php echo $rowfeedbackupcoming['Final_Time']; ?><br>

</div>
<p>&nbsp;</p>
</div>



<?php } ?>

<?php } ?>

<?php } ?>
  


 <div class="col-lg-2">
      
      <?php
  if($rowproject['project_image'] != ''){ ?>
  
  <img src="<?php echo BASE_PATH; ?>/problem/uploads/<?php echo $rowproject['project_image']; ?>" class="img-circle-profile"/>

<?php

}else{

 echo '<img src="'.BASE_PATH.'/problem/uploads/thumbnail.jpg" class="img-circle-profile"/>';
}
  
      ?>


    </div>

    <?php if($rowstartup['startupID'] == $_SESSION['startupSession']){ ?>
    
<div class="col-lg-5"><h2>Payout</h2><h3><span class="details-box">$<?php echo $rowproject['Pay']; ?></span></h3></div>



<?php if(isset($_GET['p'])){ ?>

<?php if(mysqli_num_rows($sql) == 0 && mysqli_num_rows($sqlupcoming) == 0 && mysqli_num_rows($sqlarchived) == 0
  && mysqli_num_rows($sqlparticipated) == 0 && mysqli_num_rows($sqlrecent) == 0 && mysqli_num_rows($results) == 1) { ?>

<div class="col-lg-3">
  <div class="btn-setup-a-feedback">
<a href="#select-dates">Set up a feedback</a>

</div>

</div>
<?php } ?>
<?php } ?>

<?php }else{ ?>


<div class="col-lg-5"><h2>Payout</h2><h3><span class="details-box">$<?php echo $rowproject['Pay']; ?></span></h3></div>


<?php } ?>




 


    <div class="col-lg-12">
      <p>&nbsp;</p>
      <h3>What is the stated Problem?</h3>
      <h4 class="grey"><?php echo $rowproject['Problem']; ?></h4>
     
      </div>



     





<?php if(isset($_GET['p'])){ ?>

asdfasdf


  <?php if(mysqli_num_rows($sql) == 0 && mysqli_num_rows($sqlupcoming) == 0 && mysqli_num_rows($sqlarchived) == 0
    && mysqli_num_rows($sqlparticipated) == 0 && mysqli_num_rows($sqlrecent) == 0 && mysqli_num_rows($results) == 1) { ?>


<input id="participantid" name="participantid" type="hidden" value="<?php echo $_GET['p']; ?>">









 <div class="col-lg-12">

   


<?php 

if($startup_home->is_logged_in())
{

if($rowstartupprofile['credit_card_id'] == '' && $rowparticipant['Payment_Method'] == 'Bank') { ?>


<div class="col-lg-11">

<div class="no-bankaccount-set">  
  Please add a credit card to send payments. <a href="<?php echo BASE_PATH; ?>/startup/payment/">Set up here</a>
</div>
<p>&nbsp;</p>

</div>




<?php } } ?>









<?php
  
if($rowparticipant['google_picture_link'] != ''){
        echo '<img src="'.$rowparticipant['google_picture_link'].'" class="img-circle-profile"/>';
 }

if($rowparticipant['facebook_id'] != '0'){ 
        echo '<img src="https://graph.facebook.com/'.$rowparticipant['facebook_id'].'/picture?width=100&height=100" class="img-circle-profile"/>';
}
       
if($rowparticipant['google_picture_link'] == '' && $rowparticipant['facebook_id'] == '0'){

if($rowparticipant['profile_image'] != ''){ 
        echo '<img src="'.BASE_PATH.'/images/profile/participant/'.$rowparticipant['profile_image'].'" class="img-circle-profile"/>';
}else{
        echo '<img src="'.BASE_PATH.'/images/profile/thumbnail.jpg" class="img-circle-profile"/>';
 }

}

      ?>


<center><h3><?php echo $rowparticipant['FirstName']; ?> qualifies for this idea to provide feedback</h3></center>




</div>




<input type="hidden" name="problemid" id="problemid" value="<?php echo $_GET['id']; ?>"/>  


<div class="space"></div>
  <div class="col-lg-12">
<div id="participate-btn">Submit Answer</div>
</div>



    <p>&nbsp;</p>
    <div id="result"></div>

</div>




<?php } ?>








<?php } ?>







    </div>
 </div>


  </div>
         

          
     
 </div>
     
      
      <!--Footer-->
<?php include("../../../footer.php"); ?>
<!--Footer-->

         
 </div>



      

    </div>

    <div class="clearer"></div>

  </div>
  </div>

  </div>




        <!--/.fluid-container-->
        <script src="<?php echo BASE_PATH; ?>/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_PATH; ?>/assets/scripts.js"></script>





    <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 40.730610, lng: -73.935242},
          zoom: 8
        });
        var input = /** @type {!HTMLInputElement} */(
            document.getElementById('pac-input'));

        var types = document.getElementById('type-selector');
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            //window.alert("Autocomplete's returned place contains no geometry");
            window.alert("Please choose a different address!");
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }
          marker.setIcon(/** @type {google.maps.Icon} */({
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(35, 35)
          }));
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);

          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

          infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
          infowindow.open(map, marker);
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, types) {
          var radioButton = document.getElementById(id);
          radioButton.addEventListener('click', function() {
            autocomplete.setTypes(types);
          });
        }

      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-lNejAuVNUDCwo2UxOAT_N_lQZb7qiQY&libraries=places&callback=initMap"
        async defer></script>


        
    </body>

</html>


<?php } ?>


