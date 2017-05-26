<?php
session_start();

//Fetch rating deatails from database

//echo $_SESSION['startupSession'];


require_once '../../base_path.php';

include("../../config.php"); //include config file
include("../../config.inc.php");
require_once '../../class.participant.php';
require_once '../../class.startup.php';

$participant_home = new PARTICIPANT();
$startup_home = new STARTUP();


if(!isset($_GET['id'])){
header("Location:".BASE_PATH."/404.php");
exit();
}






$participant = mysqli_query($connecDB,"SELECT * FROM tbl_participant WHERE userID='".$_GET['id']."'");
$rowparticipant = mysqli_fetch_array($participant);

/*
$startup_home = new startup();

if($startup_home->is_logged_in())
{
  $startup_home->logout();
}
*/




if(!$startup_home->is_logged_in() && !$participant_home->is_logged_in())
{
  $startup_home->redirect(BASE_PATH);
  exit();
}




include_once '../../dbConfig_rating.php';


$query = "SELECT rating_number, FORMAT((total_points / rating_number),1) as average_rating FROM participant_rating WHERE post_id = '".$_GET['id']."' AND status = 1";
$result = $db->query($query);
$ratingRow = $result->fetch_assoc();





$rating_and_comment=mysqli_query($connecDB,"SELECT * FROM c5t_comment WHERE comment_identifier_id='".$_GET['id']."'");





