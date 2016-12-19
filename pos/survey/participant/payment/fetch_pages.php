<?php 

session_start();
include("../../config.php"); //include config file
require_once '../../class.startup.php';

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

$( "#payment-received" ).load( "payment-received.php" );

    $(".payment-received").click(function() {  

      //$( "#tabs-1" ).load( "send-payment.php" );
      $( "#payment-received" ).load( "payment-received.php" );
      
    });

    $(".refund-requests").click(function() {  

      $( "#refund-requests" ).load( "refund-requests.php" );

    });


    $(".bankaccount").click(function() {  

      $( "#bankaccount" ).load( "bankaccount.php" );

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
    <li><a href="#payment-received" class="payment-received">Payment Received</a></li>
    <li>&nbsp;</li>
    <li><a href="#refund-requests" class="refund-requests">Refund Requests</a></li>
    <li>&nbsp;</li>
    <li><a href="#bankaccount" class="bankaccount">Bank Account</a></li>
   
  </ul>  





<div id="white-container">

<div id="payment-received" class="tabContent" > </div>

<div id="refund-requests" class="tabContent" ></div>

<div id="bankaccount" class="tabContent" ></div>





  










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