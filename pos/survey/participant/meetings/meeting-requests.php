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





?>





<?php
//include db configuration file


//echo $_SESSION['startupSession']

//MySQL query
//$Result = mysql_query("SELECT * FROM tbl_startup_project WHERE startupID = '".$_SESSION['startupSession']."' ORDER BY id DESC ");

$sql=mysqli_query($connecDB,"SELECT * FROM tbl_project_request WHERE userID = '".$_SESSION['participantSession']."' AND Accepted_to_Participate = 'Pending' AND Status != 'Canceled_by_Participant'  ORDER BY id DESC ");
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


//get all records from add_delete_record table
while($row2 = mysqli_fetch_array($sql))
{ 


/*
$update_sql = mysqli_query($connecDB,"UPDATE tbl_project_request SET Viewed_by_Participant='Yes'
WHERE userID='".$_SESSION['participantSession']."' AND ProjectID = '".$row2['ProjectID']."' AND Meeting_Status = 'Meeting Request' ");
*/


$sql4 = mysqli_query($connecDB,"SELECT * FROM tbl_startup_project  WHERE ProjectID = '".$row2['ProjectID']."' ");
$row4 = mysqli_fetch_array($sql4);


date_default_timezone_set('America/New_York');




$date2 = date_create($row2['Date_of_Meeting']);

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
    <div id="result-accept-<?php echo $row2['ProjectID']; ?>">Please provide an answer!</div>
    </div>
  </div>


<h4>Accept Meeting Request</h4>
<p>&nbsp;</p>
<input type="hidden" name="projectid<?php echo $row2['ProjectID']; ?>" id="projectid" value="<?php echo $row2['ProjectID']; ?>"/>
<input type="hidden" name="userid<?php echo $row2['userID']; ?>" id="userid" value="<?php echo $row2['userID']; ?>"/>


<?php if($row2['Status'] == 'Waiting for Participant to Accept or Decline' && $row2['Final_Time'] == '') { ?>

<input type="hidden" name="status<?php echo $row2['ProjectID']; ?>" id="status" value="Waiting for Startup to Accept or Decline"/>
<input type="hidden" name="accepted_to_participate<?php echo $row2['ProjectID']; ?>" id="accepted_to_participate" value="Pending"/>




<?php } ?>



<?php if($row2['Status'] == 'Waiting for Participant to Accept or Decline' && $row2['Date_of_Meeting'] == '0000-00-00') { ?>


<input type="hidden" name="status<?php echo $row2['ProjectID']; ?>" id="status" value="Meeting Set"/>
<input type="hidden" name="accepted_to_participate<?php echo $row2['ProjectID']; ?>" id="accepted_to_participate" value="Accepted"/>

Location: <?php echo $row2['Location']; ?><br><br>

Time: <?php echo $row2['Final_Time']; ?><br><br>


Select the date to meet:
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>

  $( "#meeting_date" ).datepicker({
    beforeShowDay: function(date) {
        var day = date.getDay();
        var day_of_meeting="<?php echo $row2['Day']; ?>";
        
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

        
    }
  });

  </script>


 <div id="meeting_date"></div>


<?php 

$sqlscreening = mysqli_query($connecDB,"SELECT * FROM tbl_startup_screeningquestion  WHERE ProjectID = '".$row2['ProjectID']."' ");
$rowscreening = mysqli_fetch_array($sqlscreening);

if($rowscreening['EnabledorDisabled'] == 'Enabled'){
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

  echo '<input type="radio" style="display:block; float:left" name="PotentialAnswer[]" id="PotentialAnswer3" value="Not Required" />';

}


?>


<?php } ?>



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




<!-- Start Decline -->

<div id="slide-decline-two<?php echo $row2['ProjectID']; ?>_<?php echo $random; ?>" class="well slide-decline">
  <div class="result-decline">
  <div id="result-decline-<?php echo $row2['ProjectID']; ?>">Successfully Declined!</div>
  </div>
<h4>Are you sure you want to decline the meeting request?</h4>
<input type="text" name="projectid<?php echo $row2['ProjectID']; ?>" id="projectid" value="<?php echo $row2['ProjectID']; ?>"/>
<input type="text" name="userid<?php echo $row2['userID']; ?>" id="userid" value="<?php echo $row2['userID']; ?>"/>

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
<input type="text" name="projectid<?php echo $row2['ProjectID']; ?>" id="projectid" value="<?php echo $row2['ProjectID']; ?>"/>
<input type="text" name="userid<?php echo $row2['userID']; ?>" id="userid" value="<?php echo $row2['userID']; ?>"/>

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
    
    var date = '';
    $(document).on("change", "#meeting_date", function () {
         date = $(this).val();
          $(".result-no-date").hide(); 
        
    })

    
    $(".result-no-date").hide();
    $(".result-no-potentialanswer").hide();  

    $(".accept"+<?php echo $row2['ProjectID']; ?>).click(function() {  
      //alert("delete"+<?php echo $row2['ProjectID']; ?>);

          var proceed = true;

          var input = date;
          
          if(input == '' ){
            $(".result-no-date").show(); 
            proceed = false;
            }
          
   
      
        var projectid = $('input[name=projectid'+<?php echo $row2['ProjectID']; ?>+']').val();
        var userid = $('input[name=userid'+<?php echo $row2['userID']; ?>+']').val();
        var status = $('input[name=status'+<?php echo $row2['ProjectID']; ?>+']').val();
        var accepted_to_participate = $('input[name=accepted_to_participate'+<?php echo $row2['ProjectID']; ?>+']').val();

        //alert(finaltime);

      
        var potentialanswer = $('input[name="PotentialAnswer[]"]:checked').size();
        var potentialanswergiven = $('input[name="PotentialAnswer[]"]:checked').val();
       //alert(n);
        if (potentialanswer < 1) {
          //alert("asdfads");

          $(".result-no-potentialanswer").show(); 
          proceed = false;
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
            post_data = {'projectid':projectid,'userid':userid,'status':status,'accepted_to_participate':accepted_to_participate,'date':date,'potentialanswergiven':potentialanswergiven};
            
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
        
        var projectid = $('input[name=projectid'+<?php echo $row2['ProjectID']; ?>).val();
        var userid = $('input[name=userid'+<?php echo $row2['userID']; ?>).val();
       
       
        
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
            $.post('declinemeeting.php', post_data, function(response){  
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
        
        var projectid = $('input[name=projectid'+<?php echo $row2['ProjectID']; ?>).val();
        var userid = $('input[name=userid'+<?php echo $row2['userID']; ?>).val();
       
       
        
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
            $.post('cancelmeeting.php', post_data, function(response){  
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

<?php 

$ProjectImage = mysqli_query($connecDB,"SELECT * FROM tbl_startup WHERE userID='".$row2['startupID']."'");
$rowprojectimage = mysqli_fetch_array($ProjectImage);

if($rowprojectimage['google_picture_link'] != '') {

echo '<img src="'.$rowprojectimage['google_picture_link'].'" width="100">';


 }else{ 


if($rowprojectimage['profile_image'] != '') { ?>

<img src="<?php echo BASE_PATH; ?>/images/profile/startup/<?php echo $rowprojectimage['profile_image']; ?>" width="100">

<?php }else{ ?>

<img src="<?php echo BASE_PATH; ?>/images/profile/thumbnail.jpg" width="100">

<?php } } ?>


</div>




<?php

$sql3=mysqli_query($connecDB,"SELECT * FROM tbl_startup WHERE userID = '".$row2['startupID']."'");

$row3 = mysqli_fetch_array($sql3);

?>





    <div class="col-md-10">


                  <div class="survey-header">
                    <div class="account-project-name">
                      You will meet
                    </div>
                    <div class="edit-delete">
                      
            
      <?php if($row2['Status'] == 'Waiting for Participant to Accept or Decline') { ?>
      
                <div class="accept-decline-<?php echo $row2['ProjectID']; ?>">        
                 <i class="icon-trash"></i><a href="#" role="button" class="slide-accept-two<?php echo $row2['ProjectID']; ?>_<?php echo $random; ?>_open accept-btn"><strong>Accept</strong></a> <a href="#" role="button" class="slide-decline-two<?php echo $row2['ProjectID']; ?>_<?php echo $random; ?>_open decline-btn"><strong>Decline</strong></a>


                 </div>

         <?php } ?>           

<?php if($row2['Status'] == 'Waiting for Startup to Accept or Decline') { ?>

                 <div class="cancel-request-<?php echo $row2['ProjectID']; ?>">        
                 <i class="icon-trash"></i><a href="#" role="button" class="slide-cancel-two<?php echo $row2['ProjectID']; ?>_<?php echo $random; ?>_open"><strong>Cancel Meeting</strong></a></a>
                 </div>

           <?php } ?>      

               


                    </div>  
                   
                  </div>
                  <div class="survey-name" ng-bind="(survey.name)"><?php echo $row3['FirstName']; ?> <?php echo $row3['LastName']; ?></div>
                  <div class="survey-metadata">
                    <div class="item">
                     

                    <?php if($row2['Date_of_Meeting'] == '0000-00-00') { ?>

                     <div class="label">Day:</div>
                      <div class="value" ng-bind="(survey.date | date:'MM/dd/yyyy')">

                      <?php echo $row2['Day']; ?> (Suggest a date)

                         </div>
                    </div>
                    
                    <?php }else{ ?>    

                     <div class="label">Date of meeting:</div>
                      <div class="value" ng-bind="(survey.date | date:'MM/dd/yyyy')">

                      <?php echo date_format($date2, 'm/d/Y'); ?>

                      </div>
                    </div> 
                    
                    <?php } ?>    



                   

                    <div class="item">
                      <div class="label">Time:</div>
                      <div class="value" ng-bind="(survey.date | date:'MM/dd/yyyy')">
                      
                      <?php if($row2['Status'] == 'Waiting for Participant to Accept or Decline') { ?>

                      <?php echo $row2['Final_Time']; ?>

                      <?php } ?>

                      
                      <?php if($row2['Status'] == 'Waiting for Startup to Accept or Decline') { ?>

                      Between <?php echo $row2['From_Time']; ?> & 
                      
                      <?php echo $row2['To_Time']; ?>

                      <?php } ?>


                      
                        

                      </div>
                    
                    </div>


                    <div class="item date">
                      <div class="label">Location:</div>
                      <div class="value">
                       <span ng-if="!survey.running &amp;&amp; !survey.finalized &amp;&amp; !survey.waitingForApproval" class="draft">
                          <?php echo $row2['Location']; ?>
                        </span>
                      </div>
                       <a href="http://maps.google.com/?q=<?php echo $row2['Location']; ?>" target="_blank">View Map</a>
                    </div>
                 
                    <div class="clearer"></div>
                  </div>

                  <div class="theline"></div>

                  <div class="status_request">Status: 

                  <?php if($row2['Status'] == 'Waiting to Accept or Decline'){echo 'Waiting to Accept or Decline';} ?>
                  <?php if($row2['Status'] == 'Waiting for Startup to Accept or Decline'){echo 'Waiting for Startup to Accept';} ?>
                  <?php if($row2['Status'] == 'Waiting for Participant to Accept or Decline'){echo 'Waiting for you to Accept or Decline';} ?>

                          


                  </div>



                  <div class="survey-actions">
                   
                  <div class="action" tabindex="0" aria-hidden="false">
                        
                        <a href="<?php echo BASE_PATH; ?>/ideas/p/<?php echo $row4['Category']; ?>/?id=<?php echo $row2['ProjectID']; ?>"> View Idea</a>


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







      
          




