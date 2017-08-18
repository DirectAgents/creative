<?php
session_start();
require_once 'class.customer.php';
require_once 'class.admin.php';


if(isset($_GET['t'], $_SESSION['adminSession'])){
$_SESSION['cookie_deleted'] = '1';
unset($_SESSION['access_token']);
unset($_SESSION['adminSession']);
unset($_SESSION['fb_access_token_startup']);	
header("Location:admin/");
exit();
}


if(isset($_GET['t'], $_SESSION['customerSession'])){
$_SESSION['cookie_deleted'] = '1';
unset($_SESSION['access_token']);
unset($_SESSION['customerSession']);
unset($_SESSION['fb_access_token_customer']);
header("Location:login/");
exit();
}



if(isset($_SESSION['customerSession'])){

$user = new CUSTOMER();

if(!$user->is_logged_in())
{
	$user->redirect('login/');
}

if($user->is_logged_in()!="")
{
	$user->logout();
	//unset($_SESSION['access_token']);
	unset($_SESSION['customerSession']);	
	$user->redirect('login/');
}


}


if(isset($_SESSION['adminSession'])){

$admin= new ADMIN();

if(!$admin->is_logged_in())
{
	$admin->redirect('admin/login/');
}

if($admin->is_logged_in()!="")
{	
	$admin->logout();	
	$admin->redirect('admin/login/');
}

}


if(!isset($_SESSION['adminSession'] ,$_SESSION['customerSession'], $_SESSION['fb_access_token_admin'],$_SESSION['fb_access_token_customer'])){
	header("Location:admin/login/");
	}


if(isset($_SESSION['fb_access_token_admin'], $_SESSION['adminSession'])){
	
	unset($_SESSION['fb_access_token_admin']);	
	header("Location:admin/login/");
}


if(isset($_SESSION['fb_access_token_customer'], $_SESSION['customerSession'])){
	unset($_SESSION['fb_access_token_customer']);	
	header("Location:login/");
}



?>