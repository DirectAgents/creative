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


$sql = mysqli_query($connecDB,"SELECT * FROM tbl_project_request WHERE startupID='".$_SESSION['startupSession']."' AND userID='".$_GET['p']."' AND ProjectID = '".$_GET['id']."'");
//$result=mysql_query($sql);
$rowparticipantproject=mysqli_fetch_array($sql);






if(mysqli_num_rows($startup)<0)
{
  //$startup_home->logout();
  header("Location:../../../startup/");
 }

}



$participant_home = new PARTICIPANT();






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




$sql3 = mysqli_query($connecDB,"SELECT * FROM `tbl_participant` AS p INNER JOIN `tbl_startup_project` AS r ON p.userID='".$_SESSION['participantSession']."'
AND r.ProjectID ='".$_GET['id']."' $theage $thegender $theheight $thecity $thestatus $theethnicity $thesmoke $thedrink $thediet $thereligion $theeducation $thejob $interest $languages");



if(mysqli_num_rows($sql3) == false)
{

  echo "You can't view this page";
  //header("Location:../../participant/");

}




$sql = mysqli_query($connecDB,"SELECT * FROM tbl_project_request WHERE userID='".$_SESSION['participantSession']."' AND ProjectID = '".$_GET['id']."'");
//$result=mysql_query($sql);
$rowrequest=mysqli_fetch_array($sql);


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




<script>

$(document).ready(function() {

$('#wheretomeet').hide();  
$('#thetimeset-to').hide();
$('#at').hide();
$('#based').hide();
  

$('#location_option1').show();  
$('#location_option2').hide();
$('#location_option3').hide();
            

 $("#option").change(function() { 



 var option = $("select[name='option']").val();




 $.ajax({
        url: '../fromto.php',
        data: {option : option},
        dataType: "json",
        success: function(data)
        {
          

            if(option == 'Option1'){
            $('#location_option1').show();  
            $('#location_option2').hide();
            $('#location_option3').hide();
       
            
          }

           if(option == 'Option2'){
            $('#location_option1').hide();  
            $('#location_option2').show();
            $('#location_option3').hide();
           
          }

          if(option == 'Option3'){
            $('#location_option1').hide();  
            $('#location_option2').hide();
            $('#location_option3').show();
         
            
          }

          

            //alert(data[0].from);

            if(data[0].from == ''){ 
            $('#based').hide();  
            $('#thetimeset-from').text('');
            $('#thetimeset-to').text('');  
            $('#from').text('');
            $('#to').text(''); 
            $('#notimeset').text('No time is set for '+ option); 
            
            }else{ 
              $('#wheretomeet').show();
              $('#notimeset').text(''); 
              $('#based').show();
              $('#date').text(data[0].date);   
              $('#at').show();
              $('#from').text(data[0].from); 
            }
            

            if(data[0].to == ''){ 
            //$('#to').text('No time is set'); 
            }else{ 
            $('#thetimeset-to').show();
            $('#to').text( data[0].to ); 
            }

             //$("#from option:first").val(data[0].from);
             //$('#from option:first').text(data[0].from);

             //$("#to option:first").val(data[0].to);
             //$('#to option:first').text(data[0].to);

         
        }
    });


 });



 $(".btn-request").click(function() {  
  
//alert("aads"); 



        datevalue = document.getElementById("date");
        fromtimevalue = document.getElementById("from");
        totimevalue = document.getElementById("to");

        //get input field values
        
        var option = $("select[name='option']").val();

        var projectid  = $('input[name=projectid').val();
        var startupid  = $('input[name=startupid').val();
        //var day = $("select[name='day']").val();
        var date = datevalue.innerHTML;
        var fromtime = fromtimevalue.innerHTML;
        var totime = totimevalue.innerHTML;

        var potentialanswergiven = $('input[name="potentialanswergiven[]"]:checked').map(function () {return this.value;}).get().join(",");


        if(option == 'Option1'){var location  = $('input[name=location_option1').val();}
        if(option == 'Option2'){var location  = $('input[name=location_option2').val();}
        if(option == 'Option3'){var location  = $('input[name=location_option3').val();}
        
       
        
        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        var proceed = true;
        

        if(fromtime==""){ 
             output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please choose your time under your settings</div>';
            $("#result").hide().html(output).slideDown();
            proceed = false;
        } 
         
         if(location==""){ 
             output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please enter a location to meet!</div>';
            $("#result").hide().html(output).slideDown();
            proceed = false;
        } 


        var potentialanswergiven_checkedstatus = $('input[name="potentialanswergiven[]"]:checked').size();

        if(potentialanswergiven_checkedstatus <1 ){ 
           output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please select one Answer! </div>';
            $("#result").hide().html(output).slideDown();
            proceed = false;
        }

        //everything looks good! proceed...
        if(proceed) 
        {


         

            //data to be sent to server
  post_data = {'projectid':projectid,'startupid':startupid,'fromtime':fromtime,'totime':totime,'date':date,'location':location, 'potentialanswergiven':potentialanswergiven};
            
            //Ajax post data to server
            $.post('../place-suggest-ajax.php', post_data, function(response){  
              
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


<?php 

if($participant_home->is_logged_in())
{

if($rowrequest['userID'] == $_SESSION['participantSession'] && $rowrequest['Requested_By'] == 'Participant' && $rowrequest['Accepted_to_Participate'] == 'Pending' && $rowrequest['ProjectID'] == $_GET['id'] ){

//echo $rowrequest['ProjectID'];

 ?>


<div class="col-lg-11">

<div class="request-sent">  
  Already Request sent to Participate
</div>

</div>


<?php } } ?>






  



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


<?php if(!$participant_home->is_logged_in() && $_SESSION['startupSession'] == '')
{ ?>

<div class="col-lg-4">
  <a href="<?php echo BASE_PATH; ?>/participant/login/?p=<?php echo $_GET['id']; ?>" role="button" class="111slide_open">
  <button type="button" class="btn-request">
  Login to Participate</button></a>
</div>

<?php } ?>



    <div class="col-lg-12">
      
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
      <h3>You asked the following Screening Question</h3>
      <p><?php echo $screeningquestion['ScreeningQuestion']; ?></p>
      <p><h4>You accepted this Answer:</h4></p>
      <p>
      <?php if($screeningquestion['Accepted'] == 'Potential Answer 1'){echo $screeningquestion['PotentialAnswer1'];} ?>
      <?php if($screeningquestion['Accepted'] == 'Potential Answer 2'){echo $screeningquestion['PotentialAnswer2'];} ?>
      <?php if($screeningquestion['Accepted'] == 'Potential Answer 3'){echo $screeningquestion['PotentialAnswer3'];} ?>
      </p>
<p><h4><?php echo $rowparticipant['FirstName']; ?>'s Answer was:</h4></p>
      <p>
<?php if($rowparticipantproject['Potential_Answer_Given'] == 'Potential Answer 1') {echo $screeningquestion['PotentialAnswer1'];} ?>
<?php if($rowparticipantproject['Potential_Answer_Given'] == 'Potential Answer 2') {echo $screeningquestion['PotentialAnswer2'];} ?>
<?php if($rowparticipantproject['Potential_Answer_Given'] == 'Potential Answer 3') {echo $screeningquestion['PotentialAnswer3'];} ?>

      </p>

      
<p>&nbsp;</p>

<p><h4>You set the following as a requirement:</h4></p>

      <p>
      <?php 


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









if (strpos($Min_Req, 'Age') !== false) {
echo 'Age: '.$row['Age'];
echo '<br>';
}


if (strpos($Min_Req, 'Gender') !== false) {
echo 'Gender: '.$row['Gender'];
echo '<br>';
}

if (strpos($Min_Req, 'Height') !== false) {
echo 'Height: '.$row['Height'];
echo '<br>';
}

if (strpos($Min_Req, 'City') !== false) {
echo 'City: '.$row['City'];
echo '<br>';
}


if (strpos($Min_Req, 'Status') !== false) {
echo 'Status: '.$row['Status'];
echo '<br>';
}


if (strpos($Min_Req, 'Ethnicity') !== false) {
echo 'Ethnicity: '.$row['Ethnicity'];
echo '<br>';
}


if (strpos($Min_Req, 'Smoke') !== false) {
echo 'Smoke: '.$row['Smoke'];
echo '<br>';
}


if (strpos($Min_Req, 'Drink') !== false) {
echo 'Drink: '.$row['Drink'];
echo '<br>';
}


if (strpos($Min_Req, 'Diet') !== false) {
echo 'Diet: '.$row['Diet'];
echo '<br>';
}

if (strpos($Min_Req, 'Religion') !== false) {
echo 'Religion: '.$row['Religion'];
echo '<br>';
}


if (strpos($Min_Req, 'Education') !== false) {
echo 'Education: '.$row['Education'];
echo '<br>';
}


if (strpos($Min_Req, 'Job') !== false) {
echo 'Job: '.$row['Job'];
echo '<br>';
}


if (strpos($Min_Req, 'Interest') !== false) {
echo 'Interests: '.$row['Interest'];
echo '<br>';
}

if (strpos($Min_Req, 'Languages') !== false) {
echo 'Languages: '.$row['Language'];
echo '<br>';
}






      ?>
      </p>


      <p><h4>Based on your requirement <?php echo $rowparticipant['FirstName']; ?> met the following:</h4></p>

      <p>
      <?php 




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
//$results = mysql_query("SELECT id,userID, Gender FROM tbl_participant_project 
//WHERE Gender RLIKE '".$Gender."' OR Age RLIKE '".$Age."' ORDER BY id DESC LIMIT $position, $item_per_page");

$rowparticipant = mysqli_fetch_array($results);

if(mysqli_num_rows($results) == 1)
{



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







<?php if($participant_home->is_logged_in()) { ?>



<?php 



if($rowrequest['userID'] != $_SESSION['participantSession'] && $rowrequest['Met'] == '' && $rowrequest['ProjectID'] != $_GET['id'] ){

//echo $rowrequest['ProjectID'];

 ?>






<div class="therow">
 <div class="col-lg-12">    
<h3>Set up a meeting</h3>
</div>

<input type="hidden" value="<?php echo $_GET['id']; ?>" name="projectid" id="projectid"/>
<input type="hidden" value="<?php echo $rowproject['startupID']; ?>" name="startupid" id="startupid"/>


<div class="col-sm-12">
<div class="change-availablity"><a href="<?php echo BASE_PATH; ?>/participant/account/settings/availability/">Change your availability days and times</a></div>
</div>


 <div class="col-lg-12">

<div class="row-day">
<div class="the-day">
<h4>Select your availability:</h4> 

<div class="select-row">
<select id="option" name="option">
<option value="">Select your availability</option>
<?php if($row['From_Time_Option1'] != ''){ ?>
<option value="Option1">Availability Option#1</option>
<?php } ?>
<?php if($row['From_Time_Option2'] != ''){ ?>
<option value="Option2">Availability Option#2</option>
<?php } ?>
<?php if($row['From_Time_Option3'] != ''){ ?>
<option value="Option3">Availability Option#3</option>
<?php } ?>
</select>
</div>

</div>

</div>

</div>

<?php if($row['From_Time_Option1'] == '' ){ ?>
 <div class="col-sm-12">
<h4>Looks like you haven't set up your available time and dates that lets your partner know about your availabilty for a meetup. <br><br>Let's change that. Click <a href="<?php echo BASE_PATH; ?>/participant/account/settings/availability/">here</a> to set up your dates of availability.</h4>
 </div>
 <?php } ?>

 <div class="col-sm-12">

<div class="row-time">

<div class="the-time">

<h4 id="notimeset"></h4>

<h4 id="based">Based on your availability you can meet on&nbsp;</h4> 
<h4 id="date"></h4>
<h4 id="at">&nbsp;at&nbsp;</h4>
<div id="from"></div>

<h4 id="thetimeset-to">&nbsp;and&nbsp;</h4> 

<div id="to"></div>




</div>
</div>
</div>





<div id="wheretomeet">
<div class="therow">
    <div class="col-lg-12" style="padding-left:0px">
      <h4>Location:</h4>




      
  
<div id="location_option1">   
  <input type="hidden" name="location_option1" id="location_option1" value="<?php echo $row['Location_Option1'];?>" />
  <iframe width="100%" height="250" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $row['Location_Option1'];?>&key=AIzaSyDWVAsb7TmD-8_yRqe7jBIMrAcGFwHg06M"></iframe> 

</div>


<div id="location_option2">   
<input type="hidden" name="location_option2" id="location_option2" value="<?php echo $row['Location_Option2'];?>" />
<iframe width="100%" height="250" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $row['Location_Option2'];?>&key=AIzaSyDWVAsb7TmD-8_yRqe7jBIMrAcGFwHg06M"></iframe> 

</div>

<div id="location_option3">   
<input type="hidden" name="location_option3" id="location_option3" value="<?php echo $row['Location_Option3'];?>" />  
<iframe width="100%" height="250" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $row['Location_Option3'];?>&key=AIzaSyDWVAsb7TmD-8_yRqe7jBIMrAcGFwHg06M"></iframe> 

</div>



</div>


<p>&nbsp;</p>


<?php if(mysqli_num_rows($Screening)==1) { ?>

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
 <label for="potentialanswer3"><?php echo $rowscreening['PotentialAnswer1']; ?></label>
 </div>
</div>
<?php } ?>

  </div>
  </div>

 <?php } ?>



    <input type="submit" class="btn-request" value="Request to Meet"/>
    <p>&nbsp;</p>
    <div id="result"></div>

      
    
  </div>

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




