<?php
session_start();

require_once '../../../base_path.php';

require_once '../../../class.participant.php';
require_once '../../../class.startup.php';
include_once("../../../config.php");
include("../../../config.inc.php");







$Project = mysqli_query($connecDB,"SELECT * FROM tbl_startup_project WHERE ProjectID='".$_GET['id']."'");
$rowproject = mysqli_fetch_array($Project);



$Screening = mysqli_query($connecDB,"SELECT * FROM tbl_startup_screeningquestion WHERE ProjectID='".$_GET['id']."'");
$rowscreening = mysqli_fetch_array($Screening);



$participant_home = new PARTICIPANT();

if(!$participant_home->is_logged_in())
{
 header("Location:../../../participant/login/");
}



if($participant_home->is_logged_in())
{


$participant_languages = mysqli_query($connecDB,"SELECT * FROM tbl_participant_languages WHERE userID='".$_GET['id']."'");
$rowparticipant_languages = mysqli_fetch_array($participant_languages);

$participant_interest = mysqli_query($connecDB,"SELECT * FROM tbl_participant_interests WHERE userID='".$_GET['id']."'");
$rowparticipant_interest = mysqli_fetch_array($participant_interest);
  

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
$Interest = str_replace(",","|",$rowparticipant_interest['Interests']);
$Languages = str_replace(",","|",$rowparticipant_languages['Languages']);


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
if($Interest != 'NULL' && $Interest != ''){$interest = "AND p.Interest RLIKE '[[:<:]]".$Interest."[[:>:]]'";}else{$interest = '';}
}else{
  $interest = '';
}

if (strpos($Min_Req, 'Languages') !== false) {
if($Languages != 'NULL' && $Languages != ''){$languages = "AND p.Languages RLIKE '[[:<:]]".$Languages."[[:>:]]'";}else{$languages = '';}
}else{
  $languages = '';
}




