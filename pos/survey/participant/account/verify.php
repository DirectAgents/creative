<?php


session_start();

ob_start();



require_once '../../base_path.php';
require_once '../../class.participant.php';

include_once("../../config.php");

require_once '../../base_path.php'; 


$user = new PARTICIPANT();

if(empty($_GET['id']) && empty($_GET['code']))
{
	$user->redirect('../login');
}









if(isset($_GET['id']) && isset($_GET['code']))
{
	$id = base64_decode($_GET['id']);
	$code = $_GET['code'];
	
	$statusY = "Y";
	$statusN = "N";
	
	$stmt = $user->runQuery("SELECT userID,userStatus FROM tbl_participant WHERE userID=:uID AND tokenCode=:code LIMIT 1");
	$stmt->execute(array(":uID"=>$id,":code"=>$code));
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	if($stmt->rowCount() > 0)
	{
		

		if($row['userStatus']==$statusN)
		{
			$stmt = $user->runQuery("UPDATE tbl_participant SET userStatus=:status WHERE userID=:uID");
			$stmt->bindparam(":status",$statusY);
			$stmt->bindparam(":uID",$id);
			$stmt->execute();	
			
			$msg = "
		           <div class='alert alert-success'>
				   <button class='close' data-dismiss='alert'>&times;</button>
					  <strong>Sweet !</strong>  Your Account is Now Activated : <a href='../login/'>Login here</a>
			       </div>
			       ";	

$sendthankyouemail = 1;



		}
		else
		{
			$msg = "
		           <div class='alert alert-error'>
				   <button class='close' data-dismiss='alert'>&times;</button>
					  <strong>Sorry !</strong>  Your Account is already Activated : <a href='../login/'>Login here</a>
			       </div>
			       ";
		}
	}
	else
	{
		$msg = "
		       <div class='alert alert-error'>
			   <button class='close' data-dismiss='alert'>&times;</button>
			   <strong>Sorry !</strong>  No Account Found : <a href='../signup/'>Signup here</a>
			   </div>
			   ";
	}	
}

?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Valify</title>
    
    
    <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/css/reset.css">

    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Montserrat:400,700'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

        <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/css/style.css">


<link href="https://fonts.googleapis.com/css?family=Lato:400,700|Roboto:400,700,300" rel="stylesheet" type="text/css">



<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script><!-- jQuery Library-->
    <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/css/passwordscheck.css" /><!-- Include Your CSS file here-->   



<script src="<?php echo BASE_PATH; ?>/participant/js/password.js"></script>

<style href>a {text-decoration: none} </style>


  </head>

  <body>

    
<div class="container">






   <?php if(isset($msg)) echo $msg;  

if($sendthankyouemail == '1'){

$sql=mysqli_query($connecDB,"SELECT * FROM tbl_participant WHERE tokenCode = '".$_GET['code']."' ");
$row = mysqli_fetch_array($sql);



// using SendGrid's PHP Library
// https://github.com/sendgrid/sendgrid-php
// If you are using Composer (recommended)
require '../../sendgrid-php/vendor/autoload.php';
// If you are not using Composer
// require("path/to/sendgrid-php/sendgrid-php.php");
$from = new SendGrid\Email("Valify Team", "support@valifyit.com");
$subject = "Thank you!";
$to = new SendGrid\Email($row['FirstName'], $row['userEmail']);
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
                        <a href="http://valifyit.com" target="_blank">
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
                                                 <td align="left" style="padding: 0 0 5px 25px; font-size: 22px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">
                                                Thank you for signing up!
                                                </td>
                                            </tr>

                                            <tr>
                                                 <td align="left" style="padding: 0 0 5px 25px; font-size: 22px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">
                                                &nbsp;
                                                
                                                </td>
                                            </tr>
                                            
                                             <tr>
                                                 <td align="left" style="padding: 0 0 5px 25px; font-size: 16px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">
                                                We are very new and just started accepting sign ups. So, it may take a bit some time until you will see Startups posting their ideas.
                                                
                                                </td>
                                            </tr>


                                             <tr>
                                                 <td align="left" style="padding: 0 0 5px 25px; font-size: 16px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">
                                                To match you up with a Startup, please visit your account and edit your profile. 
                                                
                                                </td>
                                            </tr>

                                            <tr>
                                                 <td align="left" style="padding: 0 0 5px 25px; font-size: 18px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">
                                                &nbsp;
                                                
                                                </td>
                                            </tr>

                                             <tr>
                                                 <td align="left" style="padding: 0 0 5px 25px; font-size: 16px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">
                                              The more we know about you, the better we can match you up with the right Startup.
                                                
                                                </td>
                                            </tr>

                                              <tr>
                                                 <td align="left" style="padding: 0 0 5px 25px; font-size: 22px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">
                                                &nbsp;
                                                
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
                                               

                                                <td align="center" style="padding: 20px; background:#4c71dc; font-size: 25px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #ffffff;" class="padding" colspan="2"><a href="'.BASE_PATH.'/participant/account/settings/" target="_blank" style="font-weight: normal; color: #ffffff;">Edit Your Profile</a></td>


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
                        <a href="'.BASE_PATH.'/terms/" target="_blank" style="color: #666666; text-decoration: none;">Terms of Service</a> | <a href="'.BASE_PATH.'/privacy/" target="_blank" style="color: #666666; text-decoration: none;">Privacy</a>  | <a href="'.BASE_PATH.'/faq/" target="_blank" style="color: #666666; text-decoration: none;">FAQ</a> </td>
                       
                        
 
                   
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

   ?>
  <div class="logo">
   <a href="<?php echo BASE_PATH; ?>"><img src="<?php echo BASE_PATH; ?>/img/navigation/logo-2.png" width="137" height="54"/></a>
  </div>
  </div>
</div>









    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

       <script src="<?php echo BASE_PATH; ?>/js/index.js"></script>

       <script src="<?php echo BASE_PATH; ?>/bootstrap/js/jquery-1.9.1.min.js"></script>
    <script src="<?php echo BASE_PATH; ?>/bootstrap/js/bootstrap.min.js"></script>
    



    
  </body>
</html>



