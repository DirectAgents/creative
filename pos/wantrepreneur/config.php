<?php
########## MySql details (Replace with yours) #############
$username = "root"; //mysql username
$password = "123"; //mysql password
$hostname = "localhost"; //hostname
$databasename = "mrpao"; //databasename

//$connecDB = mysql_connect($hostname, $username, $password)or die('could not connect to database');
//mysql_select_db($databasename,$connecDB);


$connecDB = mysqli_connect($hostname, $username, $password, $databasename)or die('could not connect to database');
//mysql_select_db($databasename,$connecDB);

$item_per_page = 100;
