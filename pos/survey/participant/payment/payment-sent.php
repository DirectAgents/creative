<?php
//include db configuration file

session_start();
include("../../config.php"); //include config file
require_once '../../class.researcher.php';

echo "2";

//MySQL query
//$Result = mysql_query("SELECT * FROM tbl_researcher_project WHERE researcherID = '".$_SESSION['researcherSession']."' ORDER BY id DESC ");

$sql="SELECT * FROM tbl_researcher_project WHERE researcherID = '".$_SESSION['researcherSession']."' ORDER BY id DESC ";
$result=mysql_query($sql);
//$row=mysql_fetch_array($result);

  //if username exists
if(mysql_num_rows($result)>0)
{
  //echo "asdf";


//get all records from add_delete_record table
while($row2 = mysql_fetch_array($result))
{ 



$date = date_create($row2['Date_Created']);

  ?>




<div class="popup" id="popup2-<?php echo $row2['ProjectID']; ?>">


<div class="result-delete">
  <div id="result-delete<?php echo $row2['ProjectID']; ?>">Successfully Deleted!</div>
  </div>
<h4>Are you sure you want to delete this project?</h4>
<input type="text" name="projectid<?php echo $row2['ProjectID']; ?>" id="projectid" value="<?php echo $row2['ProjectID']; ?>"/>
<div class="popupoverlay-btn">
  <div class="cancel-delete">
    <button class="slide-delete-sent<?php echo $row2['ProjectID']; ?>_close cancel" onclick="hide('popup2-<?php echo $row2['ProjectID']; ?>')">Cancel</button>
    <button class="delete-sent<?php echo $row2['ProjectID']; ?> btn-delete">Yes</button>
</div>

<div class="popupoverlay-btn">
  <div class="close-delete">
    <button class="slide-delete-sent<?php echo $row2['ProjectID']; ?>_close cancel" onclick="hide('popup2-<?php echo $row2['ProjectID']; ?>')">Close</button>
</div>
</div>

</div>




</div>






<script>
$(document).ready(function () {

    $('#slide-delete-sent'+<?php echo $row2['ProjectID']; ?>).popup({
        focusdelay: 400,
        outline: true,
        vertical: 'top'
    });



    $(".delete-sent"+<?php echo $row2['ProjectID']; ?>).click(function() {  
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
        
        $(".cancel-delete-sent").hide();
        $(".result-delete-sent").show();
        $(".close-delete-sent").show();
        $("#result-delete-sent"+response.text).hide().slideDown();
            }, 'json');
      
        }

});
  
});
</script>


<div class="surveys-list">

<div class="survey-info-container">

<div class="row">
    <div class="col-md-2">

<?php 

$ProjectImage = mysql_query("SELECT * FROM tbl_researcher_project WHERE researcherID='".$_SESSION['researcherSession']."' AND ProjectID = '".$row2['ProjectID']."'");
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
                    <div class="edit-delete">
                      <a href="<?php echo BASE_PATH; ?>/researcher/project/edit/step1.php?id=<?php echo $row2['ProjectID']; ?>">
                        <i class="icon-edit"></i>Edit</a>&nbsp;&nbsp;&nbsp;| &nbsp;
                   <a href="#" onclick="show('popup2-<?php echo $row2['ProjectID']; ?>')">
                      <i class="icon-trash"></i>Delete</a>
                    
                    </div>  
                   
                  </div>
                  <div class="survey-name" ng-bind="(survey.name)"><?php echo $row2['Name']; ?></div>
                  <div class="survey-metadata">
                    <div class="item ">
                      <div class="label">Created:</div>
                      <div class="value" ng-bind="(survey.date | date:'MM/dd/yyyy')"><?php echo date_format($date, 'm/d/Y'); ?></div>
                    </div>
                    <div class="item date">
                      <div class="label">status:</div>
                      <div class="value">
                       <span ng-if="!survey.running &amp;&amp; !survey.finalized &amp;&amp; !survey.waitingForApproval" class="draft">
                          <?php echo $row2['ProjectStatus']; ?>
                        </span>
                      </div>
                    </div>
                    <div class="item date">
                      <div class="label">Participants:</div>
                      <div class="value" ng-bind="(survey.numberOfCompletedSurveys)">
                        
<?php


$result_count = mysql_query("SELECT ProjectID,userID, COUNT(DISTINCT userID) AS count FROM tbl_project_request WHERE ProjectID = '".$row2['ProjectID']."' AND Not_Qualified_Anymore = '' GROUP BY ProjectID");
$row_count = mysql_fetch_assoc($result_count);
$count = $row_count['count'];

if($count > 0 ){
echo "<a href=project/browse/?id=".$row2['ProjectID'].">";
echo $count;
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
                  
                      
                  <div class="action" tabindex="0" aria-hidden="false">
                        
                        <a href="project/browse/participants/new/?id=<?php echo $row2['ProjectID']; ?>">Browse New Participants</a>

                      </div>

                      <div class="action" ng-click="triggerPreview(survey)" ng-show="survey.surveyLength > 0" role="button" tabindex="0" aria-hidden="false">
                        
                       <a href="../projects/<?php echo $row2['Category']; ?>/?id=<?php echo $row2['ProjectID']; ?>"> Preview </a>

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
<div class="empty-projects">No Projects</div>
  <div class="create-one-here-box">
      <div class="create-one">
        <button class="slide_open create-one-btn">Create one here</button>
       </div> 
  </div>
</div>

</div>
</div>


<?php } ?>



<script>

$ = function(id) {
  return document.getElementById(id);
}

var show = function(id) {
  $(id).style.display ='block';
}
var hide = function(id) {
  $(id).style.display ='none';
}
        </script>