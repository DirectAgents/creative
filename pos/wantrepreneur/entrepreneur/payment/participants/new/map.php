<?php
require_once '../../../../class.startup.php';
include_once("../../../../config.php");
include("../../../../config.inc.php");
?>

<?php

$sql = mysql_query("SELECT * FROM tbl_participant WHERE userID='".$_POST['userid']."'");
$row = mysql_fetch_array($sql); 

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


<script type="text/javascript">
    $(document).ready(function() {
    $('#myModal').modal('show');
});
</script>


 <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/js/jquery-ui.css">
 
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



<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

   <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>

    <div id="tabs">
  <ul>
    <li><a href="#tabs-1" class="tabs-1">Monday</a></li>
    <li><a href="#tabs-2" class="tabs-2">Tuesday</a></li>
    <li><a href="#tabs-3" class="tabs-3">Wednesday</a></li>
    <li><a href="#tabs-4">Thursday</a></li>
    <li><a href="#tabs-5">Friday</a></li>
    <li><a href="#tabs-6">Saturday</a></li>
    <li><a href="#tabs-7">Sunday</a></li>
  </ul>
 




  <div id="tabs-1">

<p>

<?php

$sql1 = mysql_query("SELECT * FROM tbl_participant_request WHERE userID='".$_POST['userid']."' AND ProjectID= '".$_POST['projectid']."' AND Day = 'Monday' ");
$row1 = mysql_fetch_array($sql1); 

if(mysql_num_rows($sql1)>0)
{

?>

<div class="header-one">
  <div class="header-two">
    <div class="label-status">Status:</div> <div class="modal-status"><?php echo $row1['Accepted_to_Participate']; ?></div>
  
    <div class="label-when">When:</div>  
        <div class="modal-day-time"><?php echo $row1['Day']; ?>&nbsp;at&nbsp;<?php echo $row1['Time']; ?></div>
   </div>
   </div>

  <div class="map-canvas">
<div style="height:100%;width:100%;max-width:100%;list-style:none; transition: none;overflow:hidden;"><div id="canvas-for-google-map" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $row1['Location']; ?>&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe></div><a class="google-map-html" href="http://www.hostingreviews.website/compare/ipage-vs-bluehost" id="make-map-data">bluehost ipage</a><style>#canvas-for-google-map .text-marker{max-width:none!important;background:none!important;}img{max-width:none}</style></div><script src="https://www.hostingreviews.website/google-maps-authorization.js?id=163effc8-bc1a-b985-b816-4df5b6a49a6b&c=google-map-html&u=1464658963" defer="defer" async="async"></script>
         </div>


<?php }else{ ?>

<?php

$sql_monday = mysql_query("SELECT * FROM tbl_participant WHERE userID='".$_POST['userid']."' AND Monday_Location != ''AND Monday_From != '' AND Monday_To != '' ");
$row_monday = mysql_fetch_array($sql_monday); 

if(mysql_num_rows($sql_monday)>0)
{

echo "You haven't requested for a meetup yet.";

echo "<br>";
echo "<br>";

echo $row_monday['FirstName'].' '. 'is available on Monday between those hours:';
echo "&nbsp;  ";
echo "<strong>";
echo $row_monday['Monday_From'];
echo "</strong>";
echo "to&nbsp;";
echo "<strong>";
echo $row_monday['Monday_To'];
echo "</strong>";

echo "<br>";


echo '<a href="profile/place-suggest.php?id='.$_POST['userid'].'&p='.$_POST['projectid'].'&f='.$row['Monday_From'].'&t='.$row['Monday_To'].'&d=Monday" class="suggest-a-place">Suggest a Place</a>';

echo "<br>";
echo "<br>";

echo $row_monday['FirstName'].' '. 'will be around this Location on Mondays:';

echo '
   <div class="map-canvas">
<div style="height:100%;width:100%;max-width:100%;list-style:none; transition: none;overflow:hidden;"><div id="canvas-for-google-map" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q='.$row_monday['Tuesday_Location'].'&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe></div><a class="google-map-html" href="http://www.hostingreviews.website/compare/ipage-vs-bluehost" id="make-map-data">bluehost ipage</a><style>#canvas-for-google-map .text-marker{max-width:none!important;background:none!important;}img{max-width:none}</style></div><script src="https://www.hostingreviews.website/google-maps-authorization.js?id=163effc8-bc1a-b985-b816-4df5b6a49a6b&c=google-map-html&u=1464658963" defer="defer" async="async"></script>
         </div>

';

}else{
echo "<div style='text-align:center'>";
echo $row['FirstName'].' '. 'is not available to meet on Mondays.';
echo "</div>";
}

?>

<?php } ?>

