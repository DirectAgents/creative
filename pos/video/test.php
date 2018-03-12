<?php

session_start();
include_once("config.php"); 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



 $sql_connect = mysqli_query($connecDB,"SELECT * FROM tbl_connections_startup WHERE requested_id ='194'  AND status != 'pending' ");


 if ($sql_connect->num_rows == 0){ 

echo "empty";

 }


  if ($sql_connect->num_rows == 1){ 

echo "found";

 }















?>