$sql3 = mysqli_query($connecDB,"SELECT * FROM `tbl_participant` AS p INNER JOIN `tbl_startup_project` AS r ON p.userID='".$_SESSION['participantSession']."'
AND r.ProjectID ='".$_GET['id']."' $theage $thegender $theheight $thecity $thestatus $theethnicity $thesmoke $thedrink $thediet $thereligion $theeducation $thejob $interest $languages");



if(mysqli_num_rows($sql3) == false)
{
  //echo $_SESSION['participantSession'];
  //echo "You can't view this page";
  header("Location:../../../participant/");

}




$sql = mysqli_query($connecDB,"SELECT * FROM tbl_meeting_request WHERE userID='".$_SESSION['participantSession']."' AND ProjectID = '".$_GET['id']."'");
//$result=mysql_query($sql);
$rowrequest=mysqli_fetch_array($sql);



$sql = mysqli_query($connecDB,"SELECT * FROM tbl_meeting_upcoming WHERE userID='".$_SESSION['participantSession']."' AND ProjectID = '".$_GET['id']."'");
//$result=mysql_query($sql);
$rowupcoming=mysqli_fetch_array($sql);


  $update_sql = mysqli_query($connecDB,"UPDATE tbl_meeting_request SET Viewed_by_Participant='Yes'
  WHERE userID='".$_SESSION['participantSession']."' AND ProjectID = '".$_GET['id']."' ");

  $update_sql = mysqli_query($connecDB,"UPDATE tbl_meeting_upcoming SET Viewed_by_Participant='Yes'
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

$('#wheretomeet').show();  
$('#thetimeset-to').hide();
$('#at').hide();
$('#based').hide();
$('#select-dates').show();
  

$('#location_option1').show();  
$('#days_availability_option2').hide();
$('#days_availability_option3').hide();
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
            $('#days_availability_option1').show();
            $('#days_availability_option2').hide();
            $('#days_availability_option3').hide();
            $('#location_option1').show();  
            $('#location_option2').hide();
            $('#location_option3').hide();
       
            
          }

           if(option == 'Option2'){
            $('#days_availability_option2').show();
            $('#days_availability_option1').hide();
            $('#days_availability_option3').hide();
            $('#location_option1').hide();  
            $('#location_option2').show();
            $('#location_option3').hide();
           
          }

          if(option == 'Option3'){
            $('#days_availability_option3').show();
            $('#days_availability_option2').hide();
            $('#days_availability_option1').hide();
            $('#location_option1').hide();  
            $('#location_option2').hide();
            $('#location_option3').show();
         
            
          }

          

            //alert(data[0].from);

            if(data[0].from == ''){ 
            $('#select-dates').hide();  
            $('#based').hide();  
            $('#thetimeset-from').text('');
            $('#thetimeset-to').text('');  
            $('#from').text('');
            $('#to').text(''); 
            $('#notimeset').text('No time is set for '+ option); 
            
            }else{ 
              $('#select-dates').show();
              $('#wheretomeet').show();
              $('#notimeset').text(''); 
              $('#based').show();
              $('#days').text(data[0].days);   
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



        //daysvalue = document.getElementById("days");
        //fromtimevalue = document.getElementById("from");
        //totimevalue = document.getElementById("to");

        //get input field values
        
        var option = $("select[name='option']").val();


        var projectid  = $('input[name=creditcard]').val();

        var screeningquestion_required  = $('input[name=screeningquestion_required]').val();

        var projectid  = $('input[name=projectid]').val();
        var startupid  = $('input[name=startupid]').val();

        var date_option_one  = $('input[name=date_option_one]').val();
        var date_option_two  = $('input[name=date_option_two]').val();
        var date_option_three  = $('input[name=date_option_three]').val();

        var time_suggested_one = $("select[name='time_suggested_one']").val();
        var time_suggested_two = $("select[name='time_suggested_two']").val();
        var time_suggested_three = $("select[name='time_suggested_three']").val();

        //alert(date_option_one);


        //var day = $("select[name='day']").val();
        
        //var days = daysvalue.innerHTML;
        //var fromtime = fromtimevalue.innerHTML;
        //var totime = totimevalue.innerHTML;

        var location = $('#pac-input').val();

        //alert(location);

        var potentialanswergiven = $('input[name="potentialanswergiven[]"]:checked').map(function () {return this.value;}).get().join(",");


        //if(option == 'Option1'){var location  = $('input[name=location_option1]').val();}
        //if(option == 'Option2'){var location  = $('input[name=location_option2]').val();}
        //if(option == 'Option3'){var location  = $('input[name=location_option3]').val();}
        
       
        
        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        var proceed = true;
        
        /*
        if(fromtime==""){ 
             output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please choose your time under your settings</div>';
            $("#result").hide().html(output).slideDown();
            proceed = false;
        }
         
         if(location==""){ 
             output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please enter a location to meet!</div>';
            $("#result").hide().html(output).slideDown();
            proceed = false;
        } */


       

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


        


        if(screeningquestion_required == 'Yes'){

        var potentialanswergiven_checkedstatus = $('input[name="potentialanswergiven[]"]:checked').size();

       

        if(potentialanswergiven_checkedstatus <1 ){ 
           output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please select one Answer! </div>';
            $("#result_error").hide().html(output).slideDown();
            proceed = false;
        }else{
                $("#result_error").hide();

                //proceed = true; //set do not proceed flag       
        };

        if(date_option_one && date_option_two && date_option_three && time_suggested_one && time_suggested_two && time_suggested_three && location && potentialanswergiven_checkedstatus == 1 ) {
         //output = '<div class="success2">Request to meet sent!</div>';
                //$("#result_success").hide().html(output).slideDown();
                proceed = true; //set do not proceed flag      
        }

        }


       



        //everything looks good! proceed...
        if(proceed) 
        {

        

         //alert("123");

            //data to be sent to server
  post_data = {'projectid':projectid,'startupid':startupid,'time_suggested_one':time_suggested_one, 'time_suggested_two':time_suggested_two,'time_suggested_three':time_suggested_three,'date_option_one':date_option_one, 'date_option_two':date_option_two, 'date_option_three':date_option_three,'location':location, 'potentialanswergiven':potentialanswergiven};
            
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
        
        $("#result_success").hide().html(output).slideDown();
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

if($rowrequest['userID'] == $_SESSION['participantSession'] && $rowrequest['ProjectID'] == $_GET['id'] && $rowrequest['ScreeningQuestion'] != 'Not Passed' ){

//echo $rowrequest['ProjectID'];

 ?>


<div class="col-lg-11">

<div class="request-sent">  
  Already Request sent to Participate
</div>
<p>&nbsp;</p>

</div>


<?php } ?> 






<?php } ?>







<?php 

if($participant_home->is_logged_in())
{

if($rowupcoming['userID'] == $_SESSION['participantSession'] && $rowupcoming['ProjectID'] == $_GET['id'] ){

//echo $rowrequest['ProjectID'];


$startup = mysqli_query($connecDB,"SELECT * FROM tbl_startup WHERE userID='".$rowupcoming['startupID']."'");
$rowstartup= mysqli_fetch_array($startup);


 ?>


<div class="col-lg-11" style="padding:0px; margin-bottom:30px;">
 <div class="success2">
  You will meet <?php echo $rowstartup['FirstName']; ?> on  <?php echo date('F j, Y',strtotime($rowupcoming['Date_of_Meeting'])); ?> 
at <?php echo $rowupcoming['Final_Time']; ?><br>
</div>
<p>&nbsp;</p>

</div>


<?php } } ?>




<?php 

if($participant_home->is_logged_in())
{

if($row['account_id'] == '' && $row['Cash_Only'] == '') { ?>


<div class="col-lg-11">

<div class="no-bankaccount-set">  
  Please add a bank account so you can receive payments. <a href="<?php echo BASE_PATH; ?>/participant/payment/">Set up Bank Account</a>
</div>
<p>&nbsp;</p>

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

  


<div class="col-lg-5"><h3>Payout</h3><span class="details-box">$<?php echo $rowproject['Pay']; ?></span> for <span class="details-box"><?php echo $rowproject['Minutes']; ?></span> minutes of your time</span></div>




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











<?php if($participant_home->is_logged_in()) { ?>



<?php 




if($rowrequest['userID'] != $_SESSION['participantSession'] && $rowrequest['ProjectID'] != $_GET['id'] &&
$rowupcoming['ProjectID'] != $_GET['id'] && $rowupcoming['userID'] != $_SESSION['participantSession'] ){



 ?>




 <div class="col-lg-12" style="width:96%; margin-top:20px; background:#eee"> 


 <div class="col-lg-12">    
<h3>Set up a meeting</h3>
</div>



<?php 

if($participant_home->is_logged_in())
{

if($row['Phone'] == ''){ ?>



<div class="col-lg-11" style="margin-top:20px;">

<div class="request-sent">  
  Please add your <strong><u>Phone Number</u></strong> to your account. This is required to request to meet. Click <a href="<?php echo BASE_PATH; ?>/participant/account/settings/">here</a> to add you number.
</div>
<p>&nbsp;</p>

</div>

<?php
}
}

?>


<?php 

if($participant_home->is_logged_in())
{

if($row['Phone'] != ''){ ?>

<input type="hidden" value="<?php echo $_GET['id']; ?>" name="projectid" id="projectid"/>
<input type="hidden" value="<?php echo $rowproject['startupID']; ?>" name="startupid" id="startupid"/>

<!--
<div class="col-sm-12">
<div class="change-availablity"><a href="<?php echo BASE_PATH; ?>/participant/account/settings/availability/">Change your availability days and times</a></div>
</div>-->

<!--
<?php if($row['From_Time_Option1'] == '' ){ ?>
 <div class="col-sm-12">
<h4>Looks like you haven't set up your available time and dates that lets the person you will meet know about your availabilty for a meetup. <br><br>Let's change that. Click <a href="<?php echo BASE_PATH; ?>/participant/account/settings/availability/">here</a> to set up your dates of availability.</h4>
 </div>
 <?php } ?>
-->
<!--
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







<div class="col-lg-12">

<div class="row-day">
<div class="the-day">
<h4>Select a day:</h4> 
<div class="select-row">

<select id="days_availability_option1" name="days_availability_option1">

<option value="Select a day">Select a day</option>

<?php

$days = explode(',', $row['Days_Availability_Option1']);


foreach($days as $day){

?>

<option value="<?php echo $day; ?>"><?php echo $day; ?></option>


<?php } ?>

</select>


<select id="days_availability_option2" name="days_availability_option2">

<option value="Select a day">Select a day</option>

<?php

$days = explode(',', $row['Days_Availability_Option2']);


foreach($days as $day){

?>

<option value="<?php echo $day; ?>"><?php echo $day; ?></option>


<?php } ?>

</select>



</div>

</div>

</div>

</div>

-->





<div id="select-dates">

 <div class="col-lg-12">

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
    <div class="col-lg-12" style="padding-left:0px">
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


<?php if(mysqli_num_rows($Screening)==1 && $rowscreening['EnabledorDisabled'] == 'Enabled') { ?>


 <input type="hidden" id="screeningquestion_required" name="screeningquestion_required" style="display:block" value="Yes"/> 


 <div class="col-sm-12">

<h3>Please answer the following question:</h4>

<h4><?php echo $rowscreening['ScreeningQuestion']; ?></h3>

<br>

 </div>

  <div class="col-sm-12">
  <div class="dashboardSurveyTargetingContainerPotentialAnswersInputContainer">

<?php if($rowscreening['PotentialAnswer1'] != 'NULL') { ?>
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


<?php if($rowscreening['PotentialAnswer2'] != 'NULL') { ?>
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


<?php if($rowscreening['PotentialAnswer3'] != 'NULL') { ?>
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
  </div>

 <?php } ?>





<?php if($row['Cash_Only'] == '' && $row['account_id'] == '') { ?>

    <input type="submit" class="btn-request" value="Request to Meet" disabled="disabled"/>

<?php } ?>


<?php if($row['Cash_Only'] == 'Yes' && $row['account_id'] == '') { ?>

    <input type="submit" class="btn-request" value="Request to Meet"/>

<?php } ?>



<?php if($row['Cash_Only'] == '' && $row['account_id'] != '') { ?>

    <input type="submit" class="btn-request" value="Request to Meet"/>

<?php } ?>


<?php if($row['Cash_Only'] == 'Yes' && $row['account_id'] != '') { ?>

    <input type="submit" class="btn-request" value="Request to Meet"/>

<?php } ?>




<?php } ?>

<?php } ?>
   
    <p>&nbsp;</p>
    <div id="result_success"></div>
    <div id="result_error"></div>

      
    
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




