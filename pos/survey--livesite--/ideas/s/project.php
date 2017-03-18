<?php
session_start();

require_once '../../../base_path.php';

require_once '../../../class.participant.php';
require_once '../../../class.startup.php';
include_once("../../../config.php");
include("../../../config.inc.php");



$Project = mysqli_query($connecDB,"SELECT * FROM tbl_startup_project WHERE ProjectID='".$_GET['id']."'");
$rowproject = mysqli_fetch_array($Project);



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
 header("Location:../../../startup/");
}


if($startup_home->is_logged_in())
{
//exit();
//echo $_SESSION['startupSession'];

$startup = mysqli_query($connecDB,"SELECT * FROM tbl_startup_project WHERE startupID='".$_SESSION['startupSession']."' AND ProjectID = '".$_GET['id']."'");
$rowstartup = mysqli_fetch_array($startup);


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


$sqlarchived = mysqli_query($connecDB,"SELECT * FROM tbl_meeting_archived WHERE startupID='".$_SESSION['startupSession']."' AND ProjectID = '".$_GET['id']."'");
//$result=mysql_query($sql);
$rowarchived=mysqli_fetch_array($sqlarchived);

}


if(isset($_GET['p'])){
$sql = mysqli_query($connecDB,"SELECT * FROM tbl_meeting_request WHERE startupID='".$_SESSION['startupSession']."' AND userID='".$_GET['p']."' AND ProjectID = '".$_GET['id']."'");
//$result=mysql_query($sql);
$rowmeetingrequest=mysqli_fetch_array($sql);
}

if(isset($_GET['p'])){
$sqlupcoming = mysqli_query($connecDB,"SELECT * FROM tbl_meeting_upcoming WHERE startupID='".$_SESSION['startupSession']."' AND userID='".$_GET['p']."' AND ProjectID = '".$_GET['id']."'");
//$result=mysql_query($sql);
$rowmeetingupcoming=mysqli_fetch_array($sqlupcoming);
}


