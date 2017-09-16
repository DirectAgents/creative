<?php

session_start();
require_once '../../class.startup.php';
include_once("../../config.php");

//require( "phpmailer/class.phpmailer.php" );

$ip = $_SERVER['REMOTE_ADDR'];



$participant_home = new PARTICIPANT();

if($participant_home->is_logged_in())
{
  $participant_home->logout();
}



$startup_home = new STARTUP();

if(!$startup_home->is_logged_in())
{
  $startup_home->redirect('../login');
}



if($_POST)
{


 


//$all_game_value = implode(",",$_POST['testing']);

  $update_sql = mysqli_query($connecDB,"UPDATE tbl_startup SET 
  billing_address_one='".$_POST['billing_address_one']."',
  billing_address_two='".$_POST['billing_address_two']."',
  billing_city='".$_POST['billing-city']."',
  billing_state='".$_POST['billing-state']."',
  billing_zip='".$_POST['billing-zip']."',
  billing_country='".$_POST['billing-country']."'

  WHERE userID='".$_SESSION['startupSession']."'");




	
	    $output = json_encode(array('type'=>'message', 'text' => '<div class="success">Successfully Saved!</div>'));
		die($output);
	



}
?>