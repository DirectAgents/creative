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

R::setup('mysql:host=localhost;dbname=findacto', 'root', '123');

$result = \Cloudinary\Uploader::destroy('ahlz4rsvtig8rqikpnyf', $options = array());


?>

