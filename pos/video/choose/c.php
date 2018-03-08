<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../class.investor.php';
 require_once '../base_path.php';
 include_once("../config.php"); 



if(!isset($_SESSION['entrepreneurSession'])){
 
header('Location: '.BASE_PATH.'');
//echo "yo";
exit();

}

if(isset($_SESSION['entrepreneurSession'])){

$sql = mysqli_query($connecDB, "SELECT * FROM tbl_users WHERE userID='".$_SESSION['entrepreneurSession']."'");
$row = mysqli_fetch_array($sql); 

if(!empty($row['Type'])){
  header('Location: '.BASE_PATH.'');
  exit();
}


if(empty($row['Type'])){


if($_GET){

if(isset($_SESSION['google_id'])){


	    $sql = mysqli_query($connecDB,"SELECT * FROM tbl_users WHERE Email = '".$_SESSION['email']."'");
        $row = mysqli_fetch_array($sql);

          if($row['userID']) //if user already exist change greeting text to "Welcome Back"
   			 {   

        $update_sql = mysqli_query($connecDB,"UPDATE tbl_users SET 
        Type = '".$_GET['type']."',  
        google_id = '".$_SESSION['google_id']."',
        Fullname = '".$_SESSION['fullname']."',
        google_picture_link = '".$_SESSION['google_picture_link']."',
        google_token = '".$_SESSION['access_token']."',
        ProfileImage = 'Google'
    
        WHERE Email='".$_SESSION['email']."'");

        //echo 'Welcome back '.$user->name.'! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
       

        header('Location: '.BASE_PATH.'');
        exit();

       } 

}


if(isset($_SESSION['facebook_id'])){

  


	    $sql = mysqli_query($connecDB,"SELECT * FROM tbl_users WHERE Email = '".$_SESSION['email']."'");
      $row = mysqli_fetch_array($sql);

      

          if($row['userID']) //if user already exist change greeting text to "Welcome Back"
   			 {   

        $update_sql = mysqli_query($connecDB,"UPDATE tbl_users SET 
        Type = '".$_GET['type']."'
    
        WHERE Email='".$_SESSION['email']."'");

        //echo 'Welcome back '.$user->name.'! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
       

        header('Location: '.BASE_PATH.'');
        //echo "asdfsaf";
        //echo $_SESSION['email'];
        exit();

       } 

}



if(isset($_SESSION['linkedin_id'])){


	    $sql = mysqli_query($connecDB,"SELECT * FROM tbl_users WHERE Email = '".$_SESSION['email']."'");
        $row = mysqli_fetch_array($sql);

          if($row['userID']) //if user already exist change greeting text to "Welcome Back"
   			 {   

        $update_sql = mysqli_query($connecDB,"UPDATE tbl_users SET 
        Type = '".$_GET['type']."',
        linkedin_id = '".$_SESSION['facebook_id']."',
        Fullname = '".$_SESSION['fullname']."',
        linkedin_picture_link = '".$_SESSION['linkedin_picture_link']."',
        ProfileImage = 'Linkedin'
    
        WHERE Email='".$_SESSION['email']."'");

        //echo 'Welcome back '.$user->name.'! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
       

        header('Location: '.BASE_PATH.'');
        exit();

       } 

}



////POST//////
/*
if ($_SERVER["REQUEST_METHOD"] == "GET") {


if(isset($_SESSION['google_id'])){

 $insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_users (google_id, Email, Fullname, google_picture_link, google_token, ProfileImage, Type) 
      VALUES ('".$_SESSION['google_id']."', '".$_SESSION['email']."', '".$_SESSION['fullname']."', '".$_SESSION['google_picture_link']."', 
      '".$_SESSION['access_token']."', 'Google' ,'Investor')");


 $sql = mysqli_query($connecDB,"SELECT * FROM tbl_users WHERE Email = '".$_SESSION['email']."'");
 $row2 = mysqli_fetch_array($sql);




}

if(isset($_SESSION['facebook_id'])){

 $insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_users (facebook_id, Email, Type) 
      VALUES ('".$_SESSION['facebook_id']."', '".$_SESSION['email']."', 'Investor')");


 $sql = mysqli_query($connecDB,"SELECT * FROM tbl_users WHERE Email = '".$_SESSION['email']."'");
 $row2 = mysqli_fetch_array($sql);




}


if(isset($_SESSION['linkedin_id'])){

 $insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_users (linkedin_id, Email, Fullname, linkedin_picture_link, ProfileImage, Type) 
      VALUES ('".$_SESSION['linkedin_id']."', '".$_SESSION['email']."' , '".$_SESSION['fullname']."', 
      '".$_SESSION['linkedin_picture_link']."', 'Linkedin', 'Investor')");

 $sql = mysqli_query($connecDB,"SELECT * FROM tbl_users WHERE Email = '".$_SESSION['email']."'");
 $row2 = mysqli_fetch_array($sql);




}*/
 //echo  $_SESSION['entrepreneurSession'];
 //echo  $_SESSION['usernameSession'];
 header("Location:http://localhost/creative/pos/video/");
 exit();



}

}

}

?>