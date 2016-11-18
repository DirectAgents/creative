<?php
session_start();
require_once '../../class.researcher.php';
include_once("../../config.php");
include("../../config.inc.php");




$researcher_home = new RESEARCHER();

if(!$researcher_home->is_logged_in())
{
  $researcher_home->redirect('../../../../login/researcher.php');
}

$stmt = $researcher_home->runQuery("SELECT * FROM tbl_researcher_project WHERE ProjectID='".$_GET['id']."'");
$stmt->execute(array(":uid"=>$_SESSION['researcherSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);





$Project = mysql_query("SELECT * FROM tbl_researcher_project WHERE researcherID='".$_SESSION['researcherSession']."'");
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
<html class="no-js">
    
    <head>
        <title><?php echo $row['userEmail']; ?></title>
        <!-- Bootstrap -->
        <link href="<?php echo BASE_PATH; ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo BASE_PATH; ?>/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo BASE_PATH; ?>/assets/styles.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <link href="<?php echo BASE_PATH; ?>/css/font-awesome.css" rel="stylesheet" media="screen">




<link href="https://fonts.googleapis.com/css?family=Lato:400,700|Roboto:400,700,300" rel="stylesheet" type="text/css">






<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<!--JAVASCRIPT-->




 <!-- jQuery Popup Overlay -->
<script src="<?php echo BASE_PATH; ?>/researcher/project/js/jquery.popupoverlay.js"></script>







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
        <?php include("../nav.php"); ?>

<!--TopNav-->


  
        








 <div class="clearer"></div>


<!-- Main -->

   <div class="container">


<div class="row-fluid">
  <div class="span12">


    <div id="create-project-box">
      <div id="create-project">
              <a href="../" class="initialism btn-back">Back</a>

            </div>
        </div>
        <div id="target"></div>    
<div id="white-container">
      <div id="dashboardSurveyTargetingContainerLogic">





<div class="container">
  <div class="therow">
    <div class="col-lg-3">
      
      <?php
  if($row['project_image'] != ''){
  
  echo '<img src="'.BASE_PATH.'/researcher/project/uploads/'.$row['project_image'].'" class="img-circle-profile"/>';

}else{

 echo '<img src="'.BASE_PATH.'/researcher/project/uploads/thumbnail.jpg" class="img-circle-profile"/>';
}

      ?>


    </div>
    <div class="col-lg-4">
      <h3><?php echo $row['Name']; ?></h3>
      <?php echo $row['Headline']; ?></div>
  </div>





  
  <div class="therow">
    <div class="col-lg-12">
      <p><?php echo $row['Summary']; ?></p>
    </div>
  </div>

<div class="therowtitle">
    <div class="col-lg-12">
   <div class="thetitle">Audience Summary</div>
 </div>
</div>

  <div class="therow">
    <div class="col-lg-4"><h4>Meetupchoice:</h4><?php echo $row['Meetupchoice']; ?></div>
    <div class="col-lg-4"><h4>Gender:</h4><?php if($row['Gender'] != 'NULL'){echo $row['Gender'];}else{echo "No Gender Preference";} ?></div>
    <div class="col-lg-4"><h4>Height: </h4><?php if($row['MinHeight'] != 'NULL'){echo $row['MinHeight'];}else{echo "No Height Preference";} ?></div>
  </div>

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