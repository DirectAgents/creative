<?php
session_start();
require_once '../../../../class.startup.php';
include_once("../../../../config.php");
include("../../../../config.inc.php");




$startup_home = new STARTUP();

if(!$startup_home->is_logged_in())
{
  $startup_home->redirect('login.php');
}

$stmt = $startup_home->runQuery("SELECT * FROM tbl_participant WHERE userID='".$_GET['id']."'");
$stmt->execute(array(":uid"=>$_SESSION['startupSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);



$Project = mysql_query("SELECT * FROM tbl_startup_project WHERE startupID='".$_SESSION['startupSession']."'");
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
$screening=explode(',',$rowproject['Screening']);




$Profileimage = mysql_query("SELECT * FROM participant_profile_images WHERE userID='".$_GET['id']."'");
$rowprofileimage = mysql_fetch_array($Profileimage);


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
<script src="<?php echo BASE_PATH; ?>/startup/project/js/jquery.popupoverlay.js"></script>



<script>

$(document).ready(function() {

 $(".btn-request").click(function() {  
  
//alert("aads"); 



        //get input field values
        
        var projectid  = $('input[name=projectid').val();
        var userid  = $('input[name=userid').val();
        var time_to_meet = $("select[name='time-to-meet']").val();
        var day  = $('input[name=day').val();
        var location  = $('input[name=location').val();
       
        
        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        var proceed = true;
      
         

        //everything looks good! proceed...
        if(proceed) 
        {


         
            //data to be sent to server
  post_data = {'projectid':projectid,'userid':userid,'time_to_meet':time_to_meet,'day':day,'location':location};
            
            //Ajax post data to server
            $.post('place-suggest-ajax.php', post_data, function(response){  
              
              //alert (projectid);

                //load json data from server and output message     
        if(response.type == 'error')
        {
          output = '<div class="errorXYZ">'+response.text+'</div>';
        }else{
          
         
          output = response.text;
        
          
          //reset values in all input fields
          $('#contact_form input').val(''); 
          $('#contact_form textarea').val(''); 
        }
        
        $("#result").hide().html(output).slideDown();
            }, 'json');
      
        }
    });

 });


</script>



        
    </head>
    
    <body>

<!--TopNav-->
        <?php include("../../../nav.php"); ?>

<!--TopNav-->


  
        








 <div class="clearer"></div>


<!-- Main -->

   <div class="container">


<div class="row-fluid">
  <div class="span12">


    <div id="create-project-box">
      <div id="create-project">
              <a href="<?php echo BASE_PATH; ?>/startup/project/browse/profile/?id=<?php echo $_GET['id'];?>&p=<?php echo $_GET['p'];?>" class="initialism btn-back">Back</a>

            </div>
        </div>
        <div id="target"></div>    
<div id="white-container">
      <div id="dashboardSurveyTargetingContainerLogic">





<div class="container">
  <div class="therow">
 <div class="col-lg-12">    
<h3>Suggest a Place to Meet</h3>
</div>

<input type="hidden" id="userid" name="userid" value="<?php echo $_GET['id']; ?>"/>
<input type="hidden" id="projectid" name="projectid" value="<?php echo $_GET['p']; ?>"/>
<input type="hidden" id="day" name="day" value="<?php echo $_GET['d']; ?>"/>

 <div class="col-lg-1">
  <p>
<h4>When:</h4> 

  </div>
<div class="col-lg-4">
  <div class="day"><?php echo $_GET['d']; ?> at</div> 
  <?php
$start = $_GET['f'];
$end = $_GET['t'];

echo '<select id="time-to-meet" name="time-to-meet">';
date_default_timezone_set('America/New_York');
$range=range(strtotime($start),strtotime($end),30*60);
foreach($range as $time){
        echo date("h:i:s A",$time)."\n";

         echo '<option value="'.date("h:i A",$time).'">'; echo date("h:i A",$time)."\n"; echo '</option>';

}
echo '</select>';



?>
</p>
</div>

    <div class="col-lg-12">
      <h4>Where:</h4>

<p>


       <input id="pac-input" name="location" class="controls" type="text" placeholder="Enter location to meet">
  
    <div id="map"></div>

    <input type="submit" class="btn-request" value="Request to Meet"/>
    <p>&nbsp;</p>
    <div id="result"></div>

      
     </p>
  </div>


 </div>

</div>


          
      </div>

    



            


          </div>



  

      

    </div>

    <div class="clearer"></div>

  </div>
  </div>

  </div>

        <!--/.fluid-container-->
        <script src="<?php echo BASE_PATH; ?>/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_PATH; ?>/assets/scripts.js"></script>





    <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13
        });
        var input = /** @type {!HTMLInputElement} */(
            document.getElementById('pac-input'));

        var types = document.getElementById('type-selector');
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }
          marker.setIcon(/** @type {google.maps.Icon} */({
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(35, 35)
          }));
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);

          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

          infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
          infowindow.open(map, marker);
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, types) {
          var radioButton = document.getElementById(id);
          radioButton.addEventListener('click', function() {
            autocomplete.setTypes(types);
          });
        }

      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-lNejAuVNUDCwo2UxOAT_N_lQZb7qiQY&libraries=places&callback=initMap"
        async defer></script>


        
    </body>

</html>




