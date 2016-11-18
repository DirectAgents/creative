<?php
session_start();
require_once '../class.participant.php';
$participant = new PARTICIPANT();

if(!$participant->is_logged_in())
{
	$participant->redirect('login.php');
}

if($participant->is_logged_in()!="")
{
	$participant->logout();	
	$participant->redirect('login.php');
}
?>