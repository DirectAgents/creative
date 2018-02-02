<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../base_path.php';
 include_once("../config.php"); 

 require '../cloudinary/lib/rb.php';
 require '../cloudinary/src/Cloudinary.php';
 require '../cloudinary/src/Uploader.php';
 require '../cloudinary/src/Api.php'; // Only required for creating upload presets on the fly


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




$sql=mysqli_query($connecDB,"DELETE FROM startups WHERE userID = '".$_SESSION['entrepreneurSession']."' AND id = '".$_POST['id']."'");



}


}

?>