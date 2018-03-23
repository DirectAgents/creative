<?php

 require 'cloudinary/lib/rb.php';
 require 'cloudinary/src/Cloudinary.php';
 require 'cloudinary/src/Uploader.php';
 require 'cloudinary/src/Api.php'; // Only required for creating upload presets on the fly


//Upload to Cloudinary
\Cloudinary::config(array(
    "cloud_name" => "dgml9ji66",
    "api_key" => "341921643963213",
    "api_secret" => "BRddFY0iBJQwAwohhJIrsd0VaP8"
));

//R::setup('mysql:host=localhost;dbname=findacto', 'root', '123');

$result = \Cloudinary\Uploader::upload("https://s3.amazonaws.com/clarityfm-production/attachments/18894/default/A0578939-158E-4FC9-9A09-DEB6524B9CB1.jpeg?1513343445", $options = array("upload_preset" => "h0hyscue"));

?>