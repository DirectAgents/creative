<?php

 session_start();
 include_once("config.php");
 require_once 'base_path.php'; 

  require 'cloudinary/lib/rb.php';
  require 'cloudinary/src/Cloudinary.php';
  require 'cloudinary/src/Uploader.php';
  require 'cloudinary/src/Api.php'; // Only required for creating upload presets on the fly


  $sql=mysqli_query($connecDB,"SELECT * FROM work WHERE userID='".$_POST['userid']."' ORDER BY id DESC ");
  $row_work = mysqli_fetch_array($sql); 


if($row_work['screenshots'] != '') {

\Cloudinary::config(array(
    "cloud_name" => "dgml9ji66",
    "api_key" => "341921643963213",
    "api_secret" => "BRddFY0iBJQwAwohhJIrsd0VaP8"
));

//R::setup('mysql:host=localhost;dbname=findacto', 'root', '123');

$result = \Cloudinary\Uploader::destroy($row_work['screenshots'], $options = array());


}

$sql=mysqli_query($connecDB,"DELETE FROM work WHERE userID = '".$_POST['userid']."' AND id = '".$_POST['id']."'");


$result_count = mysqli_query($connecDB,"SELECT userID,id, COUNT(DISTINCT id) AS count FROM work WHERE userID = '1' GROUP BY userID");
$row_count = mysqli_fetch_assoc($result_count);
$count = $row_count['count'];

if($count > 0 ){
echo '<div id="thecount">';
echo $count;
echo '</div>';
}else{
echo '<div id="thecount">';
echo '0';
echo '</div>';
}

echo '<div id="random">';
echo $_POST['random'];
echo '</div>';

?>

