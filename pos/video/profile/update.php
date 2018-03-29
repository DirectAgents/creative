<?php  
 session_start();	
 require_once '../base_path.php';
 include_once("../config.php");  
 require_once("../algoliasearch-client-php-master/algoliasearch.php");


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


$sql2 = mysqli_query($connecDB,"SELECT * FROM tbl_users WHERE userID = '".$_SESSION['entrepreneurSession']."'");
$row = mysqli_fetch_array($sql2);


//Upload to algolia


function seoUrl($string) {
    //Lower case everything
    $string = strtolower($string);
    //Make alphanumeric (removes all other characters)
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    //Clean up multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);
    //Convert whitespaces and underscore to dash
    $string = preg_replace("/[\s_]/", "-", $string);
    return $string;
}

if($row['ProfileImage'] == 'Google'){$profileimage = $row['google_picture_link'];}
if($row['ProfileImage'] == 'Facebook'){$profileimage = "https://graph.facebook.com/".$row['facebook_id']."/picture?type=large";}
if($row['ProfileImage'] == 'Google'){$profileimage = $row['linkedin_picture_link'];}


$date_algolia = date('F j',strtotime($row['Date_Created']));  // January 30, 2015, for example.

$response = array();

$response[] = array(
  'objectID'=> $_SESSION['entrepreneurSession'],
  'investorID'=> $_SESSION['entrepreneurSession'],
  'url'=> seoUrl($row['Fullname']),
  'fullname'=> $row['Fullname'],
  'profileimage'=> $profileimage,
  'likes'=> '0', 
  'location'=> $city.', '.$state_final,
  'date'=> $date_algolia
   );

$fp = fopen('../choose/investors.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);

//echo var_dump($response);


$client = new \AlgoliaSearch\Client("F3O2TAOV5W", "a48a018178dec80cadba88cee14f169b");
$index = $client->initIndex('investors');

$records = json_decode(file_get_contents('../choose/investors.json'), true);

$chunks = array_chunk($records, 1000);

foreach ($chunks as $batch) {
  $index->addObjects($batch);
}





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
