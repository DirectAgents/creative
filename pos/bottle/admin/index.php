<?php
session_start();

error_reporting(E_ERROR | E_PARSE);



ob_start();

require_once __DIR__ . '/facebook-sdk-v5/autoload.php';


require_once '../base_path.php';

require_once '../class.admin.php';

include_once("../config.php");


if(isset($_SESSION['cookie_deleted'])){

$cookiehash = md5(sha1(username . user_ip));
unset($_COOKIE['RememberMe']);
setcookie('RememberMe', "", time() - 3600); // empty value and old timestamp

}

if(isset($_COOKIE['RememberMe'])){

$stmt = mysqli_query($connecDB,"SELECT * FROM tbl_customer WHERE login_session='".$_COOKIE['RememberMe']."'");
$row = mysqli_fetch_array($stmt);

if($row['login_session'] == $_COOKIE['RememberMe']){

$_SESSION['customerSession'] = $row['userID'];

header("Location:../admin/account/");
exit();
}
}



if(isset($_GET['p'])){

  $_SESSION['p'] = $_GET['p']; 
}


$user_login = new ADMIN();

if($user_login->is_logged_in()!="")
{
  
  $user_login->redirect('../admin/account/');
}










if(isset($_POST['btn-login']))
{
  $email = trim($_POST['txtemail']);
  $upass = trim($_POST['txtupass']);
  $rememberme = trim($_POST['txtrememberme']);
  
  if($user_login->login($email,$upass,$rememberme))
  {
    $user_login->redirect('account/');
  }
}







//session_start(); //session start

//echo $_SESSION['access_token'];


?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
   <title>Valify Login</title>
    
    
    <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/css/reset.css">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Montserrat:400,700'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

        <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/css/style.css">

    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Roboto:400,700,300" rel="stylesheet" type="text/css">


<script src="https://cdnjs.cloudflare.com/ajax/libs/webshim/1.16.0/minified/polyfiller.js"></script> 

    <script> 
        webshim.activeLang('en');
        webshims.polyfill('forms');
        webshims.cfg.no$Switch = true;
    </script>
    

    
  </head>

  <body>

    
<div class="container">

<?php 
    if(isset($_GET['duplicate']))
    {
      ?>
            <div class='alert alert-error'>
        <button class='close' data-dismiss='alert'>&times;</button>
        <strong>Sorry!</strong> Email already exist. 
      </div>
            <?php
    }
    ?>



<?php 
    if(isset($_GET['inactive']))
    {
      ?>
            <div class='alert alert-error'>
        <button class='close' data-dismiss='alert'>&times;</button>
       <strong>Sorry!</strong> <br><br>This Account is not Activated Go to your Inbox and Activate it. 
      </div>
            <?php
    }
    ?>
        <form class="form-signin" method="post">
        <?php
        if(isset($_GET['error']))
    {
      ?>
            <div class='alert alert-success'>
        <button class='close' data-dismiss='alert'>&times;</button>
        <strong>Wrong username or password. Try again!</strong> 
      </div>
            <?php
    }
    ?>


  <div class="logo">
   <a href="<?php echo BASE_PATH; ?>"><img src="<?php echo BASE_PATH; ?>/img/navigation/logo-2.png" width="137" height="54"/></a>
  </div>
</div>








<div class="form">







<div class="form-login">

  
  <form class="login-form">
    <input type="text" name="txtemail" placeholder="Email Address" required/>
    <input type="password" name="txtupass" placeholder="Password" required/>
    <input type="checkbox" name="txtrememberme" value="Yes"/><label> Remember me</label>
    <button type="submit" name="btn-login">LOGIN</button>
   
  </form>

</div>






</div>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="<?php echo BASE_PATH; ?>/js/index.js"></script>

    <script src="<?php echo BASE_PATH; ?>/bootstrap/js/jquery-1.9.1.min.js"></script>
    <script src="<?php echo BASE_PATH; ?>/bootstrap/js/bootstrap.min.js"></script>
    
    
  </body>
</html>
