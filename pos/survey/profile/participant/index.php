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



/*
$startup_home = new startup();

if($startup_home->is_logged_in())
{
  $startup_home->logout();
}





if(!$participant_home->is_logged_in())
{
  $participant_home->redirect('../participant/login.php');
}*/

include_once '../../dbConfig_rating.php';


$query = "SELECT rating_number, FORMAT((total_points / rating_number),1) as average_rating FROM participant_rating WHERE post_id = '".$_GET['id']."' AND status = 1";
$result = $db->query($query);
$ratingRow = $result->fetch_assoc();





$rating_and_comment=mysqli_query($connecDB,"SELECT * FROM c5t_comment WHERE comment_identifier_id='".$_GET['id']."'");





$stmt = $participant_home->runQuery("SELECT * FROM tbl_participant WHERE userID='".$_GET['id']."'");
$stmt->execute(array(":uid"=>$_GET['id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);





$Project = mysqli_query($connecDB,"SELECT * FROM tbl_startup_project WHERE startupID='".$_GET['id']."'");
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







?>

<!DOCTYPE html>
<html lang="en" id="features" class="tablet mobile">    
    <head>

<?php include("../../participant/header.php"); ?>




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

 <div class="col-lg-5">
      <table class="table table-bordered">
    <thead>
      <tr>
        <th>Meetings Participated</th>
 
<?php if(isset($_SESSION['startupSession'])){ ?>
        <th>Rating</th>
     <?php  }  ?>   
     <th>Comments</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>

<?php


$result_count = mysqli_query($connecDB,"SELECT Status,userID, COUNT(userID) AS count FROM tbl_meeting_archived WHERE Status = 'Met' AND userID = '".$_GET['id']."'");
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


<?php if (!$rating_and_comment) { ?>


    No rating


<?php }else{  ?>


   
    <?php if ($ratingRow['average_rating'] != ''){echo $ratingRow['average_rating'];}else{echo "Not Rated";} ?>



<?php  }  ?>  

    </div>


        </td>
        <?php  }  ?>  

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


  </div>




     
      

<?php






$sqlstartup=mysqli_query($connecDB,"SELECT * FROM tbl_startup_project ORDER BY id DESC");
//$resultsstartup=mysql_query($sqlstartup);

while($row3 = mysqli_fetch_array($sqlstartup)){

$Min_Req = str_replace(",","|",$row3['MinReq']);

//echo $Min_Req;
//echo $row3['id'];
//echo "<br>";



$participant_languages = mysqli_query($connecDB,"SELECT * FROM tbl_participant_languages WHERE userID='".$_GET['id']."'");
$rowparticipant_languages = mysqli_fetch_array($participant_languages);

$participant_interest = mysqli_query($connecDB,"SELECT * FROM tbl_participant_interests WHERE userID='".$_GET['id']."'");
$rowparticipant_interest = mysqli_fetch_array($participant_interest);




$participant = mysqli_query($connecDB,"SELECT * FROM tbl_participant WHERE userID='".$_GET['id']."'");
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
$Interest = str_replace(",","|",$rowparticipant_interest['Interests']);
$Languages = str_replace(",","|",$rowparticipant_languages['Languages']);


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


if (strpos($Min_Req, 'Interest') !== false) {
if($Interest != 'NULL' && $Interest != ''){$interest = "AND r.Interest RLIKE '[[:<:]]".$Interest."[[:>:]]'";}else{$interest = '';}
}else{
  $interest = '';
}

if (strpos($Min_Req, 'Languages') !== false) {
if($Languages != 'NULL' && $Languages != ''){$languages = "AND r.Languages RLIKE '[[:<:]]".$Languages."[[:>:]]'";}else{$languages = '';}
}else{
  $languages = '';
}



//echo $rowproject['City'];


$sql=mysqli_query($connecDB,"SELECT * FROM `tbl_participant` AS p INNER JOIN `tbl_startup_project` AS r ON p.userID='".$_GET['id']."'
 $theage $thegender $theheight $thecity $thestatus $theethnicity $thesmoke $thedrink $thediet $thereligion $theeducation $thejob $interest $languages AND
 ProjectID = '".$row3['ProjectID']."'");





//}









//$result=mysqli_query($sql);
//$row=mysql_fetch_array($result);



  //if projects exists
if(mysqli_num_rows($sql)>0)
{


  echo '<div class="therowtitle">

<div class="col-lg-12">';


if(isset($_SESSION['startupSession'])) {

echo '<div class="thetitle">'.$row['FirstName'].' qualify\'s for these ideas:</div>';

}


if(isset($_SESSION['participantSession'])) {

if($_SESSION['participantSession'] == $_GET['id']) {

echo '<div class="thetitle">You qualify for these ideas:</div>';

}

}


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


<?php if($participant_home->is_logged_in()){ ?>

<a href="<?php echo BASE_PATH; ?>/ideas/p/<?php echo $row2['Category']; ?>/?id=<?php echo $row2['ProjectID']; ?>&p=<?php echo $_GET['id']; ?>">

<?php } ?>


<?php if($startup_home->is_logged_in()){ ?>

<a href="<?php echo BASE_PATH; ?>/ideas/s/<?php echo $row2['Category']; ?>/?id=<?php echo $row2['ProjectID']; ?>&p=<?php echo $_GET['id']; ?>">

<?php } ?>


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
                      <div class="label">Idea is set to:</div>
                      <div class="value">
                       <span ng-if="!survey.running &amp;&amp; !survey.finalized &amp;&amp; !survey.waitingForApproval" class="draft">
                          <?php echo $row2['ProjectStatus']; ?> 
                        </span>
                      </div>
                    </div>
                   
                    <div class="clearer"></div>
                  </div>
                
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




     

          





<div class="therowtitle">
    <div class="col-lg-12">
   <div class="thetitle">About <?php echo $row['FirstName']; ?></div>
 </div>
</div>

<?php if($row['Bio'] != 'NULL' && $row['Bio'] != ''){ ?>
 <div class="therow">
    <div class="col-lg-12"><?php if($row['Bio'] != 'NULL'){echo $row['Bio'];}else{echo "No Bio";} ?></div>
  </div>
  <?php } ?>



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
    <div class="col-lg-4"><h4>Interests:</h4>

    <?php if($rowparticipant_interest['Interests'] != ''){


$participant_interest=mysqli_query($connecDB,"SELECT * FROM tbl_participant_interests WHERE userID='".$_GET['id']."'");
//$resultsstartup=mysql_query($sqlstartup);

while($rowparticipant_interest = mysqli_fetch_array($participant_interest)){

$arr_interest[] = $rowparticipant_interest['Interests'];

}

$interests = implode(', ', $arr_interest);

echo $interests;

            
      }else{
        
      echo "No Interests Provided";} 

      ?>


      </div>

  </div>


  <div class="therow">
    <div class="col-lg-4"><h4>Languages:</h4> 


<?php if($rowparticipant_languages['Languages'] != ''){


$participant_languages=mysqli_query($connecDB,"SELECT * FROM tbl_participant_languages WHERE userID='".$_GET['id']."'");
//$resultsstartup=mysql_query($sqlstartup);

while($rowparticipant_languages = mysqli_fetch_array($participant_languages)){

$arr_languages[] = $rowparticipant_languages['Languages'];

}

$languages = implode(', ', $arr_languages);

echo $languages;

            
      }else{
        
      echo "No Languages Provided";} 

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

 

        <!--/.fluid-container-->
        <script src="<?php echo BASE_PATH; ?>/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_PATH; ?>/assets/scripts.js"></script>






        
    </body>

</html>