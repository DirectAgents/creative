<?php


session_start();
require_once '../../../class.admin.php';
include_once("../../../config.php");

require_once '../../../base_path.php';

//require( "phpmailer/class.phpmailer.php" );

$ip = $_SERVER['REMOTE_ADDR'];


$random = rand(5, 20000);




$sqladmin = mysqli_query($connecDB,"SELECT * FROM tbl_admin");
$rowadmin = mysqli_fetch_array($sqladmin);





date_default_timezone_set('America/New_York');
$the_date = date('Y-m-d'); 
$the_time = date('h:i:s A');


if($_POST)
{


$insert_sql = mysqli_query($connecDB,"INSERT INTO homeless(homelessID, Firstname, Lastname, Location, Video, Date, Time) 
VALUES('".$random."' ,'".$_POST['firstname']."', '".$_POST['lastname']."' , '".$_POST['location']."', '".$_POST['video']."', '".$the_date."', '".$the_time."')");


  
$output = json_encode(array('status' => 'success','text'=> '<div class="success">Successfully Added!</div>'));
die($output);


}


?>