<?php
session_start();

require_once '../../../base_path.php';

require_once '../../../class.startup.php';
include_once("../../../config.php");
include("../../../config.inc.php");




include 'include.php';



$researcher_home = new STARTUP();

if(!$researcher_home->is_logged_in())
{
  $researcher_home->redirect('../../../startup/login');
  exit();
}



include_once '../../../dbConfig_rating.php';
//Fetch rating deatails from database
$query = "SELECT rating_number, FORMAT((total_points / rating_number),1) as average_rating FROM participant_rating WHERE post_id = '".$_GET['id']."' AND status = 1";
$result = $db->query($query);
$ratingRow = $result->fetch_assoc();




$stmt = mysqli_query($connecDB,"SELECT * FROM tbl_participant WHERE userID='".$_GET['id']."'");
$row = mysqli_fetch_array($stmt);



$comment=mysqli_query($connecDB,"SELECT * FROM c5t_comment WHERE startup_id='".$_SESSION['startupSession']."' AND comment_identifier_id = '".$_GET['id']."'");


$rating=mysqli_query($connecDB,"SELECT * FROM participant_rating WHERE post_id = '".$_GET['id']."'");
$rowrating = mysqli_fetch_array($rating);


$Project = mysqli_query($connecDB,"SELECT * FROM tbl_startup_project WHERE startupID='".$_GET['id']."'");
$rowproject = mysqli_fetch_array($Project);

$meetupchoice=explode(',',$rowproject['Meetupchoice']);
$age=explode(',',$rowproject['Age']);
$gender=explode(',',$rowproject['Gender']);
$minheight=explode(',',$rowproject['MinHeight']);
$maxheight=explode(',',$rowproject['MaxHeight']);
$location=explode(',',$rowproject['Location']);
$status=explode(',',$rowproject['Status']);
$ethnicity=explode(',',$rowproject['Ethnicity']);
$smoke=explode(',',$rowproject['Smoke']);
$drink=explode(',',$rowproject['Drink']);
$diet=explode(',',$rowproject['Diet']);
$religion=explode(',',$rowproject['Religion']);
$education=explode(',',$rowproject['Education']);
$job=explode(',',$rowproject['Job']);







?>

<!DOCTYPE html>
<html lang="en" id="features" class="tablet mobile">    
    <head>

<?php include("../../../participant/header.php"); ?>









    



<script type="text/javascript">
$(document).ready(function () {
  $('#c5t_body + div').hide();
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


   <!-- <div id="create-project-box">
      <div id="create-project">
              <a href="../" class="initialism btn-back">Back</a>

            </div>
        </div>-->
        <div id="target"></div>    
<div id="white-container">
      <div id="dashboardSurveyTargetingContainerLogic">





<div class="container">
  <div class="therow">
    <div class="col-lg-2">

<a href="<?php echo BASE_PATH; ?>/profile/participant/?id=<?php echo $row['userID']; ?>">      
   <?php 


$ProfileImage = mysqli_query($connecDB,"SELECT * FROM tbl_participant WHERE userID='".$row['userID']."'");
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

</a>


    </div>
    <div class="col-lg-4">
     <h3><?php echo $row['FirstName']; ?>&nbsp;<?php echo $row['LastName']; ?></h3>
      <?php if($row['Age']!=''){echo $row['Age'] .',';} ?> <?php if($row['City']!=''){ echo $row['City'].',';} ?> <?php if($row['State']!=''){ echo $row['State'];} ?>
      </div>

 <div class="col-lg-5">
      <table class="table table-bordered">
    <thead>
      <tr>
        <th>Meetings Participated</th>
 
<?php if(isset($_SESSION['startupSession'])){ ?>
        <th>Ratings</th>
     <?php  }  ?>   
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          
<?php


$result_count = mysqli_query($connecDB,"SELECT userID,ProjectID, COUNT(DISTINCT ProjectID) AS count FROM tbl_participant_meeting_participated WHERE userID = '".$_GET['id']."'");
$row_count = mysqli_fetch_assoc($result_count);
$count = $row_count['count'];

if($count > 0 ){
echo $count;
}else{
  echo "0";
}
?>



        </td>
 <?php if(isset($_SESSION['startupSession'])){ ?>     
        <td>
          
    <div class="overall-rating">
  

 
    <div class="overall-rating">(Average Rating  <span id="avgrat"><?php echo $ratingRow['average_rating']; ?></span>
Based on <span id="totalrat"><?php echo $ratingRow['rating_number']; ?></span>  rating)</span></div>



    </div>


        </td>
        <?php  }  ?>  
      </tr>
    </tbody>
  </table>

    </div>


  </div>






  <div class="therow">
    <div class="col-lg-12">

<?php 

$startup_id=explode(',',$rowrating['startup_id']);

if(!in_array($_SESSION['startupSession'],$startup_id)){ ?>
  <h2>Rate <?php echo $row['FirstName']; ?></h2>
  <input name="rating" value="0" id="rating_star" type="hidden" postID="<?php echo $_GET['id']; ?>" />
  <p>&nbsp;</p>
<?php } ?>  


<?php if(mysqli_num_rows($comment)>0) { ?>
<script type="text/javascript">
$(document).ready(function () {
  $('.c5t_comment_form_background').hide();
});
</script>
<?php } ?>  



    
      <?php echo $c5t_output; ?>

    </div>
  </div>

 
</div>




     

          
      </div>

    

                 


            


          </div>

    

  

      

    </div>

  

  </div>

   <!--Footer-->
<?php include("../../../footer.php"); ?>
<!--Footer-->

  </div>

  </div>

 

        <!--/.fluid-container-->
        <script src="<?php echo BASE_PATH; ?>/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_PATH; ?>/assets/scripts.js"></script>






        
    </body>

</html>