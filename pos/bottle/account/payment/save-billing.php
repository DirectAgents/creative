<?php

session_start();
require_once '../../class.startup.php';
include_once("../../config.php");

//require( "phpmailer/class.phpmailer.php" );

$ip = $_SERVER['REMOTE_ADDR'];



if($_POST)
{


 


//$all_game_value = implode(",",$_POST['testing']);

  $update_sql = "UPDATE tbl_startup SET 
  billing_address_one='".$_POST['billing_address_one']."',
  billing_address_two='".$_POST['billing_address_two']."',
  billing_city='".$_POST['billing-city']."',
  billing_state='".$_POST['billing-state']."',
  billing_zip='".$_POST['billing-zip']."',
  billing_country='".$_POST['billing-country']."'

  WHERE userID='".$_SESSION['startupSession']."'";


   mysql_query($update_sql);


	
	    $output = json_encode(array('type'=>'message', 'text' => '<div class="success">Successfully Saved!</div>'));
		die($output);
	



}
?>