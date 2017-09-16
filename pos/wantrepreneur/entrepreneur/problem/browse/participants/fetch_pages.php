<?php
session_start();

require_once '../../../../base_path.php'; 

include("../../../../config.php"); //include config file
require_once '../../../../class.startup.php';
//sanitize post value
$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);


//echo $page_number;

//throw HTTP error if page number is not valid
if(!is_numeric($page_number)){
  header('HTTP/1.1 500 Invalid page number!');
  exit();
}

//get current starting point of records
$position = ($page_number * $item_per_page);



$results = mysqli_query($connecDB,"SELECT * FROM tbl_meeting_upcoming WHERE ProjectID = '".$_GET['id']."' AND startupID='".$_SESSION['startupSession']."' ORDER BY userID DESC LIMIT $position, $item_per_page ");







//Check if Screening Question is required for this idea






//$results = mysql_query("SELECT id,userID, Gender FROM tbl_participant_project 
//WHERE Gender RLIKE '".$Gender."' OR Age RLIKE '".$Age."' ORDER BY id DESC LIMIT $position, $item_per_page");

if(mysqli_num_rows($results)<1)
{
echo "<div class='no-participants'>";
echo "<h3>";
echo "No more Participants!";
echo "</h3>";
echo "</div>";

echo '
<script type="text/javascript">
$(".load_more").hide();
</script>
';

}else{


echo "</div>";





//output results from database
echo '<ul class="page_result">';


echo '<div class="col-lg-12" style="margin-bottom:50px; margin-top:30px;">';


//while($results->fetch()){ //fetch values
while($row2 = mysqli_fetch_array($results))
{ 

//echo $row2['userID'];



//echo $row['userID'];


$sql3 = mysqli_query($connecDB,"SELECT * FROM tbl_participant WHERE userID = '".$row2['userID']."' ");
$row3 = mysqli_fetch_array($sql3);









echo '


 



  <div class="col-lg-3" style="background:#eee; margin-right:20px; padding:10px 0 10px 0;">';

echo '
<table class="table-no-border">
   <tbody>
<tr><td>

<a href="'.BASE_PATH.'/profile/participant/?id='.$row2['userID'].'&p='.$_GET['id'].'">';




if($row3['google_picture_link'] != ''){
        echo '<img src="'.$row3['google_picture_link'].'" class="thumbnail-profile-browse"/>';
 }

if($row3['facebook_id'] != '0'){ 
        echo '<img src="https://graph.facebook.com/'.$row3['facebook_id'].'/picture?width=150&height=150" class="thumbnail-profile-browse"/>';
}
       
if($row3['google_picture_link'] == '' && $row3['facebook_id'] == '0'){

if($row3['profile_image'] != ''){ 
        echo '<img src="'.BASE_PATH.'/images/profile/participant/'.$row3['profile_image'].'" class="thumbnail-profile-browse"/>';
}else{
        echo '<img src="'.BASE_PATH.'/images/profile/thumbnail.jpg" class="thumbnail-profile-browse"/>';
 }

}

echo '</td> </tr>';
   
   echo '  
  <tr><td>
   <a href="'.BASE_PATH.'/profile/participant/?id='.$row3['userID'].'&p='.$_GET['id'].'" class="notextdecoration"><h4>'.$row3['FirstName'].'</h4></a>'.$row3['Age'].' - '.$row3['City'].', '.$row3['State'].'
   </td></tr>

    </tbody>
  </table>



   ';


echo '</a>';

  echo '</div>';

  ?>




  <form action="" id="contact-form" class="form-horizontal" method="post">

        
           
              <input type="hidden" name="userid" id="userid" value="<?php echo $row2['userID']; ?>">
              <input type="hidden" name="projectid" id="projectid" value="<?php echo $_GET['id']; ?>">
          

          </form>







<?php 




}

}

?>

</div>

<input type="hidden" name="firstname" id="firstname" value="'.$row2['FirstName'].'"/>
<input type="hidden" name="userid'.$row2['userID'].'" id="userid" value="'.$row2['userID'].'"/>
<input type="hidden" name="projectid" id="projectid" value="'.$_GET['id'].'"/>



