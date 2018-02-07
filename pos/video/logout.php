<?php
session_start();
require_once 'class.entrepreneur.php';
require_once 'class.investor.php';
require_once 'base_path.php';




//if(isset($_GET['t'], $_SESSION['entrepreneurSession'])){
$_SESSION['cookie_deleted'] = '1';
unset($_SESSION['access_token']);
unset($_SESSION['entrepreneurSession']);
unset($_SESSION['investorSession']);
unset($_SESSION['fb_access_token_entrepreneur']);
unset($_SESSION['fb_access_token_investor']);
unset($_SESSION['linkedin_id']);
unset($_SESSION['google_id']);
unset($_SESSION['facebook_id']);

header('Location: '.BASE_PATH.'');
exit();
//}



if(isset($_SESSION['entrepreneurSession'])){

$user = new STARTUP();

if(!$user->is_logged_in())
{
	$user->redirect(''.BASE_PATH.'');
}

if($user->is_logged_in()!="")
{
	$user->logout();
	//unset($_SESSION['access_token']);
	unset($_SESSION['entrepreneurSession']);	
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



if(isset($_SESSION['fb_access_token_entrepreneur'], $_SESSION['entrepreneurSession'])){
	unset($_SESSION['fb_access_token_entrepreneur']);	
	header('Location:'.BASE_PATH.'');
}

if(isset($_SESSION['fb_access_token_investor'], $_SESSION['investorSession'])){
	unset($_SESSION['fb_access_token_investor']);	
	header('Location:'.BASE_PATH.'/investors/');
}



?>