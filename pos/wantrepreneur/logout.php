<?php
session_start();
require_once 'class.participant.php';
require_once 'class.startup.php';


if(isset($_GET['t'], $_SESSION['startupSession'])){
$_SESSION['cookie_deleted'] = '1';
unset($_SESSION['access_token']);
unset($_SESSION['startupSession']);
unset($_SESSION['fb_access_token_startup']);	
header("Location:startup/login/");
exit();
}


if(isset($_GET['t'], $_SESSION['participantSession'])){
$_SESSION['cookie_deleted'] = '1';
unset($_SESSION['access_token']);
unset($_SESSION['participantSession']);
unset($_SESSION['fb_access_token_participant']);
header("Location:participant/login/");
exit();
}



if(isset($_SESSION['participantSession'])){

$user = new PARTICIPANT();

if(!$user->is_logged_in())
{
	$user->redirect('participant/login/');
}

if($user->is_logged_in()!="")
{
	$user->logout();
	//unset($_SESSION['access_token']);
	unset($_SESSION['participantSession']);	
	$user->redirect('participant/login/');
}


}


if(isset($_SESSION['startupSession'])){

$startup = new startup();

if(!$startup->is_logged_in())
{
	$startup->redirect('entrepreneur/login/');
}

if($startup->is_logged_in()!="")
{	
	$startup->logout();	
	$startup->redirect('entrepreneur/login/');
}

}


if(!isset($_SESSION['startupSession'] ,$_SESSION['participantSession'], $_SESSION['fb_access_token_startup'],$_SESSION['fb_access_token_participant'])){
	header("Location:startup/login/");
	}


if(isset($_SESSION['fb_access_token_startup'], $_SESSION['startupSession'])){
	
	unset($_SESSION['fb_access_token_startup']);	
	header("Location:startup/login/");
}


if(isset($_SESSION['fb_access_token_participant'], $_SESSION['participantSession'])){
	unset($_SESSION['fb_access_token_participant']);	
	header("Location:participant/login/");
}



?>