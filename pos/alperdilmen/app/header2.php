<?php
session_start();

//echo $_SESSION['entrepreneurSession'];

ob_start();

require_once 'facebook-sdk-v5/autoload.php';


require_once 'base_path.php';

require_once 'class.entrepreneur.php';

include_once("config.php");

$reg_user = new ENTREPRENEUR();

if($reg_user->is_logged_in()!="")
{
  //$reg_user->redirect('../index.php');
}


function seoUrl($string) {
    //Lower case everything
    $string = strtolower($string);
    //Make alphanumeric (removes all other characters)
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    //Clean up multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);
    //Convert whitespaces and underscore to dash
    $string = preg_replace("/[\s_]/", "-", $string);
    return $string;
}


if(isset($_SESSION['entrepreneurSession'])){
 $sql = "SELECT * FROM tbl_users WHERE userID='".$_SESSION['entrepreneurSession']."'";  
 $result = mysqli_query($connecDB, $sql);  
 $row_entrepreneur = mysqli_fetch_array($result);
}


if(!isset($_SESSION['linkedin_id'])){

require_once 'facebook-sdk-v5/autoload.php';

require_once ('libraries/Google/autoload.php');

//Insert your cient ID and secret 
//You can get it from : https://console.developers.google.com/
$client_id = '762314707749-fpgm9cgcutqdr6pehug9khqal9diajaq.apps.googleusercontent.com'; 
$client_secret = 'SkjeNM0N02slGKfpNc7vwFiX';
$redirect_uri = 'http://localhost/creative/pos/video/';


//database
$db_username = "root"; //Database Username
$db_password = "123"; //Database Password
$host_name = "localhost"; //Mysql Hostname
$db_name = 'video'; //Database Name


//incase of logout request, just unset the session var
if (isset($_GET['logout'])) {
  unset($_SESSION['access_token']);
  unset($_SESSION['entrepreneurSession']);
}

/************************************************
  Make an API request on behalf of a user. In
  this case we need to have a valid OAuth 2.0
  token for the user, so we need to send them
  through a login flow. To do this we need some
  information from our API console project.
 ************************************************/
$client = new Google_Client();
$client->setAccessType('offline');
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope("email");
$client->addScope("profile");
$client->setIncludeGrantedScopes(true);   // incremental auth
$client->setApprovalPrompt('force');
//$client->setApprovalPrompt('consent');


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



// If the access token is expired, ask the user to login again
/*if($client->isAccessTokenExpired()) {
    $authUrl = $client->createAuthUrl();
    header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
    exit();
}*/



/************************************************
  If we have an access token, we can make
  requests, else we generate an authentication URL.
 ************************************************/
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
} else {
  $authUrl = $client->createAuthUrl();
}



//echo $authUrl;
//exit();

 if (!isset($authUrl)){ 
 
  
  $user = $service->userinfo->get(); //get user info 
  
  // connect to database
  $mysqli = new mysqli($host_name, $db_username, $db_password, $db_name);
    if ($mysqli->connect_error) {
        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }
  
  //echo $user->id;

   


  //check if user exist in database using COUNT
  //$result = mysqli_query($connecDB,"SELECT COUNT(google_id) as usercount FROM tbl_users WHERE google_id=$user->id ");
  //$user_count = $result->fetch_object()->usercount; //will return 0 if user doesn't exist

  
  $sql = mysqli_query($connecDB,"SELECT * FROM tbl_users WHERE Email = '".$user->email."'");
  $row = mysqli_fetch_array($sql);


  $fullname = $user->givenName.' '.$user->familyName;



  //show user picture
  //echo '<img src="'.$user->picture.'" style="float: right;margin-top: 33px;" />';
  //echo $user_count;
  //echo $user->email;
  if ($sql->num_rows == 1) //if user already exist change greeting text to "Welcome Back"
    {   

      

        $update_sql = mysqli_query($connecDB,"UPDATE tbl_users SET 
        google_id = '".$user->id."',
        username = '".seoUrl($fullname)."',
        Fullname = '".$fullname."',
        google_picture_link = '".$user->picture."',
        google_token = '".$_SESSION['access_token']."',
        ProfileImage = 'Google'
    
        WHERE Email='".$user->email."'");

        //echo 'Welcome back '.$user->name.'! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
        $_SESSION['entrepreneurSession'] = $row['userID'];
        //echo $_SESSION['startupSession'];
        //header('Location: '.BASE_PATH.'/startup/profile/'.$_SESSION['entrepreneurSession'].'/');
        //header('Location: '.BASE_PATH.'');
        //exit();
        //'".json_decode($_SESSION['access_token'])->access_token."',
    }
  else //else greeting text "Thanks for registering"
  { 
        //echo 'Hi '.$user->name.', Thanks for Registering! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
    date_default_timezone_set('America/New_York');
    $date = date('Y-m-d'); 
        //echo 'Hi '.$user->name.', Thanks for Registering! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
    
    

    $insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_users (google_id, username, Fullname, Email, google_picture_link, ProfileImage, Date_Created) 
      VALUES ('".$user->id."', '".seoUrl($fullname)."' ,  '".$fullname."', '".$user->email."', '".$user->picture."' , 'Google' , '".$date."')");
    //$statement->bind_param('issss', $user['id'],  $user['name'], $user['email']);
    //$statement->execute();
    //echo $mysqli->error;

    //mysqli_query($insert_sql);  

        $sql = mysqli_query($connecDB,"SELECT * FROM tbl_users WHERE Email = '".$user->email."'");
        $row = mysqli_fetch_array($sql);

        $_SESSION['entrepreneurSession'] = $row['userID'];
        $_SESSION['google_id'] = $user->id;
        $_SESSION['email'] = $user->email;
        //echo $_SESSION['startupSession'];
        //echo "asdfasfd";
        //header('Location: '.BASE_PATH.'/startup/profile/'.$_SESSION['entrepreneurSession'].'/');
        //exit();

        header('Location: '.BASE_PATH.'/choose/');
        exit();


    
    //echo $user->id;

   
    }
  
  //print user details
  //echo '<pre>';
  //print_r($user);
  //echo '</pre>';
}
//echo '</div>';




////////////Facebook Login///////////////


$fb = new Facebook\Facebook([
  'app_id' => '1797081013903216',
  'app_secret' => 'f30f4c99e31c934f65b515c1f777940f',
  'default_graph_version' => 'v2.2',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl(''.BASE_PATH.'/signup-callback-entrepreneur.php', $permissions);





//echo $_SESSION['fb_access_token_startup'];


if(isset($_SESSION['fb_access_token_entrepreneur'])){

try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->get('/me?fields=id,first_name, last_name,email,gender', $_SESSION['fb_access_token_entrepreneur']);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  //echo 'Facebook SDK returned an error: ' . $e->getMessage();
  header("Location: ".BASE_PATH."/404/");
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


  $resultfacebook = mysqli_query($connecDB,"SELECT COUNT(facebook_id) as usercountfacebook FROM tbl_users WHERE facebook_id='".$user['id']."' ");
  $user_count_facebook = $resultfacebook->fetch_object()->usercountfacebook; //will return 0 if user doesn't exist

  
  $sql = mysqli_query($connecDB,"SELECT * FROM tbl_users WHERE Email = '".$user['email']."'");
  $row = mysqli_fetch_array($sql);




  //show user picture
  //echo '<img src="'.$user->picture.'" style="float: right;margin-top: 33px;" />';
  //echo $user_count;
  //echo $user->email;
  if ($resultfacebook->num_rows == 1) //if user already exist change greeting text to "Welcome Back"
    {

     
    $fullname = $user['first_name'].' '.$user['last_name'];


    $words = explode(" ", $fullname);
    $firstname = $words[0];
    $lastname = $words[1];


    $username = $firstname.' '.$lastname; 
    

    $update_sql = mysqli_query($connecDB,"UPDATE tbl_users SET 
    facebook_id = '".$user['id']."',
    Fullname = '".$fullname."',
    username = '".seoUrl($username)."',
    ProfileImage = 'Facebook'

    WHERE Email='".$user['email']."'");

        //echo 'Welcome back '.$user->name.'! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
        $_SESSION['entrepreneurSession'] = $row['userID'];
        $_SESSION['facebook_photo'] = $user['id'];

        //header("Location: ../index.php");
        //echo $_SESSION['startupSession'];
        //echo "asdfasdf";
        //echo $row['userID'];
        //echo $user['email'];
        //header('Location: '.BASE_PATH.'/startup/profile/'.$_SESSION['entrepreneurSession'].'/');
        //exit();

     //if($row['Type'] == ''){

      //header('Location: '.BASE_PATH.'');
      //exit();

     //}

        
        
    }
  else //else greeting text "Thanks for registering"
  { 


    date_default_timezone_set('America/New_York');
    $date = date('Y-m-d'); 

    $gender = ucfirst($user['gender']);

        //echo 'Hi '.$user->name.', Thanks for Registering! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
    $fullname = $user['first_name'].' '.$user['last_name'];


    $words = explode(" ", $fullname);
    $firstname = $words[0];
    $lastname = $words[1];


    $username = $firstname.' '.$lastName;


    $insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_users (username, facebook_id, Fullname, Email, Gender, ProfileImage, Date_Created) 
      VALUES ('".$username."', '".$user['id']."',  '".$fullname."', '".$user['email']."', '".$gender."' , 'Facebook', '".$date."')");
    //$statement->bind_param('issss', $user['id'],  $user['name'], $user['email']);
    //$statement->execute();
    //echo $mysqli->error;

    //mysqli_query($insert_sql);  
    
    $sql = mysqli_query($connecDB,"SELECT * FROM tbl_users WHERE Email = '".$user['email']."'");
    $row = mysqli_fetch_array($sql);

    $_SESSION['entrepreneurSession'] = $row['userID'];
    $_SESSION['facebook_id'] = $user['id'];
    $_SESSION['email'] = $user['email'];
    //header("Location: ../index.php");
    //echo $row['userID'];
    //echo "123";
    //header('Location: '.BASE_PATH.'/startup/profile/'.$_SESSION['entrepreneurSession'].'/');
    //exit(); 

    header('Location: '.BASE_PATH.'/choose/');
    exit();




    //echo $user->id;



    } 

  }

}


?>


<!DOCTYPE html>
<!--[if (IE 8)&!(IEMobile)]><html lang="en-US" prefix="og: http://ogp.me/ns#" class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en-US" prefix="og: http://ogp.me/ns#" class="no-js">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="google-site-verification" content="SRJJ1Oa3SFva4VwiefbnJMDgcXp4KAX7RyE4b4euzdc" />
        <title>Loyalty Program - FiveStars</title>
        <!--[if lt IE 9]>
<script src="//css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

        <link rel="pingback" href="https://www.fivestars.com/xmlrpc.php">
        <script src="//cdn.optimizely.com/js/176867628.js"></script>
        <!-- This site is optimized with the Yoast SEO plugin v5.8 - https://yoast.com/wordpress/plugins/seo/ -->
        <meta name="description" content="Grow your business and get more customers with a custom loyalty program. Learn how to easily implement cutting edge loyalty marketing technology today."/>
        <link rel="canonical" href="https://www.fivestars.com/businesses/loyalty/" />
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="Loyalty Program - FiveStars" />
        <meta property="og:description" content="Grow your business and get more customers with a custom loyalty program. Learn how to easily implement cutting edge loyalty marketing technology today." />
        <meta property="og:url" content="https://www.fivestars.com/businesses/loyalty/" />
        <meta property="og:site_name" content="FiveStars" />
        <meta property="article:publisher" content="https://www.facebook.com/fivestarscard" />
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:description" content="Grow your business and get more customers with a custom loyalty program. Learn how to easily implement cutting edge loyalty marketing technology today." />
        <meta name="twitter:title" content="Loyalty Program - FiveStars" />
        <meta name="twitter:site" content="@FiveStars" />
        <meta name="twitter:creator" content="@FiveStars" />


        <link rel='dns-prefetch' href='//maps.googleapis.com' />
        <link rel='dns-prefetch' href='//www.fivestars.com' />
        <link rel='dns-prefetch' href='//s.w.org' />
        <link rel='stylesheet' id='mg_custom-css'  href='<?php echo BASE_PATH; ?>/css/main.css?ver=v2.8' type='text/css' media='all' />
        <script type='text/javascript' async src='//cdn.polyfill.io/v2/polyfill.min.js'></script>
        <link rel='https://api.w.org/' href='https://www.fivestars.com/wp-json/' />
        <link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://www.fivestars.com/xmlrpc.php?rsd" />
        <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="https://www.fivestars.com/wp-includes/wlwmanifest.xml" /> 
        <link rel='shortlink' href='https://www.fivestars.com/?p=21' />
        <link rel="alternate" type="application/json+oembed" href="https://www.fivestars.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fwww.fivestars.com%2Fbusinesses%2Floyalty%2F" />
        <link rel="alternate" type="text/xml+oembed" href="https://www.fivestars.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fwww.fivestars.com%2Fbusinesses%2Floyalty%2F&#038;format=xml" />
        <link rel="apple-touch-icon" sizes="60x60" href="/wp-content/uploads/fbrfg/apple-touch-icon.png">
        <link rel="icon" type="image/png" href="/wp-content/uploads/fbrfg/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="/wp-content/uploads/fbrfg/favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="/wp-content/uploads/fbrfg/manifest.json">
        <link rel="mask-icon" href="/wp-content/uploads/fbrfg/safari-pinned-tab.svg" color="#5bbad5">
        <link rel="shortcut icon" href="/wp-content/uploads/fbrfg/favicon.ico">
        <meta name="msapplication-config" content="/wp-content/uploads/fbrfg/browserconfig.xml">
        <meta name="theme-color" content="#ffffff">

        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"  rel="stylesheet">


        <!--Modal-->
        <link href="<?php echo BASE_PATH; ?>/css/bootsrap.min.css" rel="stylesheet">
        <link href="<?php echo BASE_PATH; ?>/css/style.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://d3tr6q264l867m.cloudfront.net/static/mainapp/js/bootstrap.min.js"></script>



        <script src="<?php echo BASE_PATH; ?>/js/pyh_external_js-v=uN_DBNmZ1XZv0CCjSQ0FwwOJuRgjgQuhhe44tzI3abA1.js"></script>


        <script>
            $( document ).ready(function() {
                $(".findoutmoreButton").click(function() {
                    $('html, body').animate({
                        scrollTop: $(".find-out-more").offset().top - 1
                    }, 1000);
                });
                $("#what-we-offer, #what-we-offer-footer").click(function() {
                  
                    $('html, body').animate({
                        scrollTop: $(".what-we-offer").offset().top - 100
                    }, 1000);

                    $(".hamburger").removeClass("is-active");
                    $(".nav--mobile").removeClass("is-active");
                    $(".page-template").removeClass("u-prevent-scroll");
                    $(".page-template").removeClass("has-nav");
                    

                });
                
                 $("#packages, #packages-footer").click(function() {
                    $('html, body').animate({
                        scrollTop: $(".packages").offset().top - 100
                    }, 1000);

                    $(".hamburger").removeClass("is-active");
                    $(".nav--mobile").removeClass("is-active");
                    $(".page-template").removeClass("u-prevent-scroll");
                    $(".page-template").removeClass("has-nav");

                });

                $("#book-a-session, #book-a-session-footer").click(function() {
                    $('html, body').animate({
                        scrollTop: $(".book-a-session").offset().top - 100
                    }, 1000);

                    $(".hamburger").removeClass("is-active");
                    $(".nav--mobile").removeClass("is-active");
                    $(".page-template").removeClass("u-prevent-scroll");
                    $(".page-template").removeClass("has-nav");

                });



            });
        </script>




    </head>