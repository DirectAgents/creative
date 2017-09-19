<?php

session_start();
require_once '../../base_path.php';

include("../../config.php"); //include config file
require_once '../../class.startup.php';
require_once '../../class.participant.php';



$participant_home = new PARTICIPANT();

if($participant_home->is_logged_in())
{
  $participant_home->logout();
}



$startup_home = new STARTUP();

if(!$startup_home->is_logged_in())
{
  $startup_home->redirect('../../login');
}





?>








<?php
//include db configuration file


//echo $_SESSION['startupSession']

//MySQL query
//$Result = mysql_query("SELECT * FROM tbl_startup_project WHERE startupID = '".$_SESSION['startupSession']."' ORDER BY id DESC ");

$sql=mysqli_query($connecDB,"SELECT * FROM tbl_feedback_request WHERE startupID = '".$_SESSION['startupSession']."' AND ScreeningQuestion != 'Not Passed' ORDER BY id DESC ");
//$result=mysql_query($sql);

//$row=mysql_fetch_array($result);

  //if username exists
if(mysqli_num_rows($sql) == 0)
{
  //echo "asdf";


echo '<div class="row">
    <div class="col-md-12">
<div class="empty-projects">No feedback Requests<br><br></div>
  <div class="create-one-here-box">
      <div class="create-one">
     <a href="'.BASE_PATH.'/startup/idea/create/step1.php?id='.rand(100, 100000).'" class="slide_open create-one-btn">
        List a new idea</a>
       </div> 
  </div>
</div>

</div>
</div>';


}else{ 


//get all records from add_delete_record table
while($row2 = mysqli_fetch_array($sql))
{ 



$sql4 = mysqli_query($connecDB,"SELECT * FROM tbl_startup_project  WHERE ProjectID = '".$row2['ProjectID']."' ");
$row4 = mysqli_fetch_array($sql4);



$date_option_one = date_create($row2['Date_Option_One']);
$date_option_two = date_create($row2['Date_Option_Two']);
$date_option_three = date_create($row2['Date_Option_Three']);

$random = rand(5, 20000);



date_default_timezone_set('America/New_York');

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




<?php if($row2['Status'] == 'Waiting for Startup to Accept or Decline') { ?> 



<h4>Set up a feedback</h4>
<p>&nbsp;</p>


<input type="hidden" name="the_date" id="the_date" value=""/>


<input type="hidden" name="projectid<?php echo $row2['ProjectID']; ?>" id="projectid" value="<?php echo $row2['ProjectID']; ?>"/>
<input type="hidden" name="userid<?php echo $row2['userID']; ?>" id="userid" value="<?php echo $row2['userID']; ?>"/>


<input type="hidden" name="status<?php echo $row2['ProjectID']; ?>" id="status" value="feedback Set"/>
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
        <td><input name="selected_feedback[]" type="radio" style="display:block; margin: 0 auto;" value="option_one"/></td>
      </tr>
      <tr>
        <td><?php echo date('F j, Y',strtotime($row2['Date_Option_Two'])); ?></td>
        <td><?php echo $row2['Time_Option_Two']; ?></td>
        <td><input type="radio"  name="selected_feedback[]" style="display:block; margin: 0 auto;" value="option_two"/></td>
      </tr>
      <tr>
        <td><?php echo date('F j, Y',strtotime($row2['Date_Option_Three'])); ?></td>
        <td><?php echo $row2['Time_Option_Three']; ?></td>
        <td><input type="radio" name="selected_feedback[]" style="display:block; margin: 0 auto;" value="option_three"/></td>
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
  var day_of_feedback = $( "#day option:selected" ).text();
  //alert(day_of_feedback);


$('#select-the-day').html('Select the date to meet:');

$( "#feedback_date" ).datepicker("destroy");

$( "#feedback_date" ).datepicker({

    beforeShowDay: function(date) {

        var day = date.getDay();
        //var day_of_feedback="<?php echo $row2['Day']; ?>";
        //var day = $( "#day option:selected" ).text();
        
        if(day_of_feedback == 'Monday'){
        return [(day != 2 && day != 3 && day != 4 && day != 5 && day != 6 && day != 0), ''];    
        }

        if(day_of_feedback == 'Tuesday'){
        return [(day != 3 && day != 4 && day != 5 && day != 6 && day != 0 && day != 1), ''];
        }

        if(day_of_feedback == 'Wednesday'){
        return [(day != 4 && day != 5 && day != 6 && day != 0 && day != 1 && day != 2), ''];
        }

        if(day_of_feedback == 'Thursday'){
        return [(day != 5 && day != 6 && day != 0 && day != 1 && day != 2 && day != 3), ''];
        }

        if(day_of_feedback == 'Friday'){
        return [(day != 6 && day != 0 && day != 1 && day != 2 && day != 3 && day != 4), ''];
        }

        if(day_of_feedback == 'Saturday'){
        return [(day != 0 && day != 1 && day != 2 && day != 3 && day != 4 && day != 5), ''];
        }

        if(day_of_feedback == 'Sunday'){
        return [(day != 1 && day != 2 && day != 3 && day != 4 && day != 5 && day != 6), ''];
        }
        

      if(day_of_feedback == 'Select a day'){
        $('#select-the-day').hide();
      }

$( "#feedback_date" ).datepicker("refresh");
        


    }

    


  });




$(document).on("change", "#feedback_date", function () {
         date = $(this).val();
        //alert(date);
        $("#the_date").val(date);
        
    })




   });

 
   });


  </script>

