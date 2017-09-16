<?php

session_start();

require_once '../../base_path.php';

include("../../config.php"); //include config file
require_once '../../class.participant.php';
require_once '../../class.startup.php';



$startup_home = new STARTUP();

if($startup_home->is_logged_in())
{
  $startup_home->logout();
}



$participant_home = new PARTICIPANT();

if(!$participant_home->is_logged_in())
{
  $participant_home->redirect('../login/');
}





?>








<?php
//include db configuration file




//MySQL query
//$Result = mysql_query("SELECT * FROM tbl_startup_project WHERE startupID = '".$_SESSION['startupSession']."' ORDER BY id DESC ");

$sql=mysqli_query($connecDB,"SELECT * FROM tbl_meeting_recent WHERE userID = '".$_SESSION['participantSession']."' ORDER BY id DESC ");
//$result=mysql_query($sql);
//$row=mysql_fetch_array($result);

  //if username exists
if(mysqli_num_rows($sql) == 0)
{
  //echo "asdf";


echo '<div class="row">
    <div class="col-md-12">
<div class="empty-projects">No Recent Meetings</div>
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




date_default_timezone_set('America/New_York');


$date2 = date_create($row2['Date_of_Meeting']);

$random = rand(5, 20000);




$date = date('Y-m-d h:m A');







$dtA = new DateTime($date);
$dtB = new DateTime($row2['Date_of_Meeting'].' '.$row2['Final_Time']);



if ( $dtA > $dtB ) {



  ?>




<!-- Delete a Project -->

<div id="slide-delete-two<?php echo $row2['ProjectID']; ?>_<?php echo $random; ?>" class="well slide-delete">
  <div class="result-delete">
  <div id="result-delete-<?php echo $row2['ProjectID']; ?>">Thanks for confirming!</div>
  </div>
<h4>Please confirm that you both met!</h4>
<input type="hidden" name="projectid<?php echo $row2['ProjectID']; ?>" id="projectid" value="<?php echo $row2['ProjectID']; ?>"/>
<input type="hidden" name="userid<?php echo $row2['userID']; ?>" id="userid" value="<?php echo $row2['userID']; ?>"/>
<input type="hidden" name="startupid<?php echo $row2['startupID']; ?>" id="startupid" value="<?php echo $row2['startupID']; ?>"/>

<div class="popupoverlay-btn">
  <div class="cancel-delete">
    <button class="slide-delete-two<?php echo $row2['ProjectID']; ?>_<?php echo $random; ?>_close cancel">Cancel</button>
    <button class="yes<?php echo $row2['ProjectID']; ?> btn-delete">Yes</button>
    <button class="no<?php echo $row2['ProjectID']; ?> btn-no-show-up">No, didn't show up</button>
</div>

<div class="popupoverlay-btn">
  <div class="close-delete">
    <button class="slide-delete-two<?php echo $row2['ProjectID']; ?>_<?php echo $random; ?>_close cancel">Close</button>
</div>
</div>

</div>
</div>

<!-- End Delete a Project -->
  





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



    $(".yes"+<?php echo $row2['ProjectID']; ?>).click(function() {  
      //alert("yes"+<?php echo $row2['ProjectID']; ?>); 

     
      $(".result-delete").show();
      $(".cancel-delete").hide();
      $(".close-delete").show();


      $("#result-delete-"+<?php echo $row2['ProjectID']; ?>).hide().slideDown();
      

 //get input field values
        
        var projectid = $('input[name=projectid'+<?php echo $row2['ProjectID']; ?>+']').val();
        var userid = $('input[name=userid'+<?php echo $row2['userID']; ?>+']').val();
        var startupid = $('input[name=startupid'+<?php echo $row2['startupID']; ?>+']').val();
       
       
        
        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        var proceed = true;

        
      
      
         

        //everything looks good! proceed...
        if(proceed) 
        {



          $( ".processing" ).show();
            //data to be sent to server
            post_data = {'projectid':projectid,'userid':userid,'startupid':startupid};
            
            //Ajax post data to server
            $.post('confirmmeeting.php', post_data, function(response){  
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
        
        $(".cancel-delete").hide();
        $(".result-delete").show();
        $(".close-delete").show();
        $("#result-delete-"+response.text).hide().slideDown();
            }, 'json');
      
        }


});



        $(".no"+<?php echo $row2['ProjectID']; ?>).click(function() {  
      //alert("no"+<?php echo $row2['ProjectID']; ?>); 

     
      $(".result-delete").show();
      $(".cancel-delete").hide();
      $(".close-delete").show();


      $("#result-delete-"+<?php echo $row2['ProjectID']; ?>).hide().slideDown();
      

 //get input field values
        
        var projectid = $('input[name=projectid'+<?php echo $row2['ProjectID']; ?>+']').val();
        var startupid = $('input[name=startupid'+<?php echo $row2['startupID']; ?>+']').val();
        var userid = $('input[name=userid'+<?php echo $row2['userID']; ?>+']').val();
       
       
        
        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        var proceed = true;

        
      
      
         

        //everything looks good! proceed...
        if(proceed) 
        {



          $( ".processing" ).show();
            //data to be sent to server
            post_data = {'projectid':projectid,'startupid':startupid,'userid':userid};
            
            //Ajax post data to server
            $.post('noshowup.php', post_data, function(response){  
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
        
        $(".cancel-delete").hide();
        $(".result-delete").show();
        $(".close-delete").show();
        $("#result-delete-"+response.text).hide().slideDown();
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

</a>

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
                     You met with
                    </div>
                    <div class="edit-delete">

<?php 



if($row2['Met'] == 'Yes' && $row2['Met'] != 'No show up' && $startup_home->is_logged_in()){ ?>



                

  <?php } ?>



                      
             

          <?php if($row2['Met'] == '' && $row2['Met'] != 'No show up'){ ?>         
                 <i class="icon-trash"></i>Did the meeting happen? Click  <a href="#" role="button" class="slide-delete-two<?php echo $row2['ProjectID']; ?>_<?php echo $random; ?>_open"><strong>here</strong></a> to confirm  

                 <?php } ?>


                    </div>  
                   
                  </div>
                  <div class="survey-name" ng-bind="(survey.name)">
<a href="<?php echo BASE_PATH; ?>/profile/startup/?id=<?php echo $row2['startupID']; ?>">
<?php echo $row3['FirstName']; ?> <?php echo $row3['LastName']; ?></a></div>
                  <div class="survey-metadata">
                    <div class="item ">
                      <div class="label">Date of meeting:</div>
                      <div class="value" ng-bind="(survey.date | date:'MM/dd/yyyy')">
                      
                       <?php echo date('F j, Y',strtotime($row2['Date_of_Meeting']));?>

                      </div>
                    </div>
                     <div class="item">
                      <div class="label">Time:</div>
                      <div class="value" ng-bind="(survey.date | date:'MM/dd/yyyy')"><?php echo $row2['Final_Time']; ?> </div>
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
<?php if($row2['Met'] == 'Yes' && $row2['Met'] != 'No show up' && $row2['Payment'] == '' && $rowparticipant['Payment_Method'] == 'Bank'){ ?>
Waiting to receive payment
<?php } ?> 

<?php if($row2['Met'] == 'Yes' && $row2['Met'] != 'No show up' && $row2['Payment'] == 'Yes' && $rowparticipant['Payment_Method'] == 'Bank'){ ?>
Payment received.
<?php } ?> 


<?php if($row2['Met'] == 'Yes' && $row2['Met'] != 'No show up' && $row2['Payment'] == '' && $rowparticipant['Payment_Method'] == 'Cash'){ ?>
You met with <?php echo $row3['FirstName']; ?>.
<?php } ?> 


   <?php if($row2['Met'] == '' && $row2['Met'] != 'No show up'){ ?>         
                 <i class="icon-trash"></i>Click  <a href="#" role="button" class="slide-delete-two<?php echo $row2['ProjectID']; ?>_<?php echo $random; ?>_open"><strong>here</strong></a> to confirm you met  

                 <?php } ?>    




              <?php if($row2['Met'] == 'No show up'){ ?>         
                 
                 <i class="icon-trash"></i>No show up. Meeting didn't happen

                 <?php } ?>                    


                  </div>


                    <?php 
$sqlnda = mysqli_query($connecDB,"SELECT * FROM tbl_nda_pending  WHERE userID = '".$_SESSION['participantSession']."' AND ProjectID = '".$row2['ProjectID']."'  ");
$rownda = mysqli_fetch_array($sqlnda);

if(mysqli_num_rows($sqlnda) == 1) {
                   
                   ?>
                   <div class="col-md-12" style="padding-left:0px;">
                

                  <br>Note: <?php echo $row3['FirstName']; ?> requires you to sign an NDA before you both meet. Click <a href="<?php echo BASE_PATH; ?>/participant/idea/nda/sign/?id=<?php echo $row2['ProjectID']; ?>"><strong>here</strong></a> to sign.
                     
</div>

                  

                   <? } ?>  
                   


                   <?php 
$sqlnda = mysqli_query($connecDB,"SELECT * FROM tbl_nda_signed  WHERE userID = '".$_SESSION['participantSession']."' AND ProjectID = '".$row2['ProjectID']."'  ");
$rownda = mysqli_fetch_array($sqlnda);

if(mysqli_num_rows($sqlnda) == 1) {
                   
                   ?>
                   <div class="col-md-12" style="padding-left:0px;">
                

                  <br>Note: You signed an NDA for this idea. Click <a href="<?php echo BASE_PATH; ?>/participant/idea/nda/view/?id=<?php echo $row2['ProjectID']; ?>"><strong>here</strong></a> to view.
                     
</div>

                  

                   <? } ?>   







                  <div class="survey-actions">
                  
                      
                  <div class="action" tabindex="0" aria-hidden="false">
                        
                        <a href="<?php echo BASE_PATH; ?>/ideas/p/<?php echo $row4['Category']; ?>/?id=<?php echo $row2['ProjectID']; ?>"> View Details</a>


                      </div>

                        <div class="action" tabindex="0" aria-hidden="false">|</div>

                      <div class="action" ng-click="triggerPreview(survey)" ng-show="survey.surveyLength > 0" role="button" tabindex="0" aria-hidden="false">
                        
                       <a href="<?php echo BASE_PATH; ?>/profile/startup/?id=<?php echo $row2['startupID']; ?>"> View Profile </a>

                      </div>
                    

                    </div>

<div class="col-md-12" style="padding-left:0px;">
                    <?php if($row2['Met'] == 'Yes' && $row2['Met'] != 'No show up' && $row2['Payment'] == '' && $rowparticipant['Payment_Method'] == 'Cash'){ ?>
<br>Note.: If you haven't received your payment in cash from <?php echo $row3['FirstName']; ?>, please get in touch with us.
<?php } ?> 

                  </div>
             </div>   


  
    
   </div>
</div>


<?php 

}else{


  echo '<div class="row">
    <div class="col-md-12">
<div class="empty-projects">No Recent Meetings</div>
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


}


}



}

?>







      
          



