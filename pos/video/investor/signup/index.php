<?php
session_start();

ob_start();

require_once __DIR__ . '/facebook-sdk-v5/autoload.php';


require_once '../../base_path.php';

require_once '../../class.startup.php';

include_once("../../config.php");

$reg_user = new STARTUP();

if($reg_user->is_logged_in()!="")
{
  $reg_user->redirect('../index.php');
}




//session_start(); //session start

//echo $_SESSION['access_token'];


require_once ('libraries/Google/autoload.php');

//Insert your cient ID and secret 
//You can get it from : https://console.developers.google.com/
$client_id = '762314707749-fpgm9cgcutqdr6pehug9khqal9diajaq.apps.googleusercontent.com'; 
$client_secret = 'SkjeNM0N02slGKfpNc7vwFiX';
$redirect_uri = ''.BASE_PATH.'/investors/signup/';

//database
$db_username = "root"; //Database Username
$db_password = "123"; //Database Password
$host_name = "localhost"; //Mysql Hostname
$db_name = 'video'; //Database Name


//incase of logout request, just unset the session var
if (isset($_GET['logout'])) {
  unset($_SESSION['access_token']);
  unset($_SESSION['investorSession']);
}

/************************************************
  Make an API request on behalf of a user. In
  this case we need to have a valid OAuth 2.0
  token for the user, so we need to send them
  through a login flow. To do this we need some
  information from our API console project.
 ************************************************/
$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope("email");
$client->addScope("profile");

/************************************************
  When we create the service here, we pass the
  client to it. The client then queries the service
  for the required scopes, and uses that when
  generating the authentication URL later.
 ************************************************/
$service = new Google_Service_Oauth2($client);

/************************************************
  If we have a code back from the OAuth 2.0 flow,
  we need to exchange that with the authenticate()
  function. We store the resultant access token
  bundle in the session, and redirect to ourself.
*/
  //echo $_GET['code'];
if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
  exit;
}

