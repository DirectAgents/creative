<?php


session_start();

require_once '../class.customer.php';

include_once("../config.php");


$sql = mysqli_query($connecDB,"SELECT * FROM tbl_customer WHERE userEmail = '".$_GET['email']."'");

//if user already exist
if(mysqli_num_rows($sql) > 0)
{

$sql = mysqli_query($connecDB,"SELECT * FROM tbl_customer WHERE userEmail = '".$_GET['email']."'");
$row = mysqli_fetch_array($sql);  

$update_sql = mysqli_query($connecDB,"UPDATE tbl_customer SET 
    facebook_id = '".$_GET['id']."', 
    profile_image = '',
    google_picture_link = '',
    account_verified = '1'  

    WHERE userEmail='".$_GET['email']."'");
    
    $_SESSION['customerSession'] = $row['userID'];
    $_SESSION['facebook_photo'] = $_GET['id'];
    $_SESSION['fb_access_token_customer'] = $_GET['accessToken'];
    header("Location: ../account/");
    exit(); 

}else{

  date_default_timezone_set('America/New_York');
    $date = date('Y-m-d'); 

    $gender = ucfirst($_GET['gender']);

        //echo 'Hi '.$user->name.', Thanks for Registering! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
    $insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_customer (facebook_id, FirstName, LastName, userEmail, Gender, Date_Created, account_verified) 
      VALUES ('".$_GET['id']."',  '".$_GET['firstname']."', '".$_GET['lastname']."', '".$_GET['email']."', '".$gender."' , '".$date."','1')");

    $_SESSION['customerSession'] = $row['userID'];
    $_SESSION['fb_access_token_customer'] = $_GET['accessToken'];
    
    header("Location: ../account/");
    exit(); 
}



?>