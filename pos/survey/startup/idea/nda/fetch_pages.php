<?php 

session_start();

require_once '../../../base_path.php';

include("../../../config.php"); //include config file
require_once '../../../class.startup.php';
require_once '../../../class.participant.php';


$participant_home = new PARTICIPANT();

if($participant_home->is_logged_in())
{
  $participant_home->logout();
}



$startup_home = new STARTUP();

if(!$startup_home->is_logged_in())
{
  $startup_home->redirect('../../login');
}


$sqlnda = mysqli_query($connecDB,"SELECT * FROM tbl_nda_draft WHERE startupID='".$_SESSION['startupSession']."'");

$rownda = mysqli_fetch_array($sqlnda);


?>

<!DOCTYPE html>
<html lang="en" id="features" class="tablet mobile">
    
    <head>









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

<script type='text/javascript'>//<![CDATA[
//$.noConflict();
jQuery( document ).ready(function( $ ) {


function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}


var p = getParameterByName('p');

if(p == 'drafted-nda'){
$('.drafted-nda').click();   
$( "#drafted-nda" ).load( "drafted-nda/" );
}

if(p == 'signed-nda'){
$('.signed-nda').click();  
$( "#signed-nda" ).load( "signed-nda/" );
}

if(p == 'pending-nda'){
$('.pending-nda').click();
$( "#pending-nda" ).load( "pending-nda/" );
}



if(p != 'drafted-nda'){
//$( "#drafted-nda" ).load( "drafted-nda/" );

   
    

    $(".drafted-nda").click(function() {  
    
      //$( "#upcoming-meetings" ).load( "send-payment.php" );
      $( "#drafted-nda" ).load( "drafted-nda/");
      
      
    });

}


if(p != 'signed-nda'){
    $(".signed-nda").click(function() {  
     
      //$( "#upcoming-meetings" ).load( "send-payment.php" );
      $( "#signed-nda" ).load( "signed-nda/");
      
      
    });

}

if(p != 'pending-nda'){
    $(".pending-nda").click(function() {  

      $( "#pending-nda" ).load( "pending-nda/");
      

    });

}

});//]]> 





</script>

 </head>
    
    <body>







<div id="tabs">

 <ul>
  
    <li><a href="#drafted-nda" class="drafted-nda">Drafted NDA</a></li>

    <li>&nbsp;</li>
    <li><a href="#pending-nda" class="pending-nda">Pending NDA</a></li>
    <li>&nbsp;</li>
     <li><a href="#signed-nda" class="signed-nda">Signed NDA</a></li>
  </ul>  




<div id="white-container">




<div id="drafted-nda" class="tabContent" ></div>

<div id="signed-nda" class="tabContent" > </div>


<div id="pending-nda" class="tabContent" ></div>




  










</div>

</div>








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
