<?php
session_start();
require_once '../facebook-sdk-v5/autoload.php';
 
$fb = new Facebook\Facebook([
  'app_id' => '1797081013903216',
  'app_secret' => 'f30f4c99e31c934f65b515c1f777940f',
  'default_graph_version' => 'v2.5',
]);
 
$helper = $fb->getRedirectLoginHelper();
 
$permissions = ['email']; // Optional permissions for more permission you need to send your application for review
$loginUrl = $helper->getLoginUrl('http://localhost/creative/pos/bottle/signup/test/callback.php', $permissions);
header("location: ".$loginUrl);
 
?>