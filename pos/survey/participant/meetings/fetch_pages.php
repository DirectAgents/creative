<?php 

session_start();
include("../../config.php"); //include config file
require_once '../../class.startup.php';

?>

<!DOCTYPE html>
<html lang="en" id="features" class="tablet mobile">
    
    <head>

 <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/startup/project/css/jquery-ui.css">








<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>

<script type="text/javascript">


$(".launch-map").click(function() {  
//alert("aads"); 



$.post('map.php', $("#contact-form").serialize(), function(data) {
    //$("#contact-form").hide();
    $('#result-map').html(data);
   });


    });


</script>






<script type='text/javascript'>//<![CDATA[
$(function(){

$(".map-canvas-monday").show();
$(".map-canvas-tuesday").hide();

$(".upcoming-meetings").click(function(){
$(".map-canvas-tuesday").hide();
$(".map-canvas-monday").show();
}); 

$(".recent-meetings").click(function(){
$(".map-canvas-monday").hide();
$(".map-canvas-tuesday").show();
}); 



$(".launch-map121212").click(function(){
//alert("asdf");



    var me = $(this),
        data = me.data('key');
   
var geocoder = new google.maps.Geocoder();



var user_id = data.param1;






var monday = data.param2;
var monday_time = data.param3;
var monday_status = data.param4;

var tuesday_address = data.param5;
var tuesday = data.param6;
var tuesday_time = data.param7;
var tuesday_status = data.param8;

var wednesday_address = data.param9;
var wednesday = data.param10;
var wednesday_time = data.param11;
var wednesday_status = data.param12;

var thursday_address = data.param13;
var thursday = data.param14;
var thursday_time = data.param15;
var thursday_status = data.param16;

var friday_address = data.param13;
var friday = data.param14;
var friday_time = data.param15;
var friday_status = data.param16;

var saturday_address = data.param17;
var saturday = data.param18;
var saturday_time = data.param19;
var saturday_status = data.param20;

var sunday_address = data.param21;
var sunday = data.param22;
var sunday_time = data.param23;
var sunday_status = data.param24;



if(status == ''){$('.modal-status').text('Pending');}else{$('.modal-status').text(status);}


$('#userid').html(user_id);

var payload = document.getElementById("userid").innerHTML;
document.getElementById("divContents").value = payload;


$('.monday-day').text(monday);
$('.monday-time').text(monday_time);
$('.monday-status').text(monday_status);
$('.tuesday-day').text(monday);
$('.tuesday-time').text(monday_time);
$('.wednesday-day').text(wednesday);
$('.wednesday-time').text(wednesday_time);
$('.thursday-day').text(thursday);
$('.thursday-time').text(thursday_time);
$('.friday-day').text(friday);
$('.friday-time').text(friday_time);
$('.friday-day').text(friday);
$('.friday-time').text(friday_time);


geocoder.geocode( { 'address': monday_address}, function(results, status) {

  if (status == google.maps.GeocoderStatus.OK) {
    var latitude = results[0].geometry.location.lat();
    var longitude = results[0].geometry.location.lng();
    
  } 



var center = new google.maps.LatLng(latitude, longitude);


function initialize() {

    var mapOptions = {
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        center: center
    };


    map = new google.maps.Map(document.getElementById('map-canvwwas'), mapOptions);


    var marker = new google.maps.Marker({
        map: map,
        position: center
    });


}

$('#modal').modal({
        backdrop: 'static',
        keyboard: false
    }).on('shown.bs.modal', function () {
        google.maps.event.trigger(map, 'resize');
        map.setCenter(center);
    });


initialize();
});//]]> 

}); 
});

</script>



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

$( "#meeting-requests" ).load( "meeting-requests.php" );

   
     $(".meeting-requests").click(function() {  
     
      //$( "#upcoming-meetings" ).load( "send-payment.php" );
      $( "#meeting-requests" ).load( "meeting-requests.php" );
      
      
    });


    $(".upcoming-meetings").click(function() {  
     
      //$( "#upcoming-meetings" ).load( "send-payment.php" );
      $( "#upcoming-meetings" ).load( "upcoming-meetings.php" );
      
      
    });

    $(".recent-meetings").click(function() {  

      $( "#recent-meetings" ).load( "recent-meetings.php" );
      

    });


     $(".archived-meetings").click(function() {  

      $( "#archived-meetings" ).load( "archived-meetings.php" );
      

    });


});//]]> 



</script>





  




 </head>
    
    <body>







<div id="tabs">

 <ul>
    <li><a href="#meeting-requests" class="meeting-requests">Meeting Requests</a>
   <?php

$result_count = mysqli_query($connecDB,"SELECT Viewed_by_Participant,userID,id,Meeting_Status, COUNT(DISTINCT id) AS count FROM tbl_meeting_request WHERE Viewed_by_Participant = 'No' AND userID = '".$_SESSION['participantSession']."' GROUP BY id");
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
    <li><a href="#upcoming-meetings" class="upcoming-meetings">Upcoming Meetings</a>
 <?php

$result_count = mysqli_query($connecDB,"SELECT Viewed_by_Participant,userID,id,Meeting_Status, COUNT(DISTINCT id) AS count FROM tbl_meeting_upcoming WHERE Viewed_by_Participant = 'No' AND userID = '".$_SESSION['participantSession']."' GROUP BY id");
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
    <li><a href="#recent-meetings" class="recent-meetings">Recent Meetings</a>

 <?php

$result_count = mysqli_query($connecDB,"SELECT Viewed_by_Participant,userID,id,Meeting_Status, COUNT(DISTINCT id) AS count FROM tbl_meeting_recent WHERE Viewed_by_Participant = 'No' AND userID = '".$_SESSION['participantSession']."' GROUP BY id");
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
    <li><a href="#archived-meetings" class="archived-meetings">Archived Meetings</a>


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



<div id="meeting-requests" class="tabContent" > </div>


<div id="upcoming-meetings" class="tabContent" > </div>


<div id="recent-meetings" class="tabContent" ></div>

<div id="archived-meetings" class="tabContent" ></div>




  










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
