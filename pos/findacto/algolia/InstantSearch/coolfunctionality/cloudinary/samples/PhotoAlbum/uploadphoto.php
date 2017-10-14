<?php


require 'lib/rb.php';
  require '../../src/Cloudinary.php';
  require '../../src/Uploader.php';
  require '../../src/Api.php'; // Only required for creating upload presets on the fly

\Cloudinary::config(array(
    "cloud_name" => "dgml9ji66",
    "api_key" => "341921643963213",
    "api_secret" => "BRddFY0iBJQwAwohhJIrsd0VaP8"
));

R::setup('mysql:host=localhost;dbname=coolfunctionality', 'root', '123');


define("UPLOAD_DIR", "photos/");
$myFile = $_FILES["files"];
$number_of_files = count($_FILES["files"]["tmp_name"]);
$i=0;
for($i==0;$i<$number_of_files;$i++)
{


$success = move_uploaded_file($_FILES["files"]["tmp_name"][$i],UPLOAD_DIR.$_FILES["files"]["name"][$i]);
if (!$success) {
       echo "<p>Unable to save file.</p>";
       //exit;
    }
else
{
echo "File <b>".$_FILES["files"]["name"][$i]."</b> has been uploaded<br>";


$random = rand(100, 1000000);





\Cloudinary\Uploader::upload("photos/".$_FILES["files"]["name"][$i], array("upload_preset" => "scnk5xom", "public_id" => $random));

}
}
?>