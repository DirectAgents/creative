<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../class.investor.php';
 require_once '../base_path.php';
 include_once("../config.php"); 
 require_once('../algoliasearch-client-php-master/algoliasearch.php');
 require '../cloudinary/lib/rb.php';
 require '../cloudinary/src/Cloudinary.php';
 require '../cloudinary/src/Uploader.php';
 require '../cloudinary/src/Api.php'; // Only required for creating upload presets on the fly


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


if(!isset($_SESSION['entrepreneurSession'])){
 
header('Location: '.BASE_PATH.'');
//echo "yo";
exit();

}

if(isset($_SESSION['entrepreneurSession'])){

$sql = mysqli_query($connecDB, "SELECT * FROM tbl_users WHERE userID='".$_SESSION['entrepreneurSession']."'");
$row = mysqli_fetch_array($sql); 

if(!empty($row['Type'])){
  header('Location: '.BASE_PATH.'');
  exit();
}


if(empty($row['Type'])){


if($_GET){

if(isset($_SESSION['google_id'])){


	    $sql = mysqli_query($connecDB,"SELECT * FROM tbl_users WHERE Email = '".$_SESSION['email']."'");
      $row = mysqli_fetch_array($sql);

          if($row['userID']) //if user already exist change greeting text to "Welcome Back"
   			 {   

        $update_sql = mysqli_query($connecDB,"UPDATE tbl_users SET 
        Type = '".$_GET['type']."'
    
        WHERE Email='".$_SESSION['email']."'");

        //echo 'Welcome back '.$user->name.'! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
 


//If Investor save in Algolia
if($_GET['type'] == 'Investor') {

date_default_timezone_set('America/New_York');
$date = date("Y-m-d");
$time = date('h:i:s A');  

$date_algolia = date('F j',strtotime($date));  // January 30, 2015, for example.


if($row['ProfileImage'] == 'Google'){$profileimage = $row['google_picture_link'];}
if($row['ProfileImage'] == 'Facebook'){$profileimage = "https://graph.facebook.com/".$row['facebook_id']."/picture?type=large";}
if($row['ProfileImage'] == 'Google'){$profileimage = $row['linkedin_picture_link'];}


//Upload to algolia
$response = array();

$response[] = array(
  'objectID'=> $row['userID'],
  'investorID'=> $row['userID'],
  'url'=> seoUrl($row['Fullname']), 
  'fullname'=> $row['Fullname'],
  'profileimage'=> $profileimage,
  'likes'=> '0',
  'date'=> $date_algolia
   );

$fp = fopen('investors.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);

//echo var_dump($response);


$client = new \AlgoliaSearch\Client("F3O2TAOV5W", "a48a018178dec80cadba88cee14f169b");
$index = $client->initIndex('investors');

$records = json_decode(file_get_contents('investors.json'), true);

$chunks = array_chunk($records, 1000);

foreach ($chunks as $batch) {
  $index->addObjects($batch);
}

//Upload to Cloudinary
\Cloudinary::config(array(
    "cloud_name" => "dgml9ji66",
    "api_key" => "341921643963213",
    "api_secret" => "BRddFY0iBJQwAwohhJIrsd0VaP8"
));

//R::setup('mysql:host=localhost;dbname=findacto', 'root', '123');

if($row['ProfileImage'] == 'Google'){ 
$result = \Cloudinary\Uploader::upload($row['google_picture_link'], $options = array("upload_preset" => "h0hyscue"));
}

if($row['ProfileImage'] == 'Facebook'){ 
$result = \Cloudinary\Uploader::upload("https://graph.facebook.com/".$row['facebook_id']."/picture?width=9999", $options = array("upload_preset" => "h0hyscue"));
}

if($row['ProfileImage'] == 'Linkedin'){ 
$result = \Cloudinary\Uploader::upload($row['linkedin_picture_link'], $options = array("upload_preset" => "h0hyscue"));
}


}

if($_GET['type'] == 'StartupE') {  include 'welcome-email-startup.php'; }
if($_GET['type'] == 'Investor') {  include 'welcome-email-investor.php'; }
       


        header('Location: '.BASE_PATH.'');
        exit();

       } 

}


if(isset($_SESSION['facebook_id'])){

  


	    $sql = mysqli_query($connecDB,"SELECT * FROM tbl_users WHERE Email = '".$_SESSION['email']."'");
      $row = mysqli_fetch_array($sql);

      

          if($row['userID']) //if user already exist change greeting text to "Welcome Back"
   			 {   

        $update_sql = mysqli_query($connecDB,"UPDATE tbl_users SET 
        Type = '".$_GET['type']."'
    
        WHERE Email='".$_SESSION['email']."'");

        //echo 'Welcome back '.$user->name.'! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';


//If Investor save in Algolia
if($_GET['type'] == 'Investor') {

date_default_timezone_set('America/New_York');
$date = date("Y-m-d");
$time = date('h:i:s A');  

$date_algolia = date('F j',strtotime($date));  // January 30, 2015, for example.


if($row['ProfileImage'] == 'Google'){$profileimage = $row['google_picture_link'];}
if($row['ProfileImage'] == 'Facebook'){$profileimage = "https://graph.facebook.com/".$row['facebook_id']."/picture?type=large";}
if($row['ProfileImage'] == 'Google'){$profileimage = $row['linkedin_picture_link'];}

$response = array();

$response[] = array(
  'objectID'=> $row['userID'],
  'investorID'=> $row['userID'],
  'url'=> seoUrl($row['Fullname']), 
  'fullname'=> $row['Fullname'],
  'profileimage'=> $profileimage,
  'likes'=> '0',
  'date'=> $date_algolia
   );

$fp = fopen('investors.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);

//echo var_dump($response);

//Upload to algolia
$client = new \AlgoliaSearch\Client("F3O2TAOV5W", "a48a018178dec80cadba88cee14f169b");
$index = $client->initIndex('investors');

$records = json_decode(file_get_contents('investors.json'), true);

$chunks = array_chunk($records, 1000);

foreach ($chunks as $batch) {
  $index->addObjects($batch);
}

//Upload to Cloudinary
\Cloudinary::config(array(
    "cloud_name" => "dgml9ji66",
    "api_key" => "341921643963213",
    "api_secret" => "BRddFY0iBJQwAwohhJIrsd0VaP8"
));

//R::setup('mysql:host=localhost;dbname=findacto', 'root', '123');

if($row['ProfileImage'] == 'Google'){ 
$result = \Cloudinary\Uploader::upload($row['google_picture_link'], $options = array("upload_preset" => "h0hyscue"));
}

if($row['ProfileImage'] == 'Facebook'){ 
$result = \Cloudinary\Uploader::upload("https://graph.facebook.com/".$row['facebook_id']."/picture?width=9999", $options = array("upload_preset" => "h0hyscue"));
}

if($row['ProfileImage'] == 'Linkedin'){ 
$result = \Cloudinary\Uploader::upload($row['linkedin_picture_link'], $options = array("upload_preset" => "h0hyscue"));
}


}
       
        if($_GET['type'] == 'StartupE') {  include 'welcome-email-startup.php'; }
        if($_GET['type'] == 'Investor') {  include 'welcome-email-investor.php'; }

        header('Location: '.BASE_PATH.'');
        //echo "asdfsaf";
        //echo $_SESSION['email'];
        exit();

       } 

}



if(isset($_SESSION['linkedin_id'])){


	    $sql = mysqli_query($connecDB,"SELECT * FROM tbl_users WHERE Email = '".$_SESSION['email']."'");
        $row = mysqli_fetch_array($sql);

          if($row['userID']) //if user already exist change greeting text to "Welcome Back"
   			 {   

        $update_sql = mysqli_query($connecDB,"UPDATE tbl_users SET 
        Type = '".$_GET['type']."'
    
        WHERE Email='".$_SESSION['email']."'");

        //echo 'Welcome back '.$user->name.'! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
       

//If Investor save in Algolia
if($_GET['type'] == 'Investor') {

date_default_timezone_set('America/New_York');
$date = date("Y-m-d");
$time = date('h:i:s A');  

$date_algolia = date('F j',strtotime($date));  // January 30, 2015, for example.


if($row['ProfileImage'] == 'Google'){$profileimage = $row['google_picture_link'];}
if($row['ProfileImage'] == 'Facebook'){$profileimage = "https://graph.facebook.com/".$row['facebook_id']."/picture?type=large";}
if($row['ProfileImage'] == 'Google'){$profileimage = $row['linkedin_picture_link'];}

$response = array();

$response[] = array(
  'objectID'=> $row['userID'],
  'investorID'=> $row['userID'],
  'url'=> seoUrl($row['Fullname']), 
  'fullname'=> $row['Fullname'],
  'profileimage'=> $profileimage,
  'likes'=> '0',
  'date'=> $date_algolia
   );

$fp = fopen('../investor/investors.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);

//echo var_dump($response);

//Upload to algolia
$client = new \AlgoliaSearch\Client("F3O2TAOV5W", "a48a018178dec80cadba88cee14f169b");
$index = $client->initIndex('investors');

$records = json_decode(file_get_contents('../investor/investors.json'), true);

$chunks = array_chunk($records, 1000);

foreach ($chunks as $batch) {
  $index->addObjects($batch);
}

//Upload to Cloudinary
\Cloudinary::config(array(
    "cloud_name" => "dgml9ji66",
    "api_key" => "341921643963213",
    "api_secret" => "BRddFY0iBJQwAwohhJIrsd0VaP8"
));

//R::setup('mysql:host=localhost;dbname=findacto', 'root', '123');

if($row['ProfileImage'] == 'Google'){ 
$result = \Cloudinary\Uploader::upload($row['google_picture_link'], $options = array("upload_preset" => "h0hyscue"));
}

if($row['ProfileImage'] == 'Facebook'){ 
$result = \Cloudinary\Uploader::upload("https://graph.facebook.com/".$row['facebook_id']."/picture?width=9999", $options = array("upload_preset" => "h0hyscue"));
}

if($row['ProfileImage'] == 'Linkedin'){ 
$result = \Cloudinary\Uploader::upload($row['linkedin_picture_link'], $options = array("upload_preset" => "h0hyscue"));
}


}


        if($_GET['type'] == 'StartupE') {  include 'welcome-email-startup.php'; }
        if($_GET['type'] == 'Investor') {  include 'welcome-email-investor.php'; }


        header('Location: '.BASE_PATH.'');
        exit();

       } 

}



////POST//////

/*
if ($_SERVER["REQUEST_METHOD"] == "GET") {


if(isset($_SESSION['google_id'])){

 $insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_users (google_id, Email, Fullname, google_picture_link, google_token, ProfileImage, Type) 
      VALUES ('".$_SESSION['google_id']."', '".$_SESSION['email']."', '".$_SESSION['fullname']."', '".$_SESSION['google_picture_link']."', 
      '".$_SESSION['access_token']."', 'Google' ,'".$_GET['type']."')");


 $sql = mysqli_query($connecDB,"SELECT * FROM tbl_users WHERE Email = '".$_SESSION['email']."'");
 $row2 = mysqli_fetch_array($sql);




}

if(isset($_SESSION['facebook_id'])){

 $insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_users (facebook_id, Email, Type) 
      VALUES ('".$_SESSION['facebook_id']."', '".$_SESSION['email']."', '".$_GET['type']."')");


 $sql = mysqli_query($connecDB,"SELECT * FROM tbl_users WHERE Email = '".$_SESSION['email']."'");
 $row2 = mysqli_fetch_array($sql);




}


if(isset($_SESSION['linkedin_id'])){

 $insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_users (linkedin_id, Email, Fullname, linkedin_picture_link, ProfileImage, Type) 
      VALUES ('".$_SESSION['linkedin_id']."', '".$_SESSION['email']."' , '".$_SESSION['fullname']."', 
      '".$_SESSION['linkedin_picture_link']."', 'Linkedin', '".$_GET['type']."')");

 $sql = mysqli_query($connecDB,"SELECT * FROM tbl_users WHERE Email = '".$_SESSION['email']."'");
 $row2 = mysqli_fetch_array($sql);




}
*/


//include 'welcome-email.php';


 //echo  $_SESSION['entrepreneurSession'];
 //echo  $_SESSION['usernameSession'];
 //header('Location: '.BASE_PATH.'');
 //exit();



}

}

}

?>