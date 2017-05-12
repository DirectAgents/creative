<?php

session_start();


require_once '../../base_path.php';

include("../../config.php"); //include config file
require_once '../../class.startup.php';
require_once '../../class.participant.php';



$startup_home = new STARTUP();

if($startup_home->is_logged_in())
{
  $startup_home->logout();
}



$participant_home = new PARTICIPANT();

if(!$participant_home->is_logged_in())
{
  $participant_home->redirect('../login.php');
}


$sqlparticipant = mysqli_query($connecDB,"SELECT * FROM tbl_participant  WHERE userID = '".$_SESSION['participantSession']."' ");
$rowparticipant = mysqli_fetch_array($sqlparticipant);


?>





<?php
//include db configuration file


//echo $_SESSION['startupSession']

//MySQL query
//$Result = mysql_query("SELECT * FROM tbl_startup_project WHERE startupID = '".$_SESSION['startupSession']."' ORDER BY id DESC ");

$sql=mysqli_query($connecDB,"SELECT * FROM tbl_meeting_request WHERE userID = '".$_SESSION['participantSession']."' ORDER BY id DESC ");
//$result=mysqli_query($sql);
//$row=mysql_fetch_array($result);

  //if username exists
if(mysqli_num_rows($sql) == 0)
{
  //echo "asdf";

echo '<div class="row">
    <div class="col-md-12">
<div class="empty-projects">No Meeting Requests<br><br></div>
  <div class="create-one-here-box">
      <div class="create-one">
      <a href="'.BASE_PATH.'/participant/idea/browse/" class="slide_open create-one-btn">
        Browse here for new Ideas</a>
       </div> 
  </div>
</div>

</div>
</div>';


}else{ 


if($rowparticipant['Phone'] == ''){

echo'

<div class="col-lg-12" style="padding:0px; margin-bottom:30px;">
 <div class="errorXYZ" style="font-size:16px;">
Please add a Phone Number to your account. <a href="'.BASE_PATH.'/participant/account/settings/" style="color:#fff; text-decoration:underline">Click here</a>

</div>
</div>';

}

if($rowparticipant['account_id'] == '' && $rowparticipant['bank_account'] == ''){

echo'

<div class="col-lg-12" style="padding:0px; margin-bottom:30px;">
 <div class="errorXYZ" style="font-size:16px;">
You haven\'t set up bank account yet to receive payments. <a href="'.BASE_PATH.'/participant/payment/" style="color:#fff; text-decoration:underline">Click here</a> to add one.

</div>
</div>';

}


//get all records from add_delete_record table
while($row2 = mysqli_fetch_array($sql))
{ 



$update_sql = mysqli_query($connecDB,"UPDATE tbl_meeting_request SET Viewed_by_Participant='Yes'
WHERE userID='".$_SESSION['participantSession']."' AND ProjectID = '".$row2['ProjectID']."'");



$sql4 = mysqli_query($connecDB,"SELECT * FROM tbl_startup_project  WHERE ProjectID = '".$row2['ProjectID']."' ");
$row4 = mysqli_fetch_array($sql4);


$date_option_one = date_create($row2['Date_Option_One']);
$date_option_two = date_create($row2['Date_Option_Two']);
$date_option_three = date_create($row2['Date_Option_Three']);

date_default_timezone_set('America/New_York');





$random = rand(5, 20000);




$date = date('Y-m-d h:m A');

//echo $row2['id'];




  ?>



<!-- Start Accept -->

<div id="slide-accept-two<?php echo $row2['ProjectID']; ?>_<?php echo $random; ?>" class="well slide-accept">
  <div class="result-accept">
    <div id="result-accept-<?php echo $row2['ProjectID']; ?>">Successfully Accepted!</div>
  </div>


<div class="result-no-date">
<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">
    <div id="result-accept-<?php echo $row2['ProjectID']; ?>">Please choose a date!</div>
    </div>
  </div>


  <div class="result-no-potentialanswer">
<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">
    <div id="result-accept-<?php echo $row2['ProjectID']; ?>">Please choose an answer!</div>
    </div>
  </div>




<?php if($row2['Status'] == 'Waiting for Participant to Accept or Decline') { ?> 



<h4>Set up a Meeting</h4>
<p>&nbsp;</p>


<input type="hidden" name="the_date" id="the_date" value=""/>


<input type="hidden" name="projectid<?php echo $row2['ProjectID']; ?>" id="projectid" value="<?php echo $row2['ProjectID']; ?>"/>
<input type="hidden" name="userid<?php echo $row2['userID']; ?>" id="userid" value="<?php echo $row2['userID']; ?>"/>


<input type="hidden" name="status<?php echo $row2['ProjectID']; ?>" id="status" value="Meeting Set"/>
<input type="hidden" name="accepted_to_participate<?php echo $row2['ProjectID']; ?>" id="accepted_to_participate" value="Accepted"/>


<input type="hidden" name="the_time<?php echo $row2['ProjectID']; ?>" id="the_time" value="<?php echo $row2['Time_Suggested']; ?>"/>

Select a day to meet:

<br><br>

 <table class="table table-bordered">
    <thead>
      <tr>
        <th>Date</th>
        <th>Time</th>
        <th>&nbsp;</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo date('F j, Y',strtotime($row2['Date_Option_One'])); ?></td>
        <td><?php echo $row2['Time_Option_One']; ?></td>
        <td><input name="selected_meeting[]" type="radio" style="display:block; margin: 0 auto;" value="option_one"/></td>
      </tr>
      <tr>
        <td><?php echo date('F j, Y',strtotime($row2['Date_Option_Two'])); ?></td>
        <td><?php echo $row2['Time_Option_Two']; ?></td>
        <td><input type="radio"  name="selected_meeting[]" style="display:block; margin: 0 auto;" value="option_two"/></td>
      </tr>
      <tr>
        <td><?php echo date('F j, Y',strtotime($row2['Date_Option_Three'])); ?></td>
        <td><?php echo $row2['Time_Option_Three']; ?></td>
        <td><input type="radio" name="selected_meeting[]" style="display:block; margin: 0 auto;" value="option_three"/></td>
      </tr>
    </tbody>
  </table>


<br>


Location: <?php echo $row2['Location']; ?><br><br>


<!--

 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
$(document).ready(function() {

  
  $("#day").change(function() { 
  var day_of_meeting = $( "#day option:selected" ).text();
  //alert(day_of_meeting);


$('#select-the-day').html('Select the date to meet:');

$( "#meeting_date" ).datepicker("destroy");

$( "#meeting_date" ).datepicker({

    beforeShowDay: function(date) {

        var day = date.getDay();
        //var day_of_meeting="<?php echo $row2['Day']; ?>";
        //var day = $( "#day option:selected" ).text();
        
        if(day_of_meeting == 'Monday'){
        return [(day != 2 && day != 3 && day != 4 && day != 5 && day != 6 && day != 0), ''];    
        }

        if(day_of_meeting == 'Tuesday'){
        return [(day != 3 && day != 4 && day != 5 && day != 6 && day != 0 && day != 1), ''];
        }

        if(day_of_meeting == 'Wednesday'){
        return [(day != 4 && day != 5 && day != 6 && day != 0 && day != 1 && day != 2), ''];
        }

        if(day_of_meeting == 'Thursday'){
        return [(day != 5 && day != 6 && day != 0 && day != 1 && day != 2 && day != 3), ''];
        }

        if(day_of_meeting == 'Friday'){
        return [(day != 6 && day != 0 && day != 1 && day != 2 && day != 3 && day != 4), ''];
        }

        if(day_of_meeting == 'Saturday'){
        return [(day != 0 && day != 1 && day != 2 && day != 3 && day != 4 && day != 5), ''];
        }

        if(day_of_meeting == 'Sunday'){
        return [(day != 1 && day != 2 && day != 3 && day != 4 && day != 5 && day != 6), ''];
        }
        

      if(day_of_meeting == 'Select a day'){
        $('#select-the-day').hide();
      }

$( "#meeting_date" ).datepicker("refresh");
        


    }

    


  });




$(document).on("change", "#meeting_date", function () {
         date = $(this).val();
        //alert(date);
        $("#the_date").val(date);
        
    })




   });

 
   });


  </script>

<div id="select-the-day"></div>
<div id="meeting_date"></div>
-->





<?php 

$sqlscreening = mysqli_query($connecDB,"SELECT * FROM tbl_startup_screeningquestion  WHERE ProjectID = '".$row2['ProjectID']."' ");
$rowscreening = mysqli_fetch_array($sqlscreening);

if($rowscreening['EnabledorDisabled'] == 'Enabled'){

  echo '<input type="hidden" name="screeningquestionrequired'.$row2['ProjectID'].'" id="screeningquestionrequired'.$row2['ProjectID'].'" value="Required" />';


  echo '<br>';
  echo 'Please answer the following question:';
  echo '<br>';
  echo '<br>';
  echo $rowscreening['ScreeningQuestion'];
  echo '<br>';
  if($rowscreening['PotentialAnswer1'] != '' && $rowscreening['PotentialAnswer1'] != 'NULL' ){
  echo '<input type="radio" style="display:block; float:left" name="PotentialAnswer[]" id="PotentialAnswer1" value="Potential Answer 1" />';
  echo '<label>'.$rowscreening['PotentialAnswer1'].'</label>';
  echo '<br>';
  }
  if($rowscreening['PotentialAnswer2'] != '' && $rowscreening['PotentialAnswer2'] != 'NULL'){
  echo '<input type="radio" style="display:block; float:left" name="PotentialAnswer[]" id="PotentialAnswer2" value="Potential Answer 2" />';
  echo '<label>'.$rowscreening['PotentialAnswer2'].'</label>';
  echo '<br>';
  }
  if($rowscreening['PotentialAnswer3'] != '' && $rowscreening['PotentialAnswer3'] != 'NULL'){
  echo '<input type="radio" style="display:block; float:left" name="PotentialAnswer[]" id="PotentialAnswer3" value="Potential Answer 3" />';
  echo '<label>'.$rowscreening['PotentialAnswer3'].'</label>';
  }
}

if($rowscreening['EnabledorDisabled'] == 'Disabled'){

  echo '<input type="radio" style="display:none; float:left" name="PotentialAnswer[]" id="PotentialAnswer3" value="Not Required" />';

}


?>






<div class="popupoverlay-btn">
  <div class="cancel-accept">
    <button class="slide-accept-two<?php echo $row2['ProjectID']; ?>_<?php echo $random; ?>_close cancel">Cancel</button>
    <button class="accept<?php echo $row2['ProjectID']; ?> btn-delete">Yes</button>
</div>

<div class="popupoverlay-btn">
  <div class="close-accept">
    <button class="slide-accept-two<?php echo $row2['ProjectID']; ?>_<?php echo $random; ?>_close cancel">Close</button>
</div>
</div>

</div>
</div>



<!-- End Accept -->

<?php } ?>



</div>

<!-- Start Decline -->

<div id="slide-decline-two<?php echo $row2['ProjectID']; ?>_<?php echo $random; ?>" class="well slide-decline">
  <div class="result-decline">
  <div id="result-decline-<?php echo $row2['ProjectID']; ?>">Successfully Declined!</div>
  </div>
<h4>Are you sure you want to decline the meeting request?</h4>
<input type="hidden" name="projectid<?php echo $row2['ProjectID']; ?>" id="projectid" value="<?php echo $row2['ProjectID']; ?>"/>
<input type="hidden" name="userid<?php echo $row2['userID']; ?>" id="userid" value="<?php echo $row2['userID']; ?>"/>

<div class="popupoverlay-btn">
  <div class="cancel-decline">
    <button class="slide-decline-two<?php echo $row2['ProjectID']; ?>_<?php echo $random; ?>_close cancel">Cancel</button>
    <button class="decline<?php echo $row2['ProjectID']; ?> btn-delete">Yes</button>
</div>

<div class="popupoverlay-btn">
  <div class="close-decline">
    <button class="slide-decline-two<?php echo $row2['ProjectID']; ?>_<?php echo $random; ?>_close cancel">Close</button>
</div>
</div>

</div>
</div>

<!-- End Decline -->



<!-- Start Cancel -->

<div id="slide-cancel-two<?php echo $row2['ProjectID']; ?>_<?php echo $random; ?>" class="well slide-cancel">
  <div class="result-cancel">
  <div id="result-cancel-<?php echo $row2['ProjectID']; ?>">Successfully Canceled!</div>
  </div>
<h4>Are you sure you want to cancel the meeting request?</h4>
<input type="hidden" name="projectid<?php echo $row2['ProjectID']; ?>" id="projectid" value="<?php echo $row2['ProjectID']; ?>"/>
<input type="hidden" name="userid<?php echo $row2['userID']; ?>" id="userid" value="<?php echo $row2['userID']; ?>"/>

<div class="popupoverlay-btn">
  <div class="cancel-cancel">
    <button class="slide-cancel-two<?php echo $row2['ProjectID']; ?>_<?php echo $random; ?>_close cancel">Cancel</button>
    <button class="cancel<?php echo $row2['ProjectID']; ?> btn-delete">Yes</button>
</div>

<div class="popupoverlay-btn">
  <div class="close-cancel">
    <button class="slide-cancel-two<?php echo $row2['ProjectID']; ?>_<?php echo $random; ?>_close cancel">Close</button>
</div>
</div>

</div>
</div>

<!-- End Cancel -->
  











<script>
$(document).ready(function () {


$(".slide-accept-two"+<?php echo $row2['ProjectID']; ?>+"_"+<?php echo $random; ?>+"_open").click(function() {  
//alert("open"+<?php echo $row2['ProjectID']; ?>);
$("#slide-accept-two"+<?php echo $row2['ProjectID']; ?>+"_"+<?php echo $random; ?>+"_wrapper").show();
$("#slide-accept-two"+<?php echo $row2['ProjectID']; ?>+"_"+<?php echo $random; ?>+"_background").show();
});


    $('#slide-accept-two'+<?php echo $row2['ProjectID']; ?>+"_"+<?php echo $random; ?>).popup({
        focusdelay: 400,
        outline: true,
        vertical: 'top'
    });


$(".slide-accept-two"+<?php echo $row2['ProjectID']; ?>+"_"+<?php echo $random; ?>+"_close").click(function() {  
//alert("close"+<?php echo $row2['ProjectID']; ?>);
$("#slide-accept-two"+<?php echo $row2['ProjectID']; ?>+"_"+<?php echo $random; ?>+"_wrapper").hide();
$("#slide-accept-two"+<?php echo $row2['ProjectID']; ?>+"_"+<?php echo $random; ?>+"_background").hide();
});
    


    
    $(".result-no-date").hide();
    $(".result-no-potentialanswer").hide();  

    $(".accept"+<?php echo $row2['ProjectID']; ?>).click(function() {  
      //alert("delete"+<?php echo $row2['ProjectID']; ?>);

        var proceed = true;

        var selected_meeting = $('input[name="selected_meeting[]"]:checked').map(function () {return this.value;}).get().join(",");

        


        var selected_meeting_checkedstatus = $('input[name="selected_meeting[]"]:checked').size();

        //alert(userid);
        
        if(selected_meeting_checkedstatus <1){ 
          $(".result-no-date").show();
          proceed = false;
         }else{
          $(".result-no-date").hide();
                //proceed = true; //set do not proceed flag       
        };
          

        //alert(selected_meeting);  
   
      
        var projectid = $('input[name=projectid'+<?php echo $row2['ProjectID']; ?>+']').val();
        var userid = $('input[name=userid'+<?php echo $row2['userID']; ?>+']').val();
        var status = $('input[name=status'+<?php echo $row2['ProjectID']; ?>+']').val();
        var accepted_to_participate = $('input[name=accepted_to_participate'+<?php echo $row2['ProjectID']; ?>+']').val();

        //alert(finaltime);

        var screeningquestionrequired = $('input[name=screeningquestionrequired'+<?php echo $row2['ProjectID']; ?>+']').val();
      
        


       

       //alert(screeningquestionrequired);
      

      if (screeningquestionrequired == 'Required'){

        var potentialanswergiven = $('input[name="PotentialAnswer[]"]:checked').map(function () {return this.value;}).get().join(",");
        var potentialanswergiven_checkedstatus = $('input[name="PotentialAnswer[]"]:checked').size();

        if (potentialanswergiven_checkedstatus < 1) {
          //alert("asdfads");

          $(".result-no-potentialanswer").show(); 
          proceed = false;
         }else{
          $(".result-no-potentialanswer").hide();
                //proceed = true; //set do not proceed flag       
        };

      }
      


      //$("#result-accept-"+<?php echo $row2['ProjectID']; ?>).hide().slideDown();
      
        //alert(potentialanswergiven);
 //get input field values
        
       
        
        
        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        

        //everything looks good! proceed...
        if(proceed) 
        {


      $(".result-accept").show();
      $(".cancel-accept").hide();
      $(".close-accept").show();

      $(".result-no-potentialanswer").hide();

      $("#result-accept-"+<?php echo $row2['ProjectID']; ?>).hide().slideDown();


          $( ".processing" ).show();
            //data to be sent to server

            post_data = {'projectid':projectid,'userid':userid,'selected_meeting':selected_meeting,'potentialanswergiven':potentialanswergiven};
            
            //Ajax post data to server
            $.post('acceptmeeting.php', post_data, function(response){  
              //alert("yes"); 

                //load json data from server and output message     
        if(response.type == 'error')
        {
          output = '<div class="errorXYZ">'+response.text+'</div>';
        }else{
          
            
            output = '<div class="success">Yo</div>';


          //reset values in all input fields
          $('#contact_form input').val(''); 
          $('#contact_form textarea').val(''); 
        }
        
        $(".cancel-accept").hide();
        $(".result-accept").show();
        $(".close-accept").show();
        $("#result-accept-"+response.text).hide().slideDown();
            }, 'json');
      
        }

});
  




});
</script>






<script>
$(document).ready(function () {



$(".slide-decline-two"+<?php echo $row2['ProjectID']; ?>+"_"+<?php echo $random; ?>+"_open").click(function() {  
//alert("open"+<?php echo $row2['ProjectID']; ?>);
$("#slide-decline-two"+<?php echo $row2['ProjectID']; ?>+"_"+<?php echo $random; ?>+"_wrapper").show();
$("#slide-decline-two"+<?php echo $row2['ProjectID']; ?>+"_"+<?php echo $random; ?>+"_background").show();
});


    $('#slide-decline-two'+<?php echo $row2['ProjectID']; ?>+"_"+<?php echo $random; ?>).popup({
        focusdelay: 400,
        outline: true,
        vertical: 'top'
    });


$(".slide-decline-two"+<?php echo $row2['ProjectID']; ?>+"_"+<?php echo $random; ?>+"_close").click(function() {  
//alert("close"+<?php echo $row2['ProjectID']; ?>);
$("#slide-decline-two"+<?php echo $row2['ProjectID']; ?>+"_"+<?php echo $random; ?>+"_wrapper").hide();
$("#slide-decline-two"+<?php echo $row2['ProjectID']; ?>+"_"+<?php echo $random; ?>+"_background").hide();
});




    $(".decline"+<?php echo $row2['ProjectID']; ?>).click(function() {  
      //alert("delete"+<?php echo $row2['ProjectID']; ?>); 

     
      $(".result-decline").show();
      $(".cancel-decline").hide();
      $(".close-decline").show();


      $("#result-decline-"+<?php echo $row2['ProjectID']; ?>).hide().slideDown();
      

 //get input field values
        
        var projectid = $('input[name=projectid'+<?php echo $row2['ProjectID']; ?>+']').val();
        var userid = $('input[name=userid'+<?php echo $row2['userID']; ?>+']').val();
       
       
        
        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        var proceed = true;

        //everything looks good! proceed...
        if(proceed) 
        {



          $( ".processing" ).show();
            //data to be sent to server
            post_data = {'projectid':projectid,'userid':userid};
            
            //Ajax post data to server
            $.post('decline-meeting-request.php', post_data, function(response){  
              //alert("yes"); 

                //load json data from server and output message     
        if(response.type == 'error')
        {
          output = '<div class="errorXYZ">'+response.text+'</div>';
        }else{
          
            //alert(text);
                
            output = '<div class="success">Yo</div>';



          
          //reset values in all input fields
          $('#contact_form input').val(''); 
          $('#contact_form textarea').val(''); 
        }
        
        $(".cancel-decline").hide();
        $(".result-decline").show();
        $(".close-decline").show();
        $("#result-decline-"+response.text).hide().slideDown();
            }, 'json');
      
        }

});
  




});
</script>







<script>
$(document).ready(function () {



$(".slide-cancel-two"+<?php echo $row2['ProjectID']; ?>+"_"+<?php echo $random; ?>+"_open").click(function() {  
//alert("open"+<?php echo $row2['ProjectID']; ?>);
$("#slide-cancel-two"+<?php echo $row2['ProjectID']; ?>+"_"+<?php echo $random; ?>+"_wrapper").show();
$("#slide-cancel-two"+<?php echo $row2['ProjectID']; ?>+"_"+<?php echo $random; ?>+"_background").show();
});


    $('#slide-cancel-two'+<?php echo $row2['ProjectID']; ?>+"_"+<?php echo $random; ?>).popup({
        focusdelay: 400,
        outline: true,
        vertical: 'top'
    });


$(".slide-cancel-two"+<?php echo $row2['ProjectID']; ?>+"_"+<?php echo $random; ?>+"_close").click(function() {  
//alert("close"+<?php echo $row2['ProjectID']; ?>);
$("#slide-cancel-two"+<?php echo $row2['ProjectID']; ?>+"_"+<?php echo $random; ?>+"_wrapper").hide();
$("#slide-cancel-two"+<?php echo $row2['ProjectID']; ?>+"_"+<?php echo $random; ?>+"_background").hide();
});




    $(".cancel"+<?php echo $row2['ProjectID']; ?>).click(function() {  
      //alert("delete"+<?php echo $row2['ProjectID']; ?>); 

     
      $(".result-cancel").show();
      $(".cancel-cancel").hide();
      $(".close-cancel").show();


      $("#result-cancel-"+<?php echo $row2['ProjectID']; ?>).hide().slideDown();
      

 //get input field values
        
        var projectid = $('input[name=projectid'+<?php echo $row2['ProjectID']; ?>+']').val();
        var userid = $('input[name=userid'+<?php echo $row2['userID']; ?>+']').val();
       

        

        
        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        var proceed = true;

        //everything looks good! proceed...
        if(proceed) 
        {



          $( ".processing" ).show();
            //data to be sent to server
            post_data = {'projectid':projectid,'userid':userid};
            
            //Ajax post data to server
            $.post('cancel-meeting-request.php', post_data, function(response){  
              //alert("yes"); 

                //load json data from server and output message     
        if(response.type == 'error')
        {
          output = '<div class="errorXYZ">'+response.text+'</div>';
        }else{
          
            //alert(text);
                
            output = '<div class="success">Yo</div>';



          
          //reset values in all input fields
          $('#contact_form input').val(''); 
          $('#contact_form textarea').val(''); 
        }
        
        $(".cancel-cancel").hide();
        $(".result-cancel").show();
        $(".close-cancel").show();
        $("#result-cancel-"+response.text).hide().slideDown();
            }, 'json');
      
        }

});
  




});
</script>







<div class="surveys-list">

<div class="survey-info-container">

<div class="row">
    <div class="col-md-2">

<a href="<?php echo BASE_PATH; ?>/profile/startup/?id=<?php echo $row2['startupID']; ?>">

<?php 




$ProfileImage = mysqli_query($connecDB,"SELECT * FROM tbl_startup WHERE userID='".$row2['startupID']."'");
$rowprofileimage = mysqli_fetch_array($ProfileImage);


 if($rowprofileimage['google_picture_link'] != ''){ ?>
        <img src="<?php echo $rowprofileimage['google_picture_link']; ?>" class="thumbnail-profile"/>
<?php } ?>

<?php if($rowprofileimage['facebook_id'] != '0'){  ?>
        <img src="https://graph.facebook.com/<?php echo $rowprofileimage['facebook_id']; ?>/picture" class="thumbnail-profile"/>
<?php } ?>
       
<?php if($rowprofileimage['google_picture_link'] == '' && $rowprofileimage['facebook_id'] == '0'){ ?>

      
<?php if($rowprofileimage['profile_image'] != ''){  ?>
        <img src="<?php echo BASE_PATH; ?>/images/profile/startup/<?php echo $rowprofileimage['profile_image'];?>" class="thumbnail-profile"/>
<?php }else{ ?>
        <img src="<?php echo BASE_PATH; ?>/images/profile/thumbnail.jpg" class="thumbnail-profile"/>
<?php } ?>

      
<?php } ?>


</a>


</div>




<?php

$sql3=mysqli_query($connecDB,"SELECT * FROM tbl_startup WHERE userID = '".$row2['startupID']."'");

$row3 = mysqli_fetch_array($sql3);

?>





    <div class="col-md-10">


                  <div class="survey-header">
                    <!--<div class="account-project-name">
                      Requested By
                    </div>-->
                    <div class="edit-delete">
   
            
      <?php if($row2['Status'] == 'Waiting for Participant to Accept or Decline' && $row2['ScreeningQuestion'] != 'Not Passed') { ?>
      
                <div class="accept-decline-<?php echo $row2['ProjectID']; ?>">        
                 <i class="icon-trash"></i><a href="#" role="button" class="slide-accept-two<?php echo $row2['ProjectID']; ?>_<?php echo $random; ?>_open accept-btn" <?php if($row2['Status'] == 'Waiting for Participant to Accept or Decline' && $row2['ScreeningQuestion'] != 'Not Passed' && $rowparticipant['Phone'] == '' || $row2['Status'] == 'Waiting for Participant to Accept or Decline' && $row2['ScreeningQuestion'] != 'Not Passed' && $rowparticipant['account_id'] == '' && $rowparticipant['bank_account'] == ''){?> id="disabled" <?php } ?>><strong>Accept</strong></a> <a href="#" role="button" class="slide-decline-two<?php echo $row2['ProjectID']; ?>_<?php echo $random; ?>_open decline-btn" <?php if($row2['Status'] == 'Waiting for Participant to Accept or Decline' && $row2['ScreeningQuestion'] != 'Not Passed' && $rowparticipant['Phone'] == '' || $row2['Status'] == 'Waiting for Participant to Accept or Decline' && $row2['ScreeningQuestion'] != 'Not Passed' && $rowparticipant['account_id'] == '' && $rowparticipant['bank_account'] == ''){?> id="disabled" <?php } ?> ><strong>Decline</strong></a>

                 </div>

         <?php } ?>           

<?php if($row2['Status'] == 'Waiting for Startup to Accept or Decline' && $row2['ScreeningQuestion'] != 'Not Passed') { ?>

                 <div class="accept-decline-<?php echo $row2['ProjectID']; ?>">        
                 <i class="icon-trash"></i><a href="#" role="button" class="slide-cancel-two<?php echo $row2['ProjectID']; ?>_<?php echo $random; ?>_open decline-btn"><strong>Cancel Meeting Request</strong></a></a>
                 </div>

           <?php } ?>      

               


                    </div>  
                   
                  </div>
                  <div class="survey-name" ng-bind="(survey.name)">
<a href="<?php echo BASE_PATH; ?>/profile/startup/?id=<?php echo $row2['startupID']; ?>">
<?php echo $row3['FirstName']; ?> <?php echo $row3['LastName']; ?></a></div>
                  <div class="survey-metadata">
                    <div class="item">
                     

                  
                     <div class="label">Meeting Date Options:</div>
                      <div class="value" ng-bind="(survey.date | date:'MM/dd/yyyy')">


                      <?php echo date('F j, Y',strtotime($row2['Date_Option_One']));?><br>
                      <?php echo date('F j, Y',strtotime($row2['Date_Option_Two']));?><br>
                      <?php echo date('F j, Y',strtotime($row2['Date_Option_Three']));?>

                      <!--
                      <?php echo date_format($date_option_one, 'm/d/Y'); ?><br>
                      <?php echo date_format($date_option_two, 'm/d/Y'); ?><br>
                      <?php echo date_format($date_option_three, 'm/d/Y'); ?>-->

                      </div>
                    </div> 
                    



                   

                    <div class="item">
                      <div class="label">Time:</div>
                      <div class="value" ng-bind="(survey.date | date:'MM/dd/yyyy')">
                      
                      <?php echo $row2['Time_Option_One']; ?><br>
                      <?php echo $row2['Time_Option_Two']; ?><br>
                      <?php echo $row2['Time_Option_Three']; ?> 
                      
                      

                      </div>
                    
                    </div>

                      <div class="item">
                      <div class="label">Duration</div>
                      <div class="value" ng-bind="(survey.date | date:'MM/dd/yyyy')"><?php echo $row4['Minutes']; ?> minutes </div>
                    </div>

                    <div class="item">
                      <div class="label">Payout</div>
                      <div class="value" ng-bind="(survey.date | date:'MM/dd/yyyy')">$<?php echo $row4['Pay']; ?></div>
                    </div>



                 
                    <div class="clearer"></div>
                  </div>


<div class="survey-metadata">
<div style="float:left; width:100%; margin: 15px 0 0 0; color:#666">

                      <div class="label">Location</div>
                      <div class="value">
                       <span ng-if="!survey.running &amp;&amp; !survey.finalized &amp;&amp; !survey.waitingForApproval" class="thelocation">
                          <?php echo $row2['Location']; ?>
                        </span>
                      </div>
                      <a href="http://maps.google.com/?q=<?php echo $row2['Location']; ?>" target="_blank" class="viewmap">View Map</a>
                    </div>
</div>


      <div style="float:left; width:100%; margin: 15px 0 0 0; color:#666">
Feeback for:<br> <a href="<?php echo BASE_PATH; ?>/ideas/p/<?php echo $row4['Category']; ?>/?id=<?php echo $row2['ProjectID']; ?>&p=<?php echo $row3['userID']; ?>"><?php echo $row4['Name']; ?></a>
 </div>
                  

                  <div class="theline"></div>

                  <div class="status_request">Status: 

                  <?php if($row2['Status'] == 'Waiting to Accept or Decline' && $row2['ScreeningQuestion'] != 'Not Passed'){echo 'Waiting to Accept or Decline';} ?>
                  <?php if($row2['Status'] == 'Waiting for Startup to Accept or Decline' && $row2['ScreeningQuestion'] != 'Not Passed'){echo 'Waiting for '.$row3['FirstName'].' to Accept or Decline';} ?>
                  <?php if($row2['Status'] == 'Waiting for Participant to Accept or Decline' && $row2['ScreeningQuestion'] != 'Not Passed'){echo 'Waiting for you to Accept or Decline';} ?>
                   <?php if($row2['ScreeningQuestion'] == 'Not Passed'){echo 'Waiting for '.$row3['FirstName'].' to confirm meeting';} ?>

           


                  </div>



                  <div class="survey-actions">
                   
                  <div class="action" tabindex="0" aria-hidden="false">
                        
                        <a href="<?php echo BASE_PATH; ?>/ideas/p/<?php echo $row4['Category']; ?>/?id=<?php echo $row2['ProjectID']; ?>"> View Details</a>


                      </div>

                        <div class="action" tabindex="0" aria-hidden="false">|</div>

                      <div class="action" ng-click="triggerPreview(survey)" ng-show="survey.surveyLength > 0" role="button" tabindex="0" aria-hidden="false">
                        
                       <a href="<?php echo BASE_PATH; ?>/profile/startup/?id=<?php echo $row2['startupID']; ?>"> View Profile </a>

                      </div>
                   


                    </div>

                     <div class="col-md-12">
                   <?php if($row4['NDA'] == 'Yes') { ?>

                  <br>Important Note.: <?php echo $row3['FirstName']; ?> requires you to sign an NDA before you both meet. Click <a href="<?php echo BASE_PATH; ?>/participant/idea/nda/sign/?id=<?php echo $row2['ProjectID']; ?>"><strong>here</strong></a> to sign.
                    <? } ?>           
</div>

                  </div>
               


  
    
   </div>
</div>


<?php 


}

}



?>







      
          




