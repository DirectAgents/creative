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

if($_POST['fm_facebook'] != ''){
if(strpos($_POST['fm_facebook'], "http://") !== false || strpos($_POST['fm_facebook'], "https://" !== false) ){ $facebook = $_POST['fm_facebook']; 
}else{$facebook = "http://".$_POST['fm_facebook'];}
}else{
$facebook = '';	
}

if($_POST['fm_twitter'] != ''){
if(strpos($_POST['fm_twitter'], "http://") !== false || strpos($_POST['fm_twitter'], "https://" !== false) ){ $twitter = $_POST['fm_twitter']; 
}else{$twitter = "http://".$_POST['fm_twitter'];}
}else{
$twitter = '';	
}

if($_POST['fm_linkedin'] != ''){
if(strpos($_POST['fm_linkedin'], "http://") !== false || strpos($_POST['fm_linkedin'], "https://" !== false) ){ $linkedin = $_POST['fm_linkedin']; 
}else{$linkedin = "http://".$_POST['fm_linkedin'];}
}else{
$linkedin = '';	
}

$sql = "SELECT * FROM zip_state WHERE city='".$city."' AND state = '".$state_final."'";  
$result = mysqli_query($connecDB, $sql);  
$row_zip = mysqli_fetch_array($result);

$sql = "UPDATE tbl_users SET 
Phone='".$_POST['fm_phone']."',
City='".$city."',
State='".$state_final."',
ZipCode='".$row_zip['zip']."',
Facebook = '".$facebook."',
Twitter = '".$twitter."',
Linkedin = '".$linkedin."'

WHERE userID='".$_SESSION['entrepreneurSession']."'";

mysqli_query($connecDB, $sql);





echo '<div id="facebook">';
echo $facebook;
echo '</div>';

echo '<div id="twitter">';
echo $twitter;
echo '</div>';

echo '<div id="linkedin">';
echo $linkedin;
echo '</div>';

}

 ?>
