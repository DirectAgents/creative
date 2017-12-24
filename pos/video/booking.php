<?php

session_start();
include ('config.php');

if($_POST)
{


    date_default_timezone_set('America/New_York');
    $the_date2 = date('Y-m-d'); 
    $the_time = date('h:i:s A');



    $insert_sql = mysqli_query($connecDB,"INSERT INTO booking (id, Firstname, Lastname, Email, Phone, Industry, StartupName, Date, Time) values 
       ('', '". $_POST["firstname"] ."', '". $_POST["lastname"] ."', '". $_POST["email"] ."', '". $_POST["phone"] ."', '". $_POST["industry"] ."','". $_POST["startup-name"] ."','". $the_date2 ."', '". $the_time ."')");   

}


?>