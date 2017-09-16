<?php
session_start();
require_once '../../../../../base_path.php';


require_once '../../../../../class.participant.php';
require_once '../../../../../class.startup.php';
include_once("../../../../../config.php");
include("../../../../../config.inc.php");



$startup_home = new STARTUP();

if($startup_home->is_logged_in())
{
  $startup_home->logout();
}



$participant_home = new PARTICIPANT();

if(!$participant_home->is_logged_in())
{
  $participant_home->redirect('../../../../login/');
}





$get_total_rows = 0;
$results = $mysqli->query("SELECT COUNT(*) FROM tbl_startup_project");
if($results){
$get_total_rows = $results->fetch_row(); 
}


//break total records into pages
$total_pages = ceil($get_total_rows[0]/$item_per_page); 





$stmt = $participant_home->runQuery("SELECT * FROM tbl_participant WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['participantSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);



if(isset($_GET['verified']) == '1'){

  $update_sql = "UPDATE tbl_participant SET 
  account_verified='1'

  WHERE userID='".$_SESSION['participantSession']."'";

  mysql_query($update_sql);

}


?>



<!DOCTYPE html>
<html lang="en" id="features" class="tablet mobile">
    
    <head>



<?php include("../../../../header.php"); ?>


<script>
$(document).ready(function(){
 $(".save-thursday").click(function() { 
       //alert("asdf");
        var proceed = true;
        //simple validation at client's end
        //loop through each field and we simply change border color to red for invalid fields   
        var thursday_from_value = $('#thursday_from').val()
        var thursday_to_value = $('#thursday_to').val()
        var pac_input_value = $('#pac-input').val()

        if(!thursday_from_value) {

                $("#thursday_from").css('border-color','red');  //change border color to red   
                proceed = false; //set do not proceed flag            
        };

        if(!thursday_to_value) {

                $("#thursday_to").css('border-color','red');  //change border color to red   
                proceed = false; //set do not proceed flag            
        };

        if(!pac_input_value) {

                $("#pac-input").css('border-color','red');  //change border color to red   
                proceed = false; //set do not proceed flag            
        };
        
       
        if(proceed) //everything looks good! proceed...
        {
            //get input field values data to be sent to server
            post_data = {
                'thursday_from'     : $("select[name='thursday_from']").val(),
                'thursday_to'     : $("select[name='thursday_to']").val(),
                'location'     : $('input[name=location').val()
            };
 

            //alert(state);

            //Ajax post data to server
            $.post('save-thursday.php', post_data, function(response){  
                if(response.type == 'error'){ //load json data from server and output message     
                    output = '<div class="error">'+response.text+'</div>';
                }else{
                    output = '<div class="success">'+response.text+'</div>';
                    //reset values in all input fields
                    $("#profile-form select[required=true]").val(''); 
                    $("#profile-form #contact_body").slideUp(); //hide form after success
                }
                $("#profile-form #profile_results").hide().html(output).slideDown();
            }, 'json');
        }
    });
 });
</script> 



<link rel="stylesheet" href="<?php echo BASE_PATH; ?>/startup/project/css/jquery-ui.css">





<script type='text/javascript'>//<![CDATA[
jQuery( document ).ready(function( $ ) {

$( "#tabs-4" ).load( "thursday.php" );

    $(".monday").click(function() {  

      
       window.location.replace( "../monday/" );
       
    });

    $(".tuesday").click(function() {  

      window.location.replace( "../tuesday/" );


     });

    $(".wednesday").click(function() {  

       window.location.replace( "../wednesday/" );
    });

     $(".thursday").click(function() {  

      
      window.location.replace( "" );

    });

      $(".friday").click(function() {  

       window.location.replace( "../friday/" );

    });

    $(".saturday").click(function() {  

      window.location.replace( "../saturday/" );

    });

     $(".sunday").click(function() {  

      window.location.replace( "../sunday/" );

    });


});//]]> 





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


<style>

a.verify-badge img#verify-image-payment{display:none !important;}

</style>






        
    </head>
    
    <body>

<!--TopNav-->
         <header id="main-header" class='transparent'>
  <div class="inner-col">
   


<?php include("../../../../../nav.php"); ?>

   
  </div>
</header>


<!--TopNav-->



 <div class="clearer"></div>


<!-- Main -->

   <div class="container">


<div class="row-fluid">
  <div class="span12">


 
      
      <div id="dashboardSurveyTargetingContainerLogic">


  


<div id="tabs">


<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">




   <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-1" aria-labelledby="ui-id-1" aria-selected="false" aria-expanded="false"><a href="#tabs-1" class="monday ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-1">Monday</a></li>
   
   <li class="ui-state-default ui-corner-top" role="tab" tabindex="0" aria-controls="tabs-2" aria-labelledby="ui-id-2" aria-selected="true" aria-expanded="true"><a href="#tabs-2" class="tuesday ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-2">Tuesday</a></li>
   
   <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a href="#tabs-3" class="wednesday ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-3">Wednesday</a></li>
   <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab" tabindex="-1" aria-controls="tabs-4" aria-labelledby="ui-id-4" aria-selected="false" aria-expanded="false"><a href="#tabs-4" class="thursday ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-4">Thursday</a></li>
   <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-5" aria-labelledby="ui-id-5" aria-selected="false" aria-expanded="false"><a href="#tabs-5" class="friday ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-5">Friday</a></li>
   <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-6" aria-labelledby="ui-id-6" aria-selected="false" aria-expanded="false"><a href="#tabs-6" class="saturday ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-6">Saturday</a></li>
   <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-7" aria-labelledby="ui-id-7" aria-selected="false" aria-expanded="false"><a href="#tabs-7" class="sunday ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-7">Sunday</a></li>
  </ul>








<div id="white-container">




<!-- Main -->






    <div id="white-container-account">
      






    

      

       <form action="" id="contact-form" class="form-horizontal" method="post">

    
           
              <input type="hidden" name="userid" id="userid" value="<?php echo $row2['userID']; ?>">
              <input type="hidden" name="projectid" id="projectid" value="<?php echo $_GET['id']; ?>">
          

          </form>

   




  
   <iframe name="votar" style="display:none;"></iframe>
        
    <form class="ff" id="profile-form" name="edit profile" method="post" target="votar">
        
        

        <h2 class="no-mobile">
          Availability
        </h2>

        <fieldset>
          <span class="input">
            <label for="firstname">Thursday</label>
           
             <span class="select-wrapper">
              <label class="fromto">From:</label>
              <select name="thursday_from" id="thursday_from" class="fromto">
  <option value="" <?php if($row['Thursday_From'] == ''){echo 'selected';}?> disabled="disabled">From</option>
  <option value="06:00am" <?php if($row['Thursday_From'] == '06:00am'){echo 'selected';}?>>06:00 AM</option>
  <option value="07:00am" <?php if($row['Thursday_From'] == '07:00am'){echo 'selected';}?>>07:00 AM</option>
  <option value="08:00am" <?php if($row['Thursday_From'] == '08:00am'){echo 'selected';}?>>08:00 AM</option>
  <option value="09:00am" <?php if($row['Thursday_From'] == '09:00am'){echo 'selected';}?>>09:00 AM</option>
  <option value="10:00am" <?php if($row['Thursday_From'] == '10:00am'){echo 'selected';}?>>10:00 AM</option>
  <option value="11:00am" <?php if($row['Thursday_From'] == '11:00am'){echo 'selected';}?>>11:00 AM</option>
  <option value="12:00pm" <?php if($row['Thursday_From'] == '12:00pm'){echo 'selected';}?>>12:00 PM</option>
  <option value="01:00pm" <?php if($row['Thursday_From'] == '01:00pm'){echo 'selected';}?>>01:00 PM</option>
  <option value="02:00pm" <?php if($row['Thursday_From'] == '02:00pm'){echo 'selected';}?>>02:00 PM</option>
  <option value="03:00pm" <?php if($row['Thursday_From'] == '03:00pm'){echo 'selected';}?>>03:00 PM</option>
  <option value="04:00pm" <?php if($row['Thursday_From'] == '04:00pm'){echo 'selected';}?>>04:00 PM</option>
  <option value="05:00pm" <?php if($row['Thursday_From'] == '05:00pm'){echo 'selected';}?>>05:00 PM</option>
  <option value="06:00pm" <?php if($row['Thursday_From'] == '06:00pm'){echo 'selected';}?>>06:00 PM</option>
  <option value="07:00pm" <?php if($row['Thursday_From'] == '07:00pm'){echo 'selected';}?>>07:00 PM</option>
  <option value="08:00pm" <?php if($row['Thursday_From'] == '08:00pm'){echo 'selected';}?>>08:00 PM</option>
  <option value="09:00pm" <?php if($row['Thursday_From'] == '09:00pm'){echo 'selected';}?>>09:00 PM</option>
  <option value="10:00pm" <?php if($row['Thursday_From'] == '10:00pm'){echo 'selected';}?>>10:00 PM</option>
  <option value="11:00pm" <?php if($row['Thursday_From'] == '11:00pm'){echo 'selected';}?>>11:00 PM</option>
  <option value="12:00am" <?php if($row['Thursday_From'] == '12:00am'){echo 'selected';}?>>12:00 AM</option>
               </select>
 <label class="fromto">To:</label>
               <select name="thursday_to" id="thursday_to" class="fromto">
  <option value="" <?php if($row['Thursday_To'] == ''){echo 'selected';}?> disabled="disabled">To</option>
  <option value="06:00am" <?php if($row['Thursday_To'] == '06:00am'){echo 'selected';}?>>06:00 AM</option>
  <option value="07:00am" <?php if($row['Thursday_To'] == '07:00am'){echo 'selected';}?>>07:00 AM</option>
  <option value="08:00am" <?php if($row['Thursday_To'] == '08:00am'){echo 'selected';}?>>08:00 AM</option>
  <option value="09:00am" <?php if($row['Thursday_To'] == '09:00am'){echo 'selected';}?>>09:00 AM</option>
  <option value="10:00am" <?php if($row['Thursday_To'] == '10:00am'){echo 'selected';}?>>10:00 AM</option>
  <option value="11:00am" <?php if($row['Thursday_To'] == '11:00am'){echo 'selected';}?>>11:00 AM</option>
  <option value="12:00pm" <?php if($row['Thursday_To'] == '12:00pm'){echo 'selected';}?>>12:00 PM</option>
  <option value="01:00pm" <?php if($row['Thursday_To'] == '01:00pm'){echo 'selected';}?>>01:00 PM</option>
  <option value="02:00pm" <?php if($row['Thursday_To'] == '02:00pm'){echo 'selected';}?>>02:00 PM</option>
  <option value="03:00pm" <?php if($row['Thursday_To'] == '03:00pm'){echo 'selected';}?>>03:00 PM</option>
  <option value="04:00pm" <?php if($row['Thursday_To'] == '04:00pm'){echo 'selected';}?>>04:00 PM</option>
  <option value="05:00pm" <?php if($row['Thursday_To'] == '05:00pm'){echo 'selected';}?>>05:00 PM</option>
  <option value="06:00pm" <?php if($row['Thursday_To'] == '06:00pm'){echo 'selected';}?>>06:00 PM</option>
  <option value="07:00pm" <?php if($row['Thursday_To'] == '07:00pm'){echo 'selected';}?>>07:00 PM</option>
  <option value="08:00pm" <?php if($row['Thursday_To'] == '08:00pm'){echo 'selected';}?>>08:00 PM</option>
  <option value="09:00pm" <?php if($row['Thursday_To'] == '09:00pm'){echo 'selected';}?>>09:00 PM</option>
  <option value="10:00pm" <?php if($row['Thursday_To'] == '10:00pm'){echo 'selected';}?>>10:00 PM</option>
  <option value="11:00pm" <?php if($row['Thursday_To'] == '11:00pm'){echo 'selected';}?>>11:00 PM</option>
  <option value="12:00am" <?php if($row['Thursday_To'] == '12:00am'){echo 'selected';}?>>12:00 AM</option>
               </select>
            </span>
          </span>


         


         

       

        


        


          </span>
        </fieldset>

        

        
<div class="col-lg-12">
         <h4>Where: (We suggest to enter a name and location of a venue to meet)</h4>




       <input id="pac-input" name="location" class="controls" type="text" placeholder="e.g Starbucks, Astor Place, New York, NY, United States" value="<?php if($row['Thursday_Location'] != ''){echo $row['Thursday_Location'];}?>">
  
    <div id="map"></div>

      </div>



        <div class="note">This is <strong>never shared</strong> and only used to send you notifications.</div>

       

  


        <div id="save">
              <input type="submit" class="save-thursday" value="Save"/>

            </div>


   <div style="float:left; width:100%; margin-top:30px;">
 <div id="profile_results"></div>
</div>

      </form>




    

                    <div class="clearer"></div>


            


          </div>

      <div class="clearer"></div>


  

      

    </div>

    <div class="clearer"></div>







</div>



  










</div>

</div>








<a href="#" style="display:none" id="requestbutton" class="initialism slide_open btn btn-success"></a>





<!--
<div align="center">
<button class="load_more" id="load_more_button">load More</button>
<button class="load_more_pending" id="load_more_button">load More </button>
<div class="animation_image" style="display:none;"><img src="ajax-loader.gif"> Loading...</div>
</div>-->








<div class="clearer"></div>

       
        





     

          
    

    

                    <div class="clearer"></div>


            


          </div>

      <div class="clearer"></div>


  

      

    </div>

    <div class="clearer"></div>

  </div>
  <?php include("../../../../../footer.php"); ?>
  </div>

  </div>

        <!--/.fluid-container-->
        <script src="<?php echo BASE_PATH; ?>/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_PATH; ?>/assets/scripts.js"></script>



<input type="hidden" id='base_path' value="<?php echo BASE_PATH; ?>">
  <script type="text/javascript" src="<?php echo BASE_PATH; ?>/startup/project/js/jquery.form.min.js"></script>




 <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 40.730610, lng: -73.935242},
          zoom: 8
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