$update_sql = mysqli_query($connecDB,"UPDATE tbl_meeting_request SET Viewed_by_Startup='Yes'
  WHERE userID='".$_SESSION['startupSession']."' AND ProjectID = '".$_GET['id']."' ");

  $update_sql = mysqli_query($connecDB,"UPDATE tbl_meeting_upcoming SET Viewed_by_Startup='Yes'
  WHERE userID='".$_SESSION['startupSession']."' AND ProjectID = '".$_GET['id']."' ");



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
$Interest = str_replace(",","|",$rowproject['Interest']);
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




if(isset($_GET['p'])){

$results = mysqli_query($connecDB,"SELECT * FROM tbl_participant WHERE userID = '".$_GET['p']."' $theage $thegender $theheight $thecity $thestatus $theethnicity $thesmoke $thedrink $thediet $thereligion $theeducation $thejob $interest $languages ORDER BY userID DESC");






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



 <link rel="stylesheet" href="https://jqueryui.com/resources/demos/style.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
   

    $( "#date_option_one" ).datepicker({
      showOn: "button",
      buttonImage: "https://jqueryui.com/resources/demos/datepicker/images/calendar.gif",
      buttonImageOnly: false,
      minDate: 1,
      buttonText: "Select date"
    });

    $( "#date_option_two" ).datepicker({
      showOn: "button",
      buttonImage: "https://jqueryui.com/resources/demos/datepicker/images/calendar.gif",
      buttonImageOnly: false,
      minDate: 1,
      buttonText: "Select date"
    });

    $( "#date_option_three" ).datepicker({
      showOn: "button",
      buttonImage: "https://jqueryui.com/resources/demos/datepicker/images/calendar.gif",
      buttonImageOnly: false,
      minDate: 1,
      buttonText: "Select date"
    });

  } );
  </script>




<script>

$(document).ready(function() {


 $(".btn-request").click(function() {  
  
//alert("aads"); 


        //var screeningquestion_required  = $('input[name=screeningquestion_required]').val();

        var projectid  = $('input[name=projectid]').val();
        var participantid  = $('input[name=participantid]').val();
        
        var date_option_one  = $('input[name=date_option_one]').val();
        var date_option_two  = $('input[name=date_option_two]').val();
        var date_option_three  = $('input[name=date_option_three]').val();

        var time_suggested_one = $("select[name='time_suggested_one']").val();
        var time_suggested_two = $("select[name='time_suggested_two']").val();
        var time_suggested_three = $("select[name='time_suggested_three']").val();

        var location = $('#pac-input').val();

        //alert(days_availability_option);

        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        var proceed = true;

        
        

        if(!date_option_one) {

                $("#date_option_one").css('border-color','red');  //change border color to red   
                proceed = false; //set do not proceed flag            
        }else{
                $("#date_option_one").css('border-color','green');  //change border color to red 
                proceed = true; //set do not proceed flag       
        };

        if(!time_suggested_one) {

                $("#time_suggested_one").css('border-color','red');  //change border color to red   
                proceed = false; //set do not proceed flag            
        }else{
                $("#time_suggested_one").css('border-color','green');  //change border color to red 
                proceed = true; //set do not proceed flag       
        };


        if(!date_option_two) {

                $("#date_option_two").css('border-color','red');  //change border color to red   
                proceed = false; //set do not proceed flag            
         }else{
                $("#date_option_two").css('border-color','green');  //change border color to red 
                proceed = true; //set do not proceed flag       
        };

         if(!time_suggested_two) {

                $("#time_suggested_two").css('border-color','red');  //change border color to red   
                proceed = false; //set do not proceed flag            
        }else{
                $("#time_suggested_two").css('border-color','green');  //change border color to red 
                proceed = true; //set do not proceed flag       
        };


        if(!date_option_three) {

                $("#date_option_three").css('border-color','red');  //change border color to red   
                proceed = false; //set do not proceed flag            
         }else{
                $("#date_option_three").css('border-color','green');  //change border color to red 
                proceed = true; //set do not proceed flag       
        };

         if(!time_suggested_three) {

                $("#time_suggested_three").css('border-color','red');  //change border color to red   
                proceed = false; //set do not proceed flag            
        }else{
                $("#time_suggested_three").css('border-color','green');  //change border color to red 
                proceed = true; //set do not proceed flag       
        };

        if(!location) {

                $("#pac-input").css('border-color','red');  //change border color to red   
                proceed = false; //set do not proceed flag            
        }else{
                $("#pac-input").css('border-color','green');  //change border color to red 
                proceed = true; //set do not proceed flag       
        };
        
        //everything looks good! proceed...
        if(proceed) 
        {

            //data to be sent to server
   post_data = {'projectid':projectid,'participantid':participantid,'time_suggested_one':time_suggested_one, 'time_suggested_two':time_suggested_two,'time_suggested_three':time_suggested_three,'date_option_one':date_option_one, 'date_option_two':date_option_two, 'date_option_three':date_option_three,'location':location};
            
            //Ajax post data to server
            $.post('../request-to-meet.php', post_data, function(response){  
              
              //alert (projectid);

                //load json data from server and output message     
        if(response.type == 'error')
        {
          output = '<div class="errorXYZ">'+response.text+'</div>';
        }else{
          
         
          output = response.text;


        
          
          //reset values in all input fields
          $('#contact_form input').val(''); 
          $('#contact_form textarea').val(''); 
        }
        
        $("#result").hide().html(output).slideDown();
            }, 'json');
      
        }
    });








 });


</script>



        
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



<div class="col-lg-12">





<?php 
if(isset($_GET['p'])){
if(mysqli_num_rows($results) == 0) { ?>


<center><h3><?php echo $rowparticipant['FirstName']; ?> does not qualify for this idea to provide feedback</h3></center>


<?php }else{ ?>



<?php if(mysqli_num_rows($sql) == 1) { ?>


<?php if($rowmeetingrequest['Requested_By'] == 'Startup'){ ?>

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
You will meet <?php echo $rowparticipant['FirstName']; ?> on  <?php echo date('F j, Y',strtotime($rowmeetingupcoming['Date_of_Meeting'])); ?> 
at <?php echo $rowmeetingupcoming['Final_Time']; ?><br>

</div>
<p>&nbsp;</p>
</div>



<?php } ?>

<?php } ?>

<?php } ?>
  


 <div class="col-lg-3">
      
      <?php
  if($rowproject['project_image'] != ''){ ?>
  
  <img src="<?php echo BASE_PATH; ?>/ideas/uploads/<?php echo $rowproject['project_image']; ?>" class="img-circle-profile"/>

<?php

}else{

 echo '<img src="'.BASE_PATH.'/ideas/uploads/thumbnail.jpg" class="img-circle-profile"/>';
}
  
      ?>


    </div>

    <?php if($rowstartup['startupID'] == $_SESSION['startupSession']){ ?>
    
<div class="col-lg-7"><h2>Payout</h2><h3>You will pay <span class="details-box">$<?php echo $rowproject['Pay']; ?></span> for <span class="details-box"><?php echo $rowproject['Minutes']; ?></span> minutes <?php if(isset($_GET['p'])){ ?>of <?php echo $rowparticipant['FirstName']; ?>'s time to meet with you<?php } ?></span></h3></div>


<?php }else{ ?>


<div class="col-lg-5"><h3>Payout</h3><span class="details-box">$<?php echo $rowproject['Pay']; ?></span> for <span class="details-box"><?php echo $rowproject['Minutes']; ?></span> minutes of your time</span></div>


<?php } ?>




 

















    <div class="col-lg-12">
      <p>&nbsp;</p>
      <h4>What is the idea?</h4>
      <p class="grey"><?php echo $rowproject['Name']; ?></p>
     
      </div>


      




 <?php if($rowproject['Details'] != ''){?> 

    <div class="col-lg-12">
    <h4>What makes this idea special?</h4>
      <p class="grey"><?php echo $rowproject['Details']; ?></p>
    </div>
  
  <?php } ?>



  <?php if($rowproject['Agenda_One'] != ''){?> 
  
    <div class="col-lg-12">
      <h4>What will be discussed during the meeting?</h4>
      <p class="grey"><?php echo $rowproject['Agenda_One']; ?></p>
    </div>
  
  <?php } ?>



 <?php if($screeningquestion['EnabledorDisabled'] == 'Enabled'){?> 
  
    <div class="col-lg-12">
    <p>&nbsp;</p>
      <h4>You asked the following Screening Question</h4>
      <p class="grey"><?php echo $screeningquestion['ScreeningQuestion']; ?></p>
      <p><h4>You accept the following Answer:</h4></p>
      <p class="grey">
      <?php if($screeningquestion['Accepted'] == 'Potential Answer 1'){echo $screeningquestion['PotentialAnswer1'];} ?>
      <?php if($screeningquestion['Accepted'] == 'Potential Answer 2'){echo $screeningquestion['PotentialAnswer2'];} ?>
      <?php if($screeningquestion['Accepted'] == 'Potential Answer 3'){echo $screeningquestion['PotentialAnswer3'];} ?>
      </p>


<?php if(isset($_GET['p'])){ ?>

<?php if($rowparticipantanswer['PotentialAnswerGiven'] != '') { ?>


<p><h4><?php echo $rowparticipant['FirstName']; ?>'s Answer was:</h4></p>
      <p class="grey">
<?php if($rowparticipantanswer ['PotentialAnswerGiven'] == 'Potential Answer 1') {echo $screeningquestion['PotentialAnswer1'];} ?>
<?php if($rowparticipantanswer['PotentialAnswerGiven'] == 'Potential Answer 2') {echo $screeningquestion['PotentialAnswer2'];} ?>
<?php if($rowparticipantanswer['PotentialAnswerGiven'] == 'Potential Answer 3') {echo $screeningquestion['PotentialAnswer3'];} ?>

      </p>

<?php } ?>    



<?php if($rowparticipantanswer['PotentialAnswerGiven'] == '') { ?>


<p><h4><?php echo $rowparticipant['FirstName']; ?> will respond to your screening question once a meeting request is established</h4></p>
      <p>


      </p>

<?php } ?> 

<?php } ?>    


      
<p>&nbsp;</p>

<p><h4>You set the following as a requirement:</h4></p>

      <p class="grey">
      <?php 





if (strpos($Min_Req, 'Age') !== false) {
echo 'Age: '.$rowproject['Age'];
echo '<br>';
}


if (strpos($Min_Req, 'Gender') !== false) {
echo 'Gender: '.$rowproject['Gender'];
echo '<br>';
}

if (strpos($Min_Req, 'Height') !== false) {
echo 'Height: '.$rowproject['Height'];
echo '<br>';
}

if (strpos($Min_Req, 'City') !== false) {
echo 'City: '.$rowproject['City'];
echo '<br>';
}


if (strpos($Min_Req, 'Status') !== false) {
echo 'Status: '.$rowproject['Status'];
echo '<br>';
}


if (strpos($Min_Req, 'Ethnicity') !== false) {
echo 'Ethnicity: '.$rowproject['Ethnicity'];
echo '<br>';
}


if (strpos($Min_Req, 'Smoke') !== false) {
echo 'Smoke: '.$rowproject['Smoke'];
echo '<br>';
}


if (strpos($Min_Req, 'Drink') !== false) {
echo 'Drink: '.$rowproject['Drink'];
echo '<br>';
}


if (strpos($Min_Req, 'Diet') !== false) {
echo 'Diet: '.$rowproject['Diet'];
echo '<br>';
}

if (strpos($Min_Req, 'Religion') !== false) {
echo 'Religion: '.$rowproject['Religion'];
echo '<br>';
}


if (strpos($Min_Req, 'Education') !== false) {
echo 'Education: '.$rowproject['Education'];
echo '<br>';
}


if (strpos($Min_Req, 'Job') !== false) {
echo 'Job: '.$rowproject['Job'];
echo '<br>';
}


if (strpos($Min_Req, 'Interest') !== false) {
echo 'Interests: '.$rowproject['Interest'];
echo '<br>';
}

if (strpos($Min_Req, 'Languages') !== false) {
echo 'Languages: '.$rowproject['Language'];
echo '<br>';
}






      ?>
      </p>


<?php if(isset($_GET['p'])){ ?>

      <p>
      <?php 






$rowparticipant = mysqli_fetch_array($results);

if(mysqli_num_rows($results) == 1)
{


echo'<p><h4>Based on your requirement '.$rowparticipant['FirstName'].' met the following:</h4></p>';

echo '<div class="grey">';

if (strpos($Min_Req, 'Age') !== false) {  
echo 'Age: '.$rowparticipant['Age'];
echo '<br>';
}


if (strpos($Min_Req, 'Gender') !== false) {
echo 'Gender: '.$rowparticipant['Gender'];
echo '<br>';
}

if (strpos($Min_Req, 'Height') !== false) {
echo 'Height: '.$rowparticipant['Height'];
echo '<br>';
}

if (strpos($Min_Req, 'City') !== false) {
echo 'City: '.$rowparticipant['City'];
echo '<br>';
}


if (strpos($Min_Req, 'Status') !== false) {
echo 'Status: '.$rowparticipant['Status'];
echo '<br>';
}


if (strpos($Min_Req, 'Ethnicity') !== false) {
echo 'Ethnicity: '.$rowparticipant['Ethnicity'];
echo '<br>';
}


if (strpos($Min_Req, 'Smoke') !== false) {
echo 'Smoke: '.$rowparticipant['Smoke'];
echo '<br>';
}


if (strpos($Min_Req, 'Drink') !== false) {
echo 'Drink: '.$rowparticipant['Drink'];
echo '<br>';
}


if (strpos($Min_Req, 'Diet') !== false) {
echo 'Diet: '.$rowparticipant['Diet'];
echo '<br>';
}

if (strpos($Min_Req, 'Religion') !== false) {
echo 'Religion: '.$rowparticipant['Religion'];
echo '<br>';
}


if (strpos($Min_Req, 'Education') !== false) {
echo 'Education: '.$rowparticipant['Education'];
echo '<br>';
}


if (strpos($Min_Req, 'Job') !== false) {
echo 'Job: '.$rowparticipant['Job'];
echo '<br>';
}


if (strpos($Min_Req, 'Interest') !== false) {
echo 'Interests: '.$rowparticipant['Interest'];
echo '<br>';
}

if (strpos($Min_Req, 'Languages') !== false) {
echo 'Languages: '.$rowparticipant['Language'];
echo '<br>';
}

echo '</div>';


}

      ?>
      </p>

      <?php } ?>

    </div>
 
  <?php } ?>


<?php if(isset($_GET['p'])){ ?>




<p>&nbsp;</p>



  <?php if(mysqli_num_rows($sql) == 0 && mysqli_num_rows($sqlupcoming) == 0 && mysqli_num_rows($sqlarchived) == 0) { ?>


<input id="participantid" name="participantid" type="hidden" value="<?php echo $_GET['p']; ?>">
<input id="projectid" name="projectid" type="hidden" value="<?php echo $_GET['id']; ?>">




<div class="col-lg-12" style="width:95%; margin-top:20px; background:#eee"> 


<div id="select-dates">

 <div class="col-lg-12">

   
<h3>Set up a meeting</h3>


<!--<center><h3><?php echo $rowparticipant['FirstName']; ?> qualifies for this idea to provide feedback</h3></center>-->


 <p>Choose the date you want to request to meet</p>



<div class="row-day">
<div class="the-day">
<h4>Meeting Date Option #1:</h4> 

<div class="select-row">
<div style="float:left; margin-left:3px;">
<input type="text" name="date_option_one" id="date_option_one" placeholder="Pick a date" class="validate">
</div>
<div style="float:left; margin-left:15px;">
<select name="time_suggested_one" id="time_suggested_one">
  <option value="" selected disabled="disabled">Select a time</option>
  <option value="06:00 am">06:00 AM</option>
  <option value="07:00 am">07:00 AM</option>
  <option value="08:00 am">08:00 AM</option>
  <option value="09:00 am">09:00 AM</option>
  <option value="10:00 am">10:00 AM</option>
  <option value="11:00 am">11:00 AM</option>
  <option value="12:00 pm">12:00 PM</option>
  <option value="01:00 pm">01:00 PM</option>
  <option value="02:00 pm">02:00 PM</option>
  <option value="03:00 pm">03:00 PM</option>
  <option value="04:00 pm">04:00 PM</option>
  <option value="05:00 pm">05:00 PM</option>
  <option value="06:00 pm">06:00 PM</option>
  <option value="07:00 pm">07:00 PM</option>
  <option value="08:00 pm">08:00 PM</option>
  <option value="09:00 pm">09:00 PM</option>
  <option value="10:00 pm">10:00 PM</option>
  <option value="11:00 pm">11:00 PM</option>
  <option value="12:00 am">12:00 AM</option>
               </select>

    </div>
</div>

</div>

</div>

</div>


 <div class="col-lg-12">

<div class="row-day">
<div class="the-day">
<h4>Meeting Date Option #2:</h4> 

<div class="select-row">
<div style="float:left; margin-left:0px;">
<input type="text" name="date_option_two" id="date_option_two" placeholder="Pick a date" class="validate">
</div>

<div style="float:left; margin-left:15px;">
<select name="time_suggested_two" id="time_suggested_two">
  <option value="" selected disabled="disabled">Select a time</option>
  <option value="06:00 am">06:00 AM</option>
  <option value="07:00 am">07:00 AM</option>
  <option value="08:00 am">08:00 AM</option>
  <option value="09:00 am">09:00 AM</option>
  <option value="10:00 am">10:00 AM</option>
  <option value="11:00 am">11:00 AM</option>
  <option value="12:00 pm">12:00 PM</option>
  <option value="01:00 pm">01:00 PM</option>
  <option value="02:00 pm">02:00 PM</option>
  <option value="03:00 pm">03:00 PM</option>
  <option value="04:00 pm">04:00 PM</option>
  <option value="05:00 pm">05:00 PM</option>
  <option value="06:00 pm">06:00 PM</option>
  <option value="07:00 pm">07:00 PM</option>
  <option value="08:00 pm">08:00 PM</option>
  <option value="09:00 pm">09:00 PM</option>
  <option value="10:00 pm">10:00 PM</option>
  <option value="11:00 pm">11:00 PM</option>
  <option value="12:00 am">12:00 AM</option>
               </select>

    </div>

</div>

</div>

</div>

</div>


 <div class="col-lg-12">

<div class="row-day">
<div class="the-day">
<h4>Meeting Date Option #3:</h4> 

<div class="select-row">
<div style="float:left; margin-left:0px;">
<input type="text" name="date_option_three" id="date_option_three" placeholder="Pick a date" class="validate">
</div>

<div style="float:left; margin-left:15px;">
<select name="time_suggested_three" id="time_suggested_three">
  <option value="" selected disabled="disabled">Select a time</option>
  <option value="06:00 am">06:00 AM</option>
  <option value="07:00 am">07:00 AM</option>
  <option value="08:00 am">08:00 AM</option>
  <option value="09:00 am">09:00 AM</option>
  <option value="10:00 am">10:00 AM</option>
  <option value="11:00 am">11:00 AM</option>
  <option value="12:00 pm">12:00 PM</option>
  <option value="01:00 pm">01:00 PM</option>
  <option value="02:00 pm">02:00 PM</option>
  <option value="03:00 pm">03:00 PM</option>
  <option value="04:00 pm">04:00 PM</option>
  <option value="05:00 pm">05:00 PM</option>
  <option value="06:00 pm">06:00 PM</option>
  <option value="07:00 pm">07:00 PM</option>
  <option value="08:00 pm">08:00 PM</option>
  <option value="09:00 pm">09:00 PM</option>
  <option value="10:00 pm">10:00 PM</option>
  <option value="11:00 pm">11:00 PM</option>
  <option value="12:00 am">12:00 AM</option>
               </select>

    </div>


</div>

</div>

</div>

</div>

</div>




<div id="wheretomeet">
<div class="therow">
    <div class="col-lg-12" style="padding-left:10px; padding-right:15px;">
      <h4>Location to meet:</h4>
      <h5>(We suggest to enter a name and location of a venue to meet)</h5>




      
  
<div id="location_option1">   
    <input id="pac-input" name="location" class="controls" type="text" placeholder="e.g Starbucks, Astor Place, New York, NY, United States">
  
    <div id="map"></div>

</div>

<!--
<div id="location_option2">   
<input type="hidden" name="location_option2" id="location_option2" value="<?php echo $row['Location_Option2'];?>" />
<iframe width="100%" height="250" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $row['Location_Option2'];?>&key=AIzaSyDWVAsb7TmD-8_yRqe7jBIMrAcGFwHg06M"></iframe> 

</div>

<div id="location_option3">   
<input type="hidden" name="location_option3" id="location_option3" value="<?php echo $row['Location_Option3'];?>" />  
<iframe width="100%" height="250" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $row['Location_Option3'];?>&key=AIzaSyDWVAsb7TmD-8_yRqe7jBIMrAcGFwHg06M"></iframe> 

</div>
-->



</div>


<p>&nbsp;</p>



<div class="col-lg-12" style="padding-right:15px; padding-left:0px">

    <input type="submit" class="btn-request" value="Request to Meet"/>
    <p>&nbsp;</p>
    <div id="result"></div>

</div>




<?php } ?>








<?php } ?>




 </div>

 </div>



</div>
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
            window.alert("Autocomplete's returned place contains no geometry");
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



