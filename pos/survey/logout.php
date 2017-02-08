<?php
session_start();
require_once 'class.participant.php';
require_once 'class.startup.php';





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
	$startup->redirect('startup/login.php');
}

if($startup->is_logged_in()!="")
{
	$startup->logout();	
	$startup->redirect('startup/login.php');
}

}



if(isset($_SESSION['fb_access_token_startup']) || isset($_SESSION['startupSession'])){
	unset($_SESSION['fb_access_token_startup']);	
	header("Location:startup/login/");
}


if(isset($_SESSION['fb_access_token_participant']) || isset($_SESSION['participantSession'])){
	unset($_SESSION['fb_access_token_participant']);	
	header("Location:participant/login/");
}



?>