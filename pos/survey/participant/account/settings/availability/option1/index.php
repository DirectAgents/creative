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
  $participant_home->redirect('../../../../login.php');
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

  $update_sql = mysqli_query($connecDB,"UPDATE tbl_participant SET 
  account_verified='1'

  WHERE userID='".$_SESSION['participantSession']."'");


}


?>



<!DOCTYPE html>
<html lang="en" id="features" class="tablet mobile">
    
    <head>



<?php include("../../../../header.php"); ?>


<script type="text/javascript">
$(document).ready(function() {

  $("#days").blur(function (e) {
       e.preventDefault();
     if($("#days").val()==='')
      {
        //alert("Please enter a job position!");
        return false;
      }
      var myData = 'days='+ $("#days").val()+'&userid='+ $("#userid").val(); 
      //alert(myData);
      jQuery.ajax({
      type: "POST", 
      url: "days.php", 
      dataType:"text", 
      data:myData,
      success:function(response){
        $("#responds").append(response);
        $("#days").val('');
       
      },
      error:function (xhr, ajaxOptions, thrownError){
        alert(thrownError);
      }
      });
  });

  $("body").on("click", "#responds .del_button", function(e) {
     e.preventDefault();
     var clickedID = this.id.split('-'); 
    
     var DbNumberID = clickedID[1]; 
     var myData = 'recordToDelete='+ DbNumberID; 
     
     //alert(DbNumberID);


      jQuery.ajax({
      type: "POST", 
      url: "days.php", 
      dataType:"text", 
      data:myData, 
      success:function(response){
        $("#responds").append(response);
        $('#dayselection_'+DbNumberID).prop('checked', false); // Unchecks it
        
        $('#item_'+DbNumberID).fadeOut("slow");

        
        //alert(response);
      
      },
      error:function (xhr, ajaxOptions, thrownError){
        
        alert(thrownError);
      }
      });
  });

});  
</script>



  <script>
  $(function() {
    $( "#days" ).autocomplete({
      source: 'search-day.php'
    });
  });
  </script>



