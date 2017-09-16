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
		
		$msg = "<div class='alert alert-success'>
					<button class='close' data-dismiss='alert'>&times;</button>
					<span style='font-family: Arial, Helvetica, sans-serif; font-size: 13px;'>Instructions have been sent to your email address.</span>

			  	</div>";


// using SendGrid's PHP Library
// https://github.com/sendgrid/sendgrid-php
// If you are using Composer (recommended)
require '../sendgrid-php/vendor/autoload.php';
// If you are not using Composer
// require("path/to/sendgrid-php/sendgrid-php.php");
$from = new SendGrid\Email("Password Recovery", "support@valifyit.com");
$subject = "Password Recovery";
$to = new SendGrid\Email($row['FirstName'], $email);
$content = new SendGrid\Content("text/html", '
         
<body style="margin: 0 !important; padding: 0 !important;">


<!-- HEADER -->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td bgcolor="#fdfdfd" align="center">
            <!--[if (gte mso 9)|(IE)]>
            <table align="left" border="0" cellspacing="0" cellpadding="0" width="600">
            <tr>
            <td align="left" valign="top" width="600">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-top:50px; max-width: 600px;" class="wrapper">
                <tr>
                    <td align="left" valign="top" style="padding:20px;" class="logo">
                        <a href="http://valifyit.com/" target="_blank">
                            <img alt="Logo" src="http://valifyit.com/images/email/email-logo-large.jpg" width="132" height="48" style="display: block; font-family: Helvetica, Arial, sans-serif; color: #ffffff; font-size: 16px;" border="0">
                        </a>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    
   
    <tr>
        <td bgcolor="#fdfdfd" align="center" style="padding: 10px 15px 30px 15px;" class="section-padding">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
            <tr>
            <td align="center" valign="top" width="600">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background:#fff; padding:20px; border:1px solid #f0f0f0; max-width: 600px;" class="responsive-table">
                <!-- TITLE -->
               
                <tr>
                  <td align="center" height="100%" valign="top" width="100%" colspan="2">
                        <!--[if (gte mso 9)|(IE)]>
                        <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
                        <tr>
                        <td align="center" valign="top" width="600">
                        <![endif]-->
                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600;">
                            <tr>
                                <td align="center" valign="top" style="font-size:0;">
                                    <!--[if (gte mso 9)|(IE)]>
                                    <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
                                    <tr>
                                    <td align="left" valign="top" width="115">
                                    <![endif]-->
                                    <div style="display:inline-block; margin: 0 -2px; max-width:600px; vertical-align:top; width:100%;">

                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                 <td align="left" style="padding: 0 0 5px 25px; font-size: 18px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">
                                                Reset your Valify password
                                                </td>
                                            </tr>

                                            <tr>
                                                 <td align="left" style="padding: 0 0 5px 25px;font-size: 16px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">
                                                &nbsp;
                                                
                                                </td>
                                            </tr>

                                            
                                             <tr>
                                                 <td align="left" style="padding: 0 0 5px 25px;font-size: 16px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">
                                                You are receiving this message because you have a Valify account.
                                                
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                   
                                </td>
                            </tr>
                        </table>



                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600;">
                            <tbody><tr>
                                <td align="center" valign="top" style="font-size:0;">
                                    <!--[if (gte mso 9)|(IE)]>
                                    <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
                                    <tr>
                                    <td align="left" valign="top" width="115">
                                    <![endif]-->
                                    <div style="display:inline-block; margin: 0 -2px; max-width:600px; vertical-align:top; width:100%;">

                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tbody>
                                              <tr>
                                                <td valign="top" align="center" style="padding: 40px 0 0 0; text-decoration:none" class="mobile-hide">
                                                
                                                 <a href="'.BASE_PATH.'/participant/resetpass.php?id='.$id.'&code='.$code.'">
                                                <div style="padding: 20px; max-width:240px; text-decoration:none !important; text-decoration:none; font-size: 16px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; background:#348eda; color: #ffffff; text-decoration: none !important;" class="padding">
                                                <img alt="Logo" src="http://valifyit.com/images/email/reset-password.png" width="219" height="15" style="display: block; border="0">
                                                </div>
                                                </a>
                                                
                                                </td>
                                              </tr>
                                          </tbody>
                                        </table>
                                    </div>
                                
                                </td>
                            </tr>
                        </tbody></table>
                        
                        
                        
                        
                     

                        <!--[if (gte mso 9)|(IE)]>
                        </td>
                        </tr>
                        </table>
                        <![endif]-->
                    </td>
                </tr>
              
               
            </table>











            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    <tr>
        <td bgcolor="#ffffff" align="center" style="padding: 20px 0px;">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
            <tr>
            <td align="center" valign="top" width="600">
            <![endif]-->
            <!-- UNSUBSCRIBE COPY -->

          


               <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="max-width: 600px;" class="responsive-table">
                <tr>
                    <td align="center" style="font-size: 12px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color:#666666;">
                        <img alt="Logo" src="http://valifyit.com/images/email/email-logo-small.jpg" width="110" height="34" style="display: block; font-family: Helvetica, Arial, sans-serif; color: #ffffff; font-size: 16px;" border="0">
                           </td>
                     </tr>

                   
            </table>



            <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="max-width: 600px;" class="responsive-table">
                <tr>
                    <td align="center" style="font-size: 12px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color:#666666;">
                        245 5th Ave Suite 201, New York, NY 10001
                           </td>
                     </tr>

                      <tr>
                      <td align="center" style="font-size: 12px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color:#666666;">   
                        <a href="http://valifyit.com/terms/" target="_blank" style="color: #666666; text-decoration: none;">Terms of Service</a> | <a href="http://valifyit.com/privacy/" target="_blank" style="color: #666666; text-decoration: none;">Privacy</a>  | <a href="http://valifyit.com/faq/" target="_blank" style="color: #666666; text-decoration: none;">FAQ</a> </td>
                       
                        
 
                   
                </tr>
            </table>



            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
</table>

</body>
</html>




            ');


$mail = new SendGrid\Mail($from, $subject, $to, $content);
$apiKey = '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';
$sg = new \SendGrid($apiKey);
$response = $sg->client->mail()->send()->post($mail);
//echo $response->statusCode();
//echo $response->headers();
//echo $response->body();
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
    <title>Password Recovery - Valify</title>
    
    
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
  <a href="<?php echo BASE_PATH; ?>"><img src="<?php echo BASE_PATH; ?>/img/navigation/logo-2.png"/></a>
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
