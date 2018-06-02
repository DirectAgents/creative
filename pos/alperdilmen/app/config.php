<?php


########## MySql details (Replace with yours) #############
$username = "root"; //mysql username
$password = "Q|2[J0pk1^W}"; //mysql password
$hostname = "amazon-direct-agents-database.cwmohzhqenjy.us-east-1.rds.amazonaws.com:3306"; //hostname
$databasename = "p"; //databasename

//$connecDB = mysql_connect($hostname, $username, $password)or die('could not connect to database');
//mysql_select_db($databasename,$connecDB);


$connecDB = mysqli_connect($hostname, $username, $password, $databasename)or die('could not connect to database');



?>