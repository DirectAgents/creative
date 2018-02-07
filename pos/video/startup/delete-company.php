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

$index->deleteObject($_POST['id']);



$sql=mysqli_query($connecDB,"DELETE FROM startups WHERE userID = '".$_SESSION['entrepreneurSession']."' AND id = '".$_POST['id']."'");



}


}

?>