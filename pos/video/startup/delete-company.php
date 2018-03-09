<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../base_path.php';
 include_once("../config.php"); 

 require '../cloudinary/lib/rb.php';
 require '../cloudinary/src/Cloudinary.php';
 require '../cloudinary/src/Uploader.php';
 require '../cloudinary/src/Api.php'; // Only required for creating upload presets on the fly

 require_once('../algoliasearch-client-php-master/algoliasearch.php');


if($_POST){

	


$sql = mysqli_query($connecDB,"SELECT * FROM startups WHERE userID = '".$_SESSION['entrepreneurSession']."' AND id='".$_POST['id']."'");
$row = mysqli_fetch_array($sql);


if(mysqli_num_rows($sql)<=0) {





}else{



if($row['Logo'] != '') {

\Cloudinary::config(array(
    "cloud_name" => "dgml9ji66",
    "api_key" => "341921643963213",
    "api_secret" => "BRddFY0iBJQwAwohhJIrsd0VaP8"
));

//R::setup('mysql:host=localhost;dbname=findacto', 'root', '123');

$result = \Cloudinary\Uploader::destroy($row['Logo'], $options = array());


}


//Upload to algolia
$client = new \AlgoliaSearch\Client("F3O2TAOV5W", "a48a018178dec80cadba88cee14f169b");
$index = $client->initIndex('startups');

$index->deleteObject($row['startupID']);





//Delete Team Members
$sql = mysqli_query($connecDB,"SELECT * FROM tbl_team WHERE userID = '".$_SESSION['entrepreneurSession']."'");
while($row_team = mysqli_fetch_array($sql)){  

$sql=mysqli_query($connecDB,"DELETE FROM tbl_team WHERE userID = '".$_SESSION['entrepreneurSession']."'");

}

//Likes of Company
$sql=mysqli_query($connecDB,"DELETE FROM tbl_likes WHERE requested_id = '".$_SESSION['entrepreneurSession']."'");

$sql_likes = mysqli_query($connecDB,"SELECT * FROM tbl_likes WHERE Industry = '".$row['Industry']."'");
$row_likes = mysqli_fetch_array($sql_likes); 


//Top rated startups
$sql_top = mysqli_query($connecDB,"SELECT * FROM tbl_top_rated_startups WHERE Industry = '".$row['Industry']."'");
$row_top = mysqli_fetch_array($sql_top); 

$sql = "UPDATE tbl_top_rated_startups SET 
Likes='".$row_top."' - '".$row_likes."'  

WHERE Industry='".$row['Industry']."'";
mysqli_query($connecDB, $sql);


//Delete Company
$sql=mysqli_query($connecDB,"DELETE FROM startups WHERE userID = '".$_SESSION['entrepreneurSession']."' AND id = '".$_POST['id']."'");

}


}

?>