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



 </head>
    
    <body>





<?php
session_start();
include("../../../../../config.php"); //include config file
require_once '../../../../../class.startup.php';
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
$City = str_replace(",","|",$row['City']);
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
if($City != 'NULL'){$thecity = "AND City RLIKE '[[:<:]]".$City."[[:>:]]'";}else{$thecity = '';}
if($Status != 'NULL'){$thestatus = "AND Status RLIKE '[[:<:]]".$Status."[[:>:]]'";}else{$thestatus = '';}
if($Ethnicity != 'NULL'){$theethnicity = "AND Ethnicity RLIKE '[[:<:]]".$Ethnicity."[[:>:]]'";}else{$theethnicity = '';}
if($Smoke != 'NULL'){$thesmoke = "AND Smoke RLIKE '[[:<:]]".$Smoke."[[:>:]]'";}else{$thesmoke = '';}
if($Drink != 'NULL'){$thedrink = "AND Drink RLIKE '[[:<:]]".$Drink."[[:>:]]'";}else{$thedrink = '';}
if($Diet != 'NULL'){$thediet = "AND Diet RLIKE '[[:<:]]".$Diet."[[:>:]]'";}else{$thediet = '';}
if($Religion != 'NULL'){$thereligion = "AND Religion RLIKE '[[:<:]]".$Religion."[[:>:]]'";}else{$thereligion = '';}
if($Education != 'NULL'){$theeducation = "AND Education RLIKE '[[:<:]]".$Education."[[:>:]]'";}else{$theeducation = '';}
if($Job != 'NULL'){$thejob = "AND Job RLIKE '[[:<:]]".$Job."[[:>:]]'";}else{$thejob = '';}



//Limit our results within a specified range. 

$results = mysql_query("SELECT userID,FirstName, LastName,Meetupchoice, Age, Gender, Height, City, State, Status, Ethnicity, Smoke, Drink, Diet, Religion, Education, Job, Bio FROM tbl_participant WHERE userID NOT IN (SELECT userID FROM tbl_project_request WHERE ProjectID = '".$_GET['id']."') AND Meetupchoice RLIKE '[[:<:]]".$Meetupchoice."[[:>:]]' $theage $thegender $theheight $thecity $thestatus $theethnicity $thesmoke $thedrink $thediet $thereligion $theeducation $thejob ORDER BY userID DESC LIMIT $position, $item_per_page");


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


echo "</div>";

//output results from database
echo '<ul class="page_result">';
//while($results->fetch()){ //fetch values
while($row2 = mysql_fetch_array($results))
{ 

//echo $row2['userID'];



//echo $row['userID'];


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
