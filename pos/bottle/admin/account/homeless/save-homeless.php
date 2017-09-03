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





if(isset($_FILES['file'])){

 if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {


$insert_sql = mysqli_query($connecDB,"INSERT INTO homeless(homelessID, Firstname, Lastname, Location, Needs, Video, profile_image, Date, Time) 
VALUES('".$random."' ,'".$_POST['firstname']."', '".$_POST['lastname']."' , '".$_POST['location']."', '".$_POST['needs']."', '".$_POST['video']."' , '".$_FILES['file']['name']."' , '".$the_date."', '".$the_time."')");


        move_uploaded_file($_FILES['file']['tmp_name'], '../../../images/profile/homeless/' . $_FILES['file']['name']);

        

    }

}else{

    $insert_sql = mysqli_query($connecDB,"INSERT INTO homeless(homelessID, Firstname, Lastname, Location, Needs, Video, Date, Time) 
VALUES('".$random."' ,'".$_POST['firstname']."', '".$_POST['lastname']."' , '".$_POST['location']."', '".$_POST['needs']."', '".$_POST['video']."', '".$the_date."', '".$the_time."')");

  

}


echo '<div class="success">Successfully Added!</div>';

}


?>