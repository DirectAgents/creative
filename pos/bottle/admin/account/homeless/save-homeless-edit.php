<?php


session_start();
require_once '../../../class.admin.php';
include_once("../../../config.php");

require_once '../../../base_path.php';





$sqladmin = mysqli_query($connecDB,"SELECT * FROM tbl_admin");
$rowadmin = mysqli_fetch_array($sqladmin);





date_default_timezone_set('America/New_York');
$the_date = date('Y-m-d'); 
$the_time = date('h:i:s A');


if($_POST)
{

 $update_sql = mysqli_query($connecDB,"UPDATE homeless SET 
  Firstname='".$_POST['firstname']."',
  Lastname='".$_POST['lastname']."',
  Location='".$_POST['location']."',
  Video='".$_POST['video']."'

  WHERE id='".$_POST['id']."'");


  
$output = json_encode(array('status' => 'success','text'=> '<div class="success">Successfully Saved!</div>'));
die($output);


}


?>