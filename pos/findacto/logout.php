<?php
session_start();
require_once 'class.participant.php';
require_once 'base_path.php';




if(isset($_GET['t'], $_SESSION['participantSession'])){
$_SESSION['cookie_deleted'] = '1';
unset($_SESSION['access_token']);
unset($_SESSION['participantSession']);
unset($_SESSION['fb_access_token_participant']);
header('Location: '.BASE_PATH.'');
exit();
}



if(isset($_SESSION['participantSession'])){

$user = new PARTICIPANT();

if(!$user->is_logged_in())
{
	$user->redirect(''.BASE_PATH.'');
}

if($user->is_logged_in()!="")
{
	$user->logout();
	//unset($_SESSION['access_token']);
	unset($_SESSION['participantSession']);	
	$user->redirect(''.BASE_PATH.'');
}


}






if(isset($_SESSION['fb_access_token_participant'], $_SESSION['participantSession'])){
	unset($_SESSION['fb_access_token_participant']);	
	header('Location:'.BASE_PATH.'');
}



?>