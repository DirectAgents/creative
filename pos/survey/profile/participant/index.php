<?php
session_start();

include_once '../../dbConfig_rating.php';
//Fetch rating deatails from database



require_once '../../base_path.php';

include("../../config.php"); //include config file
include("../../config.inc.php");
require_once '../../class.participant.php';
require_once '../../class.startup.php';

$participant_home = new PARTICIPANT();
/*
$startup_home = new startup();

if($startup_home->is_logged_in())
{
  $startup_home->logout();
}





if(!$participant_home->is_logged_in())
{
  $participant_home->redirect('../participant/login.php');
}*/

include_once '../../dbConfig_rating.php';


$query = "SELECT rating_number, FORMAT((total_points / rating_number),1) as average_rating FROM participant_rating WHERE post_id = '".$_GET['id']."' AND status = 1";
$result = $db->query($query);
$ratingRow = $result->fetch_assoc();






$stmt = $participant_home->runQuery("SELECT * FROM tbl_participant WHERE userID='".$_GET['id']."'");
$stmt->execute(array(":uid"=>$_GET['id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);





$Project = mysqli_query($connecDB,"SELECT * FROM tbl_startup_project WHERE startupID='".$_GET['id']."'");
$rowproject = mysqli_fetch_array($Project);

$meetupchoice=explode(',',$rowproject['Meetupchoice']);
$age=explode(',',$rowproject['Age']);
$gender=explode(',',$rowproject['Gender']);
$minheight=explode(',',$rowproject['MinHeight']);
$maxheight=explode(',',$rowproject['MaxHeight']);
$location=explode(',',$rowproject['Location']);
$status=explode(',',$rowproject['Status']);
$ethnicity=explode(',',$rowproject['Ethnicity']);
$smoke=explode(',',$rowproject['Smoke']);
$drink=explode(',',$rowproject['Drink']);
$diet=explode(',',$rowproject['Diet']);
$religion=explode(',',$rowproject['Religion']);
$education=explode(',',$rowproject['Education']);
$job=explode(',',$rowproject['Job']);







?>

<!DOCTYPE html>
<html lang="en" id="features" class="tablet mobile">    
    <head>

<?php include("../../participant/header.php"); ?>




<!--Browse Participants-->

<script type="text/javascript">
$(document).ready(function() {

  var track_click = 0; //track user click on "load more" button, righ now it is 0 click
  
  var total_pages = <?php echo $total_pages; ?>;
  $('#results').load("fetch_pages.php?id="+<?php echo $_GET['id']; ?>, {'page':track_click}, function() {track_click++;}); //initial data to load



  $(".load_more").click(function (e) { //user clicks on button

    $(this).hide(); //hide load more button on click
    $('.animation_image').show(); //show loading image

    if(track_click <= total_pages) //make sure user clicks are still less than total pages
    {
      //post page number and load returned data into result element
      $.post('fetch_pages.php?id='+<?php echo $_GET['id']; ?>,{'page': track_click}, function(data) {
      
        $(".load_more").show(); //bring back load more button
        
        $("#results").append(data); //append data received from server



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




    
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>



<script type='text/javascript'>//<![CDATA[
$(function(){

$(".launch-map").click(function(){
//alert("asdf");
    var me = $(this),
        data = me.data('key');
   
var geocoder = new google.maps.Geocoder();
var address = data.param1;
var day = data.param2;
var time = data.param3;

//alert(data);

$('.modal-day').text(day);
$('.modal-time').text(time);


geocoder.geocode( { 'address': address}, function(results, status) {

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

    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

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


        
    </head>
    
    <body>

<!--TopNav-->
         <header id="main-header" class='transparent'>
  <div class="inner-col">
   


<?php include("../../nav.php"); ?>

   
  </div>
</header>


<!--TopNav-->


  
        








 <div class="clearer"></div>


<!-- Main -->

   <div class="container">


<div class="row-fluid">
  <div class="span12">


   <!-- <div id="create-project-box">
      <div id="create-project">
              <a href="../" class="initialism btn-back">Back</a>

            </div>
        </div>-->
        <div id="target"></div>    
<div id="white-container">
      <div id="dashboardSurveyTargetingContainerLogic">





<div class="container">
  <div class="therow">
    <div class="col-lg-2">
      
      <?php
  
if(isset($_SESSION['access_token'])){
        echo '<img src="'.$_SESSION['google_picture_link'].'" class="img-circle-profile"/>';
 }

if(isset($_SESSION['facebook_photo'])){ 
        echo '<img src="https://graph.facebook.com/'.$_SESSION['facebook_photo'].'/picture?width=100&height=100" class="img-circle-profile"/>';
}
       
if(!isset($_SESSION['access_token']) && (!isset($_SESSION['facebook_photo']))){

        echo '<img src="'.BASE_PATH.'/images/profile/'.$_SESSION['profileimage'].'" class="img-circle-profile"/>';
} 

      ?>


    </div>
    
    <div class="col-lg-4">
      <h3><?php echo $row['FirstName']; ?>&nbsp;<?php echo $row['LastName']; ?></h3>
      <?php echo $row['Age']; ?>, <?php echo $row['City']; ?>, <?php echo $row['State']; ?>
      </div>

 <div class="col-lg-5">
      <table class="table table-bordered">
    <thead>
      <tr>
        <th>Feedback Participations</th>
 
<?php if(isset($_SESSION['startupSession'])){ ?>
        <th>Rating</th>
     <?php  }  ?>   
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>

<?php


$result_count = mysqli_query($connecDB,"SELECT Status,userID, COUNT(userID) AS count FROM tbl_project_request WHERE Status = 'Meeting Set' AND userID = '".$_GET['id']."'");
$row_count = mysqli_fetch_assoc($result_count);
$count = $row_count['count'];

if($count > 0 ){

echo $count;

}else{
  echo "0";
}
?>


        </td>
 <?php if(isset($_SESSION['startupSession'])){ ?>     
        <td>
          
 
    <div class="overall-rating">
    <a href="rating/?id=<?php echo $_GET['id']; ?>"><span id="avgrat"><?php echo $ratingRow['average_rating']; ?></span></a>
    </div>


        </td>
        <?php  }  ?>  
      </tr>
    </tbody>
  </table>

    </div>


  </div>





<div class="therowtitle">
    <div class="col-lg-12">
   <div class="thetitle">About <?php echo $row['FirstName']; ?></div>
 </div>
</div>

<?php if($row['Bio'] != 'NULL' && $row['Bio'] != ''){ ?>
 <div class="therow">
    <div class="col-lg-12"><?php if($row['Bio'] != 'NULL'){echo $row['Bio'];}else{echo "No Bio";} ?></div>
  </div>
  <?php } ?>


 <?php if($row['Bio'] != 'NULL' && $row['Bio'] != ''){ ?>
 <div class="therow">
    <div class="col-lg-12"><h4>Interested in</h4><?php if($row['Industry_Interest'] != 'NULL'){echo $row['Industry_Interest'];}else{echo "No Bio";} ?></div>
  </div>
  <?php } ?> 

<!--
  <div class="therow">
    <div class="col-lg-4"><h4>Meetupchoice:</h4><?php echo $row['Meetupchoice']; ?></div>
    <div class="col-lg-4"><h4>Gender:</h4><?php if($row['Gender'] != 'NULL'){echo $row['Gender'];}else{echo "No Gender Preference";} ?></div>
    <div class="col-lg-4"><h4>Height: </h4><?php if($row['Height'] != 'NULL'){
      
      if($row['Height'] == '50'){echo "5 ft 0 in";}
      if($row['Height'] == '51'){echo "5 ft 1 in";}
      if($row['Height'] == '52'){echo "5 ft 2 in";}
      if($row['Height'] == '53'){echo "5 ft 3 in";}
      if($row['Height'] == '54'){echo "5 ft 4 in";}
      if($row['Height'] == '55'){echo "5 ft 5 in";}
      if($row['Height'] == '56'){echo "5 ft 6 in";}
      if($row['Height'] == '57'){echo "5 ft 7 in";}
      if($row['Height'] == '58'){echo "5 ft 8 in";}
      if($row['Height'] == '59'){echo "5 ft 9 in";}
      if($row['Height'] == '60'){echo "6 ft 0 in";}
      if($row['Height'] == '61'){echo "6 ft 1 in";}
      if($row['Height'] == '62'){echo "6 ft 2 in";}
      if($row['Height'] == '63'){echo "6 ft 3 in";}
      if($row['Height'] == '64'){echo "6 ft 4 in";}


      }else{echo "No Height Preference";} ?></div>
  </div>-->

  <div class="therow">
    <div class="col-lg-4"><h4>Status:</h4> <?php if($row['Status'] != 'NULL'){echo $row['Status'];}else{echo "No Status Preference";} ?></div>
    <div class="col-lg-4"><h4>Ethnicity:</h4> <?php if($row['Ethnicity'] != 'NULL'){echo $row['Ethnicity'];}else{echo "No Ethnic Preference";} ?></div>
    <div class="col-lg-4"><h4>Smoke:</h4> <?php if($row['Smoke'] != 'NULL'){echo $row['Smoke'];}else{echo "No Smoking Preference";} ?></div>
  </div>

   <div class="therow">
    <div class="col-lg-4"><h4>Drink:</h4> <?php if($row['Drink'] != 'NULL'){echo $row['Drink'];}else{echo "No Drinking Preference";} ?></div>
    <div class="col-lg-4"><h4>Diet:</h4> <?php if($row['Diet'] != 'NULL'){echo $row['Diet'];}else{echo "No Diet Preference";} ?></div>
    <div class="col-lg-4"><h4>Religion:</h4> <?php if($row['Religion'] != 'NULL'){echo $row['Religion'];}else{echo "No Religion Preference";} ?></div>
  </div>

   <div class="therow">
    <div class="col-lg-4"><h4>Education:</h4> <?php if($row['Education'] != 'NULL'){echo $row['Education'];}else{echo "No Education Preference";} ?></div>
    <div class="col-lg-4"><h4>Occupation:</h4><?php if($row['Job'] != 'NULL'){echo $row['Job'];}else{echo "No Job Preference";} ?></div>
  </div>




 
  

</div>




     

          
      </div>

    

                 


            


          </div>

    

  

      

    </div>

  

  </div>

   <!--Footer-->
<?php include("../../footer.php"); ?>
<!--Footer-->

  </div>

  </div>

 

        <!--/.fluid-container-->
        <script src="<?php echo BASE_PATH; ?>/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_PATH; ?>/assets/scripts.js"></script>






        
    </body>

</html>