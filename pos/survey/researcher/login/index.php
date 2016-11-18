<?php
session_start();

require_once __DIR__ . '/facebook-sdk-v5/autoload.php';





require_once '../../base_path.php';

require_once '../../class.researcher.php';

include_once("../../config.php");


if(isset($_GET['p'])){

  $_SESSION['p'] = $_GET['p']; 
}


$user_login = new RESEARCHER();

if($user_login->is_logged_in()!="")
{
  $user_login->redirect('../index.php');
}

if(isset($_POST['btn-login']))
{
  $email = trim($_POST['txtemail']);
  $upass = trim($_POST['txtupass']);
  
  if($user_login->login($email,$upass))
  {
    $user_login->redirect('../index.php');
  }
}







//session_start(); //session start

//echo $_SESSION['access_token'];


require_once ('libraries/Google/autoload.php');

//Insert your cient ID and secret 
//You can get it from : https://console.developers.google.com/
$client_id = '762314707749-fpgm9cgcutqdr6pehug9khqal9diajaq.apps.googleusercontent.com'; 
$client_secret = 'SkjeNM0N02slGKfpNc7vwFiX';
$redirect_uri = ''.BASE_PATH.'/researcher/login/';

//database
$db_username = "root"; //Database Username
$db_password = "123"; //Database Password
$host_name = "localhost"; //Mysql Hostname
$db_name = 'circl'; //Database Name


//incase of logout request, just unset the session var
if (isset($_GET['logout'])) {
  unset($_SESSION['access_token']);
  unset($_SESSION['researcherSession']);
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
  $result = mysqli_query($connecDB,"SELECT COUNT(google_id) as usercount FROM tbl_researcher WHERE google_id=$user->id ");
  $user_count = $result->fetch_object()->usercount; //will return 0 if user doesn't exist

  $sql = mysqli_query($connecDB,"SELECT * FROM tbl_researcher WHERE userEmail = '".$user->email."'");
  $row = mysqli_fetch_array($sql);


  //show user picture
  //echo '<img src="'.$user->picture.'" style="float: right;margin-top: 33px;" />';
  //echo $user_count;
  //echo $user->email;
  if($user_count) //if user already exist change greeting text to "Welcome Back"
    {
        //echo 'Welcome back '.$user->name.'! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
        $_SESSION['researcherSession'] = $row['userID'];
        header("Location: ../meetings/");
        exit();
    }
  else //else greeting text "Thanks for registering"
  { 
        //echo 'Hi '.$user->name.', Thanks for Registering! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
    
    date_default_timezone_set('America/New_York');
    $date = date('Y-m-d'); 
        //echo 'Hi '.$user->name.', Thanks for Registering! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
    $insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_researcher (google_id, FirstName, LastName, userEmail, google_picture_link, Date_Created, account_verified) 
      VALUES ('".$user->id."',  '".$user->givenName."', '".$user->familyName."', '".$user->email."', '".$user->picture."' , '".$date."','1')");
    //$statement->bind_param('issss', $user['id'],  $user['name'], $user['email']);
    //$statement->execute();
    //echo $mysqli->error;

    mysqli_query($insert_sql);  


   $update_sql = mysqli_query($connecDB,"UPDATE tbl_researcher SET 
    google_id = '".$user->id."',
    FirstName = '".$user->givenName."',
    LastName = '".$user->familyName."',
    google_picture_link = '".$user->picture."',
    account_verified = '1'  
    
    WHERE userEmail='".$user->email."'");
   
    mysqli_query($update_sql);

    //echo $user->id;

    if($mysqli->error == "Duplicate entry '".$user->email."' for key 'userEmail'"){
    
      //exit(header("Location: ../index.php"));

    }else{

        $_SESSION['researcherSession'] = $row['userID'];
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
    <title>Login</title>
    
    
    <link rel="stylesheet" href="../../css/reset.css">

    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Montserrat:400,700'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

        <link rel="stylesheet" href="../../css/style.css">

    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Roboto:400,700,300" rel="stylesheet" type="text/css">

    

    
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
   <a href="<?php echo BASE_PATH; ?>"><h1>Circl</h1></a>
  </div>
</div>








<div class="form">
  
<div class="info">
  <h1>LOGIN AS A RESEARCHER</h1>
</div>

<div class="loginas">
  <h3>Are you a <span class="role">Participant</span>? <a href="<?php echo BASE_PATH; ?>/participant/login/">Click here</a></h3>
</div>
  
  <form class="login-form">
    <input type="email" name="txtemail" placeholder="Email Address" required/>
    <input type="password" name="txtupass" placeholder="Password" required/>
    <button type="submit" name="btn-login">LOGIN</button>
    <p class="message">Not registered? <a href="../signup">Sign up</a></p>
    <p class="message"> <a href="../fpass.php">Forgot your Password ? </a></p>
   
  </form>

  
  
<?php

//Display user info or display login url as per the info we have.
//echo '<div style="margin:20px">';
if (isset($authUrl)){ 
  //show login url
  echo "<p>&nbsp;</p>";
  echo '<div align="center">';
  echo '<h3>Or connect with</h3>';
  echo "<p>&nbsp;</p>";
  echo '<a class="social-signin__btn btn btn_default-bis" href="' . $authUrl . '"> <span class="icon icon_google"></span> Google </a>';
  echo '</div>';
  
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
$loginUrl = $helper->getLoginUrl(''.BASE_PATH.'/researcher/login/login-callback.php', $permissions);

if(!isset($_SESSION['fb_access_token'])){
echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
}else{
  echo '<a href="../../logout.php">Logout from Facebook!</a>';
}

//echo $_SESSION['fb_access_token'];


if(isset($_SESSION['fb_access_token'])){

try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->get('/me?fields=id,first_name, last_name,email', $_SESSION['fb_access_token']);
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


  $resultfacebook = mysqli_query($connecDB,"SELECT COUNT(facebook_id) as usercountfacebook FROM tbl_researcher WHERE facebook_id='".$user['id']."' ");
  $user_count_facebook = $resultfacebook->fetch_object()->usercountfacebook; //will return 0 if user doesn't exist

  $sql = mysqli_query($connecDB,"SELECT * FROM tbl_researcher WHERE userEmail = '".$user['email']."'");
  $row = mysqli_fetch_array($sql);



  //show user picture
  //echo '<img src="'.$user->picture.'" style="float: right;margin-top: 33px;" />';
  //echo $user_count;
  //echo $user->email;
  if($user_count_facebook) //if user already exist change greeting text to "Welcome Back"
    {
        //echo 'Welcome back '.$user->name.'! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
        $_SESSION['researcherSession'] = $row['userID'];
        $_SESSION['facebook_photo'] = $user['id'];
        header("Location: ../meetings/");
        exit();
    }
  else //else greeting text "Thanks for registering"
  { 

    date_default_timezone_set('America/New_York');
    $date = date('Y-m-d'); 
        //echo 'Hi '.$user->name.', Thanks for Registering! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
    $insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_researcher (facebook_id, FirstName, LastName, userEmail, Date_Created, account_verified) 
      VALUES ('".$user['id']."',  '".$user['first_name']."', '".$user['last_name']."', '".$user['email']."', '".$date."','1')");
    //$statement->bind_param('issss', $user['id'],  $user['name'], $user['email']);
    //$statement->execute();
    //echo $mysqli->error;

    mysqli_query($insert_sql);  

 

    //echo $user->id;

    if($mysqli->error == "Duplicate entry '".$user['email']."' for key 'userEmail'"){
    
      //exit(header("Location: ../index.php"));

    }else{

        $_SESSION['researcherSession'] = $user['id'];
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
