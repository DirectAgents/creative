<?php

 session_start();
 include_once("config.php");
 require_once 'base_path.php'; 

  require 'cloudinary/lib/rb.php';
  require 'cloudinary/src/Cloudinary.php';
  require 'cloudinary/src/Uploader.php';
  require 'cloudinary/src/Api.php'; // Only required for creating upload presets on the fly


  $sql=mysqli_query($connecDB,"SELECT * FROM work WHERE userid='".$_POST['userid']."' ORDER BY id DESC ");
  $row_work = mysqli_fetch_array($sql); 



\Cloudinary::config(array(
    "cloud_name" => "dgml9ji66",
    "api_key" => "341921643963213",
    "api_secret" => "BRddFY0iBJQwAwohhJIrsd0VaP8"
));

//R::setup('mysql:host=localhost;dbname=findacto', 'root', '123');

$result = \Cloudinary\Uploader::destroy($_POST['screenshot'], $options = array());


$sql=mysqli_query($connecDB,"DELETE FROM work WHERE id = '".$_POST['id']."' AND ProjectID = '".$_POST['projectid']."' AND startupID = '".$_POST['startupid']."'");


echo $_POST['random'];


?>

