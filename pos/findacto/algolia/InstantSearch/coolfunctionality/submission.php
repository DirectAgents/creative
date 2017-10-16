<?php

session_start();
require 'config.php';

if(isset($_POST['submit'])) {

$_SESSION['submissionID'] = rand(100, 1000000);  

$insert_sql = mysqli_query($connecDB,"INSERT INTO submission(submissionID) VALUES('".$_SESSION['submissionID']."')");

}


?>