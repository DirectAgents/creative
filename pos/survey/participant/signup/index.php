<?php
session_start();

require_once __DIR__ . '/facebook-sdk-v5/autoload.php';

require_once '../../base_path.php';

require_once '../../class.participant.php';

include_once("../../config.php");

$reg_user = new PARTICIPANT();

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
$redirect_uri = ''.BASE_PATH.'/participant/signup/';

//database
$db_username = "root"; //Database Username
$db_password = "123"; //Database Password
$host_name = "localhost"; //Mysql Hostname
$db_name = 'circl'; //Database Name


//incase of logout request, just unset the session var
if (isset($_GET['logout'])) {
  unset($_SESSION['access_token']);
  unset($_SESSION['participantSession']);
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
  $result = $mysqli->query("SELECT COUNT(google_id) as usercount FROM tbl_participant WHERE google_id=$user->id");
  $user_count = $result->fetch_object()->usercount; //will return 0 if user doesn't exist

  $sql = mysql_query("SELECT * FROM tbl_participant WHERE userEmail = '".$user->email."'");
  $row = mysql_fetch_array($sql);



  //show user picture
  //echo '<img src="'.$user->picture.'" style="float: right;margin-top: 33px;" />';
  //echo $user_count;
  //echo $user->email;
  if($user_count) //if user already exist change greeting text to "Welcome Back"
    {
        //echo 'Welcome back '.$user->name.'! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
        $_SESSION['participantSession'] = $row['userID'];
        header("Location: ../meetings/");
        exit();
    }
  else //else greeting text "Thanks for registering"
  { 
        //echo 'Hi '.$user->name.', Thanks for Registering! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
     date_default_timezone_set('America/New_York');
    $date = date('Y-m-d'); 
        //echo 'Hi '.$user->name.', Thanks for Registering! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
    $insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_participant (google_id, FirstName, LastName, userEmail, google_picture_link, EmailNotifications, Date_Created, account_verified) 
      VALUES ('".$user->id."',  '".$user->givenName."', '".$user->familyName."', '".$user->email."', '".$user->picture."' , 'New startup requests you participate,When you qualify to participate to provide feedback on an idea','".$date."','1')");
    //$statement->bind_param('issss', $user['id'],  $user['name'], $user['email']);
    //$statement->execute();
    //echo $mysqli->error;

    mysqli_query($insert_sql);  

    $update_sql = mysqli_query($connecDB,"UPDATE tbl_participant SET 
    profile_image = '',
    facebook_id = '',
    google_id = '".$user->id."',
    FirstName = '".$user->givenName."',
    LastName = '".$user->familyName."',
    google_picture_link = '".$user->picture."',
    account_verified = '1'  
    
    WHERE userEmail='".$user->email."'");
   
    //mysqli_query($update_sql);

    //echo $user->id;

    if($mysqli->error == "Duplicate entry '".$user->email."' for key 'userEmail'"){
    
      //exit(header("Location: ../index.php"));

    }else{

        $_SESSION['participantSession'] = $row['userID'];
        header("Location: ../meetings/");
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
    <title>Circl Signup</title>
    
    
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


  </head>

  <body>

    
<div class="container">


<?php


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
  $email = trim($_POST['txtemail']);
  $upass = trim($_POST['txtpass']);
  $code = md5(uniqid(rand()));
  
  $stmt = $reg_user->runQuery("SELECT * FROM tbl_participant WHERE userEmail=:email_id");
  $stmt->execute(array(":email_id"=>$email));
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  
  if($stmt->rowCount() > 0)
  {
    $msg = "
          <div class='alert alert-error'>
       <!--<button class='close' data-dismiss='alert'>&times;</button>-->
          <strong>Sorry !</strong>  email allready exists. Please Try another one
        </div>
        ";
  }
  else
  {
    if($reg_user->register($firstname,$lastname,$email,$upass,$code))
    {     
      $id = $reg_user->lasdID();    
      $key = base64_encode($id);
      $id = $key;
      
      $message = "          
            Hello $firstname,
            <br /><br />
            Welcome to Coding Cage!<br/>
            To complete your registration  please , just click following link<br/>
            <br /><br />
            <a href='http://localhost/creative/pos/survey/participant/account/verify.php?id=$id&code=$code'>Click HERE to Activate :)</a>
            <br /><br />
            Thanks,";
            
      $subject = "Please verify your e-mail for Circl";
            
      $reg_user->send_mail($email,$message,$subject); 
      $msg = "
          <div class='alert alert-success'>
            <button class='close' data-dismiss='alert'>&times;</button>
            <strong>Success!</strong>  We've sent an email to $email.<br><br>
                    Please click on the confirmation link in the email to create your account. 
            </div>
          ";
    }
    else
    {
      echo "sorry , Query could no execute...";
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


?>






   <?php if(isset($msg)) echo $msg;  ?>
  <div class="logo">
    <h1>CIRCL</h1>
  </div>
</div>








<div class="form">

<div class="info">
  <h1>SIGNUP AS A PARTICIPANT</h1>
</div>

<div class="loginas">
  <h3>Are you a <span class="role">startup</span>? <a href="<?php echo BASE_PATH; ?>/startup/signup/">Click here</a></h3>
</div>

<!--  <div class="thumbnail"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/hat.svg"/></div>-->




  
<form class="form-signin" method="post">

  <input type="hidden" name="passwordpass" id="passwordpass"/>

    <div class="name-field col-md-6">
      <div class="form-group">
    <input type="text" name="txtfirstname" id="txtfirstname" class="txtfirstname" placeholder="First Name *" required/>
    </div>
  </div>
    
    <div class="name-field col-md-6">
      <div class="form-group">
    <input type="text" name="txtlastname" id="txtlastname" class="txtlastname" placeholder="Last Name *" required/>
    </div>
   </div>

   <div class="name-field col-md-6">
      <div class="form-group">
    <input type="text" name="txtcity" id="txtcity" class="txtcity" placeholder="City *" required/>
    </div>
  </div>
    
    <div class="name-field col-md-6">
      <div class="form-group">
      <select>
      <option>asdfasdf</option>
      </select>
    </div>
   </div>



    <div class="name-field col-md-6">
      <div class="form-group">
    <input type="email" name="txtemail" id="txtemail" placeholder="Email Address *" required/>
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


<div id="pswd_info">
    <h4>Password must meet the following requirements:</h4>
    <ul>
      <li id="letter" class="invalid">At least <strong>one letter</strong></li>
      <!--<li id="capital" class="invalid">At least <strong>one capital letter</strong></li>-->
      <li id="number" class="invalid">At least <strong>one number</strong></li>
      <li id="length" class="invalid">Be at least <strong>8 characters</strong></li>
    </ul>
  </div>


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
$loginUrl = $helper->getLoginUrl(''.BASE_PATH.'/participant/signup/signup-callback.php', $permissions);

if(!isset($_SESSION['fb_access_token_participant'])){
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

//echo $_SESSION['fb_access_token_participant'];


if(isset($_SESSION['fb_access_token_participant'])){

try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->get('/me?fields=id,first_name, last_name,email,gender', $_SESSION['fb_access_token_participant']);
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


  $resultfacebook = mysqli_query($connecDB,"SELECT COUNT(facebook_id) as usercountfacebook FROM tbl_participant WHERE facebook_id='".$user['id']."' ");
  $user_count_facebook = $resultfacebook->fetch_object()->usercountfacebook; //will return 0 if user doesn't exist

  $sql = mysqli_query($connecDB,"SELECT * FROM tbl_participant WHERE userEmail = '".$user['email']."'");
  $row = mysqli_fetch_array($sql);



  //show user picture
  //echo '<img src="'.$user->picture.'" style="float: right;margin-top: 33px;" />';
  //echo $user_count;
  //echo $user->email;
  if($user_count_facebook) //if user already exist change greeting text to "Welcome Back"
    {

    $update_sql = mysqli_query($connecDB,"UPDATE tbl_participant SET 
    profile_image = '',
    google_picture_link = '',
    account_verified = '1'  

    WHERE userEmail='".$user['email']."'");


        //echo 'Welcome back '.$user->name.'! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
        $_SESSION['participantSession'] = $row['userID'];
        $_SESSION['facebook_photo'] = $user['id'];
        header("Location: ../meetings/");
        exit();
    }
  else //else greeting text "Thanks for registering"
  { 

    date_default_timezone_set('America/New_York');
    $date = date('Y-m-d'); 

    $gender = ucfirst($user['gender']);

        //echo 'Hi '.$user->name.', Thanks for Registering! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
    $insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_participant (facebook_id, FirstName, LastName, userEmail, Gender, EmailNotifications, Date_Created, account_verified) 
      VALUES ('".$user['id']."',  '".$user['first_name']."', '".$user['last_name']."', '".$user['email']."', '".$gender."' ,'New startup requests you participate,When you qualify to participate to provide feedback on an idea','".$date."','1')");
    //$statement->bind_param('issss', $user['id'],  $user['name'], $user['email']);
    //$statement->execute();
    //echo $mysqli->error;

    mysqli_query($insert_sql);  

    header("Location: ../meetings/");
    exit();

    //echo $user->id;

    if($mysqli->error == "Duplicate entry '".$user['email']."' for key 'userEmail'"){
    
      //exit(header("Location: ../index.php"));

    }else{

        $_SESSION['participantSession'] = $user['id'];
        $_SESSION['facebook_photo'] = $user['id'];
        header("Location: ../meetings/");
        exit();

    }

  }




}


?>


  
</div>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

       <script src="<?php echo BASE_PATH; ?>/js/index.js"></script>

    
       <script src="<?php echo BASE_PATH; ?>/bootstrap/js/jquery-1.9.1.min.js"></script>
    <script src="<?php echo BASE_PATH; ?>/bootstrap/js/bootstrap.min.js"></script>
    
  </body>
</html>
