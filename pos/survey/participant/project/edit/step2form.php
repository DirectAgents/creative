<?php

session_start();
include ('../../../config2.php');

//require( "phpmailer/class.phpmailer.php" );

$ip = $_SERVER['REMOTE_ADDR'];



if($_POST)
{


//$all_game_value = implode(",",$_POST['testing']);

  $update_sql = "UPDATE tbl_researcher_project SET 
  Headline='".$_POST['headline']."',
  Summary='".$_POST['summary']."' 

  WHERE researcherID='".$_SESSION['researcherSession']."' AND id= '".$_SESSION['projectid']."'";



  

mysql_query($update_sql);










	
	    $output = json_encode(array('type'=>'message', 'text' => '<div style="text-align:center; font-size:18px; padding:10px; width:97.8%; background:#2bb90a; color:#fff; margin-bottom:15px;">Successfully Saved!</div>'));
		die($output);
	
    //header("Location: index.php?s=success"); 




	
	
	
	
	
}
?>