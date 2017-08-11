<?php
########## MySql details (Replace with yours) #############
$username = "valify_user"; //mysql username
$password = "s5p4j0v4183"; //mysql password
$hostname = "localhost"; //hostname
$databasename = "valify_it_tennis"; //databasename

//$connecDB = mysql_connect($hostname, $username, $password)or die('could not connect to database');
//mysql_select_db($databasename,$connecDB);


$connecDB = mysqli_connect($hostname, $username, $password, $databasename)or die('could not connect to database');
//mysql_select_db($databasename,$connecDB);

$item_per_page = 100;
