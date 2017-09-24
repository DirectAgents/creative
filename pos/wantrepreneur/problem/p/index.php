<?php
session_start();




require_once(__DIR__."../../../base_path.php");

require_once (__DIR__.'../../../class.participant.php');
require_once (__DIR__.'../../../class.startup.php');
require_once (__DIR__.'../../../config.php');
require_once (__DIR__.'../../../config.inc.php');







$Project = mysqli_query($connecDB,"SELECT * FROM tbl_startup_project WHERE ProjectID='".$_GET['id']."'");
$rowproject = mysqli_fetch_array($Project);


if($rowproject == false ){
  //header("Location:".BASE_PATH."/participant/meetings/");
  header("Location:".BASE_PATH."/404.php");
  exit();
}else{


$startupprofile = mysqli_query($connecDB,"SELECT * FROM tbl_startup WHERE userID='".$rowproject['startupID']."'");
$rowstartupprofile= mysqli_fetch_array($startupprofile);


$Screening = mysqli_query($connecDB,"SELECT * FROM tbl_startup_screeningquestion WHERE ProjectID='".$_GET['id']."'");
$rowscreening = mysqli_fetch_array($Screening);


$sql = mysqli_query($connecDB,"SELECT * FROM tbl_feedback_archived_participant WHERE userID='".$_SESSION['participantSession']."' AND ProjectID = '".$_GET['id']."' AND startupID = '".$rowstartupprofile['userID']."'");
//$result=mysql_query($sql);
$rowarchived=mysqli_fetch_array($sql);



$participant_home = new PARTICIPANT();

if(!$participant_home->is_logged_in())
{
 header("Location:".BASE_PATH."/participant/login/");
}



if($participant_home->is_logged_in())
{





$stmt = $participant_home->runQuery("SELECT * FROM tbl_participant WHERE userID='".$_SESSION['participantSession']."'");
$stmt->execute(array(":uid"=>$_SESSION['participantSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);


$Min_Req = str_replace(",","|",$rowproject['MinReq']);

$Meetupchoice = str_replace(",","|",$rowproject['Meetupchoice']);
$Age = str_replace(",","|",$rowproject['Age']);
$Gender = str_replace(",","|",$rowproject['Gender']);
$Height = str_replace(",","|",$rowproject['MinHeight']);
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


$sql2=mysqli_query($connecDB,"SELECT * FROM tbl_participant WHERE userID='".$_SESSION['participantSession']."'");
//$results2=mysql_query($sql2);
$row2 = mysqli_fetch_array($sql2);



if(($row['Height'] >= $rowproject['MinHeight']) && ($row['Height'] <= $rowproject['MaxHeight'])) {

$Height_Final = $row['Height'];

}else{

$Height_Final = $row['Height'] + 1;  

}


//echo $Min_Req;
//if (strpos($Min_Req, 'Age') !== false) {echo "yes";}


//echo $Gender;


if (strpos($Min_Req, 'Age') !== false) {
if($Age != 'NULL' && $Age != ''){$theage = "AND p.Age RLIKE '[[:<:]]".$Age."[[:>:]]'";}else{$theage = "";}
}else{
  $theage = '';
}


if (strpos($Min_Req, 'Gender') !== false) {
if($Gender != 'NULL' && $Gender != ''){$thegender = "AND p.Gender RLIKE '[[:<:]]".$Gender."[[:>:]]'";}else{$thegender = '';}
}else{
  $thegender = '';
}

if (strpos($Min_Req, 'Height') !== false) {
if($Height != 'NULL' && $Height != ''){$theheight = "AND p.Height RLIKE '[[:<:]]".$Height_Final."[[:>:]]'";}else{$theheight = '';}
}else{
  $theheight = '';
}

if (strpos($Min_Req, 'City') !== false) {
if($City != 'NULL' && $City != ''){$thecity = "AND p.City RLIKE '[[:<:]]".$City."[[:>:]]'";}else{$thecity = '';}
}else{
  $thecity = '';
}


if (strpos($Min_Req, 'Status') !== false) {
if($Status != 'NULL' && $Status != ''){$thestatus = "AND p.Status RLIKE '[[:<:]]".$Status."[[:>:]]'";}else{$thestatus = '';}
}else{
  $thestatus = '';
}


if (strpos($Min_Req, 'Ethnicity') !== false) {
if($Ethnicity != 'NULL' && $Ethnicity != ''){$theethnicity = "AND p.Ethnicity RLIKE '[[:<:]]".$Ethnicity."[[:>:]]'";}else{$theethnicity = '';}
}else{
  $theethnicity = '';
}


if (strpos($Min_Req, 'Smoke') !== false) {
if($Smoke != 'NULL' && $Smoke != ''){$thesmoke = "AND p.Smoke RLIKE '[[:<:]]".$Smoke."[[:>:]]'";}else{$thesmoke = '';}
}else{
  $thesmoke = '';
}


if (strpos($Min_Req, 'Drink') !== false) {
if($Drink != 'NULL' && $Drink != ''){$thedrink = "AND p.Drink RLIKE '[[:<:]]".$Drink."[[:>:]]'";}else{$thedrink = '';}
}else{
  $thedrink = '';
}


if (strpos($Min_Req, 'Diet') !== false) {
if($Diet != 'NULL' && $Diet != ''){$thediet = "AND p.Diet RLIKE '[[:<:]]".$Diet."[[:>:]]'";}else{$thediet = '';}
}else{
  $thediet = '';
}

if (strpos($Min_Req, 'Religion') !== false) {
if($Religion != 'NULL' && $Religion != ''){$thereligion = "AND p.Religion RLIKE '[[:<:]]".$Religion."[[:>:]]'";}else{$thereligion = '';}
}else{
  $thereligion = '';
}


if (strpos($Min_Req, 'Education') !== false) {
if($Education != 'NULL' && $Education != ''){$theeducation = "AND p.Education RLIKE '[[:<:]]".$Education."[[:>:]]'";}else{$theeducation = '';}
}else{
  $theeducation = '';
}


if (strpos($Min_Req, 'Job') !== false) {
if($Job != 'NULL' && $Job != ''){$thejob = "AND p.Job RLIKE '[[:<:]]".$Job."[[:>:]]'";}else{$thejob = '';}
}else{
  $thejob = '';
}


if (strpos($Min_Req, 'Interests') !== false) {
if($Interests != 'NULL' && $Interests != ''){$interest = "AND p.Interests RLIKE '[[:<:]]".$Interests."[[:>:]]'";}else{$interests = '';}
}else{
  $interests = '';
}

if (strpos($Min_Req, 'Languages') !== false) {
if($Languages != 'NULL' && $Languages != ''){$languages = "AND p.Languages RLIKE '[[:<:]]".$Languages."[[:>:]]'";}else{$languages = '';}
}else{
  $languages = '';
}




$sql3 = mysqli_query($connecDB,"SELECT * FROM `tbl_participant` AS p INNER JOIN `tbl_startup_project` AS r ON p.userID='".$_SESSION['participantSession']."'
AND r.ProjectID ='".$_GET['id']."' $theage $thegender $theheight $thecity $thestatus $theethnicity $thesmoke $thedrink $thediet $thereligion $theeducation $thejob $interests $languages");



if(mysqli_num_rows($sql3) == false)
{
  //echo $_SESSION['participantSession'];
  //echo "You can't view this page";
  header("Location:../../../participant/");

}




$sql = mysqli_query($connecDB,"SELECT * FROM tbl_feedback_request WHERE userID='".$_SESSION['participantSession']."' AND ProjectID = '".$_GET['id']."' AND startupID = '".$rowstartupprofile['userID']."'");
//$result=mysql_query($sql);
$rowrequest=mysqli_fetch_array($sql);



$sqlupcoming = mysqli_query($connecDB,"SELECT * FROM tbl_feedback_upcoming WHERE userID='".$_SESSION['participantSession']."' AND ProjectID = '".$_GET['id']."' AND startupID = '".$rowstartupprofile['userID']."'");
//$result=mysql_query($sql);
$rowupcoming=mysqli_fetch_array($sqlupcoming);


$sqlrecent = mysqli_query($connecDB,"SELECT * FROM tbl_feedback_recent WHERE userID='".$_SESSION['participantSession']."' AND ProjectID = '".$_GET['id']."' AND startupID = '".$rowstartupprofile['userID']."'");
//$result=mysql_query($sql);
$rowmeetingrecent=mysqli_fetch_array($sqlrecent);


$sqlarchived = mysqli_query($connecDB,"SELECT * FROM tbl_feedback_archived_participant WHERE userID='".$_SESSION['participantSession']."' AND ProjectID = '".$_GET['id']."' AND startupID = '".$rowstartupprofile['userID']."' AND Met = 'Yes'");
//$result=mysql_query($sql);
$rowarchived=mysqli_fetch_array($sqlarchived);




  $update_sql = mysqli_query($connecDB,"UPDATE tbl_feedback_request SET Viewed_by_Participant='Yes'
  WHERE userID='".$_SESSION['participantSession']."' AND ProjectID = '".$_GET['id']."' ");

  $update_sql = mysqli_query($connecDB,"UPDATE tbl_feedback_upcoming SET Viewed_by_Participant='Yes'
  WHERE userID='".$_SESSION['participantSession']."' AND ProjectID = '".$_GET['id']."' ");

  $update_sql = mysqli_query($connecDB,"UPDATE tbl_feedback_recent SET Viewed_by_Participant='Yes'
  WHERE userID='".$_SESSION['participantSession']."' AND ProjectID = '".$_GET['id']."' ");


}






$meetupchoice=explode(',',$rowproject['Meetupchoice']);
$age=explode(',',$rowproject['Age']);
$gender=explode(',',$rowproject['Gender']);
$minheight=explode(',',$rowproject['MinHeight']);
$maxheight=explode(',',$rowproject['MaxHeight']);
$city=explode(',',$rowproject['City']);
$status=explode(',',$rowproject['Status']);
$ethnicity=explode(',',$rowproject['Ethnicity']);
$smoke=explode(',',$rowproject['Smoke']);
$drink=explode(',',$rowproject['Drink']);
$diet=explode(',',$rowproject['Diet']);
$religion=explode(',',$rowproject['Religion']);
$education=explode(',',$rowproject['Education']);
$job=explode(',',$rowproject['Job']);








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


<div class="row-fluid">
  <div class="span12">



<div id="white-container">
      <div id="dashboardSurveyTargetingContainerLogic">





<div class="container">


<?php 

if($participant_home->is_logged_in())
{

if(isset($_GET['p'])){

if($rowrequest['userID'] == $_SESSION['participantSession'] && $rowrequest['ProjectID'] == $_GET['id'] && $rowrequest['ScreeningQuestion'] != 'Not Passed' ){

//echo $rowrequest['ProjectID'];

 ?>


<div class="col-lg-11">

<div class="request-sent">  


<?php if($rowrequest['Status'] == 'Waiting for Participant to Accept or Decline'){ ?>
  Already received a request to meet. Waiting for you to accept or decline.
<?php } ?>
<?php if($rowrequest['Status'] == 'Waiting for Startup to Accept or Decline'){ ?>
  Already Request sent to Participate. Waiting for <strong><?php echo $rowstartupprofile['FirstName']; ?></strong> to respond.
<?php } ?>


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

  


<div class="col-lg-5"><h2>Payout</h2><h3><span class="details-box">$<?php echo $rowproject['Pay']; ?></span> </span></h3></div>




<?php if(mysqli_num_rows($sql) == 0 && mysqli_num_rows($sqlupcoming) == 0 && mysqli_num_rows($sqlarchived) == 0
  && mysqli_num_rows($sqlrecent) == 0 && mysqli_num_rows($sql3) == 1) { ?>

<div class="col-lg-3">
  <div class="btn-setup-a-meeting">
<a href="#select-dates">Set up a meeting</a>

</div>

</div>

<?php } ?>


<?php if(!$participant_home->is_logged_in() && $_SESSION['startupSession'] == '')
{ ?>

<div class="col-lg-4">
  <a href="<?php echo BASE_PATH; ?>/participant/login/?p=<?php echo $_GET['id']; ?>" role="button" class="111slide_open">
  <button type="button" class="btn-request">
  Login to Participate</button></a>
</div>

<?php } ?>



     <div class="col-lg-12">
      <p>&nbsp;</p>
      <h3>What is the stated Problem?</h3>
      <h4 class="grey"><?php echo $rowproject['Problem']; ?></h4>
     
      </div>


      <div class="col-lg-12">

<div id="publish-answer-chosen">

      <p>&nbsp;</p>
      <h4>To participate, please choose one of the following answers:</h4>

       <div class="problem">
      <p class="grey"><input type="radio" name="possibleanswers[]" id="possibleanswer1" value="Yes, I have that problem">Yes, I have that problem</p>
      <p class="grey"><input type="radio" name="possibleanswers[]" id="possibleanswer2" value="No, I don't have that problem">No, I don't have that problem</p>
      <p class="grey"><input type="radio" name="possibleanswers[]" id="possibleanswer3" value="Sometimes">Sometimes</p>
      <p class="grey"><input type="radio" name="possibleanswers[]" id="possibleanswer4" value="Very rare">Very rare</p>
    


  </div>

<input type="hidden" name="problemid" id="problemid" value="<?php echo $_GET['id']; ?>"/>  

<input type="hidden" name="projectid" id="projectid" value="<?php echo $rowproject['ProjectID']; ?>"/>  


<div class="space"></div>
  <div class="col-lg-12">
<div id="participate-btn">Submit Answer</div>
</div>


</div>




<!-- Delete a Project -->

<div id="slide" class="well slide">
 

<div id="PossibleAnswer1_Question1">
1
<p>

<!--Max recording is set to 5 minutes -->

<!-- begin video recorder code -->
<script type="text/javascript">
var size = {width:400,height:330};
var flashvars = {qualityurl: "avq/300p.xml",accountHash:"806aaf1fee6d34f6268b141febc7cba3", eid:1, showMenu:"true", mrt:300,sis:0,asv:1,mv:0, payload:"{\"userID\":\"<?php echo $_SESSION['participantSession']; ?>\",\"Answer\":\"PossibleAnswer1_Question1\"}"};
(function() {var pipe = document.createElement('script'); pipe.type = 'text/javascript'; pipe.async = true;pipe.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 's1.addpipe.com/1.3/pipe.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(pipe, s);})();
</script>
<div id="hdfvr-content" ></div>
<!-- end video recorder code -->

</p>
</div>


<div id="PossibleAnswer1_Question2">
<br><br><br>
2
<p>

<!--Max recording is set to 5 minutes -->

<!-- begin video recorder code -->
<script type="text/javascript">
var size = {width:400,height:330};
var flashvars = {qualityurl: "avq/300p.xml",accountHash:"806aaf1fee6d34f6268b141febc7cba3", eid:1, showMenu:"true", mrt:300,sis:0,asv:1,mv:0, payload:"{\"userID\":\"<?php echo $_SESSION['participantSession']; ?>\",\"Answer\":\"PossibleAnswer1_Question2\"}"};
(function() {var pipe = document.createElement('script'); pipe.type = 'text/javascript'; pipe.async = true;pipe.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 's1.addpipe.com/1.3/pipe.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(pipe, s);})();
</script>
<div id="hdfvr-content" ></div>
<!-- end video recorder code -->

</p>
</div>


<input type="hidden" name="projectid" id="projectid" value="<?php echo $rowproject['ProjectID']; ?>"/>
<div class="popupoverlay-btn">
  <div class="cancel-delete">
    <button class="slide_close cancel">Close</button>
</div>

<div class="popupoverlay-btn">
  <div class="close-delete">
    <button class="slide_close cancel">Close</button>
</div>
</div>

</div>
</div>

<!-- End Delete a Project -->






<?php

$post = ['userid' => $_SESSION['participantSession']];



  $url = "https://misterpao.com/pipe/getvideo.php";
  $client = curl_init($url);
  curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($client, CURLOPT_POSTFIELDS, $post);
  $response = curl_exec($client);
  $result = json_decode($response);
  if( empty($result) ) {
    //var_dump($response);
        echo $response;
        //$videoname = $response;
  } else {
    //var_dump($response);
        //echo $response;
  }


?>











<?php if($participant_home->is_logged_in()) { ?>






  <?php if(mysqli_num_rows($sql) == 0 && mysqli_num_rows($sqlupcoming) == 0 
  && mysqli_num_rows($sqlrecent) == 0 && mysqli_num_rows($sqlarchived) == 0) { ?>












<?php 

if($participant_home->is_logged_in())
{

?>









<?php if(mysqli_num_rows($Screening)==1 && $rowscreening['EnabledorDisabled'] == 'Enabled') { ?>

 <div class="col-lg-12" style="background:#eee"> 


 <input type="hidden" id="screeningquestion_required" name="screeningquestion_required" style="display:block" value="Yes"/> 


 <div class="col-sm-12">

<h3>Please answer the following question:</h4>

<h4><?php echo $rowscreening['ScreeningQuestion']; ?></h3>

<br>

 </div>

  <div class="col-sm-12">
  <div class="dashboardSurveyTargetingContainerPotentialAnswersInputContainer">

<?php if($rowscreening['PotentialAnswer1'] != '') { ?>
  <div class="col-sm-12" style="padding-bottom:20px;">
<div class="col-sm-radio">
 <input id="potentialanswer1" name="potentialanswergiven[]" type="radio" style="display:block" value="Potential Answer 1"/> 
</div>
<div class="col-sm-2">
 <label for="potentialanswer1"><?php echo $rowscreening['PotentialAnswer1']; ?></label>
 </div>
 </div>
<br>
<?php } ?>


<?php if($rowscreening['PotentialAnswer2'] != '') { ?>
<div class="col-sm-12" style="padding-bottom:20px;">
 <div class="col-sm-radio">
 <input id="potentialanswer2" name="potentialanswergiven[]" type="radio" style="display:block" value="Potential Answer 2"/> 
</div>
<div class="col-sm-2">
 <label for="potentialanswer2"><?php echo $rowscreening['PotentialAnswer2']; ?></label>
 </div>
 </div>
<br>
<?php } ?>


<?php if($rowscreening['PotentialAnswer3'] != '') { ?>
<div class="col-sm-12" style="padding-bottom:20px;">
  <div class="col-sm-radio">
 <input id="potentialanswer3" name="potentialanswergiven[]" type="radio" style="display:block" value="Potential Answer 3"/> 
</div>
<div class="col-sm-2">
 <label for="potentialanswer3"><?php echo $rowscreening['PotentialAnswer3']; ?></label>
 </div>
</div>
<?php } ?>

 
</div>
 <?php } ?>






<?php } ?>


    <p>&nbsp;</p>
    <div id="result_success"></div>
    <div id="result_error"></div>

      
    
  

 </div>
 </div>

 </div>



    

<?php } ?>

<?php }  ?>            
</div>
          
      </div>

          </div>



      <!--Footer-->
<?php include("../../../footer.php"); ?>
<!--Footer-->

      

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



<script>
$(document).ready(function () {


$(document).on("click", ".slide_open", function () {

  

     var selected = $(this).data('id');

     //alert(selected);
     
     if(selected == 'PossibleAnswer1_Question1'){
      alert(selected);
     $("#PossibleAnswer1_Question2").hide();
     $("#PossibleAnswer1_Question1").show();
     return false;
     }

     if(selected == 'PossibleAnswer1_Question2'){
     $("#PossibleAnswer1_Question2").show();
     $("#PossibleAnswer1_Question1").hide();
     return false;
     }
     // As pointed out in comments, 
     // it is superfluous to have to manually call the modal.
     // $('#addBookDialog').modal('show');
});


    $('#slide').popup({
        focusdelay: 400,
        outline: true,
        vertical: 'top'
    });

});
</script>


        
    </body>

</html>



<?php } ?>
