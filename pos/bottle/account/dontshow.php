<?php


session_start();
require_once '../class.customer.php';
include_once("../config.php");


require_once '../base_path.php';

//require( "phpmailer/class.phpmailer.php" );




if($_POST)
{






  $update_sql = mysqli_query($connecDB,"UPDATE tbl_customer SET 
  intropopup='DontShow'


  WHERE userID='".$_POST['userid']."'");






}


?>