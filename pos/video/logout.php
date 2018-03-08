<?php
session_start();
require_once 'class.entrepreneur.php';
require_once 'class.investor.php';
require_once 'base_path.php';


session_unset();
session_destroy();

header('Location: '.BASE_PATH.'');
exit();


?>