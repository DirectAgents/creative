<?php
session_start();
require_once '../../class.participant.php';
include_once("../../config.php");
include("../../config.inc.php");




$startup_home = new PARTICIPANT();

if(!$startup_home->is_logged_in())
{
  $startup_home->redirect('login.php');
}

$stmt = $startup_home->runQuery("SELECT * FROM tbl_participant WHERE userID='".$_SESSION['participantSession']."'");
$stmt->execute(array(":uid"=>$_SESSION['participantSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);



$Project = mysql_query("SELECT * FROM tbl_startup_project WHERE ProjectID='".$_GET['id']."'");
$rowproject = mysql_fetch_array($Project);




$meetupchoice=explode(',',$rowproject['Meetupchoice']);
$age=explode(',',$rowproject['Age']);
$gender=explode(',',$rowproject['Gender']);
$minheight=explode(',',$rowproject['MinHeight']);
$maxheight=explode(',',$rowproject['MaxHeight']);
$city=explode(',',$rowproject['City']);
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



<?php include("../../header.php"); ?>




<script>

$(document).ready(function() {

$('#wheretomeet').hide();  
  

$('#monday_location').show();  
            $('#tuesday_location').hide();
            $('#wednesday_location').hide();
            $('#thursday_location').hide();
            $('#friday_location').hide();
            $('#saturday_location').hide();
            $('#sunday_location').hide();

 $("#day").change(function() { 


 var day = $("select[name='day']").val();

 $.ajax({
        url: 'fromto.php',
        data: {day : day},
        dataType: "json",
        success: function(data)
        {
          

            if(day == 'Monday'){
            $('#monday_location').show();  
            $('#tuesday_location').hide();
            $('#wednesday_location').hide();
            $('#thursday_location').hide();
            $('#friday_location').hide();
            $('#saturday_location').hide();
            $('#sunday_location').hide();
            
          }

           if(day == 'Tuesday'){
            $('#monday_location').hide();  
            $('#tuesday_location').show();
            $('#wednesday_location').hide();
            $('#thursday_location').hide();
            $('#friday_location').hide();
            $('#saturday_location').hide();
            $('#sunday_location').hide();
          }

          if(day == 'Wednesday'){
            $('#monday_location').hide();  
            $('#tuesday_location').hide();
            $('#wednesday_location').show();
            $('#thursday_location').hide();
            $('#friday_location').hide();
            $('#saturday_location').hide();
            $('#sunday_location').hide();
            
          }

            if(day == 'Wednesday'){
            $('#monday_location').hide();  
            $('#tuesday_location').hide();
            $('#wednesday_location').hide();
            $('#thursday_location').show();
            $('#friday_location').hide();
            $('#saturday_location').hide();
            $('#sunday_location').hide();
            
          }

          if(day == 'Thursday'){
            $('#monday_location').hide();  
            $('#tuesday_location').hide();
            $('#wednesday_location').hide();
            $('#thursday_location').show();
            $('#friday_location').hide();
            $('#saturday_location').hide();
            $('#sunday_location').hide();
            
          }

          if(day == 'Friday'){
            $('#monday_location').hide();  
            $('#tuesday_location').hide();
            $('#wednesday_location').hide();
            $('#thursday_location').hide();
            $('#friday_location').show();
            $('#saturday_location').hide();
            $('#sunday_location').hide();
            
          }

          if(day == 'Saturday'){
            $('#monday_location').hide();  
            $('#tuesday_location').hide();
            $('#wednesday_location').hide();
            $('#thursday_location').hide();
            $('#friday_location').hide();
            $('#saturday_location').show();
            $('#sunday_location').hide();
            
          }

          if(day == 'Sunday'){
            $('#monday_location').hide();  
            $('#tuesday_location').hide();
            $('#wednesday_location').hide();
            $('#thursday_location').hide();
            $('#friday_location').hide();
            $('#saturday_location').hide();
            $('#sunday_location').show();
            
          }

            //alert(data[0].from);

            if(data[0].from == ''){ 
            $('#thetimeset-from').text('');
            $('#thetimeset-to').text('');  
            $('#from').text('');
            $('#to').text(''); 
            $('#notimeset').text('No time is set for '+ day); 
            
            }else{ 
              $('#wheretomeet').show();
              $('#notimeset').text(''); 
              $('#thetimeset-from').text('Based on your availability you are available on Monday between ');
              $('#from').text(data[0].from); 
            }
            

            if(data[0].to == ''){ 
            //$('#to').text('No time is set'); 
            }else{ 
            $('#thetimeset-to').text('and');
            $('#to').text( data[0].to ); 
            }

             //$("#from option:first").val(data[0].from);
             //$('#from option:first').text(data[0].from);

             //$("#to option:first").val(data[0].to);
             //$('#to option:first').text(data[0].to);

         
        }
    });


 });



 $(".btn-request").click(function() {  
  
//alert("aads"); 

        fromtimevalue = document.getElementById("from");
        totimevalue = document.getElementById("to");

        //get input field values
        
        var projectid  = $('input[name=projectid').val();
        var startupid  = $('input[name=startupid').val();
        var day = $("select[name='day']").val();
        var fromtime = fromtimevalue.innerHTML;
        var totime = totimevalue.innerHTML;
        if(day == 'Monday'){var location  = $('input[name=monday_location').val();}
        if(day == 'Tuesday'){var location  = $('input[name=tuesday_location').val();}
        if(day == 'Wednesday'){var location  = $('input[name=wednesday_location').val();}
        if(day == 'Thursday'){var location  = $('input[name=thursday_location').val();}
        if(day == 'Friday'){var location  = $('input[name=friday_location').val();}
        if(day == 'Saturday'){var location  = $('input[name=saturday_location').val();}
        if(day == 'Sunday'){var location  = $('input[name=sunday_location').val();}
        
       
        
        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        var proceed = true;
        

        if(fromtime==""){ 
             output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please choose your time under your settings</div>';
            $("#result").hide().html(output).slideDown();
            proceed = false;
        } 
         
         if(location==""){ 
             output = '<div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please enter a location to meet!</div>';
            $("#result").hide().html(output).slideDown();
            proceed = false;
        } 

        //everything looks good! proceed...
        if(proceed) 
        {


         
            //data to be sent to server
  post_data = {'projectid':projectid,'startupid':startupid,'fromtime':fromtime,'totime':totime,'day':day,'location':location};
            
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


    <div id="create-project-box">
      <div id="create-project">
              <a href="javascript:history.go(-1)" class="initialism btn-back">Back</a>
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

<input type="hidden" value="<?php echo $_GET['id']; ?>" name="projectid" id="projectid"/>
<input type="hidden" value="<?php echo $rowproject['startupID']; ?>" name="startupid" id="startupid"/>


<div class="col-sm-12">
<div class="change-availablity"><a href="<?php echo BASE_PATH; ?>/participant/account/settings/availability/">Change your availability days and times</a></div>
</div>


 <div class="col-lg-12">

<div class="row-day">
<div class="the-day">
<h4>Select a Day:</h4> 

<div class="select-row">
<select id="day" name="day">
<option value="">Select a day to meet</option>
<option value="Monday">Monday</option>
<option value="Tuesday">Tuesday</option>
<option value="Wednesday">Wednesday</option>
<option value="Thursday">Thursday</option>
<option value="Friday">Friday</option>
<option value="Saturday">Saturday</option>
<option value="Sunday">Sunday</option>
</select>
</div>

</div>

</div>

</div>


 <div class="col-sm-12">

<div class="row-time">

<div class="the-time">

<h4 id="notimeset"></h4>

<h4 id="thetimeset-from"></h4> 

<div id="from"></div>

<h4 id="thetimeset-to"></h4> 
&nbsp;
<div id="to"></div>




</div>
</div>
</div>





<div id="wheretomeet">

    <div class="col-lg-12">
      <h4>Where:</h4>




      
  
<div id="monday_location">   
  <input type="hidden" name="monday_location" id="monday_location" value="<?php echo $row['Monday_Location'];?>" />
  <iframe width="100%" height="250" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $row['Monday_Location'];?>&key=AIzaSyDWVAsb7TmD-8_yRqe7jBIMrAcGFwHg06M"></iframe> 

</div>


<div id="tuesday_location">   
<input type="hidden" name="tuesday_location" id="tuesday_location" value="<?php echo $row['Tuesday_Location'];?>" />
<iframe width="100%" height="250" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $row['Tuesday_Location'];?>&key=AIzaSyDWVAsb7TmD-8_yRqe7jBIMrAcGFwHg06M"></iframe> 

</div>

<div id="wednesday_location">   
<input type="hidden" name="wednesday_location" id="wednesday_location" value="<?php echo $row['Wednesday_Location'];?>" />  
<iframe width="100%" height="250" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $row['Wednesday_Location'];?>&key=AIzaSyDWVAsb7TmD-8_yRqe7jBIMrAcGFwHg06M"></iframe> 

</div>


<div id="thursday_location">   
<input type="hidden" name="thursday_location" id="thursday_location" value="<?php echo $row['Thursday_Location'];?>" />  
<iframe width="100%" height="250" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $row['Thursday_Location'];?>&key=AIzaSyDWVAsb7TmD-8_yRqe7jBIMrAcGFwHg06M"></iframe> 

</div>


<div id="friday_location">   
<input type="hidden" name="friday_location" id="friday_location" value="<?php echo $row['Friday_Location'];?>" />  
<iframe width="100%" height="250" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $row['Friday_Location'];?>&key=AIzaSyDWVAsb7TmD-8_yRqe7jBIMrAcGFwHg06M"></iframe> 

</div>

<div id="saturday_location">   
<input type="hidden" name="saturday_location" id="saturday_location" value="<?php echo $row['Saturday_Location'];?>" />    
<iframe width="100%" height="250" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $row['Saturday_Location'];?>&key=AIzaSyDWVAsb7TmD-8_yRqe7jBIMrAcGFwHg06M"></iframe> 

</div>

<div id="sunday_location">   
<input type="hidden" name="sunday_location" id="sunday_location" value="<?php echo $row['Sunday_Location'];?>" />   
<iframe width="100%" height="250" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $row['Sunday_Location'];?>&key=AIzaSyDWVAsb7TmD-8_yRqe7jBIMrAcGFwHg06M"></iframe> 

</div>

</div>



    <input type="submit" class="btn-request" value="Request to Meet"/>
    <p>&nbsp;</p>
    <div id="result"></div>

      
    
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