/************************************************
  If we have an access token, we can make
  requests, else we generate an authentication URL.
 ************************************************/
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
} else {
  $authUrl = $client->createAuthUrl();
}





 if (!isset($authUrl)){ 
 
  
  $user = $service->userinfo->get(); //get user info 
  
  // connect to database
  $mysqli = new mysqli($host_name, $db_username, $db_password, $db_name);
    if ($mysqli->connect_error) {
        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }
  
  //echo $user->id;

   


  //check if user exist in database using COUNT
  $result = mysqli_query($connecDB,"SELECT COUNT(google_id) as usercount FROM tbl_investor WHERE google_id=$user->id ");
  $user_count = $result->fetch_object()->usercount; //will return 0 if user doesn't exist

  $sql = mysqli_query($connecDB,"SELECT * FROM tbl_investor WHERE Email = '".$user->email."'");
  $row = mysqli_fetch_array($sql);



  //show user picture
  //echo '<img src="'.$user->picture.'" style="float: right;margin-top: 33px;" />';
  //echo $user_count;
  //echo $user->email;
  if($user_count) //if user already exist change greeting text to "Welcome Back"
    {
        //echo 'Welcome back '.$user->name.'! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
        $_SESSION['startupSession'] = $row['userID'];
        header("Location: ../index.php");
        exit();
    }
  else //else greeting text "Thanks for registering"
  { 
        //echo 'Hi '.$user->name.', Thanks for Registering! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
    date_default_timezone_set('America/New_York');
    $date = date('Y-m-d'); 
        //echo 'Hi '.$user->name.', Thanks for Registering! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
    
    $fullname = $user->givenName.' '.$user->familyName;

    $insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_investor (google_id, Fullname, Email, google_picture_link, Date_Created, account_verified) 
      VALUES ('".$user->id."',  '".$fullname."', '".$user->email."', '".$user->picture."' , '".$date."','1')");
    //$statement->bind_param('issss', $user['id'],  $user['name'], $user['email']);
    //$statement->execute();
    //echo $mysqli->error;

    mysqli_query($insert_sql);  



    $update_sql = mysqli_query($connecDB,"UPDATE tbl_investor SET 
    google_id = '".$user->id."',
    Fullname = '".$fullname."',
    google_picture_link = '".$user->picture."',
    account_verified = '1'  
    
    WHERE Email='".$user->email."'");
   
    mysqli_query($update_sql);

    //echo $user->id;

    if($mysqli->error == "Duplicate entry '".$user->email."' for key 'Email'"){
    
      //exit(header("Location: ../index.php"));

    }else{

        $_SESSION['startupSession'] = $row['userID'];
        header("Location: ../index.php");
        exit();

    }

    }
  
  //print user details
  //echo '<pre>';
  //print_r($user);
  //echo '</pre>';
}
//echo '</div>';




?>




<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Valify Startup Signup</title>
    
    
    <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/css/reset.css">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Montserrat:400,700'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

        <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/css/login.css">


<link href="https://fonts.googleapis.com/css?family=Lato:400,700|Roboto:400,700,300" rel="stylesheet" type="text/css">



<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script><!-- jQuery Library-->
    <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/css/passwordscheck.css" /><!-- Include Your CSS file here-->   



<script src="<?php echo BASE_PATH; ?>/startup/js/password.js"></script>




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


 $stmt = $reg_user->runQuery("SELECT count(*) as total from tbl_investor");
 $stmt->execute(array(":email_id"=>'test@test.com'));
 $row = $stmt->fetch(PDO::FETCH_ASSOC);


  if($row['total'] > 15)
  {


        
  }else{


if(isset($_POST['btn-signup']))
{

if($_POST['passwordpass'] == 'short') {

echo '<div class="alert alert-error">';
echo "Password is too short. Please try again";
echo '</div>';

}

if($_POST['passwordpass'] == 'weak') {

echo '<div class="alert alert-error">';
echo "Password is too weak. Please try again";
echo '</div>';

}

if($_POST['passwordpass'] == 'good'){

  $firstname = trim($_POST['txtfirstname']);
  $lastname = trim($_POST['txtlastname']);
  $zip = trim($_POST['txtzip']);
  $email = trim($_POST['txtemail']);
  $upass = trim($_POST['txtpass']);
  $code = md5(uniqid(rand()));




 $stmt = $reg_user->runQuery("SELECT count(*) as total from tbl_investor");
 $stmt->execute(array(":email_id"=>$email));
 $row = $stmt->fetch(PDO::FETCH_ASSOC);


  
  if($row['total'] > 15)
  {
    $msg = "
          <div class='alert alert-error'>
       <button class='close' data-dismiss='alert'>&times;</button>
          <strong>Sorry !</strong> We don't accept any new signups at the moment.<br><br>
          Sign up to our list to let you know once space is available to signup.<br><br>
          <a href='".BASE_PATH."/#form'>Click here to sign up</a>
        </div>
        ";
  }else{


  
  $stmt = $reg_user->runQuery("SELECT * FROM tbl_investor WHERE Email=:email_id");
  $stmt->execute(array(":email_id"=>$email));
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  
  if($stmt->rowCount() > 0)
  {
    $msg = "
          <div class='alert alert-error'>
       <!--<button class='close' data-dismiss='alert'>&times;</button>-->
          <strong>Sorry !</strong> Email already exists. Please Try another one
        </div>
        ";
  }
  else
  {
    if($reg_user->register($firstname,$lastname,$zip,$email,$upass,$code))
    {     
      $id = $reg_user->lasdID();    
      $key = base64_encode($id);
      $id = $key;

       $msg = "
          <div class='alert alert-success'>
            <button class='close' data-dismiss='alert'>&times;</button>
            <strong>Success!</strong>  We've sent an email to $email.<br><br>
                  Click on the confirmation link in the email to create your account. 

                           <br><br>
             Some email providers may automatically mark the emails as spam. All automated emails will be sent from support@valifyit.com, please add this to your safe list    
             
            </div>
          ";


// using SendGrid's PHP Library
// https://github.com/sendgrid/sendgrid-php
// If you are using Composer (recommended)
require '../../sendgrid-php/vendor/autoload.php';
// If you are not using Composer
// require("path/to/sendgrid-php/sendgrid-php.php");
$from = new SendGrid\Email("Valify Team", "support@valifyit.com");
$subject = "Welcome To Valify! Confirm Your Email";
$to = new SendGrid\Email($firstname, $email);
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
                                                 <td align="left" style="padding: 0 0 5px 25px; font-size: 22px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">
                                                You\'re on your way!
                                                </td>
                                            </tr>
                                            
                                             <tr>
                                                 <td align="left" style="padding: 0 0 5px 25px;font-size: 22px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">
                                                Let\'s confirm your email address.
                                                
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
                                                
                                                 <a href="'.BASE_PATH.'/startup/account/verify.php?id='.$id.'&code='.$code.'">
                                                <div style="padding: 20px; max-width:240px; text-decoration:none !important; text-decoration:none; font-size: 16px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; background:#348eda; color: #ffffff; text-decoration: none !important;" class="padding">
                                                <img alt="Logo" src="http://valifyit.com/images/email/confirm-email-address.png" width="219" height="15" style="display: block; border="0">
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
                        <a href="http://valifyit.com/terms/" target="_blank" style="color: #666666; text-decoration: none;">Terms of Service</a> | <a href="http://valifyit.com/privacy/" target="_blank" style="color: #666666; text-decoration: none;">Privacy</a>  | <a href="http://valifyit.com/faq/" target="_blank" style="color: #666666; text-decoration: none;">FAQ</a></td>
                       
                        
 
                   
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
      echo "sorry , Query could no execute...";
    }   
  }
 } 
 }else{
   $msg = "

          <div class='alert alert-error'>
          <button class='close' data-dismiss='alert'>&times;</button>
          <strong>Sorry !</strong> Password is not strong enough. Please try again.
        </div>
        ";
 }
}

}


?>






   <?php if(isset($msg)) echo $msg;  ?>
  <div class="logo">
      <a href="<?php echo BASE_PATH; ?>"><img src="<?php echo BASE_PATH; ?>/img/navigation/logo-2.png" width="137" height="54"/></a>
  </div>
</div>








<div class="form">



<?php 
/*
 $stmt = $reg_user->runQuery("SELECT count(*) as total from tbl_investor");
 $stmt->execute(array(":email_id"=>'test@test.com'));
 $row = $stmt->fetch(PDO::FETCH_ASSOC);


  if($row['total'] > 15)
  {

     echo "
          <div class='alert alert-error'>
       <button class='close' data-dismiss='alert'>&times;</button>
          <strong>Sorry !</strong> We don't accept any new signups at the moment.<br><br>
          Sign up to our list to let you know once space is available to signup.<br><br>
          <a href='".BASE_PATH."/#form'>Click here to sign up</a>
        </div>
        ";

        unset($_SESSION['startupSession']); 
   
        
  }else{

    echo "<div class='alert alert-error'>
          <button class='close' data-dismiss='alert'>&times;</button>
          We have limited spots available. Sign up now.
        </div>";

      }  
      */

?>







<div class="info">
  <h1>SIGNUP AS AN INVESTOR</h1>
</div>



<!--  <div class="thumbnail"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/hat.svg"/></div>-->



<div class="form-login">
  
<form class="form-signin" method="post">

  <input type="hidden" name="passwordpass" id="passwordpass"/>

    <div class="name-field col-md-6">
      <div class="form-group">
    <input type="text" name="txtfirstname" id="txtfirstname" class="txtfirstname" placeholder="First Name *" oninvalid="this.setCustomValidity('Enter Your First Name')" oninput="setCustomValidity('')" required/>
    </div>
  </div>
    
    <div class="name-field col-md-6">
      <div class="form-group">
    <input type="text" name="txtlastname" id="txtlastname" class="txtlastname" placeholder="Last Name *" oninvalid="this.setCustomValidity('Enter Your Last Name')" oninput="setCustomValidity('')" required/>
    </div>
   </div>

   <div class="name-field col-lg-12">
      <div class="form-group">
    <input type="text"  placeholder="Zip *" pattern="[0-9]{5}" maxlength="5"  name="txtzip" id="txtzip" class="txtzip" oninvalid="this.setCustomValidity('Enter a valid Zip Code')" oninput="setCustomValidity('')" required/>
    </div>
  </div>
    
   
    <div class="name-field col-md-6">
      <div class="form-group">
    <input type="email" name="txtemail" id="txtemail" placeholder="Email Address *" oninvalid="this.setCustomValidity('Enter a valid Email Address')" oninput="setCustomValidity('')" required/>
    </div>
  </div>
    
    <div class="name-field col-md-6">
      <div class="form-group">
   <input type="password" name="txtpass" id="txtpass" placeholder="Password *" required/><span id="result"></span>
   </div>
    </div>
  
    <button type="submit" name="btn-signup" id="btn-signup">SIGN UP</button>
    <p class="message">Already registered? <a href="../login">Log in</a></p>
</form>

</div>


<div id="pswd_info">
    <h4>Password must meet the following requirements:</h4>
    <ul>
      <li id="letter" class="invalid">At least <strong>one letter</strong></li>
      <!--<li id="capital" class="invalid">At least <strong>one capital letter</strong></li>-->
      <!--<li id="number" class="invalid">At least <strong>one number</strong></li>-->
      <li id="length" class="invalid">Be at least <strong>8 characters</strong></li>
    </ul>
  </div>






<?php 


 $stmt = $reg_user->runQuery("SELECT count(*) as total from tbl_investor");
 $stmt->execute(array(":email_id"=>'test@test.com'));
 $row = $stmt->fetch(PDO::FETCH_ASSOC);


  if($row['total'] > 15)
  {


        
  }else{

?>





  <?php

//Display user info or display login url as per the info we have.
//echo '<div style="margin:20px">';
if (isset($authUrl)){ 
  //show login url
  echo "<p>&nbsp;</p>";
  
  echo '<h3>Or connect with</h3>';
  echo "<p>&nbsp;</p>";
  
  
  
}

?>





<?php

$fb = new Facebook\Facebook([
  'app_id' => '1797081013903216',
  'app_secret' => 'f30f4c99e31c934f65b515c1f777940f',
  'default_graph_version' => 'v2.2',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl(''.BASE_PATH.'/startup/signup/signup-callback.php', $permissions);








if(!isset($_SESSION['fb_access_token_startup'])){
//echo '<a href="' . htmlspecialchars($loginUrl) . '">Sign up with Facebook!</a>';
echo '<div style="float:left; width:100%;">';

echo '<div style="margin:0 auto; width: 82%;">';

echo '<a class="social-signin__btn btn_google btn_default-bis" href="' . $authUrl . '"> <span class="icon icon_google"></span> Google </a>';

echo '<a class="social-signin__btn btn_facebook btn_default-bis" href="' . htmlspecialchars($loginUrl) . '"> <span class="icon icon_facebook"></span> Facebook </a>';

echo '</div>';
echo '</div>';

echo "<p>&nbsp;</p>";

}else{

echo '<div style="float:left; width:100%;">';

echo '<div style="margin:0 auto; width: 82%;">';

echo '<a class="social-signin__btn btn_google btn_default-bis" href="' . $authUrl . '"> <span class="icon icon_google"></span> Google </a>';

echo '<a class="social-signin__btn btn_facebook btn_default-bis"  href="../../logout.php"> <span class="icon icon_facebook"></span> Logout from Facebook! </a>';

echo '</div>';
echo '</div>';

echo "<p>&nbsp;</p>";


}




//echo $_SESSION['fb_access_token_startup'];


if(isset($_SESSION['fb_access_token_startup'])){

try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->get('/me?fields=id,first_name, last_name,email,gender', $_SESSION['fb_access_token_startup']);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$user = $response->getGraphUser();
/*
echo 'Name: ' . $user['name'];
echo "<br>";
echo 'Email: ' . $user['email'];
echo "<br>";
echo 'id: ' . $user['id'];
*/


//check if user exist in database using COUNT


  $resultfacebook = mysqli_query($connecDB,"SELECT COUNT(facebook_id) as usercountfacebook FROM tbl_investor WHERE facebook_id='".$user['id']."' ");
  $user_count_facebook = $resultfacebook->fetch_object()->usercountfacebook; //will return 0 if user doesn't exist

  $sql = mysqli_query($connecDB,"SELECT * FROM tbl_investor WHERE Email = '".$user['email']."'");
  $row = mysqli_fetch_array($sql);



  //show user picture
  //echo '<img src="'.$user->picture.'" style="float: right;margin-top: 33px;" />';
  //echo $user_count;
  //echo $user->email;
  if($user_count_facebook) //if user already exist change greeting text to "Welcome Back"
    {

    $update_sql = mysqli_query($connecDB,"UPDATE tbl_investor SET 
    facebook_id = '".$user['id']."', 
    profile_image = '',
    google_picture_link = '',
    account_verified = '1'  

    WHERE Email='".$user['email']."'");

        //echo 'Welcome back '.$user->name.'! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
        $_SESSION['startupSession'] = $row['userID'];
        $_SESSION['facebook_photo'] = $user['id'];
        header("Location: ../index.php");
        exit();
    }
  else //else greeting text "Thanks for registering"
  { 



  


   date_default_timezone_set('America/New_York');
    $date = date('Y-m-d'); 

    $gender = ucfirst($user['gender']);

        //echo 'Hi '.$user->name.', Thanks for Registering! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
    $fullname = $user['first_name'].' '.$user['last_name'];

    $insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_investor (facebook_id, Fullname, Email, Gender, Date_Created, account_verified) 
      VALUES ('".$user['id']."',  '".$fullname."', '".$user['email']."', '".$gender."' , '".$date."','1')");
    //$statement->bind_param('issss', $user['id'],  $user['name'], $user['email']);
    //$statement->execute();
    //echo $mysqli->error;

    //mysqli_query($insert_sql);  

    $_SESSION['startupSession'] = $row['userID'];
    header("Location: ../index.php");
    exit(); 




    //echo $user->id;






    if($mysqli->error == "Duplicate entry '".$user['email']."' for key 'Email'"){
    
      //exit(header("Location: ../index.php"));

    }else{

        $_SESSION['startupSession'] = $user['id'];
        $_SESSION['facebook_photo'] = $user['id'];
        header("Location: ../index.php");
        exit();

    }

  }

 




}


?>



<?php } ?>

  
</div>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

       <script src="<?php echo BASE_PATH; ?>/js/index.js"></script>

       <script src="<?php echo BASE_PATH; ?>/bootstrap/js/jquery-1.9.1.min.js"></script>
    <script src="<?php echo BASE_PATH; ?>/bootstrap/js/bootstrap.min.js"></script>
    



    
  </body>
</html>