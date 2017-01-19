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



$participant = mysqli_query($connecDB,"SELECT * FROM tbl_participant WHERE userID='".$_GET['p']."'");
$rowparticipant= mysqli_fetch_array($participant);



$Screening = mysqli_query($connecDB,"SELECT * FROM tbl_startup_screeningquestion WHERE ProjectID='".$_GET['id']."' AND userID='".$_SESSION['startupSession']."' ");
$screeningquestion = mysqli_fetch_array($Screening);


$sqlparticipantanswer = mysqli_query($connecDB,"SELECT * FROM tbl_participant_potentialanswer WHERE userID='".$_GET['p']."' AND ProjectID = '".$_GET['id']."'");
//$result=mysql_query($sql);
$rowparticipantanswer=mysqli_fetch_array($sqlparticipantanswer);



$sql = mysqli_query($connecDB,"SELECT * FROM tbl_project_request WHERE startupID='".$_SESSION['startupSession']."' AND userID='".$_GET['p']."' AND ProjectID = '".$_GET['id']."'");
//$result=mysql_query($sql);
$rowparticipantproject=mysqli_fetch_array($sql);







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





$results = mysqli_query($connecDB,"SELECT * FROM tbl_participant WHERE userID = '".$_GET['p']."' $theage $thegender $theheight $thecity $thestatus $theethnicity $thesmoke $thedrink $thediet $thereligion $theeducation $thejob $interest $languages ORDER BY userID DESC");






if(mysqli_num_rows($startup)<0)
{
  //$startup_home->logout();
  header("Location:../../../startup/");
 }

}


$participant_home = new PARTICIPANT();


if($participant_home->is_logged_in())
{
  header("Location:../../../participant/");
 }





?>

<!DOCTYPE html>
<html lang="en" id="features" class="tablet mobile">
    
    <head>



<?php include("../../../header.php"); ?>




<script>

