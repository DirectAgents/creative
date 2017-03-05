<?php

session_start();
require_once '../../class.participant.php';
include_once("../../config.php");

//require( "phpmailer/class.phpmailer.php" );

$ip = $_SERVER['REMOTE_ADDR'];



if($_POST)
{


 


//$all_game_value = implode(",",$_POST['testing']);
  $update_sql =mysqli_query($connecDB,"UPDATE tbl_participant SET 
  Payment_Method='Cash'

  WHERE userID='".$_SESSION['participantSession']."'");




	
	    $output = json_encode(array('type'=>'message', 'text' => '<div class="success">Success. You will receive paypments in cash only</div>'));
		die($output);
	



}
?>