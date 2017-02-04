<?php

session_start();
require_once '../../../class.startup.php';
include_once("../../../config.php");

//require( "phpmailer/class.phpmailer.php" );

$ip = $_SERVER['REMOTE_ADDR'];



if($_POST)
{




  $sql=mysqli_query($connecDB,"DELETE FROM tbl_startup WHERE userID = '".$_POST['userid']."'");


   
	  $output = json_encode(array('type'=>'message', 'text' => '<div class="success">Account Successfully Deleted!</div>'));
		die($output);
	



}
?>