<?php
require_once '../class.startup.php';

require_once '../base_path.php';

$startup = new STARTUP();

/*
if(empty($_GET['id']) && empty($_GET['code']))
{
	$startup->redirect('login.php');
}*/

if(isset($_GET['id']) && isset($_GET['code']))
{
	$id = base64_decode($_GET['id']);
	$code = $_GET['code'];
	
	$stmt = $startup->runQuery("SELECT * FROM tbl_startup WHERE userID=:uid AND tokenCode=:token");
	$stmt->execute(array(":uid"=>$id,":token"=>$code));
	$rows = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($stmt->rowCount() == 1)
	{
		if(isset($_POST['btn-reset-pass']))
		{
			$pass = $_POST['pass'];
			$cpass = $_POST['confirm-pass'];
			
			if($cpass!==$pass)
			{
				$msg = "<div class='alert alert-block'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<strong>Sorry!</strong>  Password Doesn't match. 
						</div>";
			}
			else
			{
				$password = md5($cpass);
				$stmt = $startup->runQuery("UPDATE tbl_startup SET userPass=:upass WHERE userID=:uid");
				$stmt->execute(array(":upass"=>$password,":uid"=>$rows['userID']));
				
				$msg = "<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>&times;</button>
						Password Changed.
						</div>";
				header("refresh:5;login");
			}
		}	
	}
	else
	{
		$msg = "<div class='alert alert-success'>
				<button class='close' data-dismiss='alert'>&times;</button>
				No Account Found, Try again
				</div>";
				
	}
	
	
}

?>



<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Reset Password - Valify</title>
    
    
    <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/css/reset.css">

    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Montserrat:400,700'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

        <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/css/style.css">

    
    
    
  </head>

  <body>

    
<div class="container">

<div class='alert alert-success'>
			<strong>Hello !</strong>  <?php echo $rows['FirstName'] ?> you are here to reset your forgotton password.
		</div>

 <?php
        if(isset($msg))
		{
			echo $msg;
		}
		?>

 <div class="logo">
   <a href="<?php echo BASE_PATH; ?>"><h1>Circl</h1></a>
  </div>
</div>








<div class="form">
  
  <form class="form-signin" method="post">
    <input type="password" placeholder="New Password" name="pass" required/>
    <input type="password" placeholder="Confirm New Password" name="confirm-pass" required/>
    <button type="submit" name="btn-reset-pass">Reset Your Password</button>
    <p class="message">Not registered? <a href="signup.php">Sign up</a></p>
   
   
  </form>
</div>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="<?php echo BASE_PATH; ?>/js/index.js"></script>


<script src="<?php echo BASE_PATH; ?>/bootstrap/js/jquery-1.9.1.min.js"></script>
    <script src="<?php echo BASE_PATH; ?>/bootstrap/js/bootstrap.min.js"></script>
    
    
    
  </body>
</html>







