<?php

session_start();
require_once '../../../../config.php';

//require( "phpmailer/class.phpmailer.php" );

$ip = $_SERVER['REMOTE_ADDR'];

//echo $_SESSION['startupSession'];


if($_POST)
{



// Delete data in mysql from row that has this id 
$sql = mysqli_query($connecDB,"DELETE FROM tbl_nda_draft WHERE ProjectID = '".$_POST['projectid']."'");


	
	    $output = json_encode(array('type'=>'message', 'text' => $_POST['projectid']));
		die($output);
	
    //header("Location: index.php?s=success"); 



}	
	
	
	

?>