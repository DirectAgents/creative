<?php
session_start();
require_once '../../../../class.researcher.php';
include_once("../../../../config.php");
include("../../../../config.inc.php");




$researcher_home = new RESEARCHER();

if(!$researcher_home->is_logged_in())
{
  $researcher_home->redirect('../../../../login/researcher.php');
}

$stmt = $researcher_home->runQuery("SELECT * FROM tbl_participant WHERE userID='".$_GET['id']."'");
$stmt->execute(array(":uid"=>$_SESSION['researcherSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);





$Project = mysql_query("SELECT * FROM tbl_researcher_project WHERE researcherID='".$_SESSION['researcherSession']."'");
$rowproject = mysql_fetch_array($Project);

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
//$screening=explode(',',$rowproject['Screening']);




$Profileimage = mysql_query("SELECT * FROM participant_profile_images WHERE userID='".$_GET['id']."'");
$rowprofileimage = mysql_fetch_array($Profileimage);


?>

<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title><?php echo $row['userEmail']; ?></title>
        <!-- Bootstrap -->
        <link href="<?php echo BASE_PATH; ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo BASE_PATH; ?>/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo BASE_PATH; ?>/assets/styles.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <link href="<?php echo BASE_PATH; ?>/css/font-awesome.css" rel="stylesheet" media="screen">




<link href="https://fonts.googleapis.com/css?family=Lato:400,700|Roboto:400,700,300" rel="stylesheet" type="text/css">






<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<!--JAVASCRIPT-->




 <!-- jQuery Popup Overlay -->
<script src="<?php echo BASE_PATH; ?>/researcher/project/js/jquery.popupoverlay.js"></script>







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
var from = data.param3;
var to = data.param4;

var at = data.param5;

//alert(from);

$('.modal-day').text(day);
$('.modal-from').text(from);
$('.modal-to').text(to);
$('.modal-address').text(address);

//alert(at);

if (typeof at === 'undefined' ){
//alert(at);
//alert(to);
$('.modal-at').hide();
$('.modal-from').show();
$('.to').show();
$('.modal-to').show();


}else{
  //alert(at);
 $('.modal-at').show(); 
 $('.modal-at').text(at); 
 $('.to').hide();
 $('.modal-from').hide();
 $('.modal-to').hide();
}




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

    map = new google.maps.Map(document.getElementById('map'), mapOptions);

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
        <?php include("../../../../nav.php"); ?>

<!--TopNav-->


  
        








 <div class="clearer"></div>


<!-- Main -->

   <div class="container">


<div class="row-fluid">
  <div class="span12">


    <div id="create-project-box">
      <div id="create-project">
              <a href="../?id=<? echo $_GET['p']; ?>" class="initialism btn-back">Back</a>

            </div>
        </div>
        <div id="target"></div>    
<div id="white-container">
      <div id="dashboardSurveyTargetingContainerLogic">





<div class="container">
  <div class="therow">
    <div class="col-lg-3">
      
      <?php
  if($rowprofileimage['thumbnail_image'] != ''){
  
  echo '<img src="'.BASE_PATH.'/participant/account/uploads/'.$rowprofileimage['thumbnail_image'].'" class="img-circle-profile"/>';

}else{

 echo '<img src="'.BASE_PATH.'/participant/account/uploads/thumbnail.jpg" class="img-circle-profile"/>';
}

      ?>


    </div>
    <div class="col-lg-4"><h3><?php echo $row['FirstName']; ?> <?php echo $row['LastName']; ?></h3>
      <?php echo $row['Age']; ?> - <?php echo $row['City']; ?> - <?php echo $row['State']; ?></div>
  </div>


<div class="therow">
    <div class="col-lg-12"><h4>Availability</h4></div>
   
  </div>

   <div class="therow">






 <!-- Modal -->
  <div class="modal fade" id="modal">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="modal-day"></div>

        <div class="at">&nbsp;at&nbsp;</div>

        <div class="modal-at"></div> 

        <div class="modal-from"></div>
        <div class="to">&nbsp;to&nbsp;</div>
        <div class="modal-to"></div>

       <div class="modal-location">
       <div class="label-location">Location:</div> <div class="modal-address"></div>
      </div>

        </div>
        <div class="modal-body">
         <div id="map"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


   


  
<div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>Day</th>
        <th>Available</th>
        <th>Location</th>
        <th>Place to meet</th>
      </tr>
    </thead>
    <tbody>


<?php
$stmt2 = $researcher_home->runQuery("SELECT * FROM tbl_project_request WHERE userID='".$_GET['id']."' AND ProjectID = '".$_GET['p']."' AND Day = 'Monday'");
$stmt2->execute(array(":uid"=>$_SESSION['researcherSession']));
$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
?>


      <tr>
        <td>Monday</td>
        <td><?php if($row['Monday_From'] != ''){ echo $row['Monday_From']; echo ' to '; echo $row['Monday_To']; }else{echo "Not available";} ?></td>
        <td><?php if($row['Monday_From'] != ''){ ?><a href="#" class="launch-map" data-toggle="modal" data-target="#modal" data-key='{"param1":"<?php echo $row['Monday_Location']; ?>", "param2":"Monday","param3":"<?php echo $row['Monday_From']; ?>", "param4":"<?php echo $row['Monday_To']; ?>"}'>View Location</a><?php } ?></td>
        <td><?php if($row['Monday_From'] != '' && $row2['Location'] == ''){ ?><a href="place-suggest.php?id=<?php echo $_GET['id'];?>&p=<?php echo $_GET['p'];?>&f=<?php echo $row['Monday_From'];?>&t=<?php echo $row['Monday_To'];?>&d=Monday">Suggest a Place</a><?php } ?>
        <?php if($row2['Location'] != '' && $row2['Accepted_to_Participate'] == 'Pending' ){ ?>
          Suggested <a href="#" class="launch-map" data-toggle="modal" data-target="#modal" data-key='{"param1":"<?php echo $row2['Location']; ?>", "param2":"<?php echo $row2['Day']; ?>","param5":"<?php echo $row2['Time']; ?>"}'>(View)<?php } ?></a>
<?php if($row2['Location'] != '' && $row2['Accepted_to_Participate'] == 'Accepted' ){ ?>
          Request Accepted <a href="#" class="launch-map" data-toggle="modal" data-target="#modal" data-key='{"param1":"<?php echo $row2['Location']; ?>", "param2":"<?php echo $row2['Day']; ?>","param5":"<?php echo $row2['Time']; ?>"}'>(View)<?php } ?></a>
        </td>
</tr>

<?php
$stmt3 = $researcher_home->runQuery("SELECT * FROM tbl_project_request WHERE userID='".$_GET['id']."' AND ProjectID = '".$_GET['p']."' AND Day = 'Tuesday'");
$stmt3->execute(array(":uid"=>$_SESSION['researcherSession']));
$row3 = $stmt3->fetch(PDO::FETCH_ASSOC);
?>

    <tr>
        <td>Tuesday</td>
        <td><?php if($row['Tuesday_From'] != ''){ echo $row['Tuesday_From']; echo ' to '; echo $row['Tuesday_To'];}else{echo "Not available";} ?></td>                
        <td><?php if($row['Tuesday_From'] != ''){ ?><a href="#" class="launch-map" data-toggle="modal" data-target="#modal" data-key='{"param1":"<?php echo $row['Tuesday_Location']; ?>", "param2":"Tuesday","param3":"<?php echo $row['Tuesday_From']; ?>", "param4":"<?php echo $row['Tuesday_To']; ?>"}'>View Location</a><?php } ?></td>
        <td><?php if($row['Tuesday_From'] != '' && $row3['Location'] == ''){ ?><a href="place-suggest.php?id=<?php echo $_GET['id'];?>&p=<?php echo $_GET['p'];?>&f=<?php echo $row['Tuesday_From'];?>&t=<?php echo $row['Tuesday_To'];?>&d=Tuesday">Suggest a Place</a><?php } ?>
         <?php if($row3['Location'] != '' && $row3['Accepted_to_Participate'] == 'Pending' ){ ?>
          Suggested <a href="#" class="launch-map" data-toggle="modal" data-target="#modal" data-key='{"param1":"<?php echo $row3['Location']; ?>", "param2":"<?php echo $row3['Day']; ?>","param5":"<?php echo $row3['Time']; ?>"}'>(View)<?php } ?></a>
<?php if($row3['Location'] != '' && $row3['Accepted_to_Participate'] == 'Accepted' ){ ?>
          Request Accepted <a href="#" class="launch-map" data-toggle="modal" data-target="#modal" data-key='{"param1":"<?php echo $row3['Location']; ?>", "param2":"<?php echo $row3['Day']; ?>","param5":"<?php echo $row3['Time']; ?>"}'>(View)<?php } ?></a>
        </td>
    </tr>  

<?php
$stmt4 = $researcher_home->runQuery("SELECT * FROM tbl_project_request WHERE userID='".$_GET['id']."' AND ProjectID = '".$_GET['p']."' AND Day = 'Wednesday'");
$stmt4->execute(array(":uid"=>$_SESSION['researcherSession']));
$row4 = $stmt4->fetch(PDO::FETCH_ASSOC);
?>

    <tr>
        <td>Wednesday</td>
        <td><?php if($row['Wednesday_From'] != ''){ echo $row['Wednesday_From']; echo ' to '; echo $row['Wednesday_To'];}else{echo "Not available";} ?></td>
        <td><?php if($row['Wednesday_From'] != ''){ ?><a href="#" class="launch-map" data-toggle="modal" data-target="#modal" data-key='{"param1":"<?php echo $row['Wednesday_Location']; ?>", "param2":"Wednesday","param3":"<?php echo $row['Wednesday_From']; ?>", "param4":"<?php echo $row['Wednesday_To']; ?>"}'>View Location</a><?php } ?></td>
        <td><?php if($row['Wednesday_From'] != '' && $row4['Location'] == ''){ ?><a href="place-suggest.php?id=<?php echo $_GET['id'];?>&p=<?php echo $_GET['p'];?>&f=<?php echo $row['Wednesday_From'];?>&t=<?php echo $row['Wednesday_To'];?>&d=Wednesday">Suggest a Place</a><?php } ?>
         <?php if($row4['Location'] != '' && $row4['Accepted_to_Participate'] == 'Pending' ){ ?>
          Suggested <a href="#" class="launch-map" data-toggle="modal" data-target="#modal" data-key='{"param1":"<?php echo $row4['Location']; ?>", "param2":"<?php echo $row4['Day']; ?>","param5":"<?php echo $row4['Time']; ?>"}'>(View)<?php } ?></a>
<?php if($row4['Location'] != '' && $row4['Accepted_to_Participate'] == 'Accepted' ){ ?>
          Request Accepted <a href="#" class="launch-map" data-toggle="modal" data-target="#modal" data-key='{"param1":"<?php echo $row4['Location']; ?>", "param2":"<?php echo $row4['Day']; ?>","param5":"<?php echo $row4['Time']; ?>"}'>(View)<?php } ?></a>
        </td>
    </tr> 

<?php
$stmt5 = $researcher_home->runQuery("SELECT * FROM tbl_project_request WHERE userID='".$_GET['id']."' AND ProjectID = '".$_GET['p']."' AND Day = 'Thursday'");
$stmt5->execute(array(":uid"=>$_SESSION['researcherSession']));
$row5 = $stmt5->fetch(PDO::FETCH_ASSOC);
?>

     <tr>
        <td>Thursday</td>
        <td><?php if($row['Thursday_From'] != ''){ echo $row['Thursday_From']; echo ' to '; echo $row['Thursday_To']; }else{echo "Not available";} ?></td>
        <td><?php if($row['Thursday_From'] != ''){ ?><a href="#" class="launch-map" data-toggle="modal" data-target="#modal" data-key='{"param1":"<?php echo $row['Thursday_Location']; ?>", "param2":"Thursday","param3":"<?php echo $row['Thursday_From']; ?>", "param4":"<?php echo $row['Thursday_To']; ?>"}'>View Location</a><?php } ?></td>
        <td><?php if($row['Thursday_From'] != '' && $row5['Location'] == ''){ ?><a href="place-suggest.php?id=<?php echo $_GET['id'];?>&p=<?php echo $_GET['p'];?>&f=<?php echo $row['Thursday_From'];?>&t=<?php echo $row['Thursday_To'];?>&d=Thursday">Suggest a Place</a><?php } ?>
       <?php if($row5['Location'] != '' && $row5['Accepted_to_Participate'] == 'Pending' ){ ?>
          Suggested <a href="#" class="launch-map" data-toggle="modal" data-target="#modal" data-key='{"param1":"<?php echo $row5['Location']; ?>", "param2":"<?php echo $row5['Day']; ?>","param5":"<?php echo $row5['Time']; ?>"}'>(View)<?php } ?></a>
<?php if($row5['Location'] != '' && $row5['Accepted_to_Participate'] == 'Accepted' ){ ?>
          Request Accepted <a href="#" class="launch-map" data-toggle="modal" data-target="#modal" data-key='{"param1":"<?php echo $row5['Location']; ?>", "param2":"<?php echo $row5['Day']; ?>","param5":"<?php echo $row5['Time']; ?>"}'>(View)<?php } ?></a>
        </td>
    </tr>  

 <?php
$stmt6 = $researcher_home->runQuery("SELECT * FROM tbl_project_request WHERE userID='".$_GET['id']."' AND ProjectID = '".$_GET['p']."' AND Day = 'Friday'");
$stmt6->execute(array(":uid"=>$_SESSION['researcherSession']));
$row6 = $stmt6->fetch(PDO::FETCH_ASSOC);
?>   

     <tr>
        <td>Friday</td>
        <td><?php if($row['Friday_From'] != ''){ echo $row['Friday_From']; echo ' to '; echo $row['Friday_To'];}else{echo "Not available";} ?></td>
        <td><?php if($row['Friday_From'] != ''){ ?><a href="#" class="launch-map" data-toggle="modal" data-target="#modal" data-key='{"param1":"<?php echo $row['Friday_Location']; ?>", "param2":"Friday","param3":"<?php echo $row['Friday_From']; ?>", "param4":"<?php echo $row['Friday_To']; ?>"}'>View Location</a><?php } ?></td>
        <td><?php if($row['Friday_From'] != '' && $row6['Location'] == ''){ ?><a href="place-suggest.php?id=<?php echo $_GET['id'];?>&p=<?php echo $_GET['p'];?>&f=<?php echo $row['Friday_From'];?>&t=<?php echo $row['Friday_To'];?>&d=Friday">Suggest a Place</a><?php } ?>
       <?php if($row6['Location'] != '' && $row6['Accepted_to_Participate'] == 'Pending' ){ ?>
          Suggested <a href="#" class="launch-map" data-toggle="modal" data-target="#modal" data-key='{"param1":"<?php echo $row6['Location']; ?>", "param2":"<?php echo $row6['Day']; ?>","param5":"<?php echo $row6['Time']; ?>"}'>(View)<?php } ?></a>
<?php if($row6['Location'] != '' && $row6['Accepted_to_Participate'] == 'Accepted' ){ ?>
          Request Accepted <a href="#" class="launch-map" data-toggle="modal" data-target="#modal" data-key='{"param1":"<?php echo $row6['Location']; ?>", "param2":"<?php echo $row6['Day']; ?>","param5":"<?php echo $row6['Time']; ?>"}'>(View)<?php } ?></a>
        </td>
    </tr> 

 <?php
$stmt7 = $researcher_home->runQuery("SELECT * FROM tbl_project_request WHERE userID='".$_GET['id']."' AND ProjectID = '".$_GET['p']."' AND Day = 'Saturday'");
$stmt7->execute(array(":uid"=>$_SESSION['researcherSession']));
$row7 = $stmt7->fetch(PDO::FETCH_ASSOC);
?>  

    <tr>
        <td>Sunday</td>
        <td><?php if($row['Saturday_From'] != ''){ echo $row['Saturday_From']; echo ' to '; echo $row['Saturday_To'];}else{echo "Not available";} ?></td>
        <td><?php if($row['Saturday_From'] != ''){ ?><a href="#" class="launch-map" data-toggle="modal" data-target="#modal" data-key='{"param1":"<?php echo $row['Saturday_Location']; ?>", "param2":"Saturday","param3":"<?php echo $row['Saturday_From']; ?>", "param4":"<?php echo $row['Saturday_To']; ?>"}'>View Location</a><?php } ?></td>
        <td><?php if($row['Saturday_From'] != '' && $row7['Location'] == ''){ ?><a href="place-suggest.php?id=<?php echo $_GET['id'];?>&p=<?php echo $_GET['p'];?>&f=<?php echo $row['Saturday_From'];?>&t=<?php echo $row['Saturday_To'];?>&d=Saturday">Suggest a Place</a><?php } ?>
         <?php if($row7['Location'] != '' && $row7['Accepted_to_Participate'] == 'Pending' ){ ?>
          Suggested <a href="#" class="launch-map" data-toggle="modal" data-target="#modal" data-key='{"param1":"<?php echo $row7['Location']; ?>", "param2":"<?php echo $row7['Day']; ?>","param5":"<?php echo $row7['Time']; ?>"}'>(View)<?php } ?></a>
<?php if($row7['Location'] != '' && $row7['Accepted_to_Participate'] == 'Accepted' ){ ?>
          Request Accepted <a href="#" class="launch-map" data-toggle="modal" data-target="#modal" data-key='{"param1":"<?php echo $row7['Location']; ?>", "param2":"<?php echo $row7['Day']; ?>","param5":"<?php echo $row7['Time']; ?>"}'>(View)<?php } ?></a>
        </td>
    </tr> 

 <?php
$stmt8 = $researcher_home->runQuery("SELECT * FROM tbl_project_request WHERE userID='".$_GET['id']."' AND ProjectID = '".$_GET['p']."' AND Day = 'Sunday'");
$stmt8->execute(array(":uid"=>$_SESSION['researcherSession']));
$row8 = $stmt8->fetch(PDO::FETCH_ASSOC);
?> 

    <tr>
        <td>Sunday</td>
        <td><?php if($row['Sunday_From'] != ''){ echo $row['Sunday_From']; echo ' to '; echo $row['Sunday_To'];}else{echo "Not available";} ?></td>
        <td><?php if($row['Sunday_From'] != ''){ ?><a href="#" class="launch-map" data-toggle="modal" data-target="#modal" data-key='{"param1":"<?php echo $row['Sunday_Location']; ?>", "param2":"Sunday,"param3":"<?php echo $row['Sunday_From']; ?>", "param4":"<?php echo $row['Sunday_To']; ?>"}'>View Location</a><?php } ?></td>
        <td><?php if($row['Sunday_From'] != '' && $row8['Location'] == ''){ ?><a href="place-suggest.php?id=<?php echo $_GET['id'];?>&p=<?php echo $_GET['p'];?>&f=<?php echo $row['Sunday_From'];?>&t=<?php echo $row['Sunday_To'];?>&d=Sunday">Suggest a Place</a><?php } ?>
        <?php if($row8['Location'] != ''){ ?>
          Suggested <a href="#" class="launch-map" data-toggle="modal" data-target="#modal" data-key='{"param1":"<?php echo $row8['Location']; ?>", "param2":"<?php echo $row8['Day']; ?>","param5":"<?php echo $row8['Time']; ?>"}'>(View)<?php } ?></a></td>
    </tr> 
      
    </tbody>
  </table>
  </div>

 </div>


  
  <div class="therow">
    <div class="col-lg-12">
      <h4>About</h4>
      <p><?php echo $row['Bio']; ?></p>
    </div>
  </div>


  <div class="therow">
    <div class="col-lg-4"><h4>Meetupchoice:</h4><?php echo $row['Meetupchoice']; ?></div>
    <div class="col-lg-4"><h4>Gender:</h4><?php echo $row['Gender']; ?></div>
    <div class="col-lg-4"><h4>Height: </h4><?php echo $row['Height']; ?></div>
  </div>

  <div class="therow">
    <div class="col-lg-4"><h4>Status:</h4> <?php echo $row['Status']; ?></div>
    <div class="col-lg-4"><h4>Ethnicity:</h4> <?php echo $row['Ethnicity']; ?></div>
    <div class="col-lg-4"><h4>Smoke:</h4> <?php echo $row['Smoke']; ?></div>
  </div>

   <div class="therow">
    <div class="col-lg-4"><h4>Drink:</h4> <?php echo $row['Drink']; ?></div>
    <div class="col-lg-4"><h4>Diet:</h4> <?php echo $row['Diet']; ?></div>
    <div class="col-lg-4"><h4>Religion:</h4> <?php echo $row['Religion']; ?></div>
  </div>

   <div class="therow">
    <div class="col-lg-4"><h4>Education:</h4> <?php echo $row['Education']; ?></div>
    <div class="col-lg-4"><h4>Occupation:</h4> <?php echo $row['Job']; ?></div>
  </div>

  

</div>











<div class="clearer"></div>

       
        





     

          
      </div>

    

                    <div class="clearer"></div>


            


          </div>

      <div class="clearer"></div>


  

      

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