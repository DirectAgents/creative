<?php

session_start();


require_once '../../base_path.php';

include("../../config.php"); //include config file
require_once '../../class.researcher.php';
require_once '../../class.participant.php';



$researcher_home = new RESEARCHER();

if($researcher_home->is_logged_in())
{
  $researcher_home->logout();
}



$participant_home = new PARTICIPANT();

if(!$participant_home->is_logged_in())
{
  $participant_home->redirect('../login.php');
}






?>








<?php
//include db configuration file


//echo $_SESSION['researcherSession']

//MySQL query
//$Result = mysql_query("SELECT * FROM tbl_researcher_project WHERE researcherID = '".$_SESSION['researcherSession']."' ORDER BY id DESC ");

$sql=mysqli_query($connecDB,"SELECT * FROM tbl_project_request WHERE userID = '".$_SESSION['participantSession']."' AND Accepted_to_Participate = 'Pending' AND Status != 'Canceled_by_Participant'  ORDER BY id DESC ");
//$result=mysqli_query($sql);
//$row=mysql_fetch_array($result);

  //if username exists
if(mysqli_num_rows($sql)>0)
{
  //echo "asdf";


//get all records from add_delete_record table
while($row2 = mysqli_fetch_array($sql))
{ 



$sql4 = mysql_query("SELECT * FROM tbl_researcher_project  WHERE ProjectID = '".$row2['ProjectID']."' ");
$row4 = mysql_fetch_array($sql4);


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
<h4>Are you sure you want to accept the meeting request?</h4>
<input type="hidden" name="projectid<?php echo $row2['ProjectID']; ?>" id="projectid" value="<?php echo $row2['ProjectID']; ?>"/>
<input type="hidden" name="userid<?php echo $row2['userID']; ?>" id="userid" value="<?php echo $row2['userID']; ?>"/>

Select a time to meet:

<?php 

//echo $row2['To_Time'];



$sqlfrom="SELECT * FROM time WHERE TheTime LIKE '%".$row2['From_Time']."%'";
$resultfrom=mysql_query($sqlfrom);
$rowfrom = mysql_fetch_array($resultfrom);

$sqlto="SELECT * FROM time WHERE TheTime LIKE '%".$row2['To_Time']."%'";
$resultto=mysql_query($sqlto);
$rowto = mysql_fetch_array($resultto);


//echo $rowfrom['id'];
//echo "<br>";
//echo $rowto['id'];


?>

<select id="final_time" name="final_time">
<?php



$sqltime="SELECT * FROM time where id BETWEEN '".$rowfrom['id']."' and '".$rowto['id']."' group by id";
$resulttime=mysql_query($sqltime);

while($rowtime = mysql_fetch_array($resulttime))
{ ?>

<option value="<?php echo $rowtime['TheTime']; ?>"><?php echo $rowtime['TheTime']; ?></option>


<?php } ?>

</select>

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




    $(".accept"+<?php echo $row2['ProjectID']; ?>).click(function() {  
      //alert("delete"+<?php echo $row2['ProjectID']; ?>); 

     
     
      $(".result-accept").show();
      $(".cancel-accept").hide();
      $(".close-accept").show();


      $("#result-accept-"+<?php echo $row2['ProjectID']; ?>).hide().slideDown();


      //$("#result-accept-"+<?php echo $row2['ProjectID']; ?>).hide().slideDown();
      

 //get input field values
        
        var projectid = $('input[name=projectid'+<?php echo $row2['ProjectID']; ?>).val();
        var userid = $('input[name=userid'+<?php echo $row2['userID']; ?>).val();
        var final_time = $("select[name='final_time']").val();
       

        
        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        var proceed = true;

        //everything looks good! proceed...
        if(proceed) 
        {



          $( ".processing" ).show();
            //data to be sent to server
            post_data = {'projectid':projectid,'userid':userid,'final_time':final_time};
            
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

$ProjectImage = mysql_query("SELECT * FROM tbl_researcher WHERE userID='".$row2['researcherID']."'");
$rowprojectimage = mysql_fetch_array($ProjectImage);

if($rowprojectimage['google_picture_link'] != '') {

echo '<img src="'.$rowprojectimage['google_picture_link'].'" width="100">';


 }else{ 


if($rowprojectimage['profile_image'] != '') { ?>

<img src="<?php echo BASE_PATH; ?>/images/profile/<?php echo $rowprojectimage['profile_image']; ?>" width="100">

<?php }else{ ?>

<img src="<?php echo BASE_PATH; ?>/images/profile/thumbnail.jpg" width="100">

<?php } } ?>


</div>




<?php

$sql3="SELECT * FROM tbl_researcher WHERE userID = '".$row2['researcherID']."'";
$result3=mysql_query($sql3);

$row3 = mysql_fetch_array($result3);

?>





    <div class="col-md-10">


                  <div class="survey-header">
                    <div class="account-project-name">
                      Person Name
                    </div>
                    <div class="edit-delete">
                      
            
      <?php if($row2['Status'] == 'Waiting for Participant to accept') { ?>
      
                <div class="accept-decline-<?php echo $row2['ProjectID']; ?>">        
                 <i class="icon-trash"></i><a href="#" role="button" class="slide-accept-two<?php echo $row2['ProjectID']; ?>_<?php echo $random; ?>_open"><strong>Accept</strong></a> | <a href="#" role="button" class="slide-decline-two<?php echo $row2['ProjectID']; ?>_<?php echo $random; ?>_open"><strong>Decline</strong></a>
                 </div>

         <?php } ?>           

<?php if($row2['Status'] == 'Waiting for Researcher to accept') { ?>

                 <div class="cancel-request-<?php echo $row2['ProjectID']; ?>">        
                 <i class="icon-trash"></i><a href="#" role="button" class="slide-cancel-two<?php echo $row2['ProjectID']; ?>_<?php echo $random; ?>_open"><strong>Cancel Meeting</strong></a></a>
                 </div>

           <?php } ?>      

               


                    </div>  
                   
                  </div>
                  <div class="survey-name" ng-bind="(survey.name)"><?php echo $row3['FirstName']; ?> <?php echo $row3['LastName']; ?></div>
                  <div class="survey-metadata">
                    <div class="item">
                      <div class="label">Date of meeting:</div>
                      <div class="value" ng-bind="(survey.date | date:'MM/dd/yyyy')"><?php echo date_format($date2, 'm/d/Y'); ?></div>
                    </div>

                    <div class="item">
                      <div class="label">Time:</div>
                      <div class="value" ng-bind="(survey.date | date:'MM/dd/yyyy')">Between <?php echo $row2['From_Time']; ?> & 
                      <?php echo $row2['To_Time']; ?></div>
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
                  <?php if($row2['Status'] == 'Waiting for Researcher to Accept or Decline'){echo 'Waiting for Researcher to accept';} ?>
                  <?php if($row2['Status'] == 'Waiting for Participant to Accept or Decline'){echo 'Waiting for you to accept or decline';} ?>
                    


                  </div>

                  <div class="survey-actions">
                   
                  <div class="action" tabindex="0" aria-hidden="false">
                        
                        <a href="<?php echo BASE_PATH; ?>/projects/<?php echo $row4['Category']; ?>/?id=<?php echo $row2['ProjectID']; ?>"> View Project</a>


                      </div>

                        <div class="action" tabindex="0" aria-hidden="false">|</div>

                      <div class="action" ng-click="triggerPreview(survey)" ng-show="survey.surveyLength > 0" role="button" tabindex="0" aria-hidden="false">
                        
                       <a href="<?php echo BASE_PATH; ?>/profile/researcher/?id=<?php echo $row2['researcherID']; ?>"> View Profile </a>

                      </div>
                    

                    </div>
                  </div>
               


  
    
   </div>
</div>


<?php 





}

}else{ 


echo '<div class="row">
    <div class="col-md-12">
<div class="empty-projects">No Meeting Requests<br><br></div>
  <div class="create-one-here-box">
      <div class="create-one">
        <button class="slide_open create-one-btn">Browse here for new Participants</button>
       </div> 
  </div>
</div>

</div>
</div>';





  ?>




<?php }

?>







      
          