$stmt = $participant_home->runQuery("SELECT * FROM tbl_participant WHERE userID='".$_GET['id']."'");
$stmt->execute(array(":uid"=>$_GET['id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);


if($row == false ){
  //header("Location:".BASE_PATH."/participant/meetings/");
  header("Location:".BASE_PATH."/404.php");
  exit();
}











?>

<!DOCTYPE html>
<html lang="en" id="features" class="tablet mobile">    
    <head>

<?php include("../../participant/header.php"); ?>






        
    </head>
    
    <body>

<!--TopNav-->
         <header id="main-header" class='transparent'>
  <div class="inner-col">
   


<?php include("../../nav.php"); ?>

   
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


  <?php
  
if($row['google_picture_link'] != ''){
        echo '<img src="'.$row['google_picture_link'].'" class="img-circle-profile"/>';
 }

if($row['facebook_id'] != '0'){ 
        echo '<img src="https://graph.facebook.com/'.$row['facebook_id'].'/picture?width=100&height=100" class="img-circle-profile"/>';
}
       
if($row['google_picture_link'] == '' && $row['facebook_id'] == '0'){

if($row['profile_image'] != ''){ 
        echo '<img src="'.BASE_PATH.'/images/profile/participant/'.$row['profile_image'].'" class="img-circle-profile"/>';
}else{
        echo '<img src="'.BASE_PATH.'/images/profile/thumbnail.jpg" class="img-circle-profile"/>';
 }

}

      ?>






    </div>
    
    <div class="col-lg-4">
      <h3><?php echo $row['FirstName']; ?>&nbsp;<?php echo $row['LastName']; ?></h3>
      <?php echo $row['Age']; ?>, <?php echo $row['City']; ?>, <?php echo $row['State']; ?>
      </div>


 <?php if(isset($_SESSION['startupSession'])){ ?>  

 <div class="col-lg-5">
      <table class="table table-bordered">
    <thead>
      <tr>
        <th>Meetings Participated</th>
 

        <th>Rating</th>
    
     <th>Reviews</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>

<?php


$result_count = mysqli_query($connecDB,"SELECT userID, COUNT(DISTINCT userID) AS count FROM tbl_participant_meeting_participated WHERE userID = '".$_GET['id']."'");
$row_count = mysqli_fetch_assoc($result_count);
$count = $row_count['count'];

if($count > 0 ){

echo $count;

}else{
  echo "0";
}
?>


        </td>

        <td>
          
 
    <div class="overall-rating">


<?php if (!$rating_and_comment) { ?>


    No rating


<?php }else{  ?>


   
    <?php if ($ratingRow['average_rating'] != ''){echo $ratingRow['average_rating'];}else{echo "Not Rated";} ?>



<?php  }  ?>  

    </div>


        </td>
      

        <td>

<?php


$result_count = mysqli_query($connecDB,"SELECT comment_identifier_id, COUNT(comment_identifier_id) AS count FROM c5t_comment WHERE comment_identifier_id = '".$_GET['id']."'");
$row_count = mysqli_fetch_assoc($result_count);
$count = $row_count['count'];

if($count > 0 ){
echo '<a href="rating/?id='.$_GET['id'].'">';
echo "$count";
echo '</a>';

}else{
  echo "0";
}
?>


        </td>

      </tr>
    </tbody>
  </table>

    </div>
  <?php  }  ?>  

  </div>




     
      

<?php


if(isset($_SESSION['startupSession'])) {


$Project = mysqli_query($connecDB,"SELECT * FROM tbl_startup_project WHERE startupID='".$_SESSION['startupSession']."' AND FinishedProcess = 'Y'");
$rowproject = mysqli_fetch_array($Project);

$meetupchoice=explode(',',$rowproject['Meetupchoice']);
$age=explode(',',$rowproject['Age']);
$gender=explode(',',$rowproject['Gender']);
$minheight=explode(',',$rowproject['MinHeight']);
$maxheight=explode(',',$rowproject['MaxHeight']);
//$location=explode(',',$rowproject['Location']);
$status=explode(',',$rowproject['Status']);
$ethnicity=explode(',',$rowproject['Ethnicity']);
$smoke=explode(',',$rowproject['Smoke']);
$drink=explode(',',$rowproject['Drink']);
$diet=explode(',',$rowproject['Diet']);
$religion=explode(',',$rowproject['Religion']);
$education=explode(',',$rowproject['Education']);
$job=explode(',',$rowproject['Job']);



$sqlstartup=mysqli_query($connecDB,"SELECT * FROM tbl_startup_project WHERE startupID = '".$_SESSION['startupSession']."' AND FinishedProcess = 'Y' ORDER BY id DESC");
//$resultsstartup=mysql_query($sqlstartup);







while($row3 = mysqli_fetch_array($sqlstartup)){



$Min_Req = str_replace(",","|",$row3['MinReq']);

//echo $Min_Req;
//echo $row3['id'];
//echo "<br>";







//echo $City;



$Meetupchoice = str_replace(",","|",$rowparticipant['Meetupchoice']);
$Age = str_replace(",","|",$rowparticipant['Age']);
$Gender = str_replace(",","|",$rowparticipant['Gender']);
$Height = str_replace(",","|",$rowparticipant['Height']);
$City = str_replace(",","|",$rowparticipant['City']);
$Status = str_replace(",","|",$rowparticipant['Status']); 
$Ethnicity = str_replace(",","|",$rowparticipant['Ethnicity']);
$Smoke = str_replace(",","|",$rowparticipant['Smoke']);
$Drink = str_replace(",","|",$rowparticipant['Drink']);
$Diet = str_replace(",","|",$rowparticipant['Diet']);
$Religion = str_replace(",","|",$rowparticipant['Religion']);
$Education = str_replace(",","|",$rowparticipant['Education']);
$Job = str_replace(",","|",$rowparticipant['Job']);
$Interests = str_replace(",","|",$rowparticipant['Interests']);
$Languages = str_replace(",","|",$rowparticipant['Languages']);


$sql2=mysqli_query($connecDB,"SELECT * FROM tbl_participant WHERE userID='".$_GET['id']."'");
//$results2=mysql_query($sql2);
$row2 = mysqli_fetch_array($sql2);



if(($row2['Height'] >= $rowproject['MinHeight']) && ($row2['Height'] <= $rowproject['MaxHeight'])) {

$Height_Final = $row2['Height'];

}else{

$Height_Final = $row2['Height'] + 1;  

}


//echo $Min_Req;
//if (strpos($Min_Req, 'Age') !== false) {echo "yes";}


//echo $Gender;


if (strpos($Min_Req, 'Age') !== false) {

if($Age != 'NULL' && $Age != ''){$theage = "AND r.Age RLIKE '[[:<:]]".$Age."[[:>:]]'";}else{$theage = "";}
}else{
  $theage = '';
}


if (strpos($Min_Req, 'Gender') !== false) {
if($Gender != 'NULL' && $Gender != ''){$thegender = "AND r.Gender RLIKE '[[:<:]]".$Gender."[[:>:]]'";}else{$thegender = '';}
}else{
  $thegender = '';
}

if (strpos($Min_Req, 'Height') !== false) {
if($Height != 'NULL' && $Height != ''){$theheight = "AND r.MinHeight RLIKE '[[:<:]]".$Height_Final."[[:>:]]'";}else{$theheight = '';}
}else{
  $theheight = '';
}

if (strpos($Min_Req, 'City') !== false) {
  //echo $City;
if($City != 'NULL' && $City != ''){$thecity = "AND r.City RLIKE '[[:<:]]".$City."[[:>:]]'";}else{$thecity = '';}
}else{
  $thecity = '';
}


if (strpos($Min_Req, 'Status') !== false) {
if($Status != 'NULL' && $Status != ''){$thestatus = "AND r.Status RLIKE '[[:<:]]".$Status."[[:>:]]'";}else{$thestatus = '';}
}else{
  $thestatus = '';
}


if (strpos($Min_Req, 'Ethnicity') !== false) {
if($Ethnicity != 'NULL' && $Ethnicity != ''){$theethnicity = "AND r.Ethnicity RLIKE '[[:<:]]".$Ethnicity."[[:>:]]'";}else{$theethnicity = '';}
}else{
  $theethnicity = '';
}


if (strpos($Min_Req, 'Smoke') !== false) {
if($Smoke != 'NULL' && $Smoke != ''){$thesmoke = "AND r.Smoke RLIKE '[[:<:]]".$Smoke."[[:>:]]'";}else{$thesmoke = '';}
}else{
  $thesmoke = '';
}


if (strpos($Min_Req, 'Drink') !== false) {
if($Drink != 'NULL' && $Drink != ''){$thedrink = "AND r.Drink RLIKE '[[:<:]]".$Drink."[[:>:]]'";}else{$thedrink = '';}
}else{
  $thedrink = '';
}


if (strpos($Min_Req, 'Diet') !== false) {
if($Diet != 'NULL' && $Diet != ''){$thediet = "AND r.Diet RLIKE '[[:<:]]".$Diet."[[:>:]]'";}else{$thediet = '';}
}else{
  $thediet = '';
}

if (strpos($Min_Req, 'Religion') !== false) {
if($Religion != 'NULL' && $Religion != ''){$thereligion = "AND r.Religion RLIKE '[[:<:]]".$Religion."[[:>:]]'";}else{$thereligion = '';}
}else{
  $thereligion = '';
}


if (strpos($Min_Req, 'Education') !== false) {
if($Education != 'NULL' && $Education != ''){$theeducation = "AND r.Education RLIKE '[[:<:]]".$Education."[[:>:]]'";}else{$theeducation = '';}
}else{
  $theeducation = '';
}


if (strpos($Min_Req, 'Job') !== false) {
if($Job != 'NULL' && $Job != ''){$thejob = "AND r.Job RLIKE '[[:<:]]".$Job."[[:>:]]'";}else{$thejob = '';}
}else{
  $thejob = '';
}


if (strpos($Min_Req, 'Interests') !== false) {
if($Interests != 'NULL' && $Interests != ''){$interests = "AND r.Interests RLIKE '[[:<:]]".$Interests."[[:>:]]'";}else{$interests = '';}
}else{
  $interests = '';
}

if (strpos($Min_Req, 'Languages') !== false) {
if($Languages != 'NULL' && $Languages != ''){$languages = "AND r.Languages RLIKE '[[:<:]]".$Languages."[[:>:]]'";}else{$languages = '';}
}else{
  $languages = '';
}



//echo $rowproject['City'];


$sql=mysqli_query($connecDB,"SELECT * FROM `tbl_participant` AS p INNER JOIN `tbl_startup_project` AS r ON p.userID='".$_GET['id']."'
 $theage $thegender $theheight $thecity $thestatus $theethnicity $thesmoke $thedrink $thediet $thereligion $theeducation $thejob $interests $languages AND
 ProjectID = '".$row3['ProjectID']."' AND FinishedProcess = 'Y'");

$rowsql = mysqli_fetch_array($sql);



//}




//$result=mysqli_query($sql);
//$row=mysql_fetch_array($result);



  //if projects exists
if($rowsql>0)
{












  echo '

<div class="col-lg-11">';



$listproject = mysqli_query($connecDB,"SELECT * FROM tbl_startup_project WHERE ProjectID = '".$rowsql['ProjectID']."' AND startupID = '".$_SESSION['startupSession']."' AND FinishedProcess = 'Y'");
//$rowlistproject = mysqli_fetch_array($listproject);



//get all records from add_delete_record table
while($row2 = mysqli_fetch_array($listproject))
{ 



$sqlparticipated = mysqli_query($connecDB,"SELECT * 
from (
    select userID, ProjectID, Met from tbl_meeting_request
    union all
    select userID, ProjectID, Met from tbl_meeting_upcoming
    union all
    select userID, ProjectID, Met from tbl_meeting_recent
    union all
    select userID, ProjectID, Met from tbl_meeting_archived_startup
    union all
    select userID, ProjectID, Met from tbl_meeting_archived_participant
    union all
    select userID, ProjectID, Met from tbl_participant_meeting_participated
   
) tbl_participant
where userID = '".$_GET['id']."' AND ProjectID = '".$row2['ProjectID']."' AND Met = 'yes' ");






$rowparticipated=mysqli_fetch_array($sqlparticipated);

if(mysqli_num_rows($sqlparticipated) == false) {













$posts = 0;
$posts++;





//echo $row2['id'];


$date = date_create($row2['Date_Created']);

  ?>







<div class="survey-info-container">

<div class="row">


    <div class="col-md-2">

<?php 

$ProjectImage = mysqli_query($connecDB,"SELECT * FROM tbl_startup_project WHERE ProjectID = '".$row2['ProjectID']."' AND FinishedProcess = 'Y'");
$rowprojectimage = mysqli_fetch_array($ProjectImage);



if($rowprojectimage['project_image'] != '') {
echo '<img src="'.BASE_PATH.'/ideas/uploads/'.$rowprojectimage['project_image'].'" width="70">'; 
}else{
echo '<img src="'.BASE_PATH.'/ideas/uploads/thumbnail.jpg" width="70">'; 
}


?>



</div>


    <div class="col-md-10">


                  <div class="survey-header">
                   
                   <div class="survey-name" ng-bind="(survey.name)"><?php echo $row2['Name']; ?></div>

                   <?php echo $row2['Details']; ?>
                   
                  </div>
                 
                  <div class="survey-metadata">
                    <div class="item ">
                      <div class="label">Payout:</div>
                      <div class="value" ng-bind="(survey.date | date:'MM/dd/yyyy')">$<?php echo $row2['Pay']; ?></div>
                    </div>
                    <div class="item date">
                      <div class="label">For:</div>
                      <div class="value">
                       <span ng-if="!survey.running &amp;&amp; !survey.finalized &amp;&amp; !survey.waitingForApproval" class="draft">
                          <?php echo $row2['Minutes']; ?> minutes
                        </span>
                      </div>
                    </div>

                     <div class="item date">
                   
                      <div class="value">
                      &nbsp;
                      </div>
                    </div>

                    <div class="item date">
                     
                       <div class="btn-browse">
                       <span ng-if="!survey.running &amp;&amp; !survey.finalized &amp;&amp; !survey.waitingForApproval" class="draft">
                          
<?php if($participant_home->is_logged_in()){ ?>

<a href="<?php echo BASE_PATH; ?>/ideas/p/<?php echo $row2['Category']; ?>/?id=<?php echo $row2['ProjectID']; ?>&p=<?php echo $_GET['id']; ?>">

    Set up a meeting
</a>    

<?php } ?>


<?php if($startup_home->is_logged_in()){ ?>

<a href="<?php echo BASE_PATH; ?>/ideas/s/<?php echo $row2['Category']; ?>/?id=<?php echo $row2['ProjectID']; ?>&p=<?php echo $_GET['id']; ?>">



                          Set up a meeting
</a>

<?php } ?>

                        </span>
                      </div>
                    </div>
                   
                    <div class="clearer"></div>
                  </div>
                
                  </div>
               


  
    
   </div>
</div>


</div>



<?php 


//echo $row2['id'];


}


}


}


  //if projects exists


} 


?>




<?php 








}

/*
if(empty($posts)){

echo '<div class="row">
    <div class="col-md-12">
<div class="empty-projects">No Projects</div>
  <div class="create-one-here-box">
      <div class="create-one">
        <button class="slide_open create-one-btn">Create one here</button>
       </div> 
  </div>
</div>

</div>
</div>';

}
*/





?>




     

          





    <div class="col-lg-12">
<p>&nbsp;</p>
<div class="therow">
   <div class="thetitle">About <?php echo $row['FirstName']; ?></div>
   <?php if($row['Bio'] != 'NULL' && $row['Bio'] != ''){ ?>

 <h4><?php if($row['Bio'] != 'NULL'){echo $row['Bio'];}else{echo "No Bio";} ?></h4>

  <?php } ?>
 </div>
 </div>
<!--</div>-->





<!--
  <div class="therow">
    <div class="col-lg-4"><h4>Meetupchoice:</h4><?php echo $row['Meetupchoice']; ?></div>
    <div class="col-lg-4"><h4>Gender:</h4><?php if($row['Gender'] != 'NULL'){echo $row['Gender'];}else{echo "No Gender Preference";} ?></div>
    <div class="col-lg-4"><h4>Height: </h4><?php if($row['Height'] != 'NULL'){
      
      if($row['Height'] == '50'){echo "5 ft 0 in";}
      if($row['Height'] == '51'){echo "5 ft 1 in";}
      if($row['Height'] == '52'){echo "5 ft 2 in";}
      if($row['Height'] == '53'){echo "5 ft 3 in";}
      if($row['Height'] == '54'){echo "5 ft 4 in";}
      if($row['Height'] == '55'){echo "5 ft 5 in";}
      if($row['Height'] == '56'){echo "5 ft 6 in";}
      if($row['Height'] == '57'){echo "5 ft 7 in";}
      if($row['Height'] == '58'){echo "5 ft 8 in";}
      if($row['Height'] == '59'){echo "5 ft 9 in";}
      if($row['Height'] == '60'){echo "6 ft 0 in";}
      if($row['Height'] == '61'){echo "6 ft 1 in";}
      if($row['Height'] == '62'){echo "6 ft 2 in";}
      if($row['Height'] == '63'){echo "6 ft 3 in";}
      if($row['Height'] == '64'){echo "6 ft 4 in";}


      }else{echo "No Height Preference";} ?></div>
  </div>-->

  <div class="therow">
    <div class="col-lg-4"><h4>Status:</h4> <?php if($row['Status'] != ''){echo $row['Status'];}else{echo "No Status Preference";} ?></div>
    <div class="col-lg-4"><h4>Ethnicity:</h4> <?php if($row['Ethnicity'] != ''){echo $row['Ethnicity'];}else{echo "No Ethnic Preference";} ?></div>
    <div class="col-lg-4"><h4>Smoke:</h4> <?php if($row['Smoke'] != ''){echo $row['Smoke'];}else{echo "No Smoking Preference";} ?></div>
  </div>

   <div class="therow">
    <div class="col-lg-4"><h4>Drink:</h4> <?php if($row['Drink'] != ''){echo $row['Drink'];}else{echo "No Drinking Preference";} ?></div>
    <div class="col-lg-4"><h4>Diet:</h4> <?php if($row['Diet'] != ''){echo $row['Diet'];}else{echo "No Diet Preference";} ?></div>
    <div class="col-lg-4"><h4>Religion:</h4> <?php if($row['Religion'] != ''){echo $row['Religion'];}else{echo "No Religion Preference";} ?></div>
  </div>

   <div class="therow">
    <div class="col-lg-4"><h4>Education:</h4> <?php if($row['Education'] != ''){echo $row['Education'];}else{echo "No Education Preference";} ?></div>
    <div class="col-lg-4"><h4>Occupation:</h4><?php if($row['Job'] != ''){echo $row['Job'];}else{echo "No Job Preference";} ?></div>
    <div class="col-lg-4"><h4>Interests:</h4><?php if($row['Interests'] != ''){echo $row['Interests'];}else{echo "No Interests Listed";} ?></div>
</div>
    


  <div class="therow">
    <div class="col-lg-4"><h4>Languages:</h4> <?php if($row['Languages'] != ''){echo $row['Languages'];}else{echo "No Languages Listed";} ?> </div>





   

  </div>




 
  

</div>





    

           </div></div></div>      


            


          </div>

    

  
 <!--Footer-->
<?php include("../../footer.php"); ?>
<!--Footer-->  
      

    </div>

  

  </div>



  </div>

  </div>

 

        <!--/.fluid-container-->
        <script src="<?php echo BASE_PATH; ?>/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_PATH; ?>/assets/scripts.js"></script>






        
    </body>

</html>