$(document).ready(function() {


 $(".btn-request-option-one").click(function() {  
  
//alert("aads"); 


        var projectid  = $('input[name=projectid').val();
        var participantid  = $('input[name=participantid').val();
        

        var days_availability_option = $("select[name='days_availability_option_one']").val();
        var final_time_option = $("select[name='final_time_option_one']").val();
        var location_option  = $('input[name=location_option_one').val();

        //alert(days_availability_option);

        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        var proceed = true;
        
        //everything looks good! proceed...
        if(proceed) 
        {

            //data to be sent to server
  post_data = {'projectid':projectid,'participantid':participantid,'days_availability_option':days_availability_option, 'final_time_option':final_time_option, 'location_option':location_option};
            
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





$(".btn-request-option-two").click(function() {  
  
//alert("aads"); 


        var projectid  = $('input[name=projectid').val();
        var participantid  = $('input[name=participantid').val();
        

        var days_availability_option = $("select[name='days_availability_option_two']").val();
        var final_time_option = $("select[name='final_time_option_two']").val();
        var location_option  = $('input[name=location_option_two').val();

        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        var proceed = true;
        
        //everything looks good! proceed...
        if(proceed) 
        {

            //data to be sent to server
  post_data = {'projectid':projectid,'participantid':participantid,'days_availability_option':days_availability_option, 'final_time_option':final_time_option, 'location_option':location_option};
            
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




$(".btn-request-option-three").click(function() {  
  
//alert("aads"); 


        var projectid  = $('input[name=projectid').val();
        var participantid  = $('input[name=participantid').val();
        

        var days_availability_option = $("select[name='days_availability_option_three']").val();
        var final_time_option = $("select[name='final_time_option_three']").val();
        var location_option  = $('input[name=location_option_three').val();

        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        var proceed = true;
        
        //everything looks good! proceed...
        if(proceed) 
        {

            //data to be sent to server
  post_data = {'projectid':projectid,'participantid':participantid,'days_availability_option':days_availability_option, 'final_time_option':final_time_option, 'location_option':location_option};
            
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


<div class="row-fluid">
  <div class="span12">



<div id="white-container">
      <div id="dashboardSurveyTargetingContainerLogic">





<div class="container">







  



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
    
<div class="col-lg-6"><h3>Payout</h3>You will pay <span class="details-box">$<?php echo $rowproject['Pay']; ?></span> for <span class="details-box"><?php echo $rowproject['Minutes']; ?></span> minutes of <?php echo $rowparticipant['FirstName']; ?>'s time</span></div>


<?php }else{ ?>


<div class="col-lg-5"><h3>Payout</h3><span class="details-box">$<?php echo $rowproject['Pay']; ?></span> for <span class="details-box"><?php echo $rowproject['Minutes']; ?></span> minutes of your time</span></div>


<?php } ?>




 <div class="col-lg-12">
 <p>&nbsp;</p>




<?php if(mysqli_num_rows($results) == 0) { ?>


<center><h3><?php echo $rowparticipant['FirstName']; ?> does not qualify for this idea to provide feedback</h3></center>


<?php }else{ ?>



<?php if(mysqli_num_rows($sql) == 1) { ?>


<?php if($rowparticipantproject['Meeting_Status'] == 'Meeting Requests'){ ?>

<div class="col-lg-11" style="padding:0px;">
 <div class="success2">
You have sent <?php echo $rowparticipant['FirstName']; ?> a request to meet on a <?php echo $rowparticipantproject['Day']; ?> 
at <?php echo $rowparticipantproject['Final_Time']; ?>. <br>If <?php echo $rowparticipant['FirstName']; ?> wants to meet, <?php echo $rowparticipant['FirstName']; ?> will suggest you a date to meet.

</div>
</div>

<?php } ?>



<?php if($rowparticipantproject['Meeting_Status'] == 'Upcoming Meetings'){ ?>

<div class="col-lg-11" style="padding:0px;">
 <div class="success2">
You will meet <?php echo $rowparticipant['FirstName']; ?> on <?php echo $rowparticipantproject['Date_of_Meeting']; ?> 
at <?php echo $rowparticipantproject['Final_Time']; ?><br>

</div>
</div>

<?php } ?>





<?php } ?>

<?php if(mysqli_num_rows($sql) == 0) { ?>

<center><h3><?php echo $rowparticipant['FirstName']; ?> qualifies for this idea to provide feedback</h3></center>


 <p>Choose the date you want to request to meet</p>

 <div class="col-lg-11" style="padding:0px;">
<div id="result"></div>
</div>  





<input type="hidden" value="<?php echo $_GET['id']; ?>" name="projectid" id="projectid"/>
<input type="hidden" value="<?php echo $_GET['p']; ?>" name="participantid" id="participantid"/>

<?php if($rowparticipant['Days_Availability_Option1'] != ''){ ?>



<input type="hidden" value="<?php echo $rowparticipant['Location_Option1']; ?>" name="location_option_one" id="location_option_one"/>

<div class="col-lg-11" style="background:#eee; padding:10px; margin-bottom:20px;">
  <div class="col-lg-2">




<select id="days_availability_option_one" name="days_availability_option_one">
<?php

$days = explode(',', $rowparticipant['Days_Availability_Option1']);
foreach ($days as &$day) { ?>
     <option value="<?php echo $day; ?>"><?php echo $day; ?></option>

<?php } ?>

</select>



 </div>
  <div class="col-lg-2">



<?php 


$sqlfrom=mysqli_query($connecDB,"SELECT * FROM time WHERE TheTime LIKE '%".$rowparticipant['From_Time_Option1']."%'");
//$resultfrom=mysql_query($sqlfrom);
$rowfrom = mysqli_fetch_array($sqlfrom);

$sqlto=mysqli_query($connecDB,"SELECT * FROM time WHERE TheTime LIKE '%".$rowparticipant['To_Time_Option1']."%'");
//$resultto=mysql_query($sqlto);
$rowto = mysqli_fetch_array($sqlto);

?>

    
<select id="final_time_option_one" name="final_time_option_one">
<?php



$sqltime=mysqli_query($connecDB,"SELECT * FROM time where id BETWEEN '".$rowfrom['id']."' and '".$rowto['id']."' group by id");
//$resulttime=mysql_query($sqltime);

while($rowtime = mysqli_fetch_array($sqltime))
{ ?>

<option value="<?php echo $rowtime['TheTime']; ?>"><?php echo $rowtime['TheTime']; ?></option>


<?php } ?>

</select>







  </div>
  <div class="col-lg-4"><?php echo $rowparticipant['Location_Option1']; ?><br>

     <a href="http://maps.google.com/?q=<?php echo $rowparticipant['Location_Option1']; ?>" target="_blank">View Map</a>

     </div>
   <div class="col-lg-4">
  <a href="#" role="button" class="btn-request-option-one">
  <button type="button" class="btn-request">
  Choose this time to meet</button></a></div>

</div>
<?php } ?>







<?php if($rowparticipant['Days_Availability_Option2'] != ''){ ?>


<input type="hidden" value="<?php echo $rowparticipant['Location_Option2']; ?>" name="location_option_two" id="location_option_two"/>


<div class="col-lg-11" style="background:#eee; padding:10px; margin-bottom:20px;">
  <div class="col-lg-2">
    

<select id="days_availability_option_two" name="days_availability_option_two">
<?php

$days = explode(',', $rowparticipant['Days_Availability_Option2']);
foreach ($days as &$day) { ?>
     <option value="<?php echo $day; ?>"><?php echo $day; ?></option>

<?php } ?>

</select>


  </div>
  <div class="col-lg-2">
    



<?php 


$sqlfrom=mysqli_query($connecDB,"SELECT * FROM time WHERE TheTime LIKE '%".$rowparticipant['From_Time_Option2']."%'");
//$resultfrom=mysql_query($sqlfrom);
$rowfrom = mysqli_fetch_array($sqlfrom);

$sqlto=mysqli_query($connecDB,"SELECT * FROM time WHERE TheTime LIKE '%".$rowparticipant['To_Time_Option2']."%'");
//$resultto=mysql_query($sqlto);
$rowto = mysqli_fetch_array($sqlto);

?>

    
<select id="final_time_option_two" name="final_time_option_two">
<?php



$sqltime=mysqli_query($connecDB,"SELECT * FROM time where id BETWEEN '".$rowfrom['id']."' and '".$rowto['id']."' group by id");
//$resulttime=mysql_query($sqltime);

while($rowtime = mysqli_fetch_array($sqltime))
{ ?>

<option value="<?php echo $rowtime['TheTime']; ?>"><?php echo $rowtime['TheTime']; ?></option>


<?php } ?>

</select>



  </div>
  <div class="col-lg-4"><?php echo $rowparticipant['Location_Option2']; ?><br>
       <a href="http://maps.google.com/?q=<?php echo $rowparticipant['Location_Option2']; ?>" target="_blank">View Map</a>
</div>
   <div class="col-lg-4">
  <a href="#" role="button" class="btn-request-option-two">
  <button type="button" class="btn-request">
  Choose this time to meet</button></a></div>

</div>
<?php } ?>


<p>&nbsp;</p>

<?php if($rowparticipant['Days_Availability_Option3'] != ''){ ?>


<input type="hidden" value="<?php echo $rowparticipant['Location_Option3']; ?>" name="location_option_three" id="location_option_three"/>


<div class="col-lg-11" style="background:#eee; padding:10px;">
  <div class="col-lg-2">
    

<select id="days_availability_option_three" name="days_availability_option_three">
<?php

$days = explode(',', $rowparticipant['Days_Availability_Option3']);
foreach ($days as &$day) { ?>
     <option value="<?php echo $day; ?>"><?php echo $day; ?></option>

<?php } ?>

</select>


  </div>
  <div class="col-lg-2">




<?php 


$sqlfrom=mysqli_query($connecDB,"SELECT * FROM time WHERE TheTime LIKE '%".$rowparticipant['From_Time_Option3']."%'");
//$resultfrom=mysql_query($sqlfrom);
$rowfrom = mysqli_fetch_array($sqlfrom);

$sqlto=mysqli_query($connecDB,"SELECT * FROM time WHERE TheTime LIKE '%".$rowparticipant['To_Time_Option3']."%'");
//$resultto=mysql_query($sqlto);
$rowto = mysqli_fetch_array($sqlto);

?>

    
<select id="final_time_option_three" name="final_time_option_three">
<?php



$sqltime=mysqli_query($connecDB,"SELECT * FROM time where id BETWEEN '".$rowfrom['id']."' and '".$rowto['id']."' group by id");
//$resulttime=mysql_query($sqltime);

while($rowtime = mysqli_fetch_array($sqltime))
{ ?>

<option value="<?php echo $rowtime['TheTime']; ?>"><?php echo $rowtime['TheTime']; ?></option>


<?php } ?>

</select>



  </div>
  <div class="col-lg-4"><?php echo $rowparticipant['Location_Option3']; ?><br>
       <a href="http://maps.google.com/?q=<?php echo $rowparticipant['Location_Option3']; ?>" target="_blank">View Map</a>
</div>
   <div class="col-lg-4">
 <a href="#" role="button" class="btn-request-option-three">
  <button type="button" class="btn-request">
  Choose this time to meet</button></a></div>

</div>
<?php } ?>


<?php } ?>



<?php } ?>

</div>







    <div class="col-lg-12">
      <p>&nbsp;</p>
      <h3>What is the idea?</h3>
      <p><?php echo $rowproject['Name']; ?></p>
     
      </div>


      




 <?php if($rowproject['Details'] != ''){?> 

    <div class="col-lg-12">
    <h3>What makes this idea special?</h3>
      <p><?php echo $rowproject['Details']; ?></p>
    </div>
  
  <?php } ?>



  <?php if($rowproject['Agenda_One'] != ''){?> 
  
    <div class="col-lg-12">
      <h3>What will be discussed during the meeting?</h3>
      <p><?php echo $rowproject['Agenda_One']; ?></p>
    </div>
  
  <?php } ?>



 <?php if($screeningquestion['EnabledorDisabled'] == 'Enabled'){?> 
  
    <div class="col-lg-12">
    <p>&nbsp;</p>
      <h3>You asked the following Screening Question</h3>
      <p><?php echo $screeningquestion['ScreeningQuestion']; ?></p>
      <p><h4>You accept the following Answer:</h4></p>
      <p>
      <?php if($screeningquestion['Accepted'] == 'Potential Answer 1'){echo $screeningquestion['PotentialAnswer1'];} ?>
      <?php if($screeningquestion['Accepted'] == 'Potential Answer 2'){echo $screeningquestion['PotentialAnswer2'];} ?>
      <?php if($screeningquestion['Accepted'] == 'Potential Answer 3'){echo $screeningquestion['PotentialAnswer3'];} ?>
      </p>


<?php if($rowparticipantanswer['PotentialAnswerGiven'] != '') { ?>


<p><h4><?php echo $rowparticipant['FirstName']; ?>'s Answer was:</h4></p>
      <p>
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


      
<p>&nbsp;</p>

<p><h4>You set the following as a requirement:</h4></p>

      <p>
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



      <p>
      <?php 






$rowparticipant = mysqli_fetch_array($results);

if(mysqli_num_rows($results) == 1)
{


echo'<p><h4>Based on your requirement '.$rowparticipant['FirstName'].' met the following:</h4></p>';



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


}

      ?>
      </p>

    </div>
 
  <?php } ?>




 </div>

</div>



    


         
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




