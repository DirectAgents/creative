<?php 

session_start();
include("../../../config.php"); //include config file
require_once '../../../class.startup.php';
include("../../../config.inc.php");


$get_total_rows = 0;
$results = $mysqli->query("SELECT COUNT(*) FROM tbl_startup_project");
if($results){
$get_total_rows = $results->fetch_row(); 
}


//break total records into pages
$total_pages = ceil($get_total_rows[0]/$item_per_page); 

?>

<html class="no-js">
    
    <head>

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

$(".tabs-1").click(function(){
$(".map-canvas-tuesday").hide();
$(".map-canvas-monday").show();
}); 

$(".tabs-2").click(function(){
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



 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script>
  $(function() {
    $( "#tabs" ).tabs({
      beforeLoad: function( event, ui ) {
        ui.jqXHR.fail(function() {
          ui.panel.html(
            "Couldn't load this tab. We'll try to fix this as soon as possible. " +
            "If this wouldn't be a demo." );
        });
      }
    });
  });
  </script>


<link rel="stylesheet" href="<?php echo BASE_PATH; ?>/startup/project/js/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<!--JAVASCRIPT-->




 <!-- jQuery Popup Overlay -->
<script src="<?php echo BASE_PATH; ?>/startup/project/js/jquery.popupoverlay.js"></script>







<!--Browse Participants-->

<script type="text/javascript">
$(document).ready(function() {

  
 var track_click =0; //track user click on "load more" button, righ now it is 0 click
  
 var total_pages = <?php echo $total_pages; ?>;


  $(".load_more").click(function (e) { //user clicks on button
alert("1111adfs");
    $(this).hide(); //hide load more button on click
    $('.animation_image').show(); //show loading image

    if(track_click <= total_pages) //make sure user clicks are still less than total pages
    {
      //post page number and load returned data into result element
      $.post('load_more_accepted.php?id='+<?php echo $_GET['id']; ?>,{'page': track_click}, function(data) {
      
        $(".load_more").show(); //bring back load more button
        
        $("#resultstest").append(data); //append data received from server

        

        //scroll page to button element
        $("html, body").animate({scrollTop: $("#load_more_button").offset().top}, 500);
        
        //hide loading image

        $('.animation_image').hide(); //hide loading image once data is received
  
        track_click++; //user click increment on load button
      
      }).fail(function(xhr, ajaxOptions, thrownError) { 
        alert(thrownError); //alert any HTTP error
        $(".load_more").show(); //bring back load more button
        $('.animation_image').hide(); //hide loading image once data is received
      });
      
      
      if(track_click >= total_pages-1)
      {

        //reached end of the page yet? disable load button
        $(".load_more").attr("disabled", "disabled");
      }
     }
      
    });






});
</script>








 </head>
    
    <body>


<div id="tabs">

 <ul>
    <li><a href="#tabs-1">Accepted</a></li>
    <li><div class="line">|</div></li>
    <li><a href="#tabs-2" class="pending">11Pending</a></li>
  </ul>  

 <div id="tabs-1">


<?php

//sanitize post value
$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);

//throw HTTP error if page number is not valid
if(!is_numeric($page_number)){
	header('HTTP/1.1 500 Invalid page number!');
	exit();
}

//get current starting point of records
$position = ($page_number * $item_per_page);



$sql = mysql_query("SELECT * FROM tbl_startup_project WHERE ProjectID = '".$_GET['id']."' AND startupID='".$_SESSION['startupSession']."'");
$row = mysql_fetch_array($sql);





$Meetupchoice = str_replace(",","|",$row['Meetupchoice']);
$Age = str_replace(",","|",$row['Age']);
$Gender = str_replace(",","|",$row['Gender']);
$Height = $row['MinHeight'];
$Location = str_replace(",","|",$row['Location']);
$Status = str_replace(",","|",$row['Status']); 
$Ethnicity = str_replace(",","|",$row['Ethnicity']);
$Smoke = str_replace(",","|",$row['Smoke']);
$Drink = str_replace(",","|",$row['Drink']);
$Diet = str_replace(",","|",$row['Diet']);
$Religion = str_replace(",","|",$row['Religion']);
$Education = str_replace(",","|",$row['Education']);
$Job = str_replace(",","|",$row['Job']);


//if($Meetupchoice != 'NULL'){$themeetupchoice = "AND Meetupchoice RLIKE '[[:<:]]".$Meetupchoice."[[:>:]]'";}else{$themeetupchoice = '';}
if($Age != 'NULL'){$theage = "AND Age RLIKE '[[:<:]]".$Age."[[:>:]]'";}else{$theage = '';}
if($Gender != 'NULL'){$thegender = "AND Gender RLIKE '[[:<:]]".$Gender."[[:>:]]'";}else{$thegender = '';}
if($Height != 'NULL'){$theheight = "AND Height RLIKE '[[:<:]]".$Height."[[:>:]]'";}else{$theheight = '';}
if($Location != 'NULL'){$thelocation = "AND Location RLIKE '[[:<:]]".$Location."[[:>:]]'";}else{$thelocation = '';}
if($Status != 'NULL'){$thestatus = "AND Status RLIKE '[[:<:]]".$Status."[[:>:]]'";}else{$thestatus = '';}
if($Ethnicity != 'NULL'){$theethnicity = "AND Ethnicity RLIKE '[[:<:]]".$Ethnicity."[[:>:]]'";}else{$theethnicity = '';}
if($Smoke != 'NULL'){$thesmoke = "AND Smoke RLIKE '[[:<:]]".$Smoke."[[:>:]]'";}else{$thesmoke = '';}
if($Drink != 'NULL'){$thedrink = "AND Drink RLIKE '[[:<:]]".$Drink."[[:>:]]'";}else{$thedrink = '';}
if($Diet != 'NULL'){$thediet = "AND Diet RLIKE '[[:<:]]".$Diet."[[:>:]]'";}else{$thediet = '';}
if($Religion != 'NULL'){$thereligion = "AND Religion RLIKE '[[:<:]]".$Religion."[[:>:]]'";}else{$thereligion = '';}
if($Education != 'NULL'){$theeducation = "AND Education RLIKE '[[:<:]]".$Education."[[:>:]]'";}else{$theeducation = '';}
if($Job != 'NULL'){$thejob = "AND Job RLIKE '[[:<:]]".$Job."[[:>:]]'";}else{$thejob = '';}



$results = mysql_query("SELECT userID,FirstName, LastName,Meetupchoice, Age, Gender, Height, City, State, Status, Ethnicity, Smoke, Drink, Diet, Religion, Education, Job, Bio 
  FROM tbl_participant WHERE userID IN (SELECT userID FROM tbl_participant_request WHERE ProjectID = '".$_GET['id']."'
  AND Accepted_to_Participate = 'Accepted') AND Meetupchoice RLIKE '[[:<:]]".$Meetupchoice."[[:>:]]' $theage $thegender $theheight $thelocation 
  $thestatus $theethnicity $thesmoke $thedrink $thediet $thereligion $theeducation $thejob 
  ORDER BY userID DESC LIMIT $position, $item_per_page");


//Limit our results within a specified range. 


//$results = mysql_query("SELECT id,userID, Gender FROM tbl_participant_project 
//WHERE Gender RLIKE '".$Gender."' OR Age RLIKE '".$Age."' ORDER BY id DESC LIMIT $position, $item_per_page");

if(mysql_num_rows($results)<1)
{
echo "<div class='no-participants'>";
echo "No Participants available!";
echo "</div>";

echo '
<script type="text/javascript">
$(".load_more").hide();
</script>
';

}else{




//output results from database
echo '<ul class="page_result">';
//while($results->fetch()){ //fetch values
while($row2 = mysql_fetch_array($results))
{ 

  echo $row2['userID'];




$sql3 = mysql_query("SELECT * FROM participant_profile_images WHERE userID = '".$row2['userID']."' ");
$row3 = mysql_fetch_array($sql3);




echo '


 



<div class="row-fluid">
<div class="therow">
  <div class="col-lg-2">';
echo '<a href="profile/?id='.$row2['userID'].'">';
  if($row3['thumbnail_image'] != ''){
  
  echo '<img src="'.BASE_PATH.'/participant/account/uploads/'.$row3['thumbnail_image'].'" class="img-circle"/>';

}else{

 echo '<img src="'.BASE_PATH.'/participant/account/uploads/thumbnail.jpg" class="img-circle"/>';
}

echo '</a>';

  echo '</div>
  <div class="col-lg-6">
  <a href="profile/?id='.$row2['userID'].'&p='.$_GET['id'].'" class="notextdecoration">
   <p><h4>'.$row2['FirstName'].'</h4>'.$row2['Age'].' - '.$row2['City'].', '.$row2['State'].' </p>
   </a>
   <p>'.$row2['Bio'].'</p>
   </div>
   <!--<div class="span4"><a href="profile/?id='.$row2['userID'].'&p='.$_GET['id'].'" class="btn-request">View Profile</a> </div>-->';
 
  ?>

<div class="col-lg-4"><a href="profile/?id=<?php echo $row2['userID']; ?>&p=<?php echo $_GET['id']; ?>" class="btn-request"> View Profile</a> </div>


  <form action="" id="contact-form" class="form-horizontal" method="post">

        
           
              <input type="hidden" name="userid" id="userid" value="<?php echo $row2['userID']; ?>">
              <input type="hidden" name="projectid" id="projectid" value="<?php echo $_GET['id']; ?>">
          

          </form>





</div>
</div>



<?php 




}

}

?>

<input type="hidden" name="firstname" id="firstname" value="'.$row2['FirstName'].'"/>
<input type="hidden" name="userid'.$row2['userID'].'" id="userid" value="'.$row2['userID'].'"/>
<input type="hidden" name="projectid" id="projectid" value="'.$_GET['id'].'"/>


<div id="resultstest"></div>


<div align="center">
<button class="load_more" id="load_more_button">load More</button>
<div class="animation_image" style="display:none;"><img src="ajax-loader.gif"> Loading...</div>
</div>



  </div>



  <div id="tabs-2">

<?php

//sanitize post value
$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);

//throw HTTP error if page number is not valid
if(!is_numeric($page_number)){
  header('HTTP/1.1 500 Invalid page number!');
  exit();
}

//get current starting point of records
$position = ($page_number * $item_per_page);



$sql = mysql_query("SELECT * FROM tbl_startup_project WHERE ProjectID = '".$_GET['id']."' AND startupID='".$_SESSION['startupSession']."'");
$row = mysql_fetch_array($sql);





$Meetupchoice = str_replace(",","|",$row['Meetupchoice']);
$Age = str_replace(",","|",$row['Age']);
$Gender = str_replace(",","|",$row['Gender']);
$Height = $row['MinHeight'];
$Location = str_replace(",","|",$row['Location']);
$Status = str_replace(",","|",$row['Status']); 
$Ethnicity = str_replace(",","|",$row['Ethnicity']);
$Smoke = str_replace(",","|",$row['Smoke']);
$Drink = str_replace(",","|",$row['Drink']);
$Diet = str_replace(",","|",$row['Diet']);
$Religion = str_replace(",","|",$row['Religion']);
$Education = str_replace(",","|",$row['Education']);
$Job = str_replace(",","|",$row['Job']);


//if($Meetupchoice != 'NULL'){$themeetupchoice = "AND Meetupchoice RLIKE '[[:<:]]".$Meetupchoice."[[:>:]]'";}else{$themeetupchoice = '';}
if($Age != 'NULL'){$theage = "AND Age RLIKE '[[:<:]]".$Age."[[:>:]]'";}else{$theage = '';}
if($Gender != 'NULL'){$thegender = "AND Gender RLIKE '[[:<:]]".$Gender."[[:>:]]'";}else{$thegender = '';}
if($Height != 'NULL'){$theheight = "AND Height RLIKE '[[:<:]]".$Height."[[:>:]]'";}else{$theheight = '';}
if($Location != 'NULL'){$thelocation = "AND Location RLIKE '[[:<:]]".$Location."[[:>:]]'";}else{$thelocation = '';}
if($Status != 'NULL'){$thestatus = "AND Status RLIKE '[[:<:]]".$Status."[[:>:]]'";}else{$thestatus = '';}
if($Ethnicity != 'NULL'){$theethnicity = "AND Ethnicity RLIKE '[[:<:]]".$Ethnicity."[[:>:]]'";}else{$theethnicity = '';}
if($Smoke != 'NULL'){$thesmoke = "AND Smoke RLIKE '[[:<:]]".$Smoke."[[:>:]]'";}else{$thesmoke = '';}
if($Drink != 'NULL'){$thedrink = "AND Drink RLIKE '[[:<:]]".$Drink."[[:>:]]'";}else{$thedrink = '';}
if($Diet != 'NULL'){$thediet = "AND Diet RLIKE '[[:<:]]".$Diet."[[:>:]]'";}else{$thediet = '';}
if($Religion != 'NULL'){$thereligion = "AND Religion RLIKE '[[:<:]]".$Religion."[[:>:]]'";}else{$thereligion = '';}
if($Education != 'NULL'){$theeducation = "AND Education RLIKE '[[:<:]]".$Education."[[:>:]]'";}else{$theeducation = '';}
if($Job != 'NULL'){$thejob = "AND Job RLIKE '[[:<:]]".$Job."[[:>:]]'";}else{$thejob = '';}



$results = mysql_query("SELECT userID,FirstName, LastName,Meetupchoice, Age, Gender, Height, City, State, Status, Ethnicity, Smoke, Drink, Diet, Religion, Education, Job, Bio 
  FROM tbl_participant WHERE userID IN (SELECT userID FROM tbl_participant_request WHERE ProjectID = '".$_GET['id']."'
  AND Accepted_to_Participate = 'Pending') AND Meetupchoice RLIKE '[[:<:]]".$Meetupchoice."[[:>:]]' $theage $thegender $theheight $thelocation 
  $thestatus $theethnicity $thesmoke $thedrink $thediet $thereligion $theeducation $thejob 
  ORDER BY userID DESC LIMIT $position, $item_per_page");


//Limit our results within a specified range. 


//$results = mysql_query("SELECT id,userID, Gender FROM tbl_participant_project 
//WHERE Gender RLIKE '".$Gender."' OR Age RLIKE '".$Age."' ORDER BY id DESC LIMIT $position, $item_per_page");

if(mysql_num_rows($results)<1)
{
echo "<div class='no-participants'>";
echo "No Participants available!";
echo "</div>";

echo '
<script type="text/javascript">
$(".load_more").hide();
</script>
';

}else{




//output results from database
echo '<ul class="page_result">';
//while($results->fetch()){ //fetch values
while($row2 = mysql_fetch_array($results))
{ 

  echo $row2['userID'];




$sql3 = mysql_query("SELECT * FROM participant_profile_images WHERE userID = '".$row2['userID']."' ");
$row3 = mysql_fetch_array($sql3);




echo '


 



<div class="row-fluid">
<div class="therow">
  <div class="col-lg-2">';
echo '<a href="profile/?id='.$row2['userID'].'">';
  if($row3['thumbnail_image'] != ''){
  
  echo '<img src="'.BASE_PATH.'/participant/account/uploads/'.$row3['thumbnail_image'].'" class="img-circle"/>';

}else{

 echo '<img src="'.BASE_PATH.'/participant/account/uploads/thumbnail.jpg" class="img-circle"/>';
}

echo '</a>';

  echo '</div>
  <div class="col-lg-6">
  <a href="profile/?id='.$row2['userID'].'&p='.$_GET['id'].'" class="notextdecoration">
   <p><h4>'.$row2['FirstName'].'</h4>'.$row2['Age'].' - '.$row2['City'].', '.$row2['State'].' </p>
   </a>
   <p>'.$row2['Bio'].'</p>
   </div>
   <!--<div class="span4"><a href="profile/?id='.$row2['userID'].'&p='.$_GET['id'].'" class="btn-request">View Profile</a> </div>-->';
 
  ?>

<div class="col-lg-4"><a href="profile/?id=<?php echo $row2['userID']; ?>&p=<?php echo $_GET['id']; ?>" class="btn-request"> View Profile</a> </div>


  <form action="" id="contact-form" class="form-horizontal" method="post">

        
           
              <input type="hidden" name="userid" id="userid" value="<?php echo $row2['userID']; ?>">
              <input type="hidden" name="projectid" id="projectid" value="<?php echo $_GET['id']; ?>">
          

          </form>


<div align="center">
<button class="load_more_pending" id="load_more_button">load More Pending</button>
<div class="animation_image" style="display:none;"><img src="ajax-loader.gif"> Loading...</div>
</div>


</div>
</div>



<?php 




}

}

?>

<input type="hidden" name="firstname" id="firstname" value="'.$row2['FirstName'].'"/>
<input type="hidden" name="userid'.$row2['userID'].'" id="userid" value="'.$row2['userID'].'"/>
<input type="hidden" name="projectid" id="projectid" value="'.$_GET['id'].'"/>



  </div>




  
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
