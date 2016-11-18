<?php
session_start();

require_once '../../../base_path.php';

require_once '../../../class.researcher.php';
include_once("../../../config.php");
include("../../../config.inc.php");



$researcher_home = new RESEARCHER();

if(!$researcher_home->is_logged_in())
{
  $researcher_home->redirect('../../../404.php');
  exit();
}


include './include.php';


include_once '../../../dbConfig_rating.php';
//Fetch rating deatails from database
$query = "SELECT rating_number, FORMAT((total_points / rating_number),1) as average_rating FROM participant_rating WHERE post_id = '".$_GET['id']."' AND status = 1";
$result = $db->query($query);
$ratingRow = $result->fetch_assoc();




$stmt = mysql_query("SELECT * FROM tbl_participant WHERE userID='".$_GET['id']."'");
$row = mysql_fetch_array($stmt);



$comment="SELECT * FROM c5t_comment WHERE researcher_id='".$_SESSION['researcherSession']."' AND comment_identifier_id = '".$_GET['id']."'";
$row_comment=mysql_query($comment);


$rating="SELECT * FROM participant_rating WHERE researcher_id='".$_SESSION['researcherSession']."' AND post_id = '".$_GET['id']."'";
$row_rating=mysql_query($rating);



$Project = mysql_query("SELECT * FROM tbl_researcher_project WHERE researcherID='".$_GET['id']."'");
$rowproject = mysql_fetch_array($Project);

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

<?php include("../../../participant/header.php"); ?>




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



<script type="text/javascript">
$(document).ready(function () {
  $('#c5t_body + div').hide();
});
</script>


    </head>
    
    <body>

<!--TopNav-->
         <header id="main-header" class='transparent'>
  <div class="inner-col">
   


<?php include("../../../nav.php"); ?>

   
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


if($row['google_picture_link'] != '') {

 echo '<img src="'.$row['google_picture_link'].'"" class="img-circle-profile"/>';


}else{ 



  if($row['profile_image'] != ''){
  
  echo '<img src="'.BASE_PATH.'/images/profile/'.$row['profile_image'].'" class="img-circle-profile"/>';

}else{

 echo '<img src="'.BASE_PATH.'/images/profile/thumbnail.jpg" class="img-circle-profile"/>';
}

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
 
<?php if(isset($_SESSION['researcherSession'])){ ?>
        <th>Ratings</th>
     <?php  }  ?>   
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>2</td>
 <?php if(isset($_SESSION['researcherSession'])){ ?>     
        <td>
          
    <div class="overall-rating">
  

 
    <div class="overall-rating">(Average Rating  <span id="avgrat"><?php echo $ratingRow['average_rating']; ?></span>
Based on <span id="totalrat"><?php echo $ratingRow['rating_number']; ?></span>  rating)</span></div>



    </div>


        </td>
        <?php  }  ?>  
      </tr>
    </tbody>
  </table>

    </div>


  </div>






  <div class="therow">
    <div class="col-lg-12">

<?php if(mysql_num_rows($row_rating)<1) { ?>
  <h2>Rate <?php echo $row['FirstName']; ?></h2>
  <input name="rating" value="0" id="rating_star" type="hidden" postID="<?php echo $_GET['id']; ?>" />
  <p>&nbsp;</p>
<?php } ?>  


<?php if(mysql_num_rows($row_comment)>0) { ?>
<script type="text/javascript">
$(document).ready(function () {
  $('.c5t_comment_form_background').hide();
});
</script>
<?php } ?>  



    
      <?php echo $c5t_output; ?>

    </div>
  </div>

 
</div>




     

          
      </div>

    

                 


            


          </div>

    

  

      

    </div>

  

  </div>

   <!--Footer-->
<?php include("../../../footer.php"); ?>
<!--Footer-->

  </div>

  </div>

 

        <!--/.fluid-container-->
        <script src="<?php echo BASE_PATH; ?>/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_PATH; ?>/assets/scripts.js"></script>






        
    </body>

</html>