</p>
  
  </div>





   <div id="tabs-2">
<p>

  <?php

$sql2 = mysql_query("SELECT * FROM tbl_participant_request WHERE userID='".$_POST['userid']."' AND ProjectID= '".$_POST['projectid']."' AND Day = 'Tuesday' ");
$row2 = mysql_fetch_array($sql2);  

if(mysql_num_rows($sql2)>0)
{


?>


<div class="header-one">
  <div class="header-two">
    <div class="label-status">Status:</div> <div class="modal-status"><?php echo $row2['Accepted_to_Participate']; ?></div>
  
    <div class="label-when">When:</div>  
        <div class="modal-day-time"><?php echo $row2['Day']; ?>&nbsp;at&nbsp;<?php echo $row2['Time']; ?></div>
   </div>
   </div>

 <div class="map-canvas">
<div style="height:100%;width:100%;max-width:100%;list-style:none; transition: none;overflow:hidden;"><div id="canvas-for-google-map" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $row2['Location']; ?>&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe></div><a class="google-map-html" href="http://www.hostingreviews.website/compare/ipage-vs-bluehost" id="make-map-data">bluehost ipage</a><style>#canvas-for-google-map .text-marker{max-width:none!important;background:none!important;}img{max-width:none}</style></div><script src="https://www.hostingreviews.website/google-maps-authorization.js?id=163effc8-bc1a-b985-b816-4df5b6a49a6b&c=google-map-html&u=1464658963" defer="defer" async="async"></script>
         </div>


<?php }else{ ?>

<?php

$sql_tuesday = mysql_query("SELECT * FROM tbl_participant WHERE userID='".$_POST['userid']."' AND Tuesday_Location != ''AND Tuesday_From != '' AND Tuesday_To != '' ");
$row_tuesday = mysql_fetch_array($sql_tuesday); 

if(mysql_num_rows($sql_tuesday)>0)
{

echo "You haven't requested for a meetup yet.";

echo "<br>";
echo "<br>";

echo $row_tuesday['FirstName'].' '. 'is available on Tuesday between those hours:';
echo "&nbsp;  ";
echo "<strong>";
echo $row_tuesday['Tuesday_From'];
echo "</strong>";
echo "to&nbsp;";
echo "<strong>";
echo $row_tuesday['Tuesday_To'];
echo "</strong>";

echo "<br>";


echo '<a href="profile/place-suggest.php?id='.$_POST['userid'].'&p='.$_POST['projectid'].'&f='.$row['Tuesday_From'].'&t='.$row['Tuesday_To'].'&d=Tuesday" class="suggest-a-place">Suggest a Place</a>';

echo "<br>";
echo "<br>";

echo $row_tuesday['FirstName'].' '. 'will be around this Location on Tuesdays:';

echo '
   <div class="map-canvas">
<div style="height:100%;width:100%;max-width:100%;list-style:none; transition: none;overflow:hidden;"><div id="canvas-for-google-map" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q='.$row_tuesday['Tuesday_Location'].'&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe></div><a class="google-map-html" href="http://www.hostingreviews.website/compare/ipage-vs-bluehost" id="make-map-data">bluehost ipage</a><style>#canvas-for-google-map .text-marker{max-width:none!important;background:none!important;}img{max-width:none}</style></div><script src="https://www.hostingreviews.website/google-maps-authorization.js?id=163effc8-bc1a-b985-b816-4df5b6a49a6b&c=google-map-html&u=1464658963" defer="defer" async="async"></script>
         </div>

';

}else{
echo "<div style='text-align:center'>";
echo $row['FirstName'].' '. 'is not available to meet on Tuesdays.';
echo "</div>";
}

?>

<?php } ?>

</p>
  </div>




   <div id="tabs-3">
    <p>

<?php

$sql3 = mysql_query("SELECT * FROM tbl_participant_request WHERE userID='".$_POST['userid']."' AND ProjectID= '".$_POST['projectid']."' AND Day = 'Wednesday' ");
$row3 = mysql_fetch_array($sql3);  

if(mysql_num_rows($sql3)>0)
{

?>

<div class="header-one">
  <div class="header-two">
    <div class="label-status">Status:</div> <div class="modal-status"><?php echo $row3['Accepted_to_Participate']; ?></div>
  
    <div class="label-when">When:</div>  
        <div class="modal-day-time"><?php echo $row3['Day']; ?>&nbsp;at&nbsp;<?php echo $row3['Time']; ?></div>
   </div>
   </div>

    <div class="map-canvas">
<div style="height:100%;width:100%;max-width:100%;list-style:none; transition: none;overflow:hidden;"><div id="canvas-for-google-map" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $row3['Location']; ?>&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe></div><a class="google-map-html" href="http://www.hostingreviews.website/compare/ipage-vs-bluehost" id="make-map-data">bluehost ipage</a><style>#canvas-for-google-map .text-marker{max-width:none!important;background:none!important;}img{max-width:none}</style></div><script src="https://www.hostingreviews.website/google-maps-authorization.js?id=163effc8-bc1a-b985-b816-4df5b6a49a6b&c=google-map-html&u=1464658963" defer="defer" async="async"></script>
         </div>

<?php }else{ ?>


<?php

$sql_wednesday = mysql_query("SELECT * FROM tbl_participant WHERE userID='".$_POST['userid']."' AND Wednesday_Location != ''AND Wednesday_From != '' AND Wednesday_To != '' ");
$row_wednesday = mysql_fetch_array($sql_wednesday); 

if(mysql_num_rows($sql_wednesday)>0)
{

echo "You haven't requested for a meetup yet.";

echo "<br>";
echo "<br>";

echo $row_wednesday['FirstName'].' '. 'is available on Wednesday between those hours:';
echo "&nbsp;  ";
echo "<strong>";
echo $row_wednesday['Wednesday_From'];
echo "</strong>";
echo "to&nbsp;";
echo "<strong>";
echo $row_wednesday['Wednesday_To'];
echo "</strong>";

echo "<br>";


echo '<a href="profile/place-suggest.php?id='.$_POST['userid'].'&p='.$_POST['projectid'].'&f='.$row['Wednesday_From'].'&t='.$row['Wednesday_To'].'&d=Wednesday" class="suggest-a-place">Suggest a Place</a>';

echo "<br>";
echo "<br>";

echo $row_wednesday['FirstName'].' '. 'will be around this Location on Wednesdays:';

echo '
   <div class="map-canvas">
<div style="height:100%;width:100%;max-width:100%;list-style:none; transition: none;overflow:hidden;"><div id="canvas-for-google-map" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q='.$row_wednesday['Wednesday_Location'].'&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe></div><a class="google-map-html" href="http://www.hostingreviews.website/compare/ipage-vs-bluehost" id="make-map-data">bluehost ipage</a><style>#canvas-for-google-map .text-marker{max-width:none!important;background:none!important;}img{max-width:none}</style></div><script src="https://www.hostingreviews.website/google-maps-authorization.js?id=163effc8-bc1a-b985-b816-4df5b6a49a6b&c=google-map-html&u=1464658963" defer="defer" async="async"></script>
         </div>

';

}

?>


<?php } ?>

</p>
  </div>




   <div id="tabs-4">
    <p>

<?php

$sql4 = mysql_query("SELECT * FROM tbl_participant_request WHERE userID='".$_POST['userid']."' AND ProjectID= '".$_POST['projectid']."' AND Day = 'Thursday' ");
$row4 = mysql_fetch_array($sql4);  

if(mysql_num_rows($sql4)>0)
{
?>


<div class="header-one">
  <div class="header-two">
    <div class="label-status">Status:</div> <div class="modal-status"><?php echo $row4['Accepted_to_Participate']; ?></div>
  
    <div class="label-when">When:</div>  
        <div class="modal-day-time"><?php echo $row4['Day']; ?>&nbsp;at&nbsp;<?php echo $row4['Time']; ?></div>
   </div>
   </div>

    <div class="map-canvas">
<div style="height:100%;width:100%;max-width:100%;list-style:none; transition: none;overflow:hidden;"><div id="canvas-for-google-map" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $row4['Location']; ?>&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe></div><a class="google-map-html" href="http://www.hostingreviews.website/compare/ipage-vs-bluehost" id="make-map-data">bluehost ipage</a><style>#canvas-for-google-map .text-marker{max-width:none!important;background:none!important;}img{max-width:none}</style></div><script src="https://www.hostingreviews.website/google-maps-authorization.js?id=163effc8-bc1a-b985-b816-4df5b6a49a6b&c=google-map-html&u=1464658963" defer="defer" async="async"></script>
         </div>

<?php }else{ ?>


<?php

$sql_thursday = mysql_query("SELECT * FROM tbl_participant WHERE userID='".$_POST['userid']."' AND Thursday_Location != ''AND Thursday_From != '' AND Thursday_To != '' ");
$row_thursday = mysql_fetch_array($sql_thursday); 

if(mysql_num_rows($sql_thursday)>0)
{

echo "You haven't requested for a meetup yet.";

echo "<br>";
echo "<br>";

echo $row_thursday['FirstName'].' '. 'is available on Thursday between those hours:';
echo "&nbsp;  ";
echo "<strong>";
echo $row_thursday['Thursday_From'];
echo "</strong>";
echo "to&nbsp;";
echo "<strong>";
echo $row_thursday['Thursday_To'];
echo "</strong>";

echo "<br>";


echo '<a href="profile/place-suggest.php?id='.$_POST['userid'].'&p='.$_POST['projectid'].'&f='.$row['Thursday_From'].'&t='.$row['Thursday_To'].'&d=Thursday" class="suggest-a-place">Suggest a Place</a>';

echo "<br>";
echo "<br>";

echo $row_thursday['FirstName'].' '. 'will be around this Location on Thursdays:';

echo '
   <div class="map-canvas">
<div style="height:100%;width:100%;max-width:100%;list-style:none; transition: none;overflow:hidden;"><div id="canvas-for-google-map" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q='.$row_thursday['Thursday_Location'].'&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe></div><a class="google-map-html" href="http://www.hostingreviews.website/compare/ipage-vs-bluehost" id="make-map-data">bluehost ipage</a><style>#canvas-for-google-map .text-marker{max-width:none!important;background:none!important;}img{max-width:none}</style></div><script src="https://www.hostingreviews.website/google-maps-authorization.js?id=163effc8-bc1a-b985-b816-4df5b6a49a6b&c=google-map-html&u=1464658963" defer="defer" async="async"></script>
         </div>

';

}else{
echo "<div style='text-align:center'>";
echo $row['FirstName'].' '. 'is not available to meet on Thursdays.';
echo "</div>";
}

?>

<?php } ?>


</p>
  </div>





   <div id="tabs-5">
   <p>

<?php

$sql5 = mysql_query("SELECT * FROM tbl_participant_request WHERE userID='".$_POST['userid']."' AND ProjectID= '".$_POST['projectid']."' AND Day = 'Friday' ");
$row5 = mysql_fetch_array($sql5);  

if(mysql_num_rows($sql5)>0)
{

?>

<div class="header-one">
  <div class="header-two">
          <div class="label-status">Status:</div> <div class="modal-status"><?php echo $row['Accepted_to_Participate']; ?></div>
  </div>
    <div class="label-when">When:</div>  
        <div class="monday-day"><?php echo $row5['Day']; ?></div><div class="at">&nbsp;at&nbsp;</div> <div class="monday-time"><?php echo $row5['Time']; ?></div>
   </div>

    <div class="map-canvas">
<div style="height:100%;width:100%;max-width:100%;list-style:none; transition: none;overflow:hidden;"><div id="canvas-for-google-map" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $row5['Location']; ?>&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe></div><a class="google-map-html" href="http://www.hostingreviews.website/compare/ipage-vs-bluehost" id="make-map-data">bluehost ipage</a><style>#canvas-for-google-map .text-marker{max-width:none!important;background:none!important;}img{max-width:none}</style></div><script src="https://www.hostingreviews.website/google-maps-authorization.js?id=163effc8-bc1a-b985-b816-4df5b6a49a6b&c=google-map-html&u=1464658963" defer="defer" async="async"></script>
         </div>

<?php }else{ ?>

<?php

$sql_friday = mysql_query("SELECT * FROM tbl_participant WHERE userID='".$_POST['userid']."' AND Friday_Location != ''AND Friday_From != '' AND Friday_To != '' ");
$row_friday = mysql_fetch_array($sql_friday); 

if(mysql_num_rows($sql_friday)>0)
{

echo "You haven't requested for a meetup yet.";

echo "<br>";
echo "<br>";

echo $row_friday['FirstName'].' '. 'is available on Friday between those hours:';
echo "&nbsp;  ";
echo "<strong>";
echo $row_friday['Friday_From'];
echo "</strong>";
echo "to&nbsp;";
echo "<strong>";
echo $row_friday['Friday_To'];
echo "</strong>";

echo "<br>";


echo '<a href="profile/place-suggest.php?id='.$_POST['userid'].'&p='.$_POST['projectid'].'&f='.$row['Friday_From'].'&t='.$row['Friday_To'].'&d=Friday" class="suggest-a-place">Suggest a Place</a>';

echo "<br>";
echo "<br>";

echo $row_friday['FirstName'].' '. 'will be around this Location on Fridays:';

echo '
   <div class="map-canvas">
<div style="height:100%;width:100%;max-width:100%;list-style:none; transition: none;overflow:hidden;"><div id="canvas-for-google-map" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q='.$row_friday['Friday_Location'].'&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe></div><a class="google-map-html" href="http://www.hostingreviews.website/compare/ipage-vs-bluehost" id="make-map-data">bluehost ipage</a><style>#canvas-for-google-map .text-marker{max-width:none!important;background:none!important;}img{max-width:none}</style></div><script src="https://www.hostingreviews.website/google-maps-authorization.js?id=163effc8-bc1a-b985-b816-4df5b6a49a6b&c=google-map-html&u=1464658963" defer="defer" async="async"></script>
         </div>

';

}else{
echo "<div style='text-align:center'>";
echo $row['FirstName'].' '. 'is not available to meet on Fridays.';
echo "</div>";
}

?>

<?php } ?>

</p>
  </div>



   <div id="tabs-6">
  <p>

<?php

$sql6 = mysql_query("SELECT * FROM tbl_participant_request WHERE userID='".$_POST['userid']."' AND ProjectID= '".$_POST['projectid']."' AND Day = 'Saturday' ");
$row6 = mysql_fetch_array($sql6);  

if(mysql_num_rows($sql6)>0)
{

?>


<div class="header-one">
  <div class="header-two">
    <div class="label-status">Status:</div> <div class="modal-status"><?php echo $row6['Accepted_to_Participate']; ?></div>
  
    <div class="label-when">When:</div>  
        <div class="modal-day-time"><?php echo $row6['Day']; ?>&nbsp;at&nbsp;<?php echo $row6['Time']; ?></div>
   </div>
   </div>

    <div class="map-canvas">
<div style="height:100%;width:100%;max-width:100%;list-style:none; transition: none;overflow:hidden;"><div id="canvas-for-google-map" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $row6['Location']; ?>&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe></div><a class="google-map-html" href="http://www.hostingreviews.website/compare/ipage-vs-bluehost" id="make-map-data">bluehost ipage</a><style>#canvas-for-google-map .text-marker{max-width:none!important;background:none!important;}img{max-width:none}</style></div><script src="https://www.hostingreviews.website/google-maps-authorization.js?id=163effc8-bc1a-b985-b816-4df5b6a49a6b&c=google-map-html&u=1464658963" defer="defer" async="async"></script>
         </div>

<?php }else{ ?>

<?php

$sql_saturday = mysql_query("SELECT * FROM tbl_participant WHERE userID='".$_POST['userid']."' AND Saturday_Location != ''AND Saturday_From != '' AND Saturday_To != '' ");
$row_saturday = mysql_fetch_array($sql_saturday); 

if(mysql_num_rows($sql_saturday)>0)
{

echo "You haven't requested for a meetup yet.";

echo "<br>";
echo "<br>";

echo $row_saturday['FirstName'].' '. 'is available on Saturday between those hours:';
echo "&nbsp;  ";
echo "<strong>";
echo $row_saturday['Saturday_From'];
echo "</strong>";
echo "to&nbsp;";
echo "<strong>";
echo $row_saturday['Saturday_To'];
echo "</strong>";

echo "<br>";


echo '<a href="profile/place-suggest.php?id='.$_POST['userid'].'&p='.$_POST['projectid'].'&f='.$row['Saturday_From'].'&t='.$row['Saturday_To'].'&d=Saturday" class="suggest-a-place">Suggest a Place</a>';

echo "<br>";
echo "<br>";

echo $row_saturday['FirstName'].' '. 'will be around this Location on Saturdays:';

echo '
   <div class="map-canvas">
<div style="height:100%;width:100%;max-width:100%;list-style:none; transition: none;overflow:hidden;"><div id="canvas-for-google-map" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q='.$row_saturday['Saturday_Location'].'&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe></div><a class="google-map-html" href="http://www.hostingreviews.website/compare/ipage-vs-bluehost" id="make-map-data">bluehost ipage</a><style>#canvas-for-google-map .text-marker{max-width:none!important;background:none!important;}img{max-width:none}</style></div><script src="https://www.hostingreviews.website/google-maps-authorization.js?id=163effc8-bc1a-b985-b816-4df5b6a49a6b&c=google-map-html&u=1464658963" defer="defer" async="async"></script>
         </div>

';

}else{
echo "<div style='text-align:center'>";
echo $row['FirstName'].' '. 'is not available to meet on Saturdays.';
echo "</div>";
}

?>

<?php } ?>

</p>
  </div>



   <div id="tabs-7">
   <p>

<?php

$sql7 = mysql_query("SELECT * FROM tbl_participant_request WHERE userID='".$_POST['userid']."' AND ProjectID= '".$_POST['projectid']."' AND Day = 'Sunday' ");
$row7 = mysql_fetch_array($sql7);  

if(mysql_num_rows($sql7)>0)
{

?>

<div class="header-one">
  <div class="header-two">
    <div class="label-status">Status:</div> <div class="modal-status"><?php echo $row7['Accepted_to_Participate']; ?></div>
  
    <div class="label-when">When:</div>  
        <div class="modal-day-time"><?php echo $row7['Day']; ?>&nbsp;at&nbsp;<?php echo $row7['Time']; ?></div>
   </div>
   </div>

    <div class="map-canvas">
<div style="height:100%;width:100%;max-width:100%;list-style:none; transition: none;overflow:hidden;"><div id="canvas-for-google-map" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $row7['Location']; ?>&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe></div><a class="google-map-html" href="http://www.hostingreviews.website/compare/ipage-vs-bluehost" id="make-map-data">bluehost ipage</a><style>#canvas-for-google-map .text-marker{max-width:none!important;background:none!important;}img{max-width:none}</style></div><script src="https://www.hostingreviews.website/google-maps-authorization.js?id=163effc8-bc1a-b985-b816-4df5b6a49a6b&c=google-map-html&u=1464658963" defer="defer" async="async"></script>
         </div>

<?php }else{ ?>

<?php

$sql_sunday = mysql_query("SELECT * FROM tbl_participant WHERE userID='".$_POST['userid']."' AND Sunday_Location != ''AND Sunday_From != '' AND Sunday_To != '' ");
$row_sunday = mysql_fetch_array($sql_sunday); 

if(mysql_num_rows($sql_sunday)>0)
{

echo "You haven't requested for a meetup yet.";

echo "<br>";
echo "<br>";

echo $row_sunday['FirstName'].' '. 'is available on Sunday between those hours:';
echo "&nbsp;  ";
echo "<strong>";
echo $row_sunday['Sunday_From'];
echo "</strong>";
echo "to&nbsp;";
echo "<strong>";
echo $row_sunday['Sunday_To'];
echo "</strong>";

echo "<br>";


echo '<a href="profile/place-suggest.php?id='.$_POST['userid'].'&p='.$_POST['projectid'].'&f='.$row['Sunday_From'].'&t='.$row['Sunday_To'].'&d=Sunday" class="suggest-a-place">Suggest a Place</a>';

echo "<br>";
echo "<br>";

echo $row_sunday['FirstName'].' '. 'will be around this Location on Sundays:';

echo '
   <div class="map-canvas">
<div style="height:100%;width:100%;max-width:100%;list-style:none; transition: none;overflow:hidden;"><div id="canvas-for-google-map" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q='.$row_sunday['Sunday_Location'].'&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe></div><a class="google-map-html" href="http://www.hostingreviews.website/compare/ipage-vs-bluehost" id="make-map-data">bluehost ipage</a><style>#canvas-for-google-map .text-marker{max-width:none!important;background:none!important;}img{max-width:none}</style></div><script src="https://www.hostingreviews.website/google-maps-authorization.js?id=163effc8-bc1a-b985-b816-4df5b6a49a6b&c=google-map-html&u=1464658963" defer="defer" async="async"></script>
         </div>

';

}else{
echo "<div style='text-align:center'>";
echo $row['FirstName'].' '. 'is not available to meet on Sundays.';
echo "</div>";
}

?>

<?php } ?>

</p>
  </div>
</div>




        </div>


   <div class="modal-body">
   

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

  </div>
</div>




      <!--/.fluid-container-->
        <script src="<?php echo BASE_PATH; ?>/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_PATH; ?>/assets/scripts.js"></script>



  </body>

</html>

