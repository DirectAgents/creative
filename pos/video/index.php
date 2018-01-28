<?php
session_start();

ob_start();

require_once __DIR__ . '/facebook-sdk-v5/autoload.php';


require_once 'base_path.php';

require_once 'class.entrepreneur.php';

include_once("config.php");

$reg_user = new ENTREPRENEUR();

if($reg_user->is_logged_in()!="")
{
  //$reg_user->redirect('../index.php');
}




//session_start(); //session start

//echo $_SESSION['access_token'];


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
  $result = mysqli_query($connecDB,"SELECT COUNT(google_id) as usercount FROM tbl_entrepreneur WHERE google_id=$user->id ");
  $user_count = $result->fetch_object()->usercount; //will return 0 if user doesn't exist

  


  $fullname = $user->givenName.' '.$user->familyName;

  //show user picture
  //echo '<img src="'.$user->picture.'" style="float: right;margin-top: 33px;" />';
  //echo $user_count;
  //echo $user->email;
  if($user->email) //if user already exist change greeting text to "Welcome Back"
    {   

        $sql = mysqli_query($connecDB,"SELECT * FROM tbl_entrepreneur WHERE Email = '".$user->email."'");
        $row = mysqli_fetch_array($sql);

        $update_sql = mysqli_query($connecDB,"UPDATE tbl_entrepreneur SET 
        google_id = '".$user->id."',
        Fullname = '".$fullname."',
        google_picture_link = '".$user->picture."'
    
        WHERE Email='".$user->email."'");

        //echo 'Welcome back '.$user->name.'! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
        $_SESSION['entrepreneurSession'] = $row['userID'];
        //echo $_SESSION['startupSession'];
        header('Location: '.BASE_PATH.'/startup/profile/'.$_SESSION['entrepreneurSession'].'/');
        //header('Location: '.BASE_PATH.'');
        exit();
    }
  else //else greeting text "Thanks for registering"
  { 
        //echo 'Hi '.$user->name.', Thanks for Registering! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
    date_default_timezone_set('America/New_York');
    $date = date('Y-m-d'); 
        //echo 'Hi '.$user->name.', Thanks for Registering! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
    
    

    $insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_entrepreneur (google_id, Fullname, Email, google_picture_link, Date_Created) 
      VALUES ('".$user->id."',  '".$fullname."', '".$user->email."', '".$user->picture."' , '".$date."')");
    //$statement->bind_param('issss', $user['id'],  $user['name'], $user['email']);
    //$statement->execute();
    //echo $mysqli->error;

    //mysqli_query($insert_sql);  

        $sql = mysqli_query($connecDB,"SELECT * FROM tbl_entrepreneur WHERE Email = '".$user->email."'");
        $row = mysqli_fetch_array($sql);

        $_SESSION['entrepreneurSession'] = $row['userID'];
        echo $_SESSION['startupSession'];
        //echo "asdfasfd";
        header('Location: '.BASE_PATH.'/startup/profile/'.$_SESSION['entrepreneurSession'].'/');
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


  $resultfacebook = mysqli_query($connecDB,"SELECT COUNT(facebook_id) as usercountfacebook FROM tbl_entrepreneur WHERE facebook_id='".$user['id']."' ");
  $user_count_facebook = $resultfacebook->fetch_object()->usercountfacebook; //will return 0 if user doesn't exist

  
  $sql = mysqli_query($connecDB,"SELECT * FROM tbl_entrepreneur WHERE Email = '".$user['email']."'");
  $row = mysqli_fetch_array($sql);


  //show user picture
  //echo '<img src="'.$user->picture.'" style="float: right;margin-top: 33px;" />';
  //echo $user_count;
  //echo $user->email;
  if($row['userID']) //if user already exist change greeting text to "Welcome Back"
    {

    

    $update_sql = mysqli_query($connecDB,"UPDATE tbl_entrepreneur SET 
    facebook_id = '".$user['id']."', 
    profile_image = '',
    google_picture_link = ''

    WHERE Email='".$user['email']."'");

        //echo 'Welcome back '.$user->name.'! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
        $_SESSION['entrepreneurSession'] = $row['userID'];
        $_SESSION['facebook_photo'] = $user['id'];
        //header("Location: ../index.php");
        //echo $_SESSION['startupSession'];
        //echo "asdfasdf";
        //echo $row['userID'];
        //echo $user['email'];
        header('Location: '.BASE_PATH.'/startup/profile/'.$_SESSION['entrepreneurSession'].'/');
        exit();
        
    }
  else //else greeting text "Thanks for registering"
  { 


   date_default_timezone_set('America/New_York');
    $date = date('Y-m-d'); 

    $gender = ucfirst($user['gender']);

        //echo 'Hi '.$user->name.', Thanks for Registering! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
    $fullname = $user['first_name'].' '.$user['last_name'];

    $insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_entrepreneur (facebook_id, Fullname, Email, Gender, Date_Created) 
      VALUES ('".$user['id']."',  '".$fullname."', '".$user['email']."', '".$gender."' , '".$date."')");
    //$statement->bind_param('issss', $user['id'],  $user['name'], $user['email']);
    //$statement->execute();
    //echo $mysqli->error;

    //mysqli_query($insert_sql);  
    
    $sql = mysqli_query($connecDB,"SELECT * FROM tbl_entrepreneur WHERE Email = '".$user['email']."'");
    $row = mysqli_fetch_array($sql);

    $_SESSION['entrepreneurSession'] = $row['userID'];
    //header("Location: ../index.php");
    //echo $row['userID'];
    //echo "123";
    header('Location: '.BASE_PATH.'/startup/profile/'.$_SESSION['entrepreneurSession'].'/');
    exit(); 




    //echo $user->id;



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
        <link rel='stylesheet' id='mg_custom-css'  href='css/main.css?ver=v2.8' type='text/css' media='all' />
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
        <link href="css/bootsrap.min.css" rel="stylesheet">
        <link href="css/style.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://d3tr6q264l867m.cloudfront.net/static/mainapp/js/bootstrap.min.js"></script>



        <script src="js/pyh_external_js-v=uN_DBNmZ1XZv0CCjSQ0FwwOJuRgjgQuhhe44tzI3abA1.js"></script>


        <script>
            $( document ).ready(function() {
                $(".findoutmoreButton").click(function() {
                    $('html, body').animate({
                        scrollTop: $(".find-out-more").offset().top - 1
                    }, 1000);
                });
                $("#what-we-do").click(function() {
                    $('html, body').animate({
                        scrollTop: $(".what-we-do").offset().top - 100
                    }, 1000);

                });
                
                 $("#pricing").click(function() {
                    $('html, body').animate({
                        scrollTop: $(".pricing").offset().top - 100
                    }, 1000);

                });

                $("#book-a-session").click(function() {
                    $('html, body').animate({
                        scrollTop: $(".book-a-session").offset().top - 100
                    }, 1000);

                });



            });
        </script>






    </head>

    <body class="page-template page-template-page-loyalty page-template-page-loyalty-php page page-id-21 page-child parent-pageid-17 optimizely-21">




        <header class="js-header header">
            <div class="wrapper">
                <nav class="nav--main">
                    <ul>

                        <li id="menu-item-46" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-46"><a href="investors"/>For Investors</a></li>
                        <li id="menu-item-51" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-51">
                        <a href="" data-toggle="modal" data-target="#signin">Login</a></li>
                    </ul>      </nav>
                <button class="hamburger hamburger--squeeze js-hamburger u-hide--md-up" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
                <a href="https://www.fivestars.com" class="logo--header">
                    <svg width="160" height="30" viewBox="0 0 1242 237" xmlns="http://www.w3.org/2000/svg"><title>logo</title><g fill-rule="nonzero" fill="#FFF"><path d="M-.003 178.09h21.491v-49.3h61.709v-19.36H21.488V76.373h69.55V57.006H-.003zM111.514 57.014h21.492V178.09h-21.492zM211.497 150.04l-36.892-93.034H150.83l50.883 121.925h18.867l50.833-121.925H248.18zM309.522 126.556h61.358v-19.017h-61.358V76.022h69.25V57.006h-90.75v121.083h91.591v-19.017h-70.091zM446.222 110.956c-26.909-5.717-33.209-12.067-33.209-23.484v-.35c0-10.916 10.125-19.558 26.009-19.558 12.608 0 23.983 3.975 35.35 13.158l7.991-10.575c-12.358-9.833-25.166-14.841-42.991-14.841-23.234 0-40.159 13.991-40.159 33.008v.35c0 19.858 12.909 28.892 41.05 34.95 25.667 5.358 31.825 11.767 31.825 22.983v.35c0 11.917-10.825 20.6-27.258 20.6-16.975 0-29.183-5.708-41.942-17.125l-8.591 10.025c14.691 12.959 30.575 19.359 49.991 19.359 24.275 0 41.8-13.5 41.8-34.25v-.35c0-18.517-12.608-28.35-39.866-34.25M590.238 57.03H494.13v12.61h41.058v108.416h14V69.639h41.05zM606.463 133.79l28-61.71 27.8 61.71h-55.8zm21.7-77.643l-55.758 121.917h14.15l14.5-31.967h66.616l14.342 31.967h14.85l-55.75-121.917h-12.95zM726.03 118.764v-49.15h37.775c19.758 0 31.275 9.042 31.275 23.883v.342c0 15.592-13.1 24.925-31.467 24.925H726.03zm83-25.417v-.35c0-9.533-3.475-18.016-9.384-23.883-7.741-7.592-19.758-12.108-34.791-12.108H712.23v121.083h13.8v-47.067h34.95l35.491 47.067h16.975l-37.575-49.5c19.209-3.425 33.159-15.192 33.159-35.242zM878.121 110.956c-26.95-5.717-33.208-12.067-33.208-23.484v-.35c0-10.916 10.125-19.558 26.008-19.558 12.609 0 23.984 3.975 35.3 13.158l8.042-10.575c-12.408-9.833-25.167-14.841-42.992-14.841-23.233 0-40.208 13.991-40.208 33.008v.35c0 19.858 12.958 28.892 41.1 34.95 25.667 5.358 31.825 11.767 31.825 22.983v.35c0 11.917-10.875 20.6-27.3 20.6-16.933 0-29.142-5.708-41.95-17.125l-8.542 10.025c14.692 12.959 30.575 19.359 49.992 19.359 24.275 0 41.75-13.5 41.75-34.25v-.35c0-18.517-12.558-28.35-39.817-34.25M1122.58 144.097c-1.684-1.191-3.867-1.841-6.109-1.841-2.183 0-4.416.65-6.1 1.841l-32.65 23.459h-.025l12.575-38.267c1.292-3.925-.4-9.083-3.775-11.517l-32.108-23.116h39.633c4.117 0 8.592-3.275 9.825-7.242l12.484-38.55h.125l12.741 38.658c1.292 3.925 5.759 7.1 9.925 7.1h39.9v.05l-32.225 23.175c-3.375 2.434-5.066 7.6-3.825 11.517l12.575 38.192h-.308l-32.658-23.459zm115.108-9.616c3.375-2.434 5.067-7.592 3.783-11.517l-17.133-52.125c-.842-2.533-2.733-3.925-4.867-3.925-1.141 0-2.383.4-3.566 1.242l-18.05 12.975h-.034L1173.43 7.106c-1.292-3.925-5.767-7.108-9.934-7.108h-55.6c-4.166 0-6.5 3.183-5.208 7.108l6.683 20.267h-6.25v.025h-72.7c-4.166 0-8.583 3.225-9.875 7.191l-17.075 52.825c-1.291 3.967 1.042 7.242 5.217 7.242h22.483l-24.3 74.05c-1.291 3.916.4 9.083 3.767 11.516l44.783 32.167c1.184.842 2.384 1.242 3.525 1.242 2.175 0 4.067-1.392 4.909-3.917l6.95-21.158h.016l-.066.216 63.941 46.017c1.684 1.192 3.917 1.792 6.109 1.792 2.233 0 4.458-.6 6.15-1.792l44.775-32.217c3.383-2.425 3.383-6.35 0-8.783l-18.267-13.125v-.025l64.225-46.158z"/></g></svg>
                </a>
            </div>
        </header>
        <nav class="nav--mobile js-mobile-nav">
            <ul><li id="menu-item-64" class="menu-item menu-item-type-post_type menu-item-object-page current-page-ancestor current-page-parent menu-item-64"><a href="https://www.fivestars.com/businesses/">For Businesses</a></li>

                <li id="menu-item-66" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-66"><a href="https://www.fivestars.com/businesses/how-it-works/">How It Works</a></li>
                <li id="menu-item-558" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-558"><a href="https://www.fivestars.com/businesses/pricing/">Pricing</a></li>
                <li id="menu-item-557" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-557"><a href="https://www.fivestars.com/">For Members</a></li>
                <li id="menu-item-68" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-68"><a target="_blank" href="https://fivestars.app.link/H5xo4xAVWB">Find Locations</a></li>
                <li id="menu-item-69" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-69"><a target="_blank" href="https://www.fivestars.com/accounts/login/">Sign In</a></li>
            </ul>  </nav>
        <main class="main">
            <!--  hero START -->
            <section class="hero">
                <div class="hero__bg lazyImg lazyImg--notloaded" style="background-image: url(assets/AdobeStock_2836132-darker.jpg)" data-image="assets/AdobeStock_2836132-darker.jpg"></div>
                <noscript><div class="hero__bg" style="background-image: url(https://www.fivestars.com/wp-content/uploads/2017/02/Highrez.jpg)"></div></noscript>
                <div class="wrapper">
                    <div class="hero__content">
                        <h1 class="heading--hero">Get Investment</h1>
                        <h2 class="hero__text">A customer loyalty program can double customer return visits</h2>

                        <div class="hero__cta--desktop">

                            <button type="button" class="btn findoutmoreButton">FIND OUT MORE</button>



                            <div class="hero__cta--desktop u-hide--md-down">
                                <div class="hero__text--cta"><p style="font-size:16px;">
                                    Have a question? Call (855) 769-8136</div></p>
                        </div>
                    </div>

                    <div class="hero__cta--mobile u-hide--md-up">
                    </div>


                </div>
                <div class="hero__pattern"></div>
            </section>
            <div class="find-out-more"></div>
            <!--  hero END -->
            <nav id="nav-internal" class="nav--internal"><ul>
                <li id="menu-item-199" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-199">
                    <a href="#" id="what-we-do">What we do!</a></li>
                <li id="menu-item-199" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-199">
                    <a href="#" id="pricing">Pricing</a></li>
                <li id="menu-item-198" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-198">
                    <a href="#" id="book-a-session">Book a Session</a></li>
                </ul></nav>


            <section class="section">
                <div class="wrapper">
                    <h2 class="heading--internal u-text-center u-mb2">Did you know?</h2>
                    <figure class="illustration--60">
                        <figcaption>Only 0.91 percent of startups are funded by angel investors, while a measly 0.05 percent are funded by VCs</figcaption>
                        <img src="images/money-bag.svg" alt="icon"/>
                    </figure>

                </div>



                <div class="section__arrow what-we-do">
                    <div class="wrapper">
                        <div class="grid center">
                            <div class="grid__column u-size-1of2--md"></div>
                            <div class="grid__column u-size-1of2--md has-arrow"></div>
                        </div>
                    </div>
                </div>

            </section>









            <!--  section_image END -->
            <!-- section_image START -->
            <section class="section">
                <div class="wrapper">

                    <span class="space"></span>
                    <span class="space"></span>

                    <h2 class="heading--internal u-text-center u-mb4">What we do!</h2>

                    <div class="grid grid--section grid--loyalty u-text-center--md-down has-image-left">

                        <!--  image START -->
                        <div class="grid__column u-size-1of2--md">
                            <figure class="section__illustration  section__illustration--icon">
                                <img src="assets/camera.svg" class="u-img-responsive u-border-radius" />
                            </figure>
                        </div>
                        <!--  image END -->

                        <!--  content START-->
                        <div class="grid__column u-size-1of2--md section__text--middle">
                            <div class="section__content u-text-center--md-down">
                                <h3 class="heading--section heading--normal ">Fortune 500 companies use rewards programs to keep customers</h3>
                                <p class="section__text ">Starbucks, Walgreens and many other successful companies keep customers coming back by investing in a powerful rewards program</p>
                            </div>
                        </div>
                        <!-- content END -->
                    </div>



                </div>
                <div class="section__arrow">
                    <div class="wrapper">
                        <div class="grid">
                            <div class="grid__column u-size-1of2--md "></div>
                            <div class="grid__column u-size-1of2--md has-arrow"></div>
                        </div>
                    </div>
                </div>
            </section>
            <!--  section_image END -->
            <!-- section_image START -->
            <section class="section">
                <div class="wrapper">

                    <div class="grid grid--section grid--loyalty text-center--md-down has-image-right">
                        <!--  content START-->
                        <div class="grid__column u-size-1of2--md section__text--middle">
                            <div class="section__content u-text-center--md-down">
                                <h3 class="heading--section heading--normal ">FiveStars offers Fortune 500 technology to local businesses</h3>
                                <p class="section__text ">Set up a digital rewards program, automatically send messages, and customize offers for new and returning customers. On average, returning customers will visit two more times per year.</p>
                            </div>
                        </div>
                        <!-- content END -->

                        <!--  image START -->
                        <div class="grid__column u-size-1of2--md">
                            <figure class="section__illustration  section__illustration--icon">
                                <img src="assets/chairs.svg" class="u-img-responsive u-border-radius" />
                            </figure>
                        </div>
                        <!--  image END -->
                    </div>


                </div>

                <div class="section__arrow pricing">
                    <div class="wrapper">
                        <div class="grid center">
                            <div class="grid__column u-size-1of2--md"></div>
                            <div class="grid__column u-size-1of2--md has-arrow"></div>
                        </div>
                    </div>
                </div>


            </section>



            <section class="section">
                <div class="wrapper">
                    <div class="grid grid--section">
                        <div class="grid__column">
                            <h2 class="heading--internal u-text-center">Choose a plan that works best for your startup</h2>
                        </div>
                    </div>

                    <div class="grid grid--program u-text-center--md-down">
                        <div class="grid__column grid__column--program u-flex u-size-1of3--md u-text-center">
                            <a href="#starter" id="starter" class="js-program">
                                <div class="section__feature section__feature--program">
                                    <h3 class="heading--section heading--pricing">Bronze</h3>
                                    <p class="u-text-small">Basic Video Footage (incl. basic Animation Graphics)</p>
                                </div>
                            </a>
                        </div>
                        <div class="grid__column grid__column--program u-flex u-size-1of3--md u-text-center">
                            <a href="#growth" id="growth" class="js-program">
                                <div class="section__feature section__feature--program">
                                    <h3 class="heading--section heading--pricing">Silver</h3>
                                    <p class="u-text-small">Basic Video Footage + Office Space Shooting (incl. basic Animation Graphics)</p>
                                </div>
                            </a>
                        </div>
                        <div class="grid__column grid__column--program u-flex u-size-1of3--md u-text-center">
                            <a href="#pro" id="pro" class="js-program">
                                <div class="section__feature section__feature--program">
                                    <h3 class="heading--section heading--pricing">Gold</h3>
                                    <p class="u-text-small">Basic Video Footage + Office Space Shooting (incl. advanced Animation Graphics)</p>
                                </div>
                            </a>
                        </div>



                    </div>
                </div>


                <div class="section__arrow book-a-session">
                    <div class="wrapper">
                        <div class="grid">
                            <div class="grid__column u-size-1of2--md has-arrow"></div>
                            <div class="grid__column u-size-1of2--md"></div>
                        </div>
                    </div>
                </div>

            </section>







            <section class="section--calculator book-a-session">
                <div class="wrapper">
                    <form id="CustomerRegisterForm" method="post" data-gtm-event="leadGenSubmit" data-script-success-event="FireScriptsLeadGenSuccess" data-script-error-event="FireScriptsLeadGenError">
                        <div class="book-a-session-form">
                            <div class="grid grid--section">
                                <span class="space"></span>
                                <h2 class="heading--internal u-text-center u-mb4">Book a session for a video session!</h2>

                                <span class="space"></span>





                                <div class="grid__column u-size-1of2--md">
                                    <div class="book-a-session-form__input">
                                        <label for="revenue">What's your Startup name?</label>
                                        <input id="startup-name" name="startup-name" type="text" required>
                                    </div>


                                    <div class="book-a-session-form__input">
                                        <label for="firstname">First Name</label>
                                        <input id="firstname" name="firstname" type="text" required>
                                    </div>

                                    <div class="book-a-session-form__input">
                                        <label for="email">Your Email</label>
                                        <input type="email" id="email" name="email" required>
                                    </div>


                                </div>

                                <div class="grid__column u-size-1of2--md">


                                    <div class="book-a-session-form__input calculator__input--last">
                                        <label for="industry">What's your industry?</label>
                                        <select id="industry" name="industry" class="js-calculator-input" required>
                                            <option selected="" value="Technology">Technology</option>
                                            <option value="Mobile">Mobile</option>
                                            <option value="Finance">Finance</option>
                                            <option value="Ecommerce">Ecommerce</option>
                                            <option value="Media">Media</option>
                                            <option value="B2B Services">B2B Services</option>
                                            <option value="Consumer Products">Consumer Products</option>
                                            <option value="Consulting">Consulting</option>
                                            <option value="Big Data">Big Data</option>
                                            <option value="Education">Education</option>
                                            <option value="Travel">Travel</option>
                                            <option value="Entertainment">Entertainment</option>
                                            <option value="Fashion">Fashion</option>
                                            <option value="Healthcare">Healthcare</option>
                                            <option value="Real Estate">Real Estate</option>
                                            <option value="Food and Beverage">Food and Beverage</option>
                                            <option value="Art and Design">Art and Design</option>
                                            <option value="Health, Fitness and Wellness">Health, Fitness and Wellness</option>
                                            <option value="Human Resources">Human Resources</option>  
                                            <option value="Other">Other</option>  
                                        </select>
                                    </div>

                                    <div class="book-a-session-form__input">
                                        <label for="ticket">Last Name</label>
                                        <input type="text" name="lastname" required>
                                    </div>

                                    <div class="book-a-session-form__input">
                                        <label for="ticket">Phone</label>
                                        <input type="tel" data-mask="1-000-000-0000" required name="Phone" data-placement="bottom" />
                                    </div>

                                </div>

                                <span class="space"></span>
                                <div class="grid__column u-size-1of1--md">

                                    <button type="submit" id="submit" class="btn">Request Booking</button>


                                    <div id="success"></div>

                                </div>




                            </div>

                        </div>
                    </form>


                </div>
            </section>




<div class="modal fade" id="signin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="container center-block">
                <div class="signup-container center-block">
                    <button type="button" data-dismiss="modal" class='exit-button'><img src="https://d3tr6q264l867m.cloudfront.net/static/mainapp/assets/images/exit-icon.png" class="exit-icon center-block"></button>
                    <div class="signup-card center-block">
                        <img src="https://d3tr6q264l867m.cloudfront.net/static/mainapp/assets/images/logo.svg" class="center-block signup-card-image">
                        <h2 class="signup-card-title bold text-center">Sign in as a Startup!</h2>
                        <p class="signup-description text-center"><span class="bold">Collapsed</span> is a community that aims to provide value by providing insights on failed startups.</p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                 <div class="login-buttons">
                                    <a href="<?php echo htmlspecialchars($loginUrl); ?>">
                                        <div class="fb-connect connect-background" data-track="home:facebook-connect">
                                            <span class="fa fa-facebook"></span>
                                            <span class="connect-text">Connect with Facebook</span>
                                        </div>  
                                    </a>
                                </div>
                             </div>   
                                <div class="col-md-12">
                                    <div class="login-buttons">
                                    <a href="<?php echo $authUrl; ?>">
                                       <div class="google-connect connect-background" id="google-connect-button" data-track="home:google-connect">
                         <span class="fa fa-google-plus"></span>
                         <a href="<?php echo $authUrl; ?>">
                         <span class="google-connect-text connect-text">Connect with Google</span>
                         </a>
                    </div>
                                    </a>
                                </div>
                            </div>
                            </div> 
                        </div>
                        <p class="signup-light text-center">We won't ever post anything on Facebook without your permission.</p>
                    </div>
                </div>
            </div>
        </div>





            <!--  section_image END -->
        </main>
        <span class="space"></span>
        <footer class="footer">
            <div class="footer__pattern"></div>
            <div class="footer__cta">
                <div class="wrapper">
                    <h5 class="heading--section--lg u-text-white u-mb2 u-text-center">Start to impress your potential investors</h5>
                    <p class="u-text-intro u-text-white u-text-normal u-text-center u-mb1">We incentivized more than 20 million customers to make 54 million visits last year to local stores like yours. Try FiveStars today.</p>
                    <div class="footer__form">

                    </div>
                </div>
            </div>
            <span class="space"></span>
            <div class="footer__bottom">
                <div class="wrapper">


                    <nav class="nav--footer nav--two">

                        <div class="nav__menus">
                            <ul><li id="menu-item-55" class="menu-item menu-item-type-post_type menu-item-object-page current-page-ancestor current-page-parent menu-item-55"><a href="https://www.fivestars.com/businesses/">For Startups</a></li>
                                <li id="menu-item-57" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-57"><a href="https://www.fivestars.com/businesses/how-it-works/">What we do!</a></li>
                                <li id="menu-item-58" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-58"><a href="https://www.fivestars.com/businesses/pricing/">Pricing</a></li>
                                <li id="menu-item-443" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-443"><a target="_blank" href="http://blog.fivestars.com">Marketing Tips</a></li>
                                <li id="menu-item-360" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-360"><a target="_blank" href="https://dashboard.fivestars.com">Dashboard</a></li>
                                <li id="menu-item-444" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-444"><a target="_blank" href="http://support.fivestars.com">Support</a></li>
                            </ul><ul><li id="menu-item-445" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-445"><a href="https://www.fivestars.com/">For Investors</a></li>
                            <li id="menu-item-446" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-446"><a target="_blank" href="https://www.fivestars.com/accounts/login/">Sign In</a></li>
                            <li id="menu-item-447" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-447"><a target="_blank" href="https://fivestars.app.link/H5xo4xAVWB">Find Locations</a></li>
                            <li id="menu-item-623" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-623"><a href="https://www.fivestars.com/business/">Rewards &#038; Deals</a></li>
                            <li id="menu-item-59" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-59"><a href="https://www.fivestars.com/about-us/">About Us</a></li>
                            <li id="menu-item-60" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-60"><a href="https://www.fivestars.com/careers/">Careers</a></li>
                            <li id="menu-item-361" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-361"><a href="https://www.fivestars.com/legal/">Terms</a></li>
                            <li id="menu-item-62" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-62"><a target="_blank" href="https://partners.fivestars.com">Partners</a></li>
                            </ul>					</div>

                        <aside class="nav--social">
                            <h6 class="heading--md u-hide--md-down">We're social. Join us!</h6>
                            <ul>
                                <li class="u-hide--md-up"><span>We're social. Follow us!</span></li>
                                <li><a href="https://www.instagram.com/fivestars/" target="_blank"><svg width="30" height="30" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg"><title>Instagram</title><path d="M24 0c6.518 0 7.335.028 9.895.144 2.555.117 4.3.523 5.826 1.116 1.578.613 2.917 1.434 4.25 2.768 1.335 1.334 2.156 2.673 2.77 4.251.592 1.527.998 3.271 1.115 5.826.116 2.56.144 3.377.144 9.895s-.028 7.335-.144 9.895c-.117 2.555-.523 4.3-1.116 5.826-.613 1.578-1.434 2.917-2.768 4.25-1.334 1.335-2.673 2.156-4.251 2.77-1.527.592-3.271.998-5.826 1.115-2.56.116-3.377.144-9.895.144s-7.335-.028-9.895-.144c-2.555-.117-4.3-.523-5.826-1.116-1.578-.613-2.917-1.434-4.25-2.768-1.335-1.334-2.156-2.673-2.769-4.251-.593-1.527-1-3.271-1.116-5.826C.028 31.335 0 30.518 0 24s.028-7.335.144-9.895c.117-2.555.523-4.3 1.116-5.826.613-1.578 1.434-2.917 2.768-4.25C5.362 2.693 6.701 1.872 8.28 1.26 9.806.667 11.55.26 14.105.144 16.665.028 17.482 0 24 0zm0 4.324c-6.408 0-7.167.025-9.698.14-2.34.107-3.61.498-4.457.827-1.12.435-1.92.955-2.759 1.795-.84.84-1.36 1.64-1.795 2.76-.33.845-.72 2.116-.827 4.456-.115 2.53-.14 3.29-.14 9.698s.025 7.167.14 9.698c.107 2.34.498 3.61.827 4.457.435 1.12.955 1.92 1.795 2.76.84.839 1.64 1.359 2.76 1.794.845.33 2.116.72 4.456.827 2.53.115 3.29.14 9.698.14 6.409 0 7.168-.025 9.698-.14 2.34-.107 3.61-.498 4.457-.827 1.12-.435 1.92-.955 2.759-1.795.84-.84 1.36-1.64 1.795-2.76.33-.845.72-2.116.827-4.456.115-2.53.14-3.29.14-9.698s-.025-7.167-.14-9.698c-.107-2.34-.498-3.61-.827-4.457-.435-1.12-.955-1.92-1.795-2.76-.84-.839-1.64-1.359-2.76-1.794-.845-.33-2.116-.72-4.456-.827-2.53-.115-3.29-.14-9.698-.14zm0 7.352c6.807 0 12.324 5.517 12.324 12.324 0 6.807-5.517 12.324-12.324 12.324-6.807 0-12.324-5.517-12.324-12.324 0-6.807 5.517-12.324 12.324-12.324zM24 32a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm15.691-20.811a2.88 2.88 0 1 1-5.76 0 2.88 2.88 0 0 1 5.76 0z" fill="#333" fill-rule="evenodd"/></svg>
                                    </a></li>
                                <li><a href="https://www.facebook.com/FiveStarsCard/" target="_blank"><svg width="30" height="30" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg"><title>Facebook</title><path d="M25.638 48H2.65A2.65 2.65 0 0 1 0 45.35V2.65A2.649 2.649 0 0 1 2.65 0H45.35A2.649 2.649 0 0 1 48 2.65v42.7A2.65 2.65 0 0 1 45.351 48H33.119V29.412h6.24l.934-7.244h-7.174v-4.625c0-2.098.583-3.527 3.59-3.527l3.836-.002V7.535c-.663-.088-2.94-.285-5.59-.285-5.53 0-9.317 3.376-9.317 9.575v5.343h-6.255v7.244h6.255V48z" fill="#333" fill-rule="evenodd"/></svg>
                                    </a></li>
                                <li><a href="https://twitter.com/FiveStars" target="_blank"><svg width="30" height="30" viewBox="0 0 48 40" xmlns="http://www.w3.org/2000/svg"><title>Twitter</title><path d="M48 4.735a19.235 19.235 0 0 1-5.655 1.59A10.076 10.076 0 0 0 46.675.74a19.395 19.395 0 0 1-6.257 2.447C38.627 1.225 36.066 0 33.231 0c-5.435 0-9.844 4.521-9.844 10.098 0 .791.085 1.56.254 2.3C15.456 11.974 8.2 7.96 3.34 1.842A10.281 10.281 0 0 0 2.01 6.925c0 3.502 1.738 6.593 4.38 8.405a9.668 9.668 0 0 1-4.462-1.26v.124c0 4.894 3.395 8.977 7.903 9.901a9.39 9.39 0 0 1-2.595.356c-.634 0-1.254-.061-1.854-.18 1.254 4.01 4.888 6.932 9.199 7.01-3.37 2.71-7.618 4.325-12.23 4.325-.795 0-1.58-.047-2.35-.139C4.359 38.327 9.537 40 15.096 40c18.115 0 28.019-15.385 28.019-28.73 0-.439-.009-.878-.026-1.308A20.211 20.211 0 0 0 48 4.735" fill="#333" fill-rule="evenodd"/></svg>
                                    </a></li>
                            </ul>
                        </aside>

                    </nav>



                </div>
            </div>
        </footer>
        <!--[if lt IE 7 ]>
<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
<![endif]-->
        <script type='text/javascript' defer src='//app-ab19.marketo.com/js/forms2/js/forms2.min.js?ver=4.9.1'></script>
        <script type='text/javascript' defer src='https://www.fivestars.com/wp-content/themes/_fivestars/library/js/min/06_progressive.js?ver=v2.8'></script>
        <script type='text/javascript' defer src='https://www.fivestars.com/wp-content/themes/_fivestars/library/js/min/scripts.js?ver=v2.8'></script>

        <script src="js/pyh_main_js-v=IYSNC0cAO_B-_TUsyGCiemgQo0mfVgmz1oShNb7ny1Q1.js"></script>

        




    </body>
</html>
