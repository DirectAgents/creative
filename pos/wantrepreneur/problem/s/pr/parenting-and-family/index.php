<?php
if(!empty($_GET["id"])){
include("../project.php");
}else{
$test = '1';	
include("../index.php");
}

?>