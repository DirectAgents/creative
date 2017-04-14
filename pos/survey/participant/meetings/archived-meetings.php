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

$sql=mysqli_query($connecDB,"SELECT * FROM tbl_meeting_archived_participant WHERE userID = '".$_SESSION['participantSession']."' ORDER BY id DESC ");
//$result=mysql_query($sql);

//$row=mysql_fetch_array($result);

  //if username exists
if(mysqli_num_rows($sql) == 0)
{
  //echo "asdf";


echo '<div class="row">
    <div class="col-md-12">
<div class="empty-projects">Archived Meetings</div>
  <div class="create-one-here-box">
      
      <br><br>
      <a href="'.BASE_PATH.'/participant/idea/browse/">
        <button class="create-one-btn">Browse here for new ideas</button></a>
        <p>&nbsp;</p>
      
  </div>
</div>

</div>
</div>
';

}else{


//get all records from add_delete_record table
while($row2 = mysqli_fetch_array($sql))
{ 



$sql4 = mysqli_query($connecDB,"SELECT * FROM tbl_startup_project  WHERE ProjectID = '".$row2['ProjectID']."' ");
$row4 = mysqli_fetch_array($sql4);



$date2 = date_create($row2['Date_of_Meeting']);

$random = rand(5, 20000);



date_default_timezone_set('America/New_York');

$date = date('Y-m-d h:m A');



$dtA = new DateTime($date);
$dtB = new DateTime($row2['Date_of_Meeting']);




?>


<div class="surveys-list">

<div class="survey-info-container">

<div class="row">
    <div class="col-md-2">

<?php 

$ProjectImage = mysqli_query($connecDB,"SELECT * FROM tbl_startup WHERE userID='".$row2['startupID']."'");
$rowprojectimage = mysqli_fetch_array($ProjectImage);



if($rowprojectimage['facebook_id'] != '0') {

echo '<img src="https://graph.facebook.com/'.$rowprojectimage['facebook_id'].'/picture?width=100&height=100" width="100">';


 } 


if($rowprojectimage['google_picture_link'] != '') {

echo '<img src="'.$rowprojectimage['google_picture_link'].'" width="100">';


 } 


if($rowprojectimage['profile_image'] != '') { ?>

<img src="<?php echo BASE_PATH; ?>/images/profile/startup/<?php echo $rowprojectimage['profile_image']; ?>" width="100">

<?php }else{ ?>

<img src="<?php echo BASE_PATH; ?>/images/profile/thumbnail.jpg" width="100">

<?php }  ?>


</div>




<?php

$sql3=mysqli_query($connecDB,"SELECT * FROM tbl_startup WHERE userID = '".$row2['startupID']."'");
$row3 = mysqli_fetch_array($sql3);

$sqlparticipant=mysqli_query($connecDB,"SELECT * FROM tbl_participant WHERE userID = '".$row2['userID']."'");
$rowparticipant = mysqli_fetch_array($sqlparticipant);

?>





    <div class="col-md-10">


                  <div class="survey-header">
                    <div class="account-project-name">
                      Person Name
                    </div>
                    <div class="edit-delete">
                      
            

<div class="accept-decline-<?php echo $row2['ProjectID']; ?>">        
                 <i class="icon-trash"></i><a href="#" role="button" class="slide-delete-two<?php echo $row2['ProjectID']; ?>_<?php echo $random; ?>_open decline-btn"><strong>Delete</strong></a>
                 </div>
               


<!-- Start Decline -->

<div id="slide-delete-two<?php echo $row2['ProjectID']; ?>_<?php echo $random; ?>" class="well slide-decline">
  <div class="result-decline">
  <div id="result-decline-<?php echo $row2['ProjectID']; ?>">Successfully Deleted!</div>
  </div>
<h4>Are you sure you want to delete it?</h4>
<input type="hidden" name="projectid<?php echo $row2['ProjectID']; ?>" id="projectid" value="<?php echo $row2['ProjectID']; ?>"/>
<input type="hidden" name="userid<?php echo $row2['userID']; ?>" id="userid" value="<?php echo $row2['userID']; ?>"/>
<input type="hidden" name="id<?php echo $row2['id']; ?>" id="id" value="<?php echo $row2['id']; ?>"/>

<div class="popupoverlay-btn">
  <div class="cancel-decline">
    <button class="slide-delete-two<?php echo $row2['ProjectID']; ?>_<?php echo $random; ?>_close cancel">Cancel</button>
    <button class="decline<?php echo $row2['ProjectID']; ?>_<?php echo $random; ?> btn-delete">Yes</button>
</div>

<div class="popupoverlay-btn">
  <div class="close-decline">
    <button class="slide-delete-two<?php echo $row2['ProjectID']; ?>_<?php echo $random; ?>_close cancel">Close</button>
</div>
</div>

</div>
</div>

<!-- End Decline -->


<script>
$(document).ready(function () {



$(".slide-delete-two"+<?php echo $row2['ProjectID']; ?>+"_"+<?php echo $random; ?>+"_open").click(function() {  
//alert("open"+<?php echo $row2['ProjectID']; ?>);
$("#slide-delete-two"+<?php echo $row2['ProjectID']; ?>+"_"+<?php echo $random; ?>+"_wrapper").show();
$("#slide-delete-two"+<?php echo $row2['ProjectID']; ?>+"_"+<?php echo $random; ?>+"_background").show();
});


    $('#slide-delete-two'+<?php echo $row2['ProjectID']; ?>+"_"+<?php echo $random; ?>).popup({
        focusdelay: 400,
        outline: true,
        vertical: 'top'
    });


$(".slide-delete-two"+<?php echo $row2['ProjectID']; ?>+"_"+<?php echo $random; ?>+"_close").click(function() {  
//alert("close"+<?php echo $row2['ProjectID']; ?>);
$("#slide-delete-two"+<?php echo $row2['ProjectID']; ?>+"_"+<?php echo $random; ?>+"_wrapper").hide();
$("#slide-delete-two"+<?php echo $row2['ProjectID']; ?>+"_"+<?php echo $random; ?>+"_background").hide();
});




    $(".decline"+<?php echo $row2['ProjectID']; ?>+"_"+<?php echo $random; ?>).click(function() {  
      //alert("delete"+<?php echo $row2['ProjectID']; ?>); 

     
      $(".result-decline").show();
      $(".cancel-decline").hide();
      $(".close-decline").show();


      $("#result-decline-"+<?php echo $row2['ProjectID']; ?>).hide().slideDown();
      

 //get input field values
        
        var projectid = $('input[name=projectid'+<?php echo $row2['ProjectID']; ?>+']').val();
        var userid = $('input[name=userid'+<?php echo $row2['userID']; ?>+']').val();
        var id = $('input[name=id'+<?php echo $row2['id']; ?>+']').val();
       
       
        
        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        var proceed = true;

        //everything looks good! proceed...
        if(proceed) 
        {



          $( ".processing" ).show();
            //data to be sent to server
            post_data = {'id':id,'projectid':projectid,'userid':userid};
            
            //Ajax post data to server
            $.post('delete-meeting-archived.php', post_data, function(response){  
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
   


               


                    </div>  
                   
                  </div>
                  <div class="survey-name" ng-bind="(survey.name)"><?php echo $row3['FirstName']; ?> <?php echo $row3['LastName']; ?></div>
                  <div class="survey-metadata">
                    <div class="item">
                      <div class="label">Date:</div>
                      <div class="value" ng-bind="(survey.date | date:'MM/dd/yyyy')">
                        
                        <?php if($row2['Date_of_Meeting'] == '0000-00-00'){ 

                        echo "No date set";
                      }else{

                        echo date('F j, Y',strtotime($row2['Date_of_Meeting']));
                      }
                      
                      ?>


                      </div>
                    </div>

                    <div class="item">
                      <div class="label">Time:</div>
                      <div class="value" ng-bind="(survey.date | date:'MM/dd/yyyy')">
                     
                   

                       
                      <?php if($row2['Date_of_Meeting'] == '0000-00-00'){ 

                        echo "No time set";
                      }else{

                        echo $row2['Final_Time'];
                      }
                      
                      ?>

                   
                        
    


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
                       <span ng-if="!survey.running &amp;&amp; !survey.finalized &amp;&amp; !survey.waitingForApproval" class="draft">
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
<?php echo "asdfads";   echo $row2['Status']; ?>
                  <div class="status_request">Status: 
<?php if($row2['Met'] == 'Yes' && $row2['Met'] != 'No didn\'t show up' && $row2['Payment'] == '' && $rowparticipant['Payment_Method'] == 'Bank'){ ?>
Waiting for Payment pending.</a> 
<?php } ?> 


<?php if($row2['Met'] == 'Yes' && $row2['Met'] != 'No didn\'t show up' && $row2['Payment'] == 'Yes' && $rowparticipant['Payment_Method'] == 'Bank'){ ?>
Payment received. View <a href="<?php echo BASE_PATH; ?>/startup/payment/">Payment History</a>
<?php } ?> 


<?php if($row2['Met'] == 'Yes' && $row2['Status'] != 'No show up. Meeting didn\'t happen' && $row2['Payment'] == '' && $rowparticipant['Payment_Method'] == 'Cash'){ ?>
You met with <?php echo $row3['FirstName']; ?>.
<?php } ?> 

<?php if($row2['Met'] == '' && $row2['Status'] != '' && $row2['Status'] != 'Meeting Canceled by Startup' && $row2['Status'] != 'Meeting Canceled by Participant' && $row2['Payment'] == ''){ ?>
Meeting never happened.
<?php } ?> 

<?php if($row2['Met'] == '' && $row2['Status'] == '' && $row2['Status'] != 'Meeting Canceled by Startup' && $row2['Status'] != 'Meeting Canceled by Participant' && $row2['Payment'] == ''){ ?>
Meeting never happened.
<?php } ?> 


<?php if($row2['Met'] == '' && $row2['Status'] == 'Meeting Canceled by Startup' && $row2['Payment'] == ''){ ?>
Meeting was canceled.
<?php } ?> 

<?php if($row2['Met'] == '' && $row2['Status'] == 'Meeting Canceled by Participant' && $row2['Payment'] == ''){ ?>
Meeting was canceled.
<?php } ?> 


               <!--   

                <?php if($row2['Status'] == 'Canceled_by_Startup'){echo 'Meeting Canceled By Startup';} ?>
                <?php if($row2['Status'] == 'Declined_by_Startup'){echo 'Meeting Request Declined By Startup';} ?>
                
                <?php if($row2['Status'] == 'Canceled_by_Participant'){echo 'Meeting Canceled By Participant';} ?>
                <?php if($row2['Status'] == 'Declined_by_Participant'){echo 'Meeting Request Declined By Participant';} ?>

                <?php if($row2['Status'] == 'Meeting Never Happened'){echo 'Meeting Never Happened';} ?>

                <?php if($row2['Status'] == 'Screening Question Not Passed'){echo 'Meeting Request was denied';} ?>

                -->


                  </div>

                  <div class="survey-actions">
                   
                  <div class="action" tabindex="0" aria-hidden="false">
                        
                        <a href="<?php echo BASE_PATH; ?>/ideas/p/<?php echo $row4['Category']; ?>/?id=<?php echo $row2['ProjectID']; ?>&p=<?php echo $row3['userID']; ?>"> View Details</a>


                      </div>

                        <div class="action" tabindex="0" aria-hidden="false">|</div>

                      <div class="action" ng-click="triggerPreview(survey)" ng-show="survey.surveyLength > 0" role="button" tabindex="0" aria-hidden="false">
                        
                       <a href="<?php echo BASE_PATH; ?>/profile/startup/?id=<?php echo $row2['startupID']; ?>"> View Profile </a>

                      </div>
                    

                    </div>
                  </div>
               


  
    
   </div>
</div>

<?php 


}


}


  ?>




      
          




