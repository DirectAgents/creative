<?php
session_start();
require_once '../../../../base_path.php';
require_once '../../../../class.participant.php';
require_once '../../../../class.startup.php';
require_once '../../../../config.php';
require_once '../../../../config.inc.php';



$participant_home = new PARTICIPANT();
if($participant_home->is_logged_in())
{
  $participant_home->logout();
}
$startup_home = new STARTUP();
if(!$startup_home->is_logged_in())
{
  $startup_home->redirect('../../../../login');
}




$stmt = $startup_home->runQuery("SELECT * FROM tbl_nda_draft WHERE startupID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['startupSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);




$nda = mysqli_query($connecDB,"SELECT * FROM tbl_nda_draft WHERE startupID='".$_SESSION['startupSession']."' AND status = 'draft' ");
$rownda = mysqli_fetch_array($nda);

 






?>



<!DOCTYPE html>
<html lang="en" id="features" class="tablet mobile">
    
    <head>



<?php include("../../../header.php"); ?>



 



<script type='text/javascript'>//<![CDATA[

jQuery( document ).ready(function( $ ) {

$( "#tabs-1" ).load( "index.php" );

    $(".drafted-nda").click(function() {  

      
      
      window.location.replace( "" );
       
    });

   $(".pending-nda").click(function() {  


      window.location.replace( "../pending-nda/" );

     });

    $(".signed-nda").click(function() {  

       window.location.replace( "../signed-nda/" );

    });

     


});//]]> 





</script>


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







        
    </head>
    
    <body>

<!--TopNav-->
         <header id="main-header" class='transparent'>
  <div class="inner-col">
   


<?php include("../../../../nav.php"); ?>

   
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


<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">




   <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab" tabindex="-1" aria-controls="tabs-1" aria-labelledby="ui-id-1" aria-selected="false" aria-expanded="false"><a href="#tabs-1" class="drafted-nda ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-1">Draft NDA</a></li>
   
   <li class="ui-state-default ui-corner-top" role="tab" tabindex="0" aria-controls="tabs-2" aria-labelledby="ui-id-2" aria-selected="true" aria-expanded="true"><a href="#tabs-2" class="pending-nda ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-2">Pending NDA</a></li>
   
   <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a href="#tabs-3" class="signed-nda ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-3">Signed NDA</a></li>

  </ul>








<div id="white-container">




<!-- Main -->






    <div id="white-container-account">
      





 <?php
//include db configuration file




//MySQL query
//$Result = mysql_query("SELECT * FROM tbl_startup_project WHERE startupID = '".$_SESSION['startupSession']."' ORDER BY id DESC ");

$sql=mysqli_query($connecDB,"SELECT * FROM tbl_nda_draft WHERE startupID = '".$_SESSION['startupSession']."' AND status = 'draft' ORDER BY id DESC ");
//$result=mysql_query($sql);
//$row=mysql_fetch_array($result);

  //if username exists
if(mysqli_num_rows($sql) == 0)
{
  //echo "asdf";

echo '
<div class="row">
    <div class="col-md-12">
<div class="empty-projects">No NDAs\' drafted yet</div>
  <div class="create-one-here-box">
      <div class="create-one">
 <p>&nbsp;</p>
       

       </div> 
       <p>&nbsp;</p>
  </div>
</div>

</div>
</div>';

}else{

//get all records from add_delete_record table
while($row2 = mysqli_fetch_array($sql))
{ 


date_default_timezone_set('America/New_York');

$date = date_create($row2['participant_sig_date']);


$Project = mysqli_query($connecDB,"SELECT * FROM tbl_startup_project WHERE startupID='".$_SESSION['startupSession']."' AND ProjectID = '".$row2['ProjectID']."' ");
$rowproject = mysqli_fetch_array($Project);


$random = rand(5, 20000);


  ?>


<!-- Delete a Project -->

<div id="slide-delete-<?php echo $row2['ProjectID']; ?>" class="well slide-delete">
  <div class="result-delete">
  <div id="result-delete">Successfully Deleted!</div>
  </div>
<h4>Are you sure you want to delete this idea?</h4>
<input type="hidden" name="projectid<?php echo $row2['ProjectID']; ?>" id="projectid" value="<?php echo $row2['ProjectID']; ?>"/>
<div class="popupoverlay-btn">
  <div class="cancel-delete">
    <button class="slide-delete-<?php echo $row2['ProjectID']; ?>_close cancel">Cancel</button>
    <button class="delete<?php echo $row2['ProjectID']; ?> btn-delete">Yes</button>
</div>

<div class="popupoverlay-btn">
  <div class="close-delete">
    <button class="slide-delete-<?php echo $row2['ProjectID']; ?>_close cancel">Close</button>
</div>
</div>

</div>
</div>

<!-- End Delete a Project -->







<script>


$(document).ready(function(){


    $('#slide-delete-'+<?php echo $row2['ProjectID']; ?>).popup({
        focusdelay: 400,
        outline: true,
        vertical: 'top'
    });





    

   $(".delete"+<?php echo $row2['ProjectID']; ?>).click(function() {  


 //get input field values
        
        var projectid = $('input[name=projectid'+<?php echo $row2['ProjectID']; ?>).val();

       //alert(projectid);
       
               //var category = $("select[name='category']").val();


        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        var proceed = true;

        
           
      
         
        
        //everything looks good! proceed...
        if(proceed) 
        {

            
            $(".result-delete").show();
            $("#result-delete").hide().slideDown();
            $(".cancel-delete").hide();
            $(".close-delete").show();
         
            $( ".processing" ).show();
            //data to be sent to server
            post_data = {'projectid':projectid};
           
            //Ajax post data to server
            $.post('drafted-nda/nda_delete.php', post_data, function(response){  
            
            


                //load json data from server and output message     
        if(response.type == 'error')
        {
          output = '<div class="errorXYZ">'+response.text+'</div>';
        }else{
          
            //alert(text);
                
            output = '<div class="success">'+response.text+'</div>';

          
         
          

          //reset values in all input fields
          $('#contact_form input').val(''); 
          $('#contact_form textarea').val(''); 
        }
        
       
        
             }, 'json');
      
        }

});

});   
  

</script>


<div class="surveys-list">

<div class="survey-info-container">

<div class="row">
   


    <div class="col-md-12">


                  <div class="survey-header">
                    <!--<div class="account-project-name">
                      Project Name
                    </div>-->
                    <div class="edit-delete">
                      <a href="<?php echo BASE_PATH; ?>/startup/idea/nda/edit/?id=<?php echo $row2['ProjectID']; ?>">
                  <i class="icon icon-pencil"></i> Edit</a>&nbsp;&nbsp;&nbsp;| &nbsp;
                  <a href="<?php echo BASE_PATH; ?>/nda/pdf/nda-draft-pdf-startup.php?id=<?php echo $row2['ProjectID']; ?>" role="button" target="_blank">
                      <i class="icon icon-download3"></i> Download as PDF</a>&nbsp;&nbsp;&nbsp;| &nbsp;
                  <a href="#" role="button" class="slide-delete-<?php echo $row2['ProjectID']; ?>_open">
                      <i class="icon icon-bin"></i>Delete</a>
                    
                    </div>  
                   
                  </div>

                  


                  <div class="survey-name" ng-bind="(survey.name)"><?php echo $rowproject['Name']; ?></div>
                  <div class="survey-metadata">
                    <div class="item ">
                      <div class="label">Created:</div>
                      <div class="value" ng-bind="(survey.date | date:'MM/dd/yyyy')"><?php 

$date = new DateTime($rownda['startup_sig_date']);
$thedate =  $date->format('m/d/Y');

                      echo $thedate; 


                       ?></div>
                    </div>
                    <div class="item date">
                      <div class="label">Updated:</div>
                      <div class="value">
                       <span ng-if="!survey.running &amp;&amp; !survey.finalized &amp;&amp; !survey.waitingForApproval" class="draft">
                 <?php
if($rownda['Updated'] != '0000-00-00'){

$date = new DateTime($rownda['Updated']);
$thedate =  $date->format('m/d/Y');

                echo $thedate; 

}else{
  echo 'Not updated yet';
}

                 ?>


                        </span>
                      </div>
                    </div>
                  
                    </div>
                    <div class="clearer"></div>
                  </div>
                  <div class="survey-actions">
                  
                <!--
                <div class="status_request">Status: 

                  Project is <?php echo $row2['ProjectStatus']; ?>
                
                    

                  </div>-->

           

                  
                    

                    </div>
                  </div>
               


  
    
   </div>
</div>


<?php 

}

}



?>





    

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

      <div class="clearer"></div>


  

      <?php include("../../../../footer.php"); ?>

    </div>

    <div class="clearer"></div>

  </div>
  
  </div>

  </div>

        <!--/.fluid-container-->
        <script src="<?php echo BASE_PATH; ?>/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_PATH; ?>/assets/scripts.js"></script>








        
    </body>

</html>