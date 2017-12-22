<?php

session_start();
require_once 'base_path.php';
require_once 'class.participant.php';

include_once("config.php");

require_once 'facebook-sdk-v5/autoload.php';

// if you are not using composer
require_once('algoliasearch-client-php-master/algoliasearch.php');


$client = new \AlgoliaSearch\Client("F3O2TAOV5W", "a48a018178dec80cadba88cee14f169b");

$index = $client->initIndex('developers');




//$batch = json_decode(file_get_contents('actors.json'), true);
//$index->addObjects($batch);



///////////////GOOGLE LOGIN/////////////////

require_once ('libraries/Google/autoload.php');

//Insert your cient ID and secret 
//You can get it from : https://console.developers.google.com/
$client_id = '762314707749-fpgm9cgcutqdr6pehug9khqal9diajaq.apps.googleusercontent.com'; 
$client_secret = 'SkjeNM0N02slGKfpNc7vwFiX';
$redirect_uri = ''.BASE_PATH.'';

//database
$db_username = "root"; //Database Username
$db_password = "123"; //Database Password
$host_name = "localhost"; //Mysql Hostname
$db_name = 'findacto'; //Database Name


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
  $result = mysqli_query($connecDB,"SELECT COUNT(google_id) as usercount FROM profile WHERE google_id=$user->id ");
  $user_count = $result->fetch_object()->usercount; //will return 0 if user doesn't exist

  $sql = mysqli_query($connecDB,"SELECT * FROM profile WHERE Email = '".$user->email."'");
  $row = mysqli_fetch_array($sql);



  //show user picture
  //echo '<img src="'.$user->picture.'" style="float: right;margin-top: 33px;" />';
  //echo $user_count;
  //echo $user->email;
  if($user_count) //if user already exist change greeting text to "Welcome Back"
    {
        //echo 'Welcome back '.$user->name.'! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
        $_SESSION['participantSession'] = $row['id'];
        header('Location: '.BASE_PATH.'');
        exit();
    }
  else //else greeting text "Thanks for registering"
  { 
        //echo 'Hi '.$user->name.', Thanks for Registering! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
    date_default_timezone_set('America/New_York');
    $date = date('Y-m-d'); 
        //echo 'Hi '.$user->name.', Thanks for Registering! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
    $insert_sql = mysqli_query($connecDB,"INSERT INTO profile (google_id, FirstName, LastName, userEmail, google_picture_link, Date_Created) 
      VALUES ('".$user->id."',  '".$user->givenName."', '".$user->familyName."', '".$user->email."', '".$user->picture."' , '".$date."')");
    //$statement->bind_param('issss', $user['id'],  $user['name'], $user['email']);
    //$statement->execute();
    //echo $mysqli->error;

    mysqli_query($insert_sql);  



    $update_sql = mysqli_query($connecDB,"UPDATE profile SET 
    google_id = '".$user->id."',
    FirstName = '".$user->givenName."',
    LastName = '".$user->familyName."',
    google_picture_link = '".$user->picture."' 
    
    WHERE Email='".$user->email."'");
   
    mysqli_query($update_sql);

    //echo $user->id;

    if($mysqli->error == "Duplicate entry '".$user->email."' for key 'Email'"){
    
      //exit(header("Location: ../index.php"));

    }else{

        $_SESSION['participantSession'] = $row['userID'];
        header('Location: '.BASE_PATH.'');
        exit();

    }

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
$loginUrl = $helper->getLoginUrl(''.BASE_PATH.'/signup-callback.php', $permissions);








if(!isset($_SESSION['fb_access_token_participant'])){
//echo '<a href="' . htmlspecialchars($loginUrl) . '">Sign up with Facebook!</a>';
echo '<div style="float:left; width:100%;">';

echo '<div style="margin:0 auto; width: 82%;">';

echo '<a class="social-signin__btn btn_google btn_default-bis" href="' . $authUrl . '"> <span class="icon icon_google"></span> Google </a>';

echo '<a class="social-signin__btn btn_facebook btn_default-bis" href="' . htmlspecialchars($loginUrl) . '"> <span class="icon icon_facebook"></span> Facebook </a>';

echo '<div class="fb-connect connect-background" data-track="home:facebook-connect">
            <span class="fa fa-facebook"></span>
            <span class="connect-text">Connect with Facebook</span>
        </div>';


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


  $resultfacebook = mysqli_query($connecDB,"SELECT COUNT(facebook_id) as usercountfacebook FROM profile WHERE facebook_id='".$user['id']."' ");
  $user_count_facebook = $resultfacebook->fetch_object()->usercountfacebook; //will return 0 if user doesn't exist

  $sql = mysqli_query($connecDB,"SELECT * FROM profile WHERE Email = '".$user['email']."'");
  $row = mysqli_fetch_array($sql);



  //show user picture
  //echo '<img src="'.$user->picture.'" style="float: right;margin-top: 33px;" />';
  //echo $user_count;
  //echo $user->email;
  if($user_count_facebook) //if user already exist change greeting text to "Welcome Back"
    {

    $update_sql = mysqli_query($connecDB,"UPDATE profile SET 
    facebook_id = '".$user['id']."', 
    ProfileImage = '',
    google_picture_link = ''

    WHERE Email='".$user['email']."'");

        //echo 'Welcome back '.$user->name.'! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
        $_SESSION['participantSession'] = $row['id'];
        $_SESSION['facebook_photo'] = $user['id'];
        //header('Location: '.BASE_PATH.'');
        //exit();
    }
  else //else greeting text "Thanks for registering"
  { 



  


   date_default_timezone_set('America/New_York');
    $date = date('Y-m-d'); 

    $gender = ucfirst($user['gender']);

        //echo 'Hi '.$user->name.', Thanks for Registering! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
    $insert_sql = mysqli_query($connecDB,"INSERT INTO profile (facebook_id, Firstname, Lastname, Email, Gender, Date_Created) 
      VALUES ('".$user['id']."',  '".$user['first_name']."', '".$user['last_name']."', '".$user['email']."', '".$gender."' , '".$date."')");
    //$statement->bind_param('issss', $user['id'],  $user['name'], $user['email']);
    //$statement->execute();
    //echo $mysqli->error;

    //mysqli_query($insert_sql);  

    $_SESSION['participantSession'] = $row['id'];
    header('Location: '.BASE_PATH.'');
    exit(); 




    //echo $user->id;






    if($mysqli->error == "Duplicate entry '".$user['email']."' for key 'Email'"){
    
      //exit(header("Location: ../index.php"));

    }else{

        $_SESSION['participantSession'] = $user['id'];
        $_SESSION['facebook_photo'] = $user['id'];
        header('Location: '.BASE_PATH.'');
        exit();

    }

  }

 




}







?>

<!DOCTYPE html>


<html lang="en">
  <head>
    
    
    
    
    

    <meta charset="utf-8">
    <meta name="google-site-verification" content="rgCgMtwBuyPjAybTC0GwIK8RbaN8YoUTF_3K0YVXxwQ" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="We track and analyze failed startups so startups don't make the same mistakes that others have made." >
    <meta name="keywords" content= "failed startups, lessons from failed startups, failed startups 2016, startup post mortem, startup autopsy, producthunt, betalist" >
    <meta name="author" content="Collapsed">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> Collapsed - Learn Lessons From Failed Startups </title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo BASE_PATH; ?>/css/style.css">
    
    <!-- Font Awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">



    <!-- Bootstrap -->

    <link href="https://d3tr6q264l867m.cloudfront.net/static/mainapp/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BASE_PATH; ?>/style.min.css" rel="stylesheet">
    <link href="https://d3tr6q264l867m.cloudfront.net/static/mainapp/css/reset.min.css" rel="stylesheet">
    <link href="https://d3tr6q264l867m.cloudfront.net/static/mainapp/css/bootstrap.offcanvas.min.css" rel="stylesheet">
    


    <link rel="apple-touch-icon" sizes="180x180" href="https://d3tr6q264l867m.cloudfront.net/static/mainapp/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="https://d3tr6q264l867m.cloudfront.net/static/mainapp/favicon/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="https://d3tr6q264l867m.cloudfront.net/static/mainapp/favicon/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="https://d3tr6q264l867m.cloudfront.net/static/mainapp/favicon/manifest.json">
    <link rel="mask-icon" href="https://d3tr6q264l867m.cloudfront.net/static/mainapp/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="https://d3tr6q264l867m.cloudfront.net/static/mainapp/favicon/favicon.ico">
    <meta name="msapplication-config" content="https://d3tr6q264l867m.cloudfront.net/static/mainapp/favicon/browserconfig.xml">
    <meta name="theme-color" content="#00d3aa">

    <meta property="og:image" content="https://d3tr6q264l867m.cloudfront.net/static/mainapp/assets/images/logo.png ">
    <meta name="og:url" content=>
    <meta name="og:title" content="">
    <meta name="og:description" content="">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:url" content= >
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="https://d3tr6q264l867m.cloudfront.net/static/mainapp/assets/images/logo.png ">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


 
      
    

  </head>

  <body>





   <?php include 'nav.php'; ?>


    <div class="container-fluid">




        

    <div class="container">
        <div class="title-card text-center light" id="startchange">
            <span class="bold">Welcome to Collapsed</span>,  where technical and non-technical cofounders collide
        </div>

        <!-- Tab panes -->
        <div class="title-info-card">
            <div class="row" id="myTabs" role="tablist">
                <div class="container">


  <div id="categories"></div>
  <div id="skills"></div>


                  <!--  <a href="index.html#home" aria-controls="#home" role="tab" data-toggle="tab" class="title-info-tag active text-left pull-left">
                        <object data="https://d3tr6q264l867m.cloudfront.net/static/mainapp/assets/images/discover_icon.svg" class="title-info-icon"></object>
                        Recently Published
                    </a>
                    <a href="index.html#recently_closed" aria-controls="#recently_closed" role="tab" data-toggle="tab" class="title-info-tag text-left pull-left">
                        <object data="https://d3tr6q264l867m.cloudfront.net/static/mainapp/assets/images/recently_pub.svg" class="title-info-icon"></object>
                        Recently Closed
                    </a>
                    -->
                </div>
            </div>
        </div>

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="home">
                <div class="row">






<main>


<div id="hits"></div>



<script type="text/html" id="hit-template">
<div class="col-md-4">  
  <div class="hit">
   
    <div class="hit-content">
    <a href="profile/{{profileid}}">
    <div class="search-column-box">
    <div class="left-column-search"><img src="{{{_highlightResult.profileimage.value}}}"/></div>
    <div class="right-column-search">
      <h2 class="hit-name">{{{_highlightResult.name.value}}}</h2>
      <div class="hit-location">{{{_highlightResult.location.value}}}</div>
      <!--<div class="hit-position">Position: {{{_highlightResult.position.value}}}</div>-->
      <div class="hit-lookingfor">Available as a {{{_highlightResult.lookingfor.value}}}</div>
      <div class="hit-skills-title">Skills:</div>
    
     
   </a>   
		  {{#skills}}<div class="hit-skills">{{.}}</div>{{/skills}} 

		   

   </div> 
</div>  



    </div>
  </div>
 </div>  
</script>


</main>


    <div id="pagination"></div>                
                   
                   
                    
                 
                    
                </div>
                
              
            </div>
          
        </div>

    </div>


    </div>





 <div class="modal fade" id="signin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="container center-block">
                <div class="signup-container center-block">
                    <button type="button" data-dismiss="modal" class='exit-button'><img src="https://d3tr6q264l867m.cloudfront.net/static/mainapp/assets/images/exit-icon.png" class="exit-icon center-block"></button>
                    <div class="signup-card center-block">
                        <img src="https://d3tr6q264l867m.cloudfront.net/static/mainapp/assets/images/logo.svg" class="center-block signup-card-image">
                        <h2 class="signup-card-title bold text-center">Sign in to become an Early Adopter!</h2>
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
            <span class="google-connect-text connect-text">Connect with Google</span>
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



    <footer class="footer-container">
        <div class="container">
         <p class="footer-content pull-left"> &copy Collapsed 2017</p>
            <a href="/privacy-policy" target="_blank" class="footer-content2 pull-right">Terms & Privacy Policy</a>
            <a href="/cookie-policy" target="_blank" class="footer-content2 pull-right">Cookie Policy</a>
        </div>
    </footer>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>

    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://d3tr6q264l867m.cloudfront.net/static/mainapp/js/bootstrap.min.js"></script>
    <script src="https://d3tr6q264l867m.cloudfront.net/static/mainapp/js/bootstrap.offcanvas.min.js"></script>
    <script src="https://d3tr6q264l867m.cloudfront.net/static/mainapp/js/mainapp_sdk.min.js"></script>
    <script src="https://d3tr6q264l867m.cloudfront.net/static/mainapp/js/script.min.js"></script>
    <script>
        $(function () {
          $('[data-toggle="tooltip"]').tooltip();
        });
    </script>



<script src="https://cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.js"></script>
<script src="app.js"></script>
     
  </body>
</html>