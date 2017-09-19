<?php
session_start();

require_once '../base_path.php';

require_once '../class.startup.php';
require_once '../class.participant.php';
include_once("../config.php");



$participant_home = new PARTICIPANT();

if($participant_home->is_logged_in())
{
  $participant_home->logout();
}



$startup_home = new STARTUP();

if(!$startup_home->is_logged_in())
{
  $startup_home->redirect('login');
}



$stmt = $startup_home->runQuery("SELECT * FROM tbl_startup WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['startupSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);




$Project = mysqli_query($connecDB,"SELECT * FROM tbl_startup_project WHERE startupID='".$_SESSION['startupSession']."' AND FinishedProcess = 'N'");
$rowproject = mysqli_fetch_array($Project);

$meetupchoice=explode(',',$rowproject['Meetupchoice']);
$age=explode(',',$rowproject['Age']);
$gender=explode(',',$rowproject['Gender']);
$minheight=explode(',',$rowproject['MinHeight']);
$maxheight=explode(',',$rowproject['MaxHeight']);
$city=explode(',',$rowproject['City']);
$status=explode(',',$rowproject['Status']);
$ethnicity=explode(',',$rowproject['Ethnicity']);
$smoke=explode(',',$rowproject['Smoke']);
$drink=explode(',',$rowproject['Drink']);
$diet=explode(',',$rowproject['Diet']);
$religion=explode(',',$rowproject['Religion']);
$education=explode(',',$rowproject['Education']);
$job=explode(',',$rowproject['Job']);






?>



       

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
   

        

    <!-- Main -->


  

<!-- Start Create a Project -->
<!--
<div id="slide" class="well">
  <div id="result"></div>
<h4>Name your project and hit go!</h4>
<input type="text" name="projectname" id="projectname" placeholder="Untitled Project"/>
<div class="popupoverlay-btn">
    <button class="slide_close btn-default">Cancel</button>
    <button class="go btn-default">Go</button>
</div>
</div>

<!-- End Create a Project -->












<?php
//include db configuration file




//MySQL query
//$Result = mysql_query("SELECT * FROM tbl_startup_project WHERE startupID = '".$_SESSION['startupSession']."' ORDER BY id DESC ");

$sql=mysqli_query($connecDB,"SELECT * FROM tbl_startup_project WHERE startupID = '".$_SESSION['startupSession']."' AND FinishedProcess = 'N' ORDER BY id DESC ");
//$result=mysql_query($sql);
//$row=mysql_fetch_array($result);

  //if username exists
if(mysqli_num_rows($sql) == 0)
{
  //echo "asdf";

echo '<div class="row">
    <div class="col-md-12">
<div class="empty-projects">You don\'t have any drafts.</div>
  <div class="create-one-here-box">
      <div class="create-one">
 <p>&nbsp;</p>
         <a href="'.BASE_PATH.'/entrepreneur/problem/create/step1.php?id='.rand(100, 100000).'" class="create-one-btn">List a Problem</a>

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

$date = date_create($row2['Date_Created']);

  ?>


<!-- Delete a Project -->

<div id="slide-delete-<?php echo $row2['ProjectID']; ?>" class="well slide-delete">
  <div class="result-delete">
  <div id="result-delete">Successfully Deleted!</div>
  </div>
<h4>Are you sure you want to delete this problem?</h4>
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



<!-- Modal HTML -->
    <div id="more-info-needed" class="modal fade">
    
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>-->
                    <h4 class="modal-title">Please enter the following</h4>
                </div>
                <div class="modal-body">
                 
      <div class="form">

                 <form class="form-signin" method="post">


 
   <div class="name-field col-md-12">
      <div class="form-group">
      <div class="label-birthday">Zip</div>
    <input type="text"  placeholder="Your Zip code *" pattern="[0-9]{5}" maxlength="5"  name="txtzip" id="txtzip" class="txtzip" oninvalid="this.setCustomValidity('Enter a valid Zip Code')" oninput="setCustomValidity('')" required/>
    </div>
  </div>

 

  </form>
</div>

                </div>
                <div class="modal-footer">
                    <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                    <button type="button" class="btn btn-blue-color submit">Submit</button>
                </div>
            </div>
        </div>
    </div>



<?php if(isset($_SESSION['fb_access_token_participant']) && $row['Zip'] == '' || isset($_SESSION['access_token']) && $row['Zip'] == ''){ ?>


<script>
$(document).ready(function () {

$('#more-info-needed').modal({
      backdrop: 'static'
    });





$(".submit").click(function() {  
//alert("aads"); 

 //get input field values

        var proceed = true;

        
        var zip = $('input[name=txtzip]').val();
       

        var zip_reg = /^\d{5}(?:[-\s]\d{4})?$/;

        if(!zip.match(zip_reg)) {

                $(".txtzip").css('border-color','red');  //change border color to red   
                proceed = false; //set do not proceed flag            
        }else{
                $(".txtzip").css('border-color','green');  //change border color to red 
                proceed = true; //set do not proceed flag       
        };  


        

        //everything looks good! proceed...
        if(proceed) 
        {
            $(".result-delete").show();
            $("#result-delete").hide().slideDown();
            $(".cancel-delete").hide();
            $(".close-delete").show();

          $( ".processing" ).show();
            //data to be sent to server
            post_data = {'zip':zip};
            
            //Ajax post data to server
            $.post('submitzip.php', post_data, function(response){  
            


                //load json data from server and output message     
        if(response.type == 'error')
        {
          output = '<div class="errorXYZ">'+response.text+'</div>';
        }else{
          
            //alert(text);
                
            //output = '<div class="success">'+response.text+'</div>';
            window.location.href = "index.php";
          
          //reset values in all input fields
          $('#contact_form input').val(''); 
          $('#contact_form textarea').val(''); 
        }
        
       
        
            }, 'json');
      
        }


 

});


});

</script>

<? } ?>






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
        
        var projectid = $('input[name=projectid'+<?php echo $row2['ProjectID']; ?>+']').val();
       
       
        
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
            $.post('idea/ideadelete.php', post_data, function(response){  
            


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
    <div class="col-md-2 idea-image">

<?php 

$ProjectImage = mysqli_query($connecDB,"SELECT * FROM tbl_startup_project WHERE startupID='".$_SESSION['startupSession']."' AND ProjectID = '".$row2['ProjectID']."'");
$rowprojectimage = mysqli_fetch_array($ProjectImage);

if($rowprojectimage['project_image'] != '') { ?>

<img src="<?php echo BASE_PATH; ?>/problem/uploads/<?php echo $rowprojectimage['project_image']; ?>" width="100">

<?php }else{
echo '<img src="../problem/uploads/thumbnail.jpg" width="100">'; 
}


?></div>


    <div class="col-md-10">


                  <div class="survey-header">
                   <!-- <div class="account-project-name">
                      Project Name
                    </div> -->
                    <div class="edit-delete">
                      <a href="<?php echo BASE_PATH; ?>/entrepreneur/problem/edit/step1.php?id=<?php echo $row2['ProjectID']; ?>">
                  <i class="icon icon-pencil"></i> Edit</a>&nbsp;&nbsp;&nbsp;| &nbsp;
                   <a href="#" role="button" class="slide-delete-<?php echo $row2['ProjectID']; ?>_open">
                      <i class="icon icon-bin"></i>Delete</a>
                    
                    </div>  
                   
                  </div>

                  


                  <div class="survey-name" ng-bind="(survey.name)"><?php echo $row2['Problem']; ?> (  <a href="#" alt="<?php if($row2['ProjectStatus'] == 'Public'){ ?>This problem is set to Public. This is visible to everyone. <?php } ?><?php if($row2['ProjectStatus'] == 'Private'){ ?>This problem is set to Private. Only you and people you invite to meet with can see it. <?php } ?>" class="tooltiptext"><i class="icon <?php if($row2['ProjectStatus'] == 'Public'){ ?>icon-unlocked<?php } ?> <?php if($row2['ProjectStatus'] == 'Private'){ ?>icon-lock <?php } ?>"></i></a>)</div>
                  <div class="survey-metadata">
                    <div class="item ">
                      <div class="label">Created</div>
                      <div class="value" ng-bind="(survey.date | date:'MM/dd/yyyy')"><?php echo date_format($date, 'M d, Y'); ?></div>
                    </div>
                    <div class="item date">
                      <div class="label">Category</div>
                      <div class="value">
                       <span ng-if="!survey.running &amp;&amp; !survey.finalized &amp;&amp; !survey.waitingForApproval" class="draft">
                          <?php $category = str_replace("-"," ",$row2['Category']); echo $category; ?>
                        </span>
                      </div>
                    </div>


                  



                    <div class="item date">
                      <div class="label">People participate to provide feedback</div>
                      <div class="value" ng-bind="(survey.numberOfCompletedSurveys)">
                        
<?php


$result_count = mysqli_query($connecDB,"SELECT ProjectID,userID, COUNT(DISTINCT userID) AS count FROM tbl_feedback_upcoming WHERE ProjectID = '".$row2['ProjectID']."'  GROUP BY ProjectID");
$row_count = mysqli_fetch_assoc($result_count);
$count = $row_count['count'];

if($count > 0 ){
echo "<a href=".BASE_PATH."/startup/idea/browse/participants/?id=".$row2['ProjectID'].">";
echo $count;
echo "</a>";
echo "&nbsp;&nbsp;";
echo "<a href=".BASE_PATH."/startup/idea/browse/participants/?id=".$row2['ProjectID'].">";
echo "(view participants)";
echo "</a>";
}else{
  echo "0";
}
?>



                      </div>
                    </div>
                    <div class="clearer"></div>
                  </div>
                  <div class="survey-actions">
                  
                <!--
                <div class="status_request">Status: 

                  Project is <?php echo $row2['ProjectStatus']; ?>
                
                    

                  </div>-->

                      
                  <div class="action" tabindex="0" aria-hidden="false">
                        <div class="btn-browse">
                        <a href="<?php echo BASE_PATH; ?>/startup/idea/browse/participants/new/?id=<?php echo $row2['ProjectID']; ?>">Browse New Participants</a>
                        </div>
                      </div>

                      <div class="action" ng-click="triggerPreview(survey)" ng-show="survey.surveyLength > 0" role="button" tabindex="0" aria-hidden="false">
                        <div class="btn-browse">
                       <a href="<?php echo BASE_PATH; ?>/ideas/s/<?php echo $row2['Category']; ?>/?id=<?php echo $row2['ProjectID']; ?>"> Preview </a>
                        </div>

                      </div>
                    

                    </div>
                  </div>
               


  
    
   </div>
</div>


<?php 

}

}



?>


                  


            


          </div>

   



   

    <div class="clearer"></div>

  </div>
 
 
  </div>

  </div>

        <!--/.fluid-container-->
        <script src="<?php echo BASE_PATH; ?>/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_PATH; ?>/assets/scripts.js"></script>





