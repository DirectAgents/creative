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
  Needs='".$_POST['needs']."',
  Video='".$_POST['video']."',
  profile_image='".$_FILES['file']['name']."'

  WHERE id='".$_POST['id']."'");



  if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
        move_uploaded_file($_FILES['file']['tmp_name'], '../../../images/profile/homeless/' . $_FILES['file']['name']);

    echo '<div class="success">Successfully Saved!</div>';

    }




}


?>