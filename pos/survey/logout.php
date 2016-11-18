<?php
session_start();
require_once 'class.participant.php';
require_once 'class.researcher.php';





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


if(isset($_SESSION['researcherSession'])){

$researcher = new RESEARCHER();

if(!$researcher->is_logged_in())
{
	$researcher->redirect('researcher/login.php');
}

if($researcher->is_logged_in()!="")
{
	$researcher->logout();	
	$researcher->redirect('researcher/login.php');
}

}



if(isset($_SESSION['fb_access_token_researcher']) && isset($_SESSION['researcherSession'])){
	unset($_SESSION['fb_access_token_researcher']);	
	header("Location:researcher/login/");
}


if(isset($_SESSION['fb_access_token_participant']) && isset($_SESSION['participantSession'])){
	unset($_SESSION['fb_access_token_participant']);	
	header("Location:participant/login/");
}



?>