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


\Cloudinary\Uploader::upload("http://aboutislam.net/wp-content/uploads/2016/12/High-Spending-on-Sports.jpg?x72838", array("upload_preset" => "scnk5xom", "public_id" => '911'));

//$result = \Cloudinary\Uploader::destroy('gximdnhsyf28qo7s6doi', $options = array());


?>

