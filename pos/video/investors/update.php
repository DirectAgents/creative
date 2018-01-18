<?php  
 session_start();	
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

$sql = "UPDATE profile SET 
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

WHERE id='15'";

mysqli_query($connecDB, $sql);






}

 ?>
