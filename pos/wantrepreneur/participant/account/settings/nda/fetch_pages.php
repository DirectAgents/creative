<?php 

session_start();
include("../../../../config.php"); //include config file
require_once '../../../../class.startup.php';

?>

<!DOCTYPE html>
<html lang="en" id="features" class="tablet mobile">
    
    <head>








 <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/startup/project/css/jquery-ui.css">
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
$.noConflict();
jQuery( document ).ready(function( $ ) {

$( "#pending-nda" ).load( "pending-nda.php" );

    $(".pending-nda").click(function() {  

      //$( "#tabs-1" ).load( "send-payment.php" );
      $( "#pending-nda" ).load( "pending-nda.php" );
      
    });

    $(".signed-nda").click(function() {  

      $( "#signed-nda" ).load( "signed-nda.php" );

    });


    

   


});//]]> 





</script>


<style>

a.verify-badge img#verify-image-payment{display:none !important;}

</style>



 </head>
    
    <body>







<div id="tabs">

 <ul>
    <li><a href="#pending-nda" class="pending-nda">Pending</a></li>
    <li>&nbsp;</li>
    <li><a href="#signed-nda" class="signed-nda">Signed</a></li>
   
   
  </ul>  





<div id="white-container">

<div id="pending-nda" class="tabContent" > </div>

<div id="signed-nda" class="tabContent" ></div>





  










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
