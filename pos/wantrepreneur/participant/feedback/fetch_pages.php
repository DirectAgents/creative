<?php 

session_start();
include("../../config.php"); //include config file
require_once '../../class.startup.php';

?>

<!DOCTYPE html>
<html lang="en" id="features" class="tablet mobile">
    
    <head>

 <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/startup/project/css/jquery-ui.css">




  <script>



  $(function() {
    $( "#tabs" ).tabs({
      beforeLoad: function( event, ui ) {
        ui.jqXHR.fail(function() {
          ui.panel.html(
            "Couldn't load this tab. We'll try to fix this as soon as possible. ");
        });
      }
    });
  });





  </script>



 


<script type='text/javascript'>//<![CDATA[
//$.noConflict();
jQuery( document ).ready(function( $ ) {

$( "#open-feedback" ).load( "open-feedback.php" );

   
     $(".open-feedback").click(function() {  
     
      //$( "#upcoming-meetings" ).load( "send-payment.php" );
      $( "#open-feedback" ).load( "open-feedback.php" );
      
      
    });


    $(".feedback-request").click(function() {  
     
      //$( "#upcoming-meetings" ).load( "send-payment.php" );
      $( "#feedback-request" ).load( "feedback-request.php" );
      
      
    });

    $(".past-feedback").click(function() {  

      $( "#past-feedback" ).load( "past-feedback.php" );
      

    });


     


});//]]> 



</script>





  




 </head>
    
    <body>







<div id="tabs">

 <ul>
    <li><a href="#open-feedback" class="open-feedback">Open Feedback</a>
   <?php

$result_count = mysqli_query($connecDB,"SELECT Viewed_by_Participant,userID,id,Meeting_Status, COUNT(DISTINCT id) AS count FROM tbl_feedback_request WHERE Viewed_by_Participant = 'No' AND userID = '".$_SESSION['participantSession']."' GROUP BY id");
$row_count = mysqli_fetch_assoc($result_count);
$count = $row_count['count'];

if($count > 0 ){
echo ' <div class="viewed-bubble">';
echo $count;
echo '</div>';
}
?>
    
    </li>
    <li>&nbsp;</li>
    <li><a href="#feedback-request" class="feedback-request">Feedback Request</a>
 <?php

$result_count = mysqli_query($connecDB,"SELECT Viewed_by_Participant,userID,id,Meeting_Status, COUNT(DISTINCT id) AS count FROM tbl_feedback_upcoming WHERE Viewed_by_Participant = 'No' AND userID = '".$_SESSION['participantSession']."' GROUP BY id");
$row_count = mysqli_fetch_assoc($result_count);
$count = $row_count['count'];

if($count > 0 ){
echo ' <div class="viewed-bubble">';
echo $count;
echo '</div>';
}
?>


    </li>
    <li>&nbsp;</li>
    <li><a href="#past-feedback" class="past-feedback">Past Feedback</a>

 <?php

$result_count = mysqli_query($connecDB,"SELECT Viewed_by_Participant,userID,id,Meeting_Status, COUNT(DISTINCT id) AS count FROM tbl_feedback_recent WHERE Viewed_by_Participant = 'No' AND userID = '".$_SESSION['participantSession']."' GROUP BY id");
$row_count = mysqli_fetch_assoc($result_count);
$count = $row_count['count'];

if($count > 0 ){
echo ' <div class="viewed-bubble">';
echo $count;
echo '</div>';
}
?>


    </li>


 <?php
/*
$result_count = mysqli_query($connecDB,"SELECT Viewed_by_Participant,userID,id,Meeting_Status, COUNT(DISTINCT id) AS count FROM tbl_meeting_archived WHERE Viewed_by_Participant = 'No' AND userID = '".$_SESSION['participantSession']."' GROUP BY id");
$row_count = mysqli_fetch_assoc($result_count);
$count = $row_count['count'];

if($count > 0 ){
echo ' <div class="viewed-bubble">';
echo $count;
echo '</div>';
}*/
?>



    </li>
  </ul>  





<div id="white-container">



<div id="open-feedback" class="tabContent" > </div>


<div id="feedback-request" class="tabContent" > </div>


<div id="past-feedback" class="tabContent" ></div>





  










</div>

</div>








<a href="#" style="display:none" id="requestbutton" class="initialism slide_open btn btn-success"></a>







<script>
$(document).ready(function () {

    $('#slide').popup({
        focusdelay: 400,
        outline: true,
        vertical: 'top'
    });

});
</script>
