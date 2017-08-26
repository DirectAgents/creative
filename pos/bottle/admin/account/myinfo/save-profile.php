<?php

session_start();
require_once '../../../class.admin.php';
include_once("../../../config.php");

//require( "phpmailer/class.phpmailer.php" );

$ip = $_SERVER['REMOTE_ADDR'];



if($_POST)
{




$formatted_number = preg_replace("/^(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $_POST['phone_number']);


//$all_game_value = implode(",",$_POST['testing']);

  $update_sql = mysqli_query($connecDB,"UPDATE tbl_admin SET 
  FirstName='".$_POST['firstname']."',
  LastName='".$_POST['lastname']."',
  userEmail='".$_POST['email']."',
  Phone='".$formatted_number."',
  Address='".$_POST['address']."',
  City='".$_POST['city']."',
  State='".$_POST['state']."',
  Zip='".$_POST['zip']."'
  
  WHERE userID='".$_SESSION['adminSession']."'");




	  //$output = json_encode(array('type'=>'message', 'text' => '<div class="success">Successfully Saved!</div>'));
    //die($output);
	   
	



}
?>