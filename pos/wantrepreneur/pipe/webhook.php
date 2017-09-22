<?php

require_once ('../config.php');
require_once ('../config.inc.php');

$data = $_POST["payload"];
$retrievedData = json_decode($data, true);




$obj = json_decode($data);
$videoname = $obj->{'data'}->{'videoName'}; // 12345


$thumbnail = 'https://addpipevideos.s3.amazonaws.com/806aaf1fee6d34f6268b141febc7cba3/'.$videoname.'.jpg';

$videolink = 'https://addpipevideos.s3.amazonaws.com/806aaf1fee6d34f6268b141febc7cba3/'.$videoname.'.mp4';


$sql=mysqli_query($connecDB,"SELECT * FROM tbl_feedbacks WHERE data='".$videolink."'");

if(mysqli_num_rows($sql) == 0){


$insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_feedbacks(data, thumbnail) VALUES('".$videolink."', '".$thumbnail."')");

}

?>


