<?php
session_start();

require_once '../../base_path.php';

require_once '../../class.participant.php';
require_once '../../class.researcher.php';
include_once("../../config.php");
include("../../config.inc.php");



$researcher_home = new RESEARCHER();

if($researcher_home->is_logged_in())
{
  $researcher_home->logout();
}



$participant_home = new PARTICIPANT();

if(!$participant_home->is_logged_in())
{
  $participant_home->redirect('../../participant/login.php');
}




$stmt = $researcher_home->runQuery("SELECT * FROM tbl_participant WHERE userID='".$_SESSION['participantSession']."'");
$stmt->execute(array(":uid"=>$_SESSION['participantSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);



$Project = mysql_query("SELECT * FROM tbl_researcher_project WHERE ProjectID='".$_GET['id']."'");
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
$('#thetimeset-to').hide();
$('#at').hide();
$('#based').hide();
  

$('#location_option1').show();  
$('#location_option2').hide();
$('#location_option3').hide();
            

 $("#option").change(function() { 


 var option = $("select[name='option']").val();

 $.ajax({
        url: 'fromto.php',
        data: {option : option},
        dataType: "json",
        success: function(data)
        {
          

            if(option == 'Option1'){
            $('#location_option1').show();  
            $('#location_option2').hide();
            $('#location_option3').hide();
       
            
          }

           if(option == 'Option2'){
            $('#location_option1').hide();  
            $('#location_option2').show();
            $('#location_option3').hide();
           
          }

          if(option == 'Option3'){
            $('#location_option1').hide();  
            $('#location_option2').hide();
            $('#location_option3').show();
         
            
          }

          

            //alert(data[0].from);

            if(data[0].from == ''){ 
            $('#based').hide();  
            $('#thetimeset-from').text('');
            $('#thetimeset-to').text('');  
            $('#from').text('');
            $('#to').text(''); 
            $('#notimeset').text('No time is set for '+ option); 
            
            }else{ 
              $('#wheretomeet').show();
              $('#notimeset').text(''); 
              $('#based').show();
              $('#date').text(data[0].date);   
              $('#at').show();
              $('#from').text(data[0].from); 
            }
            

            if(data[0].to == ''){ 
            //$('#to').text('No time is set'); 
            }else{ 
            $('#thetimeset-to').show();
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



        datevalue = document.getElementById("date");
        fromtimevalue = document.getElementById("from");
        totimevalue = document.getElementById("to");

        //get input field values
        
        var option = $("select[name='option']").val();

        var projectid  = $('input[name=projectid').val();
        var researcherid  = $('input[name=researcherid').val();
        //var day = $("select[name='day']").val();
        var date = datevalue.innerHTML;
        var fromtime = fromtimevalue.innerHTML;
        var totime = totimevalue.innerHTML;
        if(option == 'Option1'){var location  = $('input[name=location_option1').val();}
        if(option == 'Option2'){var location  = $('input[name=location_option2').val();}
        if(option == 'Option3'){var location  = $('input[name=location_option3').val();}
        
       
        
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
  post_data = {'projectid':projectid,'researcherid':researcherid,'fromtime':fromtime,'totime':totime,'date':date,'location':location};
            
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



 <div class="col-lg-3">
      
      <?php
  if($rowproject['project_image'] != ''){ ?>
  
  <img src="<?php echo BASE_PATH; ?>/projects/uploads/<?php echo $rowproject['project_image']; ?>" class="img-circle-profile"/>

<?php

}else{

 echo '<img src="'.BASE_PATH.'/projects/uploads/thumbnail.jpg" class="img-circle-profile"/>';
}

      ?>


    </div>
    <div class="col-lg-4">
      <h3><?php echo $rowproject['Name']; ?></h3>
      <?php echo $rowproject['Headline']; ?></div>




<?php if(!empty($_SESSION['participantSession']) && $rowproject['Status'] != 'Waiting for Participant to accept'){ ?>

<!--
<div class="col-lg-4">
  <a href="../request/?id=<?php echo $_GET['id']; ?>" role="button" class="111slide_open">
  <button type="button" class="btn-request">
  Request to Participate</button></a>
</div>
-->

<?php } ?>


<?php if(!empty($_GET['q'])){ ?>

<div class="col-lg-4">
  <a href="<?php echo BASE_PATH; ?>/participant/login.php?p=<?php echo $_GET['id']; ?>" role="button" class="111slide_open">
  <button type="button" class="btn-request">
  Login to Participate</button></a>
</div>

<?php } ?>


  </div>



 <?php if($rowproject['Summary'] != ''){?> 
  <div class="therow">
    <div class="col-lg-12">
      <p><?php echo $rowproject['Summary']; ?></p>
    </div>
  </div>
  <?php } ?>


 <div class="col-lg-12">    
<h3>Set up a meeting</h3>
</div>

<input type="hidden" value="<?php echo $_GET['id']; ?>" name="projectid" id="projectid"/>
<input type="hidden" value="<?php echo $rowproject['researcherID']; ?>" name="researcherid" id="researcherid"/>


<div class="col-sm-12">
<div class="change-availablity"><a href="<?php echo BASE_PATH; ?>/participant/account/settings/availability/">Change your availability days and times</a></div>
</div>


 <div class="col-lg-12">

<div class="row-day">
<div class="the-day">
<h4>Select your availability:</h4> 

<div class="select-row">
<select id="option" name="option">
<option value="">Select your availability</option>
<?php if($row['From_Time_Option1'] != ''){ ?>
<option value="Option1">Availability Option#1</option>
<?php } ?>
<?php if($row['From_Time_Option2'] != ''){ ?>
<option value="Option2">Availability Option#2</option>
<?php } ?>
<?php if($row['From_Time_Option3'] != ''){ ?>
<option value="Option3">Availability Option#3</option>
<?php } ?>
</select>
</div>

</div>

</div>

</div>

<?php if($row['From_Time_Option1'] == '' || $row['From_Time_Option2'] == '' || $row['From_Time_Option3'] == '' ){ ?>
 <div class="col-sm-12">
<h4>Looks like you haven't set up your availability yet. <br>Please click <a href="<?php echo BASE_PATH; ?>/participant/account/settings/availability/">here</a> to set up your dates of avavailability.</h4>
 </div>
 <?php } ?>

 <div class="col-sm-12">

<div class="row-time">

<div class="the-time">

<h4 id="notimeset"></h4>

<h4 id="based">Based on your availability you are available on&nbsp;</h4> 
<h4 id="date"></h4>
<h4 id="at">&nbsp;at&nbsp;</h4>
<div id="from"></div>

<h4 id="thetimeset-to">&nbsp;and&nbsp;</h4> 

<div id="to"></div>




</div>
</div>
</div>





<div id="wheretomeet">

    <div class="col-lg-12">
      <h4>Location:</h4>




      
  
<div id="location_option1">   
  <input type="hidden" name="location_option1" id="location_option1" value="<?php echo $row['Location_Option1'];?>" />
  <iframe width="100%" height="250" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $row['Location_Option1'];?>&key=AIzaSyDWVAsb7TmD-8_yRqe7jBIMrAcGFwHg06M"></iframe> 

</div>


<div id="location_option2">   
<input type="hidden" name="location_option2" id="location_option2" value="<?php echo $row['Location_Option2'];?>" />
<iframe width="100%" height="250" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $row['Location_Option2'];?>&key=AIzaSyDWVAsb7TmD-8_yRqe7jBIMrAcGFwHg06M"></iframe> 

</div>

<div id="location_option3">   
<input type="hidden" name="location_option3" id="location_option3" value="<?php echo $row['Location_Option3'];?>" />  
<iframe width="100%" height="250" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $row['Location_Option3'];?>&key=AIzaSyDWVAsb7TmD-8_yRqe7jBIMrAcGFwHg06M"></iframe> 

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