<div id="select-the-day"></div>
<div id="feedback_date"></div>
-->


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
<h4>Are you sure you want to decline the feedback request?</h4>
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
  <div id="result-cancel-<?php echo $row2['ProjectID']; ?>">Successfully Cancelled!</div>
  </div>
<h4>Are you sure you want to cancel the feedback request?</h4>
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


    $(".accept"+<?php echo $row2['ProjectID']; ?>).click(function() {  
      //alert("delete"+<?php echo $row2['ProjectID']; ?>); 

      var proceed = true;


      //var input = date;
        //var the_date = $('input[name=the_date]').val();

        
     
      $("#result-accept-"+<?php echo $row2['ProjectID']; ?>).hide().slideDown();


      //$("#result-accept-"+<?php echo $row2['ProjectID']; ?>).hide().slideDown();
      

 //get input field values
        
        var projectid = $('input[name=projectid'+<?php echo $row2['ProjectID']; ?>+']').val();
        var userid = $('input[name=userid'+<?php echo $row2['userID']; ?>+']').val();
        //var date = $('select[name=date'+<?php echo $row2['ProjectID']; ?>+']').val();
        //var finaltime = $('input[name=the_time'+<?php echo $row2['ProjectID']; ?>+']').val();
        var selected_feedback = $('input[name="selected_feedback[]"]:checked').map(function () {return this.value;}).get().join(",");


        var selected_feedback_checkedstatus = $('input[name="selected_feedback[]"]:checked').size();

        //alert(userid);
        
        if(selected_feedback_checkedstatus <1 ){ 
          $(".result-no-date").show();
          proceed = false;
        }else{
          $(".result-no-date").hide();
                //proceed = true; //set do not proceed flag       
        };


        /*if(the_date == '' ){
            $(".result-no-date").show(); 
            proceed = false;
            }
        */    
        /*
        if(date == '' ){
            $(".result-no-date").show(); 
            proceed = false;
        }*/

       
        //alert(date);
        
        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        

        //everything looks good! proceed...
        if(proceed) 
        {

      $(".result-no-date").hide(); 
      $(".result-accept").show().slideDown();
      $(".cancel-accept").hide();
      $(".close-accept").show();



          $( ".processing" ).show();
            //data to be sent to server
            post_data = {'projectid':projectid,'userid':userid,'selected_feedback':selected_feedback};
            
            //Ajax post data to server
            $.post('acceptfeedback.php', post_data, function(response){  
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
            $.post('decline-feedback-request.php', post_data, function(response){  
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
            $.post('cancel-feedback-request.php', post_data, function(response){  
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

<a href="<?php echo BASE_PATH; ?>/profile/participant/?id=<?php echo $row2['userID']; ?>">

<?php 


$ProfileImage = mysqli_query($connecDB,"SELECT * FROM tbl_participant WHERE userID='".$row2['userID']."'");
$rowprofileimage = mysqli_fetch_array($ProfileImage);


 if($rowprofileimage['google_picture_link'] != ''){ ?>
        <img src="<?php echo $rowprofileimage['google_picture_link']; ?>" class="thumbnail-profile"/>
<?php } ?>

<?php if($rowprofileimage['facebook_id'] != '0'){  ?>
        <img src="https://graph.facebook.com/<?php echo $rowprofileimage['facebook_id']; ?>/picture" class="thumbnail-profile"/>
<?php } ?>
       
<?php if($rowprofileimage['google_picture_link'] == '' && $rowprofileimage['facebook_id'] == '0'){ ?>

      
<?php if($rowprofileimage['profile_image'] != ''){  ?>
        <img src="<?php echo BASE_PATH; ?>/images/profile/participant/<?php echo $rowprofileimage['profile_image'];?>" class="thumbnail-profile"/>
<?php }else{ ?>
        <img src="<?php echo BASE_PATH; ?>/images/profile/thumbnail.jpg" class="thumbnail-profile"/>
<?php } ?>

      
<?php } ?>


</a>



</div>




<?php

$sql3=mysqli_query($connecDB,"SELECT * FROM tbl_participant WHERE userID = '".$row2['userID']."'");
//$result3=mysql_query($sql3);

$row3 = mysqli_fetch_array($sql3);

?>





    <div class="col-md-10">


                  <div class="survey-header">
                    <!--<div class="account-project-name">
                      PERSON NAME
                    </div>-->
                    <div class="edit-delete">
                      
            
      <?php if($row2['Status'] == 'Waiting for Participant to Accept or Decline') { ?>
      
                 <div class="cancel-request-<?php echo $row2['ProjectID']; ?>">        
                 <i class="icon-trash"></i><a href="#" role="button" class="slide-cancel-two<?php echo $row2['ProjectID']; ?>_<?php echo $random; ?>_open decline-btn"><strong>Cancel feedback Request</strong></a></a>
                 </div>


         <?php } ?>           



           <?php if($row2['Status'] == 'Waiting for Startup to Accept or Decline') { ?>

             
                  <div class="accept-decline-<?php echo $row2['ProjectID']; ?>">        
                 <i class="icon-trash"></i><a href="#" role="button" class="slide-accept-two<?php echo $row2['ProjectID']; ?>_<?php echo $random; ?>_open accept-btn"><strong>Accept</strong></a>&nbsp;&nbsp;<a href="#" role="button" class="slide-decline-two<?php echo $row2['ProjectID']; ?>_<?php echo $random; ?>_open decline-btn"><strong>Decline</strong></a>
                 </div>

           <?php } ?>      

               


                    </div>  
                   
                  </div>
                  <div class="survey-name" ng-bind="(survey.name)">
<a href="<?php echo BASE_PATH; ?>/profile/participant/?id=<?php echo $row2['userID']; ?>">
<?php echo $row3['FirstName']; ?> <?php echo $row3['LastName']; ?></a></div>
                  <div class="survey-metadata">
                    <div class="item">
                      <div class="label">feedback Date Options:</div>
                      <div class="value" ng-bind="(survey.date | date:'MM/dd/yyyy')">
                      
                       


                      <?php echo date('F j, Y',strtotime($row2['Date_Option_One']));?><br>
                      <?php echo date('F j, Y',strtotime($row2['Date_Option_Two']));?><br>
                      <?php echo date('F j, Y',strtotime($row2['Date_Option_Three']));?>
                      

                      
                        

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
Feeback for:<br> <a href="<?php echo BASE_PATH; ?>/ideas/s/<?php echo $row4['Category']; ?>/?id=<?php echo $row2['ProjectID']; ?>&p=<?php echo $row3['userID']; ?>"><?php echo $row4['Name']; ?></a>
 </div>


                  <div class="theline"></div>

                  <div class="status_request">Status: 

                  <?php if($row2['Status'] == 'Waiting for Startup to Accept or Decline'){echo 'Waiting for you to Accept or Decline';} ?>
                  <?php if($row2['Status'] == 'Waiting for Participant to Accept or Decline'){echo 'Waiting for '.$row3['FirstName'].' to accept or decline';} ?>

                  </div>

                  <div class="survey-actions">
                   
                  <div class="action" tabindex="0" aria-hidden="false">
                        
                        <a href="<?php echo BASE_PATH; ?>/ideas/s/<?php echo $row4['Category']; ?>/?id=<?php echo $row2['ProjectID']; ?>&p=<?php echo $row3['userID']; ?>"> View Details</a>


                      </div>

                        <div class="action" tabindex="0" aria-hidden="false">|</div>

                      <div class="action" ng-click="triggerPreview(survey)" ng-show="survey.surveyLength > 0" role="button" tabindex="0" aria-hidden="false">
                        
                       <a href="<?php echo BASE_PATH; ?>/profile/participant/?id=<?php echo $row2['userID']; ?>"> View Profile </a>

                      </div>
                    

                    </div>
                  </div>
               


  
    
   </div>
</div>


<?php 

}



}






  ?>



      
          




