<?php


header("Location:meetings/");
exit();



require_once '../base_path.php';



if(isset($_SESSION['p'])){

$sql_project="SELECT * FROM tbl_researcher_project WHERE ProjectID = '".$_SESSION['p']."'";
$result_project=mysql_query($sql_project);


$sql_project = mysql_query("SELECT * FROM tbl_researcher_project WHERE ProjectID = '".$_SESSION['p']."'");
$row_project = mysql_fetch_array($sql_project);

header("Location:../projects/".$row_project['Category']."/?id=".$row_project['ProjectID']."");

}



$stmt = $participant_home->runQuery("SELECT * FROM tbl_participant WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['participantSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);








?>

<!DOCTYPE html>
<html lang="en" id="features" class="tablet mobile">
    
    <head>



<?php include("header.php"); ?>

<script>

/**Create Project**/

$(document).ready(function(){


  

 $(".go").click(function() {  
//alert("aads"); 

 //get input field values
        
        var projectname = $('input[name=projectname').val();
       
       
        
        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        var proceed = true;

          if(projectname==""){ 
             output = '<div style="text-align:center;font-size:18px; padding:10px; width:95.5%; background:#c31e23; color:#fff; margin-bottom:15px;">Please enter a name for your Project!</div>';
            $("#result").hide().html(output).slideDown();
            proceed = false;
        }
      
      
         

        //everything looks good! proceed...
        if(proceed) 
        {


          $( ".processing" ).show();
            //data to be sent to server
            post_data = {'projectname':projectname};
            
            //Ajax post data to server
            $.post('projectcreate.php', post_data, function(response){  
              

                //load json data from server and output message     
        if(response.type == 'error')
        {
          output = '<div class="errorXYZ">'+response.text+'</div>';
        }else{
          
            //alert(text);
                
            window.location.href = "create/step1.php?id="+response.text;
            //output = '<div class="success">'+response.text+'</div>';

          
          //reset values in all input fields
          $('#contact_form input').val(''); 
          $('#contact_form textarea').val(''); 
        }
        
        $("#result").hide().html(output).slideDown();
            }, 'json');
      
        }

});


 

});

</script>
   



<link rel="stylesheet" href="<?php echo BASE_PATH; ?>/researcher/project/css/jquery-ui.css">
  <script>
  $(function() {
    $( "#tabs" ).tabs({
      beforeLoad: function( event, ui ) {
        ui.jqXHR.fail(function() {
          ui.panel.html(
            "Couldn't load this tab. We'll try to fix this as soon as possible. " +
            "If this wouldn't be a demo." );
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


<?php include("../nav.php"); ?>

   
  </div>
</header>


<!--TopNav-->

  
        


    <!-- Main -->


  











<div class="container">

 <div id="create-project-box">
  
   
  


    <!-- Main -->
<div id="tabs">

 <ul>
    <li><a href="#tabs-1">Accepted</a></li>
    <li>&nbsp;</li>
    <li><a href="#tabs-2" class="pending">Pending</a></li>
  </ul>  



    <div id="white-container">


 <div id="tabs-1">








     


<?php
//include db configuration file




//MySQL query
//$Result = mysql_query("SELECT * FROM tbl_researcher_project WHERE researcherID = '".$_SESSION['researcherSession']."' ORDER BY id DESC ");










$sql="SELECT * FROM tbl_project_request WHERE userID = '".$_SESSION['participantSession']."' AND Accepted_to_Participate = 'Accepted' ORDER BY ProjectID DESC";
$result=mysql_query($sql);








//$row=mysql_fetch_array($result);

  //if username exists
if(mysql_num_rows($result)>0)
{
  //echo "asdf";


//get all records from add_delete_record table
while($row2 = mysql_fetch_array($result))
{ 


$sql3 = mysql_query("SELECT * FROM tbl_researcher_project WHERE ProjectID = '".$row2['ProjectID']."' ");
$row3 = mysql_fetch_array($sql3);


$date = date_create($row3['Date_Created']);

  ?>


<!-- Delete a Project -->

<div id="slide-delete-<?php echo $row2['ProjectID']; ?>" class="well slide-delete">
  <div class="result-delete">
  <div id="result-delete-<?php echo $row2['ProjectID']; ?>">Successfully Deleted!</div>
  </div>
<h4>Are you sure you want to withdraw to participate in this survey?</h4>
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
$(document).ready(function () {

    $('#slide-delete-'+<?php echo $row2['ProjectID']; ?>).popup({
        focusdelay: 400,
        outline: true,
        vertical: 'top'
    });

 


    $(".delete"+<?php echo $row2['ProjectID']; ?>).click(function() {  
//alert("aads"); 

 //get input field values
        
        var projectid = $('input[name=projectid'+<?php echo $row2['ProjectID']; ?>).val();
       
       
        
        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        var proceed = true;

        
      
      
         

        //everything looks good! proceed...
        if(proceed) 
        {


          $( ".processing" ).show();
            //data to be sent to server
            post_data = {'projectid':projectid};
            
            //Ajax post data to server
            $.post('project/projectdelete.php', post_data, function(response){  
              

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
        
        $(".cancel-delete").hide();
        $(".result-delete").show();
        $(".close-delete").show();
        $("#result-delete-"+response.text).hide().slideDown();
            }, 'json');
      
        }

});


});
</script>

<a href="<?php echo BASE_PATH; ?>/projects/<?php echo $row3['Category']; ?>/?id=<?php echo $row3['ProjectID']; ?>">

<div class="surveys-list">

<div class="survey-info-container">

<div class="row">
    <div class="col-md-2">

<?php 

$ProjectImage = mysql_query("SELECT * FROM tbl_researcher_project WHERE ProjectID = '".$row2['ProjectID']."'");
$rowprojectimage = mysql_fetch_array($ProjectImage);

if($rowprojectimage['project_image'] != '') { ?>

<img src="<?php echo BASE_PATH; ?>/projects/uploads/<?php echo $rowprojectimage['project_image']; ?>" width="100">

<?php }else{
echo '<img src="../projects/uploads/thumbnail.jpg" width="100">'; 
}


?></div>


    <div class="col-md-10">


                  <div class="survey-header">
                    <div class="account-project-name">
                      Project Name
                    </div>
                
                   
                  </div>
                  <div class="survey-name" ng-bind="(survey.name)"><?php echo $row3['Name']; ?></div>
                  <div class="survey-metadata">
                    <div class="item when">
                      <div class="label">When:</div>
                      <div class="value" ng-bind="(survey.date | date:'MM/dd/yyyy')"><?php echo date_format($date, 'm/d/Y'); ?></div>
                    </div>
                    <div class="where">
                      <div class="label">Where:</div>
                      <div class="value">
                       <span ng-if="!survey.running &amp;&amp; !survey.finalized &amp;&amp; !survey.waitingForApproval" class="draft">
                          <?php echo $row2['Location']; ?>
                        </span>
                      </div>
                    </div>
                    <div class="item status">
                      <div class="label">Status:</div>
                      <div class="value" ng-bind="(survey.numberOfCompletedSurveys)">
                        
<?php echo $row2['Accepted_to_Participate']; ?>


                      </div>
                    </div>
                    <div class="clearer"></div>
                  </div>
                  <div class="survey-actions">
                  
                      
                  <div class="action" tabindex="0" aria-hidden="false">
                        
                        <a href="#" role="button" class="slide-delete-<?php echo $row2['ProjectID']; ?>_open">
                      <i class="icon-trash"></i>Withdraw from Participation</a>

                      </div>

                     
                    

                    </div>
                  </div>
               


  
    
   </div>
</div>

</div>

<?php 

}

}else{ ?>

<div class="row">
    <div class="col-md-12">
<div class="empty-projects">You don't participate in any projects</div>
  <div class="create-one-here-box">
      <div class="create-one">
        <a href="project/browse/"><button class="slide_open create-one-btn">Start Browsing Projects</button></a>
        <p>&nbsp;</p>
       </div> 
  </div>
</div>

</div>




<?php } ?>


  </div>



  <div id="tabs-2">



<?php
//include db configuration file




//MySQL query
//$Result = mysql_query("SELECT * FROM tbl_researcher_project WHERE researcherID = '".$_SESSION['researcherSession']."' ORDER BY id DESC ");










$sql="SELECT * FROM tbl_project_request WHERE userID = '".$_SESSION['participantSession']."' AND Accepted_to_Participate = 'Pending' ORDER BY ProjectID DESC";
$result=mysql_query($sql);








//$row=mysql_fetch_array($result);

  //if username exists
if(mysql_num_rows($result)>0)
{
  //echo "asdf";


//get all records from add_delete_record table
while($row4 = mysql_fetch_array($result))
{ 


$sql5 = mysql_query("SELECT * FROM tbl_researcher_project WHERE ProjectID = '".$row4['ProjectID']."' ");
$row5 = mysql_fetch_array($sql5);


$date = date_create($row5['Date_Created']);

  ?>


<!-- Delete a Project -->

<div id="slide-delete-<?php echo $row5['ProjectID']; ?>" class="well slide-delete">
  <div class="result-delete">
  <div id="result-delete-<?php echo $row5['ProjectID']; ?>">Successfully Deleted!</div>
  </div>
<h4>Are you sure you want to withdraw to participate in this survey?</h4>
<input type="hidden" name="projectid<?php echo $row5['ProjectID']; ?>" id="projectid" value="<?php echo $row5['ProjectID']; ?>"/>
<div class="popupoverlay-btn">
  <div class="cancel-delete">
    <button class="slide-delete-<?php echo $row5['ProjectID']; ?>_close cancel">Cancel</button>
    <button class="delete<?php echo $row5['ProjectID']; ?> btn-delete">Yes</button>
</div>

 <div class="close-delete-btn">
    <button class="slide-delete-<?php echo $row5['ProjectID']; ?>_close cancel">Close</button>
</div>

</div>
</div>

<!-- End Delete a Project -->



<!-- Start Accept a Project -->

<div id="slide-accept-<?php echo $row5['ProjectID']; ?>" class="well slide-accept">
<div class="result-accept">  
<div id="result-accept-<?php echo $row5['ProjectID']; ?>">Successfully Accepted!</div>
</div>
<h4>Are you sure you want to accept to participate in this survey?</h4>
<input type="hidden" name="projectid_accept<?php echo $row5['ProjectID']; ?>" id="projectid_accept" value="<?php echo $row5['ProjectID']; ?>"/>
<div class="popupoverlay-btn">
   <div class="cancel-accept-btn">
    <button class="slide-accept-<?php echo $row5['ProjectID']; ?>_close cancel">Cancel</button>
    <button class="accept<?php echo $row5['ProjectID']; ?> btn-delete">Accept</button>
</div>

 <div class="close-accept-btn">
    <button class="slide-accept-<?php echo $row5['ProjectID']; ?>_close cancel">Close</button>
</div>


</div>
</div>

<!-- End Accept a Project -->







<script>
$(document).ready(function () {

    $('#slide-delete-'+<?php echo $row5['ProjectID']; ?>).popup({
        focusdelay: 400,
        outline: true,
        vertical: 'top'
    });


    $('#slide-accept-'+<?php echo $row5['ProjectID']; ?>).popup({
        focusdelay: 400,
        outline: true,
        vertical: 'top'
    });



$(".close-accept-btn").click(function() {  
location.reload(); 
  });



    $(".delete"+<?php echo $row5['ProjectID']; ?>).click(function() {  
//alert("aads"); 

 //get input field values
        
        var projectid = $('input[name=projectid'+<?php echo $row5['ProjectID']; ?>).val();
       
       
        
        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        var proceed = true;

        
      
      
         

        //everything looks good! proceed...
        if(proceed) 
        {


          $( ".processing" ).show();
            //data to be sent to server
            post_data = {'projectid':projectid};
            
            //Ajax post data to server
            $.post('project/projectdelete.php', post_data, function(response){  
              

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
        
  

        $(".cancel-delete-btn").hide();
        $(".result-delete").show();
        $(".close-accept-btn").show();
        $("#result-delete-"+response.text).hide().slideDown();
            }, 'json');  
      
        }

});





$(".accept"+<?php echo $row5['ProjectID']; ?>).click(function() {  
//alert("aads"); 

 //get input field values
        
        var projectid_accept = $('input[name=projectid_accept'+<?php echo $row5['ProjectID']; ?>).val();
       
       
        
        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        var proceed = true;

        
      
      
         

        //everything looks good! proceed...
        if(proceed) 
        {


          $( ".processing" ).show();
            //data to be sent to server
            post_data = {'projectid_accept':projectid_accept};
            
            //Ajax post data to server
            $.post('project/projectaccept.php', post_data, function(response){  
              

                //load json data from server and output message     
        if(response.type == 'error')
        {
          output = '<div class="errorXYZ">'+response.text+'</div>';
        }else{
          
            //alert(text);
            //location.reload();    
            output = '<div class="success">'+response.text+'</div>';

          
          //reset values in all input fields
          $('#contact_form input').val(''); 
          $('#contact_form textarea').val(''); 
        }

      
        
        $(".cancel-accept-btn").hide();
        $(".result-accept").show();
        $(".close-accept-btn").show();
        $("#result-accept-"+response.text).hide().slideDown();
            }, 'json');
      
        }

});


  
});
</script>

<a href="<?php echo BASE_PATH; ?>/projects/<?php echo $row5['Category']; ?>/?id=<?php echo $row5['ProjectID']; ?>">

<div class="surveys-list">

<div class="survey-info-container">

<div class="row">
    <div class="col-md-2">

<?php 

$ProjectImage = mysql_query("SELECT * FROM tbl_researcher_project WHERE ProjectID = '".$row5['ProjectID']."'");
$rowprojectimage = mysql_fetch_array($ProjectImage);

if($rowprojectimage['project_image'] != '') { ?>

<img src="<?php echo BASE_PATH; ?>/projects/uploads/<?php echo $rowprojectimage['project_image']; ?>" width="100">

<?php }else{
echo '<img src="../projects/uploads/thumbnail.jpg" width="100">'; 
}


?></div>


    <div class="col-md-10">


                  <div class="survey-header">
                    <div class="account-project-name">
                      Project Name
                    </div>
                
                   
                  </div>
                  <div class="survey-name" ng-bind="(survey.name)"><?php echo $row5['Name']; ?></div>
                  <div class="survey-metadata">
                    <div class="item when">
                      <div class="label">When:</div>
                      <div class="value" ng-bind="(survey.date | date:'MM/dd/yyyy')"><?php echo date_format($date, 'm/d/Y'); ?></div>
                    </div>
                    <div class="where">
                      <div class="label">Where:</div>
                      <div class="value">
                       <span ng-if="!survey.running &amp;&amp; !survey.finalized &amp;&amp; !survey.waitingForApproval" class="draft">
                          <?php echo $row4['Location']; ?>
                        </span>
                      </div>
                    </div>
                    <div class="item status">
                      <div class="label">Status:</div>
                      <div class="value" ng-bind="(survey.numberOfCompletedSurveys)">
                        
<?php echo $row4['Accepted_to_Participate']; ?>


                      </div>
                    </div>
                    <div class="clearer"></div>
                  </div>
                  <div class="survey-actions">
                  
                      
                  <div class="action" tabindex="0" aria-hidden="false">
                        
                        <a href="#" role="button" class="slide-delete-<?php echo $row5['ProjectID']; ?>_open">
                      <i class="icon-trash"></i>Withdraw from Participation</a>

                     <?php if($row4['Requested_By'] == 'Researcher'){ ?>
                     &nbsp; | &nbsp; 
                     <a href="#" role="button" class="slide-accept-<?php echo $row5['ProjectID']; ?>_open">
                      <i class="icon-trash"></i>Accept to Participate</a>
                     <?php } ?> 

                      </div>

                     
                    

                    </div>
                  </div>
               


  
    
   </div>
</div>

</div>

<?php 

}

}else{ ?>

<div class="row">
    <div class="col-md-12">
<div class="empty-projects">You don't have any pending projects</div>
  <div class="create-one-here-box">
      <div class="create-one">
        <a href="project/browse/"><button class="slide_open create-one-btn">Start Browsing Projects</button></a>
        <p>&nbsp;</p>
       </div> 
  </div>
</div>

</div>




<?php }

//close db connection
mysql_close($connecDB);
?>


  </div>


</div>

</div>





       
        





     

          
      </div>

    



            


          </div>


  
</div>
      


 
</div>
  

  </a>
  

  </div>
<!--Footer-->
<?php include("../footer.php"); ?>
<!--Footer-->



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
