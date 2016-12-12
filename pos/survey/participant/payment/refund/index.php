<?php
session_start();
require_once '../../../base_path.php';

include("../../../config.php"); //include config file
include("../../..//config.inc.php");
require_once '../../../class.startup.php';
require_once '../../../class.participant.php';



$startup_home = new STARTUP();

if($startup_home->is_logged_in())
{
  $startup_home->logout();
}





$participant_home  = new PARTICIPANT();

if(!$participant_home ->is_logged_in())
{
  $participant_home ->redirect('../../login');
}




$stmt = $participant_home->runQuery("SELECT * FROM tbl_participant WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['participantSession']));
$row_participant = $stmt->fetch(PDO::FETCH_ASSOC);




?>

<!DOCTYPE html>
<html lang="en" id="features" class="tablet mobile">
    
    <head>



<?php include("../../header.php"); ?>


       
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/jquery.form.js"></script>

<script type="text/javascript" >



 $(document).ready(function() { 

     

$(".btn-request-refund").click(function() { 

        


var id       = $('input[name=id]').val();
var refundreason = $("textarea[name='refundreason']").val();



$.ajax({
    url: 'accept-refund.php?id='+id,
    cache: false,
    success: function(response) {
        var success = $(response).filter('.response');
       
        //alert("asdfasf"); // returns [object Object]
        
         $("#result").hide().html(success).slideDown();
            
    }
});

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


 
      
      <div id="dashboardSurveyTargetingContainerLogic">


<div id="white-container" style="padding:1em 1.4em">

      
   <div class="col-lg-12">     

        <h2 class="no-mobile">
         Request Refund
        </h2>
</div>





<div class="col-lg-12">  

 

<section data-group="payment" style="">
    
      <div class="note notforheader mobile-block">
        

<?php

$sql=mysqli_query($connecDB,"SELECT * FROM wepay WHERE participant_id = '".$_SESSION['participantSession']."' AND id = '".$_GET['id']."' ORDER BY order_by DESC ");

$row=mysqli_fetch_array($sql);





?>

          <h2><?php echo "$"; echo $row['total']; ?></h2>
        
        
      </div>
    

</div>



<div class="col-lg-12">  

 <h3>Refund Reason</h3>

</div>


<div class="col-lg-12">  



  <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>"/>


                <div class="screening-description">
                 <?php echo $row['refundreason']; ?>
                </div>
               
                


               
             





<input type="submit" class="btn btn-request-refund" value="Accept Refund"/>
    <p>&nbsp;</p>
    <div id="result"></div>
    


</div>

</div>



  










  




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


  </div>
  <?php include("../../../footer.php"); ?>
  </div>

      

    </div>

    <div class="clearer"></div>

  

  </div>

        <!--/.fluid-container-->
        <script src="<?php echo BASE_PATH; ?>/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_PATH; ?>/assets/scripts.js"></script>






        
    </body>

</html>