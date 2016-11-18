<?php
session_start();

require_once '../base_path.php';

require_once '../class.participant.php';
$user = new PARTICIPANT();

if($user->is_logged_in()!="")
{
	$user->redirect('../index.php');
}

if(isset($_POST['btn-submit']))
{
	$email = $_POST['txtemail'];
	
	$stmt = $user->runQuery("SELECT userID FROM tbl_participant WHERE userEmail=:email LIMIT 1");
	$stmt->execute(array(":email"=>$email));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);	
	if($stmt->rowCount() == 1)
	{
		$id = base64_encode($row['userID']);
		$code = md5(uniqid(rand()));
		
		$stmt = $user->runQuery("UPDATE tbl_participant SET tokenCode=:token WHERE userEmail=:email");
		$stmt->execute(array(":token"=>$code,"email"=>$email));
		
		$message= "

		<img src='http://labfy.com/circl/images/logo/email-logo.jpg' width='206' height='53'/>

				   <br /><br />
                   <span style='font-family: Arial, Helvetica, sans-serif; font-size: 23px; color: #363d4d;'>Reset your Circl password</span>
				   <br />
				 
				   <p>&nbsp;</p>
				   <a href='http://labfy.com/circl/account/resetpass.php?id=$id&code=$code' style='text-decoration:none !important; text-decoration:none;'>
<span style='border:none; padding: 15px 20px; font-size: 16px; line-height: 1.375; border-radius: 4px; background:#528fcc;  color:#fff'>Click to reset password</span>

				   </a>
				   <p>&nbsp;</p>
				   <br />

				   <span style='font-family: Arial, Helvetica, sans-serif; font-size: 14px;'>If you didn’t ask to reset your password or don’t want to change it, feel free to ignore this message.</span>
				    <br /><br />
				   <span style='font-family: Arial, Helvetica, sans-serif; font-size: 14px;'>Best regards,</span><br />
				   <span style='font-family: Arial, Helvetica, sans-serif; font-size: 14px;'>The Circl Team</span><br />
                   <a href='mailto:support@circl.com'><span style='font-family: Arial, Helvetica, sans-serif; font-size: 14px;'>support@circl.com</span></a>
 <p>&nbsp;</p>
 <span style='font-family: Arial, Helvetica, sans-serif; font-size: 13px; color:#656e88'>
                   You are receiving this message because you have a Circl account.</span>
				   ";
		$subject = "Password Recovery";
		
		$user->send_mail($email,$message,$subject);
		
		$msg = "<div class='alert alert-success'>
					<button class='close' data-dismiss='alert'>&times;</button>
					<span style='font-family: Arial, Helvetica, sans-serif; font-size: 13px;'>Instructions have been sent to your email address.</span>

			  	</div>";
	}
	else
	{
		$msg = "<div class='alert alert-danger'>
					<button class='close' data-dismiss='alert'>&times;</button>
					<span style='font-family: Arial, Helvetica, sans-serif; font-size: 13px;'><strong>Sorry!</strong>  this email was not found. </span>
			    </div>";
	}
}
?>





<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
    
    
    <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/css/reset.css">

    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Montserrat:400,700'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

        <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/css/style.css">

    
    
    
  </head>

  <body>

    
<div class="container">

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
<h2>Forgot your password?</h2><br>
<h3>Enter your email address and we will send you password reset instructions.</h3>  <br>
   <form class="form-signin" method="post">
    <input type="email" name="txtemail" placeholder="Email Address" required/>
   
    <button type="submit" name="btn-submit">Generate new Password</button>
    <p class="message">Not registered? <a href="signup">Sign up</a></p>
   
  </form>
</div>

  <script src="<?php echo BASE_PATH; ?>/bootstrap/js/jquery-1.9.1.min.js"></script>
    <script src="<?php echo BASE_PATH; ?>/bootstrap/js/bootstrap.min.js"></script>

    
    
    
  </body>
</html>