<script>
$(document).ready(function(){
 $(".save").click(function() { 
       //alert("asdf");
        var proceed = true;
        //simple validation at client's end
        //loop through each field and we simply change border color to red for invalid fields   
        var from_value = $('#from_time').val()
        var to_value = $('#to_time').val()
        var pac_input_value = $('#pac-input').val()


        var days = $('input[name="dayselection[]"]:checked').map(function () {return this.value;}).get().join(",");

        

        if(days == '' ){ 
            
            $("#days").css('border-color','red');  //change border color to red  
            proceed = false;
          
        }

        
        if(!from_value) {

                $("#from_time").css('border-color','red');  //change border color to red   
                proceed = false; //set do not proceed flag            
        };

        if(!to_value) {

                $("#to_time").css('border-color','red');  //change border color to red   
                proceed = false; //set do not proceed flag            
        };

       
       
        if(proceed) //everything looks good! proceed...
        {
            //get input field values data to be sent to server
            post_data = {
                'day'     : $('input[name="dayselection[]"]:checked').map(function () {return this.value;}).get().join(","),
                'from_time'     : $("select[name='from_time']").val(),
                'to_time'     : $("select[name='to_time']").val(),
                'location'     : pac_input_value
            };
 

            

            //Ajax post data to server
            $.post('save.php', post_data, function(response){  
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








<script type='text/javascript'>//<![CDATA[
jQuery( document ).ready(function( $ ) {

$( "#tabs-1" ).load( "index.php" );

    $(".availability1").click(function() {  

      
      window.location.replace( "" );
       
    });

   $(".availability2").click(function() {  


       window.location.replace( "../option2/" );

     });

    $(".availability3").click(function() {  

       window.location.replace( "../option3/" );

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




   <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab" tabindex="-1" aria-controls="tabs-1" aria-labelledby="ui-id-1" aria-selected="false" aria-expanded="false"><a href="#tabs-1" class="availability1 ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-1">Availability Option #1</a></li>
   
   <li class="ui-state-default ui-corner-top" role="tab" tabindex="0" aria-controls="tabs-2" aria-labelledby="ui-id-2" aria-selected="true" aria-expanded="true"><a href="#tabs-2" class="availability2 ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-2">Availability Option #2</a></li>
   
   <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a href="#tabs-3" class="availability3 ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-3">Availability Option #3</a></li>

  </ul>








<div id="white-container">




<!-- Main -->






    <div id="white-container-account">
      






    

    
   




  
   <iframe name="votar" style="display:none;"></iframe>
        
    <form class="ff" id="profile-form" name="edit profile" method="post" target="votar">
        
        

        <h2 class="no-mobile">
          Availability
        </h2>


        <fieldset>
          <span class="input">
            <label for="firstname">Days of the week</label>
           
     
               <input class="form-control" name="days" id="days" type="text" placeholder="Enter here the days you are available to meet"/>

          
          </span>

          </span>
        </fieldset>




<fieldset>
          <span class="input">
           
           
     
   


<ul id="responds">
<?php
//include db configuration file



echo '<input type="hidden" name="userid" id="userid" value="'.$row["userID"].'">';


//MySQL query
$Result = mysqli_query($connecDB,"SELECT * FROM tbl_participant WHERE userID = '".$_SESSION['participantSession']."'");


//get all records from add_delete_record table
$row2 = mysqli_fetch_array($Result);




$ctop = $row2['Days_Availability_Option1']; 
$ctop = explode(',',$ctop); 



if($row2['Days_Availability_Option1'] != '' ){



foreach($ctop as $day)  
{ 
    //Uncomment the last commented line if single quotes are showing up  
    //otherwise delete these 3 commented lines 
    

//MySQL query
$sqlday = mysqli_query($connecDB,"SELECT * FROM days WHERE day = '".$day."' ");
$row3 = mysqli_fetch_array($sqlday);


echo '<li id="item_'.$row3['id'].'">';
if(in_array($day,$ctop)){
echo '<input id="dayselection_'.$row3['id'].'" name="dayselection[]" type="checkbox"  value="'.$day.'" style="display:none" checked/>';
}
echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$row3['id'].'">';
echo '<img src="../../../../../images/icon_del.gif" border="0" class="icon_del" />';
echo '</a></div>';
//echo '<input name="dayselection[]" type="checkbox"  value="'.$day.'"/>';
echo $day . '</li>';

} 



}





?>
</ul>
          

 
               
           
          </span>

          </span>
        </fieldset>







        <fieldset>
          <span class="input">
            <label for="firstname">Time</label>
           
             <span class="select-wrapper">
             <label class="fromto">Between</label>
              <select name="from_time" id="from_time" class="fromto">
  <option value="" <?php if($row['From_Time_Option1'] == ''){echo 'selected';}?> disabled="disabled">From</option>
  <option value="06:00am" <?php if($row['From_Time_Option1'] == '06:00am'){echo 'selected';}?>>06:00 AM</option>
  <option value="07:00am" <?php if($row['From_Time_Option1'] == '07:00am'){echo 'selected';}?>>07:00 AM</option>
  <option value="08:00am" <?php if($row['From_Time_Option1'] == '08:00am'){echo 'selected';}?>>08:00 AM</option>
  <option value="09:00am" <?php if($row['From_Time_Option1'] == '09:00am'){echo 'selected';}?>>09:00 AM</option>
  <option value="10:00am" <?php if($row['From_Time_Option1'] == '10:00am'){echo 'selected';}?>>10:00 AM</option>
  <option value="11:00am" <?php if($row['From_Time_Option1'] == '11:00am'){echo 'selected';}?>>11:00 AM</option>
  <option value="12:00pm" <?php if($row['From_Time_Option1'] == '12:00pm'){echo 'selected';}?>>12:00 PM</option>
  <option value="01:00pm" <?php if($row['From_Time_Option1'] == '01:00pm'){echo 'selected';}?>>01:00 PM</option>
  <option value="02:00pm" <?php if($row['From_Time_Option1'] == '02:00pm'){echo 'selected';}?>>02:00 PM</option>
  <option value="03:00pm" <?php if($row['From_Time_Option1'] == '03:00pm'){echo 'selected';}?>>03:00 PM</option>
  <option value="04:00pm" <?php if($row['From_Time_Option1'] == '04:00pm'){echo 'selected';}?>>04:00 PM</option>
  <option value="05:00pm" <?php if($row['From_Time_Option1'] == '05:00pm'){echo 'selected';}?>>05:00 PM</option>
  <option value="06:00pm" <?php if($row['From_Time_Option1'] == '06:00pm'){echo 'selected';}?>>06:00 PM</option>
  <option value="07:00pm" <?php if($row['From_Time_Option1'] == '07:00pm'){echo 'selected';}?>>07:00 PM</option>
  <option value="08:00pm" <?php if($row['From_Time_Option1'] == '08:00pm'){echo 'selected';}?>>08:00 PM</option>
  <option value="09:00pm" <?php if($row['From_Time_Option1'] == '09:00pm'){echo 'selected';}?>>09:00 PM</option>
  <option value="10:00pm" <?php if($row['From_Time_Option1'] == '10:00pm'){echo 'selected';}?>>10:00 PM</option>
  <option value="11:00pm" <?php if($row['From_Time_Option1'] == '11:00pm'){echo 'selected';}?>>11:00 PM</option>
  <option value="12:00am" <?php if($row['From_Time_Option1'] == '12:00am'){echo 'selected';}?>>12:00 AM</option>
               </select>
<label class="and">and</label>
               <select name="to_time" id="to_time" class="fromto" style="margin-left:10px;">
  <option value="" <?php if($row['To_Time_Option1'] == ''){echo 'selected';}?> disabled="disabled">To</option>
  <option value="06:00am" <?php if($row['Monday_To'] == '06:00am'){echo 'selected';}?>>06:00 AM</option>
  <option value="07:00am" <?php if($row['To_Time_Option1'] == '07:00am'){echo 'selected';}?>>07:00 AM</option>
  <option value="08:00am" <?php if($row['To_Time_Option1'] == '08:00am'){echo 'selected';}?>>08:00 AM</option>
  <option value="09:00am" <?php if($row['To_Time_Option1'] == '09:00am'){echo 'selected';}?>>09:00 AM</option>
  <option value="10:00am" <?php if($row['To_Time_Option1'] == '10:00am'){echo 'selected';}?>>10:00 AM</option>
  <option value="11:00am" <?php if($row['To_Time_Option1'] == '11:00am'){echo 'selected';}?>>11:00 AM</option>
  <option value="12:00pm" <?php if($row['To_Time_Option1'] == '12:00pm'){echo 'selected';}?>>12:00 PM</option>
  <option value="01:00pm" <?php if($row['To_Time_Option1'] == '01:00pm'){echo 'selected';}?>>01:00 PM</option>
  <option value="02:00pm" <?php if($row['To_Time_Option1'] == '02:00pm'){echo 'selected';}?>>02:00 PM</option>
  <option value="03:00pm" <?php if($row['To_Time_Option1'] == '03:00pm'){echo 'selected';}?>>03:00 PM</option>
  <option value="04:00pm" <?php if($row['To_Time_Option1'] == '04:00pm'){echo 'selected';}?>>04:00 PM</option>
  <option value="05:00pm" <?php if($row['To_Time_Option1'] == '05:00pm'){echo 'selected';}?>>05:00 PM</option>
  <option value="06:00pm" <?php if($row['To_Time_Option1'] == '06:00pm'){echo 'selected';}?>>06:00 PM</option>
  <option value="07:00pm" <?php if($row['To_Time_Option1'] == '07:00pm'){echo 'selected';}?>>07:00 PM</option>
  <option value="08:00pm" <?php if($row['To_Time_Option1'] == '08:00pm'){echo 'selected';}?>>08:00 PM</option>
  <option value="09:00pm" <?php if($row['To_Time_Option1'] == '09:00pm'){echo 'selected';}?>>09:00 PM</option>
  <option value="10:00pm" <?php if($row['To_Time_Option1'] == '10:00pm'){echo 'selected';}?>>10:00 PM</option>
  <option value="11:00pm" <?php if($row['To_Time_Option1'] == '11:00pm'){echo 'selected';}?>>11:00 PM</option>
  <option value="12:00am" <?php if($row['To_Time_Option1'] == '12:00am'){echo 'selected';}?>>12:00 AM</option>
               </select>
            </span>
          </span>

          </span>
        </fieldset>

        

        
<div class="col-lg-12">
         <h4>Where: (We suggest to enter a name and location of a venue to meet)</h4>




       <input id="pac-input" name="location" class="controls" type="text" placeholder="e.g Starbucks, Astor Place, New York, NY, United States" value="<?php if($row['Location_Option1'] != ''){echo $row['Location_Option1'];}?>">
  
    <div id="map"></div>

      </div>



        

       

  


        <div id="save">
              <input type="submit" class="save" value="Save"/>

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


  

      <?php include("../../../../../footer.php"); ?>

    </div>

    <div class="clearer"></div>

  </div>
  
  </div>

  </div>

        <!--/.fluid-container-->
        <script src="<?php echo BASE_PATH; ?>/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_PATH; ?>/assets/scripts.js"></script>



<input type="hidden" id='base_path' value="<?php echo BASE_PATH; ?>">




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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-lNejAuVNUDCwo2UxOAT_N_lQZb7qiQY&libraries=places&callback=initMap&region=US"
        async defer></script>


        
    </body>

</html>