<?php
session_start();
require_once '../../../base_path.php';


require_once '../../../class.participant.php';
require_once '../../../class.startup.php';
include_once("../../../config.php");
include("../../../config.inc.php");



$participant_home = new PARTICIPANT();

if($participant_home->is_logged_in())
{
  $participant_home->logout();
}



$startup_home = new STARTUP();

if(!$startup_home->is_logged_in())
{
  $startup_home->redirect('../../login.php');
}




$get_total_rows = 0;
$results = $mysqli->query("SELECT COUNT(*) FROM tbl_startup_project");
if($results){
$get_total_rows = $results->fetch_row(); 
}


//break total records into pages
$total_pages = ceil($get_total_rows[0]/$item_per_page); 


$stmt = $startup_home->runQuery("SELECT * FROM tbl_startup WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['startupSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);


$sql2 = mysqli_query($connecDB,"SELECT * FROM tbl_project_request  WHERE ProjectID = '".$_GET['id']."' AND startupID = '".$_SESSION['startupSession']."' ");
$row2 = mysqli_fetch_array($sql2);



$sql3 = mysqli_query($connecDB,"SELECT * FROM tbl_participant  WHERE userID = '".$row2['userID']."' ");
$row3 = mysqli_fetch_array($sql3);


?>



<!DOCTYPE html>
<html lang="en" id="features" class="tablet mobile">
    
    <head>



<?php include("../../header.php"); ?>



  



<script>
$(document).ready(function(){
 $(".save").click(function() { 
       //alert("asdf");
        var proceed = true;
        //simple validation at client's end
        //loop through each field and we simply change border color to red for invalid fields   
     
       
        if(proceed) //everything looks good! proceed...
        {
            //get input field values data to be sent to server
            post_data = {
                'projectid'     : $('input[name=projectid').val(),
                'participantid'     : $('input[name=participantid').val()
            };
 

            //alert(date);

            //Ajax post data to server
            $.post('pay.php', post_data, function(response){  
                if(response.type == 'error'){ //load json data from server and output message     
                    output = '<div class="error">'+response.text+'</div>';
                }else{
                    output = '<div class="success">'+response.text+'</div>';
                    //reset values in all input fields
                    $("#profile-form select[required=true]").val(''); 
                    $("#profile-form #contact_body").slideUp(); //hide form after success
                }
                $("#profile-form #profile_results").hide().html(output).slideDown();
            }, 'json');
        }
    });
 });
</script> 








<style>

a.verify-badge img#verify-image-payment{display:none !important;}

</style>






        
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


  


<div id="tabs">










<div id="white-container">




<!-- Main -->






    <div id="white-container-account">
      






    

      

       <form action="" id="contact-form" class="form-horizontal" method="post">

    
           
              <input type="hidden" name="participantid" id="participantid" value="<?php echo $row2['userID']; ?>">
              <input type="hidden" name="projectid" id="projectid" value="<?php echo $_GET['id']; ?>">
          

          </form>

   




  
   <iframe name="votar" style="display:none;"></iframe>
        
    <form class="ff" id="profile-form" name="edit profile" method="post" target="votar">
        
        

        <h2 class="no-mobile">
         Payment
        </h2>


        <fieldset>
          <span class="input">
            <label for="firstname">Date of meeting</label>
           
    <?php
$date = new DateTime($row2['Date_of_Meeting']);
$thedate =  $date->format('m/d/Y');
    ?>
             
      <input type="text" name="date" id="date" value="<?php echo $thedate; ?> @ <?php echo $row2['Final_Time'];  ?>" disabled>

 
               
           
          </span>

          </span>
        </fieldset>


        <fieldset>
          <span class="input">
            <label for="firstname">Place you met</label>
           
             <input type="text" name="date" id="date" value="<?php echo $row2['Location']; ?>" disabled>


          </span>
        </fieldset>

        

        
<div class="col-lg-12">



<?php
$sql4 = mysqli_query($connecDB,"SELECT * FROM tbl_startup_project  WHERE ProjectID = '".$_GET['id']."' AND startupID = '".$_SESSION['startupSession']."' ");
$row4 = mysqli_fetch_array($sql4);

?>
         <h4>You met for <?php echo $row4['Minutes']; ?> minutes and you owe <?php echo $row3['FirstName']; ?> $<?php echo $row4['Pay']; ?> </h4>


       

      </div>



        

       

  


        <div id="save">
              <input type="submit" class="save" value="Pay"/>

            </div>


   <div style="float:left; width:100%; margin-top:30px;">
 <div id="profile_results"></div>
</div>

      </form>




    

                    <div class="clearer"></div>


            


          </div>

      <div class="clearer"></div>


  

      

    </div>

    <div class="clearer"></div>







</div>



  










</div>

</div>








<a href="#" style="display:none" id="requestbutton" class="initialism slide_open btn btn-success"></a>





<!--
<div align="center">
<button class="load_more" id="load_more_button">load More</button>
<button class="load_more_pending" id="load_more_button">load More </button>
<div class="animation_image" style="display:none;"><img src="ajax-loader.gif"> Loading...</div>
</div>-->








<div class="clearer"></div>

       
        





     

          
    

    

                    <div class="clearer"></div>


              </div>
  <?php include("../../../footer.php"); ?>
  </div>


          </div>

      <div class="clearer"></div>


  

      

    </div>

    <div class="clearer"></div>



  </div>

        <!--/.fluid-container-->
        <script src="<?php echo BASE_PATH; ?>/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_PATH; ?>/assets/scripts.js"></script>



<input type="hidden" id='base_path' value="<?php echo BASE_PATH; ?>">






        
    </body>

</html>