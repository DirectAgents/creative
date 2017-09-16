<?php
//include db configuration file

session_start();
include("../../config.php"); //include config file
require_once '../../class.startup.php';

//MySQL query
//$Result = mysql_query("SELECT * FROM tbl_startup_project WHERE startupID = '".$_SESSION['startupSession']."' ORDER BY id DESC ");

$sql="SELECT * FROM tbl_startup_project WHERE startupID = '".$_SESSION['startupSession']."' ORDER BY id DESC ";
$result=mysql_query($sql);
//$row=mysql_fetch_array($result);

  //if username exists
if(mysql_num_rows($result)>0)
{
  //echo "asdf";


//get all records from add_delete_record table
while($row2 = mysql_fetch_array($result))
{ 

$Project = mysql_query("SELECT * FROM tbl_project_request WHERE ProjectID='".$row2['ProjectID']."'");
$row3 = mysql_fetch_array($Project);


$date = date_create($row2['Date_Created']);

  ?>


<div class="popup" id="popup1-<?php echo $row2['ProjectID']; ?>">


<div class="result-delete">
  <div id="result-delete<?php echo $row2['ProjectID']; ?>">Successfully Deleted!</div>
  </div>
<h4>Are you sure you want to delete this project?</h4>
<input type="text" name="projectid<?php echo $row2['ProjectID']; ?>" id="projectid" value="<?php echo $row2['ProjectID']; ?>"/>
<div class="popupoverlay-btn">
  <div class="cancel-delete">
    <button class="slide-delete-sent<?php echo $row2['ProjectID']; ?>_close cancel" onclick="hide('popup1-<?php echo $row2['ProjectID']; ?>')">Cancel</button>
    <button class="delete-sent<?php echo $row2['ProjectID']; ?> btn-delete">Yes</button>
</div>

<div class="popupoverlay-btn">
  <div class="close-delete">
    <button class="slide-delete-sent<?php echo $row2['ProjectID']; ?>_close cancel" onclick="hide('popup1-<?php echo $row2['ProjectID']; ?>')">Close</button>
</div>
</div>

</div>




</div>










<div class="surveys-list">

<div class="survey-info-container">

<div class="row">
    <div class="col-md-2">

<?php 

$ProjectImage = mysql_query("SELECT * FROM tbl_startup_project WHERE startupID='".$_SESSION['startupSession']."' AND ProjectID = '".$row2['ProjectID']."'");
$rowprojectimage = mysql_fetch_array($ProjectImage);

if($rowprojectimage['project_image'] != '') { ?>

<img src="<?php echo BASE_PATH; ?>/ideas/uploads/<?php echo $rowprojectimage['project_image']; ?>" width="100">

<?php }else{
echo '<img src="../../ideas/uploads/thumbnail.jpg" width="100">'; 
}


?></div>


    <div class="col-md-10">


                  <div class="survey-header">
                    <div class="account-project-name">
                      Project Name
                    </div>
                    <div class="edit-delete">
                     
                  
                       <a href="#" role="button"  alt="Send Payment"  class="tooltipover" onclick="show('popup1-<?php echo $row2['ProjectID']; ?>')">
                      <i class="icon-credit-card"></i></a>
                    
                    </div>  
                   
                  </div>
                  <div class="survey-name" ng-bind="(survey.name)"><?php echo $row2['Name']; ?></div>
                  <div class="survey-metadata">
                    <div class="item when">
                      <div class="label">When:</div>
                      <div class="value" ng-bind="(survey.date | date:'MM/dd/yyyy')"><?php echo $row3['Date_of_Meeting'] ?></div>
                    </div>
                    <div class="item where">
                      <div class="label">Where:</div>
                      <div class="value">
                       <span ng-if="!survey.running &amp;&amp; !survey.finalized &amp;&amp; !survey.waitingForApproval" class="draft">
                          <?php echo $row3['Location']; ?>
                        </span>
                      </div>
                    </div>
                    <div class="item who">
                      <div class="label">Who:</div>
                      <div class="value" ng-bind="(survey.numberOfCompletedSurveys)">
                        
<?php


$person = mysql_query("SELECT * FROM tbl_participant WHERE userID='".$row3['userID']."'");
$row4 = mysql_fetch_array($person);

echo $row4['FirstName'];
echo '&nbsp;';
echo $row4['LastName'];

?>


                      </div>
                    </div>
                    <div class="clearer"></div>
                  </div>
                  <div class="survey-actions">
                  
                      
                  <div class="action" tabindex="0" aria-hidden="false">
                        
                        <a href="project/browse/participants/new/?id=<?php echo $row2['ProjectID']; ?>">
                          <?php echo $row4['FirstName'];?> didn't show up</a>

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