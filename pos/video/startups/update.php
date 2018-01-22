<?php  
 session_start();	
 require_once '../base_path.php';
 include_once("../config.php");  
 //require_once('algoliasearch-client-php-master/algoliasearch.php');


if($_POST) {

$arr = explode(",", $_POST['fm_location'], 2);
$city = $arr[0];
$state = $arr[1];
$state_final = str_replace(' ', '', $state);	


$sql = "SELECT * FROM zip_state WHERE city='".$city."' AND state = '".$state_final."'";  
$result = mysqli_query($connecDB, $sql);  
$row_zip = mysqli_fetch_array($result);

$sql = "UPDATE tbl_startup SET 
Fullname='".$_POST['fm_fullname']."',
Email='".$_POST['fm_email']."',
Phone='".$_POST['fm_phone']."',
City='".$city."',
State='".$state_final."',
ZipCode='".$row_zip['zip']."',
Facebook = '".$_POST['fm_facebook']."',
Twitter = '".$_POST['fm_twitter']."',
AngelList = '".$_POST['fm_angellist']."',
About = '".$_POST['fm_about']."'

WHERE userID='".$_SESSION['startupSession']."'";

mysqli_query($connecDB, $sql);


echo '<div id="fullname">';
echo '<h4 class="text-white">';
echo $_POST['fm_fullname'];
echo '</h4>';
echo '</div>';


echo '<div id="city-state">';
echo '<h5 class="text-white">';
echo $city.', '.$state_final;
echo '</h5>';
echo '</div>';

echo '<div id="facebook">';
echo '<a href="'.$_POST['fm_facebook'].'"><i class="ti-facebook"></i></a>';
echo '</div>';

echo '<div id="twitter">';
echo '<a href="'.$_POST['fm_twitter'].'"><i class="ti-twitter"></i></a>';
echo '</div>';

echo '<div id="angellist">';
echo '<a href="'.$_POST['fm_angellist'].'"><img src="'.BASE_PATH.'/images/angel-list-icon.jpg"/></a>';
echo '</div>';

}

 ?>
