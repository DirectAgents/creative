<?php
session_start();
require_once '../class.researcher.php';
$user_login = new RESEARCHER();

if($user_login->is_logged_in()!="")
{
  $user_login->redirect('../researcher/home.php');
}

if(isset($_POST['btn-login']))
{
  $email = trim($_POST['txtemail']);
  $upass = trim($_POST['txtupass']);
  
  if($user_login->login($email,$upass))
  {
    $user_login->redirect('../researcher/index.php');
  }
}
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Flat Login Form</title>
    
    
    <link rel="stylesheet" href="css/reset.css">

    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Montserrat:400,700'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

        <link rel="stylesheet" href="../css/style.css">

  <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Roboto:400,700,300" rel="stylesheet" type="text/css">

    
    
  </head>

  <body>

    
<div class="container">

<?php 
    if(isset($_GET['inactive']))
    {
      ?>
            <div class='alert alert-error'>
        <button class='close' data-dismiss='alert'>&times;</button>
        <strong>Sorry!</strong> This Account is not Activated Go to your Inbox and Activate it. 
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
        <strong>Wrong Details!</strong> 
      </div>
            <?php
    }
    ?>


  <div class="logo">
   <h1>Circl</h1>
  </div>
</div>








<div class="form">
  
<div class="info">
  <h1>LOGIN AS A RESEARCHER</h1>
</div>

<div class="loginas">
  <h3>Are you a <span class="role">Participant</span>? <a href="customer.php">Click here</a></h3>
</div>
  
  <form class="login-form">
    <input type="email" name="txtemail" placeholder="Email Address" required/>
    <input type="password" name="txtupass" placeholder="Password" required/>
    <button type="submit" name="btn-login">LOGIN</button>
    <p class="message">Not registered? <a href="../signup/researcher.php">Sign up</a></p>
    <p class="message"> <a href="../fpass.php">Forgot your Password ? </a></p>
   
  </form>
</div>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="../js/index.js"></script>

    
    
    
  </body>
</html>
