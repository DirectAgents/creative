<?php
session_start();

require_once '../../base_path.php';

require_once '../../class.startup.php';
require_once '../../class.participant.php';
include_once("../../config.php");
include("../../config.inc.php");


if(!isset($_GET['id'])){
header("Location:".BASE_PATH."/startup/");
}



$participant_home = new PARTICIPANT();

$startup_home = new STARTUP();


if(!$startup_home->is_logged_in() && !$participant_home->is_logged_in())
{
  $startup_home->redirect('../../startup/login');
  exit();
}



if(!$participant_home->is_logged_in() && !$startup_home->is_logged_in())
{
  $participant_home->redirect('../../participant/login');
  exit();
}


$stmt = $startup_home->runQuery("SELECT * FROM tbl_startup WHERE userID='".$_GET['id']."'");
$stmt->execute(array(":uid"=>$_GET['id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);



if($row == false ){
  header("Location:".BASE_PATH."/startup/");
}else{



$Project = mysqli_query($connecDB,"SELECT * FROM tbl_startup_project WHERE startupID='".$_GET['id']."' AND FinishedProcess = 'Y'");
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

<!DOCTYPE html>
<html lang="en" id="features" class="tablet mobile">
 


    <head>

<?php include("../../header.php"); ?>

      







<!--Browse Participants-->

<script type="text/javascript">
$(document).ready(function() {

  var track_click = 0; //track user click on "load more" button, righ now it is 0 click
  
  var total_pages = <?php echo $total_pages; ?>;
  $('#results').load("fetch_pages.php?id="+<?php echo $_GET['id']; ?>, {'page':track_click}, function() {track_click++;}); //initial data to load



  $(".load_more").click(function (e) { //user clicks on button

    $(this).hide(); //hide load more button on click
    $('.animation_image').show(); //show loading image

    if(track_click <= total_pages) //make sure user clicks are still less than total pages
    {
      //post page number and load returned data into result element
      $.post('fetch_pages.php?id='+<?php echo $_GET['id']; ?>,{'page': track_click}, function(data) {
      
        $(".load_more").show(); //bring back load more button
        
        $("#results").append(data); //append data received from server



        //scroll page to button element
        $("html, body").animate({scrollTop: $("#load_more_button").offset().top}, 500);
        
        //hide loading image

        $('.animation_image').hide(); //hide loading image once data is received
  
        track_click++; //user click increment on load button
      
      }).fail(function(xhr, ajaxOptions, thrownError) { 
        alert(thrownError); //alert any HTTP error
        $(".load_more").show(); //bring back load more button
        $('.animation_image').hide(); //hide loading image once data is received
      });
      
      
      if(track_click >= total_pages-1)
      {
        //reached end of the page yet? disable load button
        $(".load_more").attr("disabled", "disabled");
      }
     }
      
    });
});
</script>




    
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>



<script type='text/javascript'>//<![CDATA[
$(function(){

$(".launch-map").click(function(){
//alert("asdf");
    var me = $(this),
        data = me.data('key');
   
var geocoder = new google.maps.Geocoder();
var address = data.param1;
var day = data.param2;
var time = data.param3;

//alert(data);

$('.modal-day').text(day);
$('.modal-time').text(time);


geocoder.geocode( { 'address': address}, function(results, status) {

  if (status == google.maps.GeocoderStatus.OK) {
    var latitude = results[0].geometry.location.lat();
    var longitude = results[0].geometry.location.lng();
    
  } 



var center = new google.maps.LatLng(latitude, longitude);


function initialize() {

    var mapOptions = {
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        center: center
    };

    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

    var marker = new google.maps.Marker({
        map: map,
        position: center
    });
}

$('#modal').modal({
        backdrop: 'static',
        keyboard: false
    }).on('shown.bs.modal', function () {
        google.maps.event.trigger(map, 'resize');
        map.setCenter(center);
    });


initialize();
});//]]> 

}); 
});

</script>


        
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
        echo '<img src="'.BASE_PATH.'/images/profile/startup/'.$row['profile_image'].'" class="img-circle-profile"/>';
}else{
        echo '<img src="'.BASE_PATH.'/images/profile/thumbnail.jpg" class="img-circle-profile"/>';
 }

}

      ?>




    </div>
    <div class="col-lg-4">
      <h3><?php echo $row['FirstName']; ?>&nbsp;<?php echo $row['LastName']; ?></h3>
      <?php if(!empty($row['Age'])){echo $row['Age'].',';} ?> <?php if(!empty($row['City'])){echo $row['City'].',';} ?> <?php if(!empty($row['State'])){echo $row['State'];} ?>
<div style="margin-top:10px">
<?php if($row['Linkedin'] != '') { ?>
      <a href="<?php echo $row['Linkedin']; ?>" target="_blank">
     <img src="<?php echo BASE_PATH; ?>/images/icons/linkedin.png" width="25"/>
     </a>
<?php } ?>     
<?php if($row['Twitter'] != '') { ?>
      <a href="<?php echo $row['Twitter']; ?>" target="_blank">
     <img src="<?php echo BASE_PATH; ?>/images/icons/twitter.png" width="25"/>
     </a>
<?php } ?>  
<?php if($row['Facebook'] != '') { ?>
      <a href="<?php echo $row['Facebook']; ?>" target="_blank">
     <img src="<?php echo BASE_PATH; ?>/images/icons/facebook.png" width="25"/>
     </a>
<?php } ?>  

</div>


      </div>

     


  </div>





  
  <div class="therow">
    <!--<div class="col-lg-1">
     
      6 Posts

    </div>-->
     <div class="col-lg-12">
     
      

<?php
//include db configuration file




//MySQL query
//$Result = mysql_query("SELECT * FROM tbl_startup_project WHERE startupID = '".$_SESSION['startupSession']."' ORDER BY id DESC ");






if(!empty($_SESSION['participantSession'])){

echo '<div class="thetitle">Ideas posted by '.$row['FirstName'].' you qualify to participate:</div>';


$sqlstartup=mysqli_query($connecDB,"SELECT * FROM tbl_startup_project WHERE startupID='".$_GET['id']."' AND FinishedProcess = 'Y' ORDER BY id DESC");
//$resultsstartup=mysql_query($sqlstartup);

while($row3 = mysqli_fetch_array($sqlstartup)){

$Min_Req = str_replace(",","|",$row3['MinReq']);

//echo $Min_Req;
//echo $row3['id'];
//echo "<br>";






$participant = mysqli_query($connecDB,"SELECT * FROM tbl_participant WHERE userID='".$_SESSION['participantSession']."'");
$rowparticipant = mysqli_fetch_array($participant);




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


$sql2=mysqli_query($connecDB,"SELECT * FROM tbl_participant WHERE userID='".$_SESSION['participantSession']."'");
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


$sql4 = mysqli_query($connecDB,"SELECT * 
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
where userID = '".$_SESSION['participantSession']."' AND ProjectID = '".$row3['ProjectID']."' AND Met != 'yes' ");


if(mysqli_num_rows($sql4) == false)
{


$sql=mysqli_query($connecDB,"SELECT * FROM `tbl_participant` AS p INNER JOIN `tbl_startup_project` AS r ON p.userID='".$_SESSION['participantSession']."'
 $theage $thegender $theheight $thecity $thestatus $theethnicity $thesmoke $thedrink $thediet $thereligion $theeducation $thejob $interests $languages AND
 ProjectID = '".$row3['ProjectID']."'");



if(mysqli_num_rows($sql)>0)
{






//get all records from add_delete_record table
while($row2 = mysqli_fetch_array($sql))
{ 


$posts = 0;
$posts++;





//echo $row2['id'];


$date = date_create($row2['Date_Created']);

  ?>


<!-- Delete a Project -->

<div id="slide-delete-<?php echo $row2['ProjectID']; ?>" class="well slide-delete">
  <div class="result-delete">
  <div id="result-delete-<?php echo $row2['ProjectID']; ?>">Successfully Deleted!</div>
  </div>
<h4>Are you sure you want to delete this project?</h4>
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






<div class="survey-info-container">

<div class="row">


    <div class="col-md-2">

<?php 

$ProjectImage = mysqli_query($connecDB,"SELECT * FROM tbl_startup_project WHERE startupID='".$_GET['id']."' AND ProjectID = '".$row2['ProjectID']."' AND FinishedProcess = 'Y'");
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
                      <div class="label">You Get:</div>
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

<a href="<?php echo BASE_PATH; ?>/ideas/s/pr/<?php echo $row2['Category']; ?>/?id=<?php echo $row2['ProjectID']; ?>">

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



<?php 


//echo $row2['id'];





}



  //if projects exists


} 


?>




<?php 








}


if(empty($posts)){

echo '<div class="row">
    <div class="col-md-12">
<div class="empty-projects">Sorry you don\'t qualify for any ideas posted by '.$row['FirstName'].' yet</div>
  <div class="create-one-here-box">
      <div class="create-one"><br>
      <a href="'.BASE_PATH.'/participant/idea/browse/">
        <button class="slide_open create-one-btn">Browse other Ideas</button>
        </a>
       </div> 
  </div>
</div>

</div>
</div>';

}

}


}

?>






<?php


if(!empty($_SESSION['startupSession'])){

echo '<div class="thetitle">Your Ideas Posted:</div>';


if($_SESSION['startupSession'] == $_GET['id']){

$sql=mysqli_query($connecDB,"SELECT * FROM tbl_startup_project WHERE startupID = '".$_SESSION['startupSession']."' AND FinishedProcess = 'Y' ORDER BY id DESC");

}

if($_SESSION['startupSession'] != $_GET['id']){

$sql="SELECT * FROM tbl_startup_project WHERE startupID = '".$_GET['id']."' AND ProjectStatus = 'Public' ORDER BY id DESC";

}


//$result=mysql_query($sql);
//$row=mysql_fetch_array($result);



  //if projects exists
if(mysqli_num_rows($sql)>0)
{





//get all records from add_delete_record table
while($row2 = mysqli_fetch_array($sql))
{ 







//echo $row2['id'];


$date = date_create($row2['Date_Created']);

  ?>


<?php if($participant_home->is_logged_in()){ ?>

<a href="<?php echo BASE_PATH; ?>/ideas/p/<?php echo $row2['Category']; ?>/?id=<?php echo $row2['ProjectID']; ?>&p=<?php echo $_GET['id']; ?>">

<?php } ?>



<?php if($startup_home->is_logged_in()){ ?>

<a href="<?php echo BASE_PATH; ?>/ideas/s/pr/<?php echo $row2['Category']; ?>/?id=<?php echo $row2['ProjectID']; ?>">

<?php } ?>



<div class="surveys-list">

<div class="survey-info-container">

<div class="row">


    <div class="col-md-2">

<?php 

$ProjectImage = mysqli_query($connecDB,"SELECT * FROM tbl_startup_project WHERE ProjectID = '".$row2['ProjectID']."'");
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
                      <div class="label">Created</div>
                      <div class="value" ng-bind="(survey.date | date:'MM/dd/yyyy')"><?php echo date_format($date, 'm/d/Y'); ?></div>
                    </div>
                    <div class="item date">
                      <div class="label">Category</div>
                      <div class="value">
                       <span ng-if="!survey.running &amp;&amp; !survey.finalized &amp;&amp; !survey.waitingForApproval" class="draft">
                        
                          <?php $category = str_replace("-"," ",$rowproject['Category']); echo $category; ?>
                        </span>
                      </div>
                    </div>
                    <div class="item date">
                      <div class="label">People participate to provide feedback</div>
                      <div class="value" ng-bind="(survey.numberOfCompletedSurveys)">
                        
<?php


$result_count = mysqli_query($connecDB,"SELECT ProjectID,userID, COUNT(DISTINCT userID) AS count FROM tbl_meeting_upcoming WHERE ProjectID = '".$row2['ProjectID']."'  GROUP BY ProjectID");
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
                
                  </div>
               


  
     </div>
   </div>
</div>



<?php 


//echo $row2['id'];





}

echo '</a>';

  //if projects exists


} else{echo "No ideas posted yet";}

}

?>









    </div>
   
  </div>



 
  

</div>




     

          
      </div>

    

                 


            


          </div>

    

  

      

    </div>

   <!--Footer-->
<?php include("../../footer.php"); ?>
<!--Footer-->

  </div>

  

  </div>

  </div>

 

        <!--/.fluid-container-->
        <script src="<?php echo BASE_PATH; ?>/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_PATH; ?>/assets/scripts.js"></script>






        
    </body>

</html>

<?php } ?>