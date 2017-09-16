<?php 

session_start();
include("../../config.php"); //include config file
require_once '../../class.participant.php';


$participant_home = new PARTICIPANT();

if(!$participant_home->is_logged_in())
{
  $participant_home->redirect('../login');
}


$stmt = $participant_home->runQuery("SELECT * FROM tbl_participant WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['participantSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);



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



if(p == 'bankaccount'){
$('.bankaccount').click();
$( "#bankaccount" ).load( "bankaccount.php" );
}


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
    <?php if($row['Payment_Method'] == 'Bank'){ ?>
    <li><a href="#refund-requests" class="refund-requests">Refund Requests</a>
    <?php } ?>

 <?php

$result_count = mysqli_query($connecDB,"SELECT refundrequest,participant_id,id, COUNT(DISTINCT id) AS count FROM wepay WHERE refundrequest = 'yes' AND participant_id = '".$_SESSION['participantSession']."' GROUP BY id");
$row_count = mysqli_fetch_assoc($result_count);
$count = $row_count['count'];

if($count > 0 ){
echo ' <div class="viewed-bubble">';
echo $count;
echo '</div>';
}
?>



    </li>
    <li>&nbsp;</li>
    <?php if($row['Payment_Method'] == 'Bank'){ ?>
    <li><a href="#bankaccount" class="bankaccount">Bank Account</a></li>
    <?php } ?>
   
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