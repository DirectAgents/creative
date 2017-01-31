<?php

session_start();
require_once '../../base_path.php';

include("../../config.php"); //include config file
require_once '../../class.startup.php';
require_once '../../class.participant.php';



$participant_home = new PARTICIPANT();

if($participant_home->is_logged_in())
{
  $participant_home->logout();
}



$startup_home = new STARTUP();

if(!$startup_home->is_logged_in())
{
  $startup_home->redirect('../../login');
}





?>








<?php
//include db configuration file


//echo $_SESSION['startupSession']

//MySQL query
//$Result = mysql_query("SELECT * FROM tbl_startup_project WHERE startupID = '".$_SESSION['startupSession']."' ORDER BY id DESC ");

$sql=mysqli_query($connecDB,"SELECT * FROM tbl_meeting_archived WHERE startupID = '".$_SESSION['startupSession']."' ORDER BY id DESC ");
//$result=mysql_query($sql);

//$row=mysql_fetch_array($result);

  //if username exists
if(mysqli_num_rows($sql) == 0)
{
  //echo "asdf";


 echo '<div class="row">
    <div class="col-md-12">
<div class="empty-projects">Archived Meetings</div>
  <div class="create-one-here-box">
      
      <br><br>
      <a href="'.BASE_PATH.'/startup/idea/create/step1.php?id='.rand(100, 100000).'">
        <button class="create-one-btn">List a new idea</button></a>
        <p>&nbsp;</p>
      
  </div>
</div>

</div>
</div>
';

}else{


//get all records from add_delete_record table
while($row2 = mysqli_fetch_array($sql))
{ 



$sql4 = mysqli_query($connecDB,"SELECT * FROM tbl_startup_project  WHERE ProjectID = '".$row2['ProjectID']."' ");
$row4 = mysqli_fetch_array($sql4);



$date2 = date_create($row2['Date_of_Meeting']);

$random = rand(5, 20000);



date_default_timezone_set('America/New_York');

$date = date('Y-m-d h:m A');



$dtA = new DateTime($date);
$dtB = new DateTime($row2['Date_of_Meeting']);







?>


<div class="surveys-list">

<div class="survey-info-container">

<div class="row">
    <div class="col-md-2">

<?php 


$ProfileImage = mysqli_query($connecDB,"SELECT * FROM tbl_participant WHERE userID='".$row2['userID']."'");
$rowprofileimage = mysqli_fetch_array($ProfileImage);


 if($rowprofileimage['google_picture_link'] != ''){ ?>
        <img src="<?php echo $rowprofileimage['google_picture_link']; ?>" class="thumbnail-profile"/>
<?php } ?>

<?php if($rowprofileimage['facebook_id'] != '0'){  ?>
        <img src="https://graph.facebook.com/<?php echo $rowprofileimage['facebook_id']; ?>/picture" class="thumbnail-profile"/>
<?php } ?>
       
<?php if($rowprofileimage['google_picture_link'] == '' && $rowprofileimage['facebook_id'] == '0'){ ?>

      
<?php if($rowprofileimage['profile_image'] != ''){  ?>
        <img src="<?php echo BASE_PATH; ?>/images/profile/participant/<?php echo $rowprofileimage['profile_image'];?>" class="thumbnail-profile"/>
<?php }else{ ?>
        <img src="<?php echo BASE_PATH; ?>/images/profile/thumbnail.jpg" class="thumbnail-profile"/>
<?php } ?>

      
<?php } ?>


</div>




<?php

$sql3=mysqli_query($connecDB,"SELECT * FROM tbl_participant WHERE userID = '".$row2['userID']."'");
//$result3=mysql_query($sql3);

$row3 = mysqli_fetch_array($sql3);

?>





    <div class="col-md-10">


                  <div class="survey-header">
                    <div class="account-project-name">
                      Person Name
                    </div>
                    <div class="edit-delete">
                      
            
   


               


                    </div>  
                   
                  </div>
                  <div class="survey-name" ng-bind="(survey.name)"><?php echo $row3['FirstName']; ?> <?php echo $row3['LastName']; ?></div>
                  <div class="survey-metadata">
                    <div class="item">
                      <div class="label">Date of Meeting:</div>
                      <div class="value" ng-bind="(survey.date | date:'MM/dd/yyyy')">


                      <?php if($row2['Date_of_Meeting'] == '0000-00-00'){ 

                        echo "No date set";
                      }else{

                        echo date('F j, Y',strtotime($row2['Date_of_Meeting']));
                      }
                      
                      ?>

                      </div>
                    
                    </div>

                    <div class="item">
                      <div class="label">Time:</div>
                      <div class="value" ng-bind="(survey.date | date:'MM/dd/yyyy')">
                     
                   
                    <?php if($row2['Date_of_Meeting'] == '0000-00-00'){ 

                        echo "No time set";
                      }else{

                        echo $row2['Final_Time'];
                      }
                      
                      ?>
                       
                     
                      </div>
                    </div>


                    <div class="item date">
                      <div class="label">Location:</div>
                      <div class="value">
                       <span ng-if="!survey.running &amp;&amp; !survey.finalized &amp;&amp; !survey.waitingForApproval" class="draft">
                          <?php echo $row2['Location']; ?>
                        </span>
                      </div>
                       <a href="http://maps.google.com/?q=<?php echo $row2['Location']; ?>" target="_blank">View Map</a>
                    </div>
                 
                    <div class="clearer"></div>
                  </div>

                  <div class="theline"></div>

                  <div class="status_request">Status: 

                <?php if($row2['Status'] == 'Canceled_by_Startup'){echo 'Meeting Canceled By Startup';} ?>
                <?php if($row2['Status'] == 'Declined_by_Startup'){echo 'Meeting Request Declined By Startup';} ?>
                
                <?php if($row2['Status'] == 'Canceled_by_Participant'){echo 'Meeting Canceled By Participant';} ?>
                <?php if($row2['Status'] == 'Declined_by_Participant'){echo 'Meeting Request Declined By Participant';} ?>

                <?php if($row2['Met'] == 'Yes' && $row2['Met'] != 'No didn\'t show up' && $row2['Payment'] == ''){ ?>
Payment pending. Pay <a href="pay/?id=<?php echo $row2['ProjectID']; ?>&p=<?php echo $row2['userID']; ?>">here</a> 
<?php } ?> 

<?php if($row2['Met'] == 'Yes' && $row2['Met'] != 'No didn\'t show up' && $row2['Payment'] == 'Yes'){ ?>
Payment sent. View <a href="<?php echo BASE_PATH; ?>/startup/payment/">Payment History</a>
<?php } ?> 




                  </div>

                  <div class="survey-actions">
                   
                  <div class="action" tabindex="0" aria-hidden="false">
                        
                        <a href="<?php echo BASE_PATH; ?>/ideas/s/<?php echo $row4['Category']; ?>/?id=<?php echo $row2['ProjectID']; ?>&p=<?php echo $row3['userID']; ?>"> View Details</a>


                      </div>

                        <div class="action" tabindex="0" aria-hidden="false">|</div>

                      <div class="action" ng-click="triggerPreview(survey)" ng-show="survey.surveyLength > 0" role="button" tabindex="0" aria-hidden="false">
                        
                       <a href="<?php echo BASE_PATH; ?>/profile/participant/?id=<?php echo $row2['userID']; ?>"> View Profile </a>

                      </div>
                    

                    </div>
                  </div>
               


  
    
   </div>
</div>

<?php 



}


}






  ?>




      
          




