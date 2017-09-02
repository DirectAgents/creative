<?php 

session_start();
include("../../../config.php"); //include config file
require_once '../../../class.customer.php';


$customer_home = new CUSTOMER();

if(!$customer_home->is_logged_in())
{
  $customer_home->redirect('../../../login');
}


$stmt = $customer_home->runQuery("SELECT * FROM tbl_customer WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['customerSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);



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


if(p == 'new'){

$( "#schedulepickup" ).load( "request-new-pickup.php" );

}else{

$( "#schedulepickup" ).load( "schedulepickup.php" );

}



    $(".schedulepickup").click(function() {  

      //$( "#tabs-1" ).load( "send-payment.php" );
      $( "#schedulepickup" ).load( "schedulepickup.php" );
      
    });

    $(".pastpickup").click(function() {  

      $( "#pastpickup" ).load( "pastpickups.php" );

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
    <li><a href="#schedulepickup" class="schedulepickup">Schedule Pickup</a></li>
   
   
   
    <li>&nbsp;</li>
   
    <li><a href="#pastpickup" class="pastpickup">Past Pickups</a></li>
  
   
  </ul>  





<div id="white-container">

<div id="schedulepickup" class="tabContent" > </div>

<!--<div id="refund-requests" class="tabContent" ></div>-->

<div id="pastpickup" class="tabContent" ></div>





  










</div>

</div>








<a href="#" style="display:none" id="requestbutton" class="initialism slide_open btn btn-success"></a>







