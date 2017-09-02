<?php 

session_start();
include("../../../config.php"); //include config file
require_once '../../../class.admin.php';


$admin_home = new ADMIN();

if(!$admin_home->is_logged_in())
{
  $admin_home->redirect('../../../admin/');
}


$stmt = $admin_home->runQuery("SELECT * FROM tbl_admin WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['adminSession']));
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




$( "#homeless" ).load( "homeless.php" );






    $(".homeless").click(function() {  

      //$( "#tabs-1" ).load( "send-payment.php" );
      $( "#homeless" ).load( "homeless.php" );
      
    });

    $(".homeless-add").click(function() {  

      $( "#homeless-add" ).load( "homeless-add.php" );

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
    <li><a href="#homeless" class="homeless">Homeless</a></li>
   
   
   
    <li>&nbsp;</li>
   
    <li><a href="#homeless-add" class="homeless-add">Add Homeless</a></li>
  
   
  </ul>  





<div id="white-container">

<div id="homeless" class="tabContent" > </div>

<!--<div id="refund-requests" class="tabContent" ></div>-->

<div id="homeless-add" class="tabContent" ></div>





  










</div>

</div>








<a href="#" style="display:none" id="requestbutton" class="initialism slide_open btn btn-success"></a>







