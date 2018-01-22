<?php
session_start();
require_once 'class.startup.php';
require_once 'class.investor.php';
require_once 'base_path.php';




//if(isset($_GET['t'], $_SESSION['startupSession'])){
$_SESSION['cookie_deleted'] = '1';
unset($_SESSION['access_token']);
unset($_SESSION['startupSession']);
unset($_SESSION['investorSession']);
unset($_SESSION['fb_access_token_startup']);
unset($_SESSION['fb_access_token_investor']);
header('Location: '.BASE_PATH.'');
exit();
//}



if(isset($_SESSION['startupSession'])){

$user = new STARTUP();

if(!$user->is_logged_in())
{
	$user->redirect(''.BASE_PATH.'');
}

if($user->is_logged_in()!="")
{
	$user->logout();
	//unset($_SESSION['access_token']);
	unset($_SESSION['startupSession']);	
	$user->redirect(''.BASE_PATH.'');
}


}


if(isset($_SESSION['investorSession'])){

$user = new INVESTOR();

if(!$user->is_logged_in())
{
	$user->redirect(''.BASE_PATH.'/investors/');
}

if($user->is_logged_in()!="")
{
	$user->logout();
	//unset($_SESSION['access_token']);
	unset($_SESSION['investorSession']);	
	$user->redirect(''.BASE_PATH.'/investors/');
}


}



if(isset($_SESSION['fb_access_token_startup'], $_SESSION['startupSession'])){
	unset($_SESSION['fb_access_token_startup']);	
	header('Location:'.BASE_PATH.'');
}

if(isset($_SESSION['fb_access_token_investor'], $_SESSION['investorSession'])){
	unset($_SESSION['fb_access_token_investor']);	
	header('Location:'.BASE_PATH.'/investors/');
}



?>