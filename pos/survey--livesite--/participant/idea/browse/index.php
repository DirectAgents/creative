<?php
session_start();


require_once '../../../base_path.php';


require_once '../../../class.participant.php';
require_once '../../../class.startup.php';
require_once '../../../config.php';
require_once '../../../config.inc.php';


$startup_home = new STARTUP();

if($startup_home->is_logged_in())
{
  $startup_home->logout();
}



$participant_home = new PARTICIPANT();

if(!$participant_home->is_logged_in())
{
  $participant_home->redirect('../../login/');
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






?>

<!DOCTYPE html>
<html lang="en" id="features" class="tablet mobile">
    
    <head>



<?php include("../../header.php"); ?>




<script>
  $(function() {
    $( "#interests" ).autocomplete({
      source: 'search.php'
    });
  });
  </script>


<!--Browse Participants-->

<script type="text/javascript">
$(document).ready(function() {

  
  $("#results-no-results").hide();

  var track_click = 0; //track user click on "load more" button, righ now it is 0 click
  
  var total_pages = <?php echo $total_pages; ?>;
  $('#results').load("fetch_pages.php", {'page':track_click}, function(data) {

var $response=$(data);

var oneval = $response.filter('.page_result').text();


 if(oneval == ''){
    //alert("asdfa");
    $("#results-no-results").show();
    $(".load_more").hide();
  }
  track_click++;

  }); //initial data to load




  $(".load_more").click(function (e) { //user clicks on button
  
    $(this).hide(); //hide load more button on click
    $('.animation_image').show(); //show loading image

    if(track_click <= total_pages) //make sure user clicks are still less than total pages
    {
      
      //post page number and load returned data into result element
      $.post('fetch_pages.php',{'page': track_click}, function(data) {
      
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
        $(".load_more").hide();
        $(".load_more").attr("disabled", "disabled");
        $(".no-participating-projects").hide();
        
      }
     }
      
    });
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



            
<div id="white-container">
      <div id="dashboardSurveyTargetingContainerLogic">

  
<div id="results"></div>

<?php

$the_date = date('Y-m-d'); 
date_default_timezone_set('America/New_York'); 

?>

<?php if ($row['Age'] == '' && $row['Gender'] == '' && $row['Status'] == '' && $row['Ethnicity'] == '') { ?>

<div id="results-no-results">
  
<div class="no-participating-projects">
<div class="row">
    <div class="col-md-12">
<div class="empty-projects">Looks like your profile has not enough information. Let's change that.</div>
<p>&nbsp;</p>
<p class="center">To be able to qualify to participate to provide feedback on an idea. Please edit your profile.</p>
  <div class="create-one-here-box">
      <div class="get-notified">
       <a href="<?php echo BASE_PATH; ?>/participant/account/settings/">
        <div class="slide_open get-notified-btn">Edit Profile</div>
        </a>
        <p>&nbsp;</p>
       </div> 
  </div>
</div>
</div>
</div>

<?php }else{ ?>

<div id="results-no-results">
  
<div class="no-participating-projects">
<div class="row">
    <div class="col-md-12">
<div class="empty-projects">Sorry you don't qualify for any meetings yet</div>
<p>&nbsp;</p>
<p class="center">You will qualify based on the requirements set by the startup.</p>
  <div class="create-one-here-box">
      <div class="get-notified">
       <a href="<?php echo BASE_PATH; ?>/participant/account/settings/">
        <div class="slide_open get-notified-btn">Get notified when you qualify</div>
        </a>
        <p>&nbsp;</p>
       </div> 
  </div>
</div>
</div>
</div>
<?php } ?>

</div>


<div align="center">
<button class="load_more" id="load_more_button">load More</button>
<div class="animation_image" style="display:none;"><img src="../../../images/ajax-loader.gif"> Loading...</div>
</div>








<div class="clearer"></div>

       
        





     

          
      </div>

    

                    <div class="clearer"></div>


            


          </div>

      <div class="clearer"></div>


  

      

    </div>

    <div class="clearer"></div>

  </div>

  <!--Footer-->
<?php include("../../../footer.php"); ?>
<!--Footer-->

  </div>

  </div>


  

        <!--/.fluid-container-->
        <script src="<?php echo BASE_PATH; ?>/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_PATH; ?>/assets/scripts.js"></script>



<script>
$(document).ready(function () {

    $('#slide').popup({
        focusdelay: 400,
        outline: true,
        vertical: 'top'
    });

});
</script>


        
    </body>

</html>