<?php

 session_start();
 require_once 'base_path.php';
 include 'config.php';
 require_once 'class.entrepreneur.php';
 require_once('algoliasearch-client-php-master/algoliasearch.php');

 $client = new \AlgoliaSearch\Client("F3O2TAOV5W", "a48a018178dec80cadba88cee14f169b");

 $index = $client->initIndex('startups');


$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";



require_once 'facebook-sdk-v5/autoload.php';

$reg_user = new ENTREPRENEUR();

if($reg_user->is_logged_in()!="")
{
  //$reg_user->redirect('../index.php');
}




//session_start(); //session start

//echo $_SESSION['access_token'];

if(!isset($_SESSION['linkedin_id'])){


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
$client->setAccessType('offline');
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
  
}



/************************************************
  If we have an access token, we can make
  requests, else we generate an authentication URL.
 ************************************************/
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
  //$client->refreshToken(json_decode($_SESSION['access_token'])->access_token);
  //$client->setAccessToken(json_decode($_SESSION['access_token'])->access_token);
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
  $result = mysqli_query($connecDB,"SELECT COUNT(google_id) as usercount FROM tbl_users WHERE google_id=$user->id AND Type != '' ");
  $user_count = $result->fetch_object()->usercount; //will return 0 if user doesn't exist

  $fullname = $user->givenName.' '.$user->familyName;
 
  

  if($user_count == 0) //if user does not exist
    {   
        $_SESSION['google_id'] = $user->id;
        $_SESSION['email'] = $user->email;
        $_SESSION['fullname'] = $fullname;
        $_SESSION['google_picture_link'] = $user->picture;
        header('Location: '.BASE_PATH.'/choose/');
        //echo "asd";
        exit();
        
    }else{
        


  //show user picture
  //echo '<img src="'.$user->picture.'" style="float: right;margin-top: 33px;" />';
  //echo $user_count;
  //echo $user->email;
  if($user_count != 0) //if user already exist change greeting text to "Welcome Back"
    {   

        $sql = mysqli_query($connecDB,"SELECT * FROM tbl_users WHERE Email = '".$user->email."'");
        $row = mysqli_fetch_array($sql);

        $update_sql = mysqli_query($connecDB,"UPDATE tbl_users SET 
        google_id = '".$user->id."',
        Fullname = '".$fullname."',
        google_picture_link = '".$user->picture."',
        google_token = '".$_SESSION['access_token']."',
        ProfileImage = 'Google'
    
        WHERE Email='".$user->email."'");

        //echo 'Welcome back '.$user->name.'! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
        $_SESSION['entrepreneurSession'] = $row['userID'];
        //echo $_SESSION['startupSession'];
        //header('Location: '.BASE_PATH.'/startups/');
        //header('Location: '.BASE_PATH.'');
        //exit();
    }
  else //else greeting text "Thanks for registering"
  { 
        //echo 'Hi '.$user->name.', Thanks for Registering! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
    date_default_timezone_set('America/New_York');
    $date = date('Y-m-d'); 
        //echo 'Hi '.$user->name.', Thanks for Registering! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
    
    

    $insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_users (google_id, Fullname, Email, google_picture_link, ProfileImage, Date_Created) 
      VALUES ('".$user->id."',  '".$fullname."', '".$user->email."', '".$user->picture."' , 'Google' , '".$date."')");
    //$statement->bind_param('issss', $user['id'],  $user['name'], $user['email']);
    //$statement->execute();
    //echo $mysqli->error;

    //mysqli_query($insert_sql);  

        $sql = mysqli_query($connecDB,"SELECT * FROM tbl_users WHERE Email = '".$user->email."'");
        $row = mysqli_fetch_array($sql);

        $_SESSION['entrepreneurSession'] = $row['userID'];
        echo $_SESSION['startupSession'];
        //echo "asdfasfd";
        //header('Location: '.BASE_PATH.'/startups/');
        //exit();


    
    //echo $user->id;

   
    }
  
  //print user details
  //echo '<pre>';
  //print_r($user);
  //echo '</pre>';
}


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


  $resultfacebook = mysqli_query($connecDB,"SELECT COUNT(facebook_id) as usercountfacebook FROM tbl_users WHERE facebook_id='".$user['id']."' ");
  $user_count_facebook = $resultfacebook->fetch_object()->usercountfacebook; //will return 0 if user doesn't exist

  
  $sql = mysqli_query($connecDB,"SELECT * FROM tbl_users WHERE Email = '".$user['email']."' AND Type != '' ");
  $row = mysqli_fetch_array($sql);


    date_default_timezone_set('America/New_York');
    $date = date('Y-m-d'); 

    $gender = ucfirst($user['gender']);

        //echo 'Hi '.$user->name.', Thanks for Registering! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
    $fullname = $user['first_name'].' '.$user['last_name'];      


    if(!$row['userID']) //if user does not exist
    {   
        $_SESSION['facebook_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['fullname'] = $fullname;
        $_SESSION['gender'] = $gender;
        header('Location: '.BASE_PATH.'/choose/');
        exit();

    }else{


    
  
  $username = strtolower(str_replace(' ','-',$fullname));
  //show user picture
  //echo '<img src="'.$user->picture.'" style="float: right;margin-top: 33px;" />';
  //echo $user_count;
  //echo $user->email;
  if($row['userID']) //if user already exist change greeting text to "Welcome Back"
    {

    

    $update_sql = mysqli_query($connecDB,"UPDATE tbl_users SET
    username =  '".$username."',
    facebook_id = '".$user['id']."', 
    Fullname =  '".$fullname."',
    Gender =  '".$gender."',
    ProfileImage = 'Facebook'

    WHERE Email='".$user['email']."'");

        //echo 'Welcome back '.$user->name.'! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
        $_SESSION['entrepreneurSession'] = $row['userID'];
        $_SESSION['usernameSession'] = strtolower(str_replace(' ','-',$fullname));
        $_SESSION['facebook_photo'] = $user['id'];
        //header("Location: ../index.php");
        //echo $_SESSION['startupSession'];
        //echo "asdfasdf";
        //echo $row['userID'];
        //echo $user['email'];
        //header('Location: '.BASE_PATH.'');
        //echo $_SESSION['entrepreneurSession'];
        //echo $_SESSION['usernameSession'];
        //exit();
        
    }
  else //else greeting text "Thanks for registering"
  { 


    

    $insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_users (username, facebook_id, Fullname, Email, Gender, ProfileImage, Date_Created) 
      VALUES ('".$username."','".$user['id']."',  '".$fullname."', '".$user['email']."', '".$gender."' , 'Facebook', '".$date."')");
    //$statement->bind_param('issss', $user['id'],  $user['name'], $user['email']);
    //$statement->execute();
    //echo $mysqli->error;

    //mysqli_query($insert_sql);  
    
    $sql = mysqli_query($connecDB,"SELECT * FROM tbl_users WHERE Email = '".$user['email']."'");
    $row = mysqli_fetch_array($sql);

    $_SESSION['entrepreneurSession'] = $row['userID'];
    $_SESSION['usernameSession'] = strtolower(str_replace(' ','-',$fullname));
    //header("Location: ../index.php");
    //echo $row['userID'];
    //echo "123";
    //header('Location: '.BASE_PATH.'');
    //exit(); 




    //echo $user->id;



  }

 

}


}


}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Ample Admin Template - The Ultimate Multipurpose admin template</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo BASE_PATH; ?>/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BASE_PATH; ?>/bootstrap/bootstrap.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="<?php echo BASE_PATH; ?>/css/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="<?php echo BASE_PATH; ?>/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="<?php echo BASE_PATH; ?>/css/morris.css" rel="stylesheet">
    <!--alerts CSS -->
    <link href="<?php echo BASE_PATH; ?>/css/sweetalert.css" rel="stylesheet" type="text/css">
    <!-- chartist CSS -->
    <link href="<?php echo BASE_PATH; ?>/css/chartist.min.css" rel="stylesheet">
    <link href="<?php echo BASE_PATH; ?>/css/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- Calendar CSS -->
    <link href="<?php echo BASE_PATH; ?>/css/fullcalendar.css" rel="stylesheet" />
    <!-- animation CSS -->
    <link href="<?php echo BASE_PATH; ?>/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo BASE_PATH; ?>/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?php echo BASE_PATH; ?>/css/blue-dark.css" id="theme" rel="stylesheet">
    
    <link href="<?php echo BASE_PATH; ?>/css/materialdesignicons.min.css"  rel="stylesheet">
    
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"  rel="stylesheet">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.css">


      <!-- Popup CSS -->
    <link href="<?php echo BASE_PATH; ?>/css/magnific-popup.css" rel="stylesheet">



<!-- Add jQuery library -->
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

    <!-- Add fancyBox main JS and CSS files -->
    <script type="text/javascript" src="source/jquery.fancybox.pack.js?v=2.1.5"></script>
    <link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />

    <!-- Add Button helper (this is optional) -->
    <link rel="stylesheet" type="text/css" href="source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
    <script type="text/javascript" src="source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

    <!-- Add Thumbnail helper (this is optional) -->
    <link rel="stylesheet" type="text/css" href="source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
    <script type="text/javascript" src="source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

    <!-- Add Media helper (this is optional) -->
    <script type="text/javascript" src="source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>








    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        

        <?php include 'nav.php'; ?>
        

        <?php include 'left-sidebar.php'; ?>

        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
               
              
                       
                <!-- ============================================================== -->
                <!-- Main Screen Start -->
                <!-- ============================================================== -->
                <p>&nbsp;</p>



                <div class="row">





            <main>


<div id="hits"></div>


<script type="text/html" id="hit-template" data-jsassets="<?php echo BASE_PATH; ?>/js/profile-entrepreneur.js, http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js ,<?php echo BASE_PATH; ?>/js/sweetalert.min.js, <?php echo BASE_PATH; ?>/js/sweetalert.min.js">


  <div class="hit">
   
    <div class="hit-content">
      
     
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">

                        <div class="white-box">
                            <div class="product-img">
                                <img src="http://res.cloudinary.com/dgml9ji66/image/upload/c_fill,h_250,w_340/v1/{{{_highlightResult.screenshot.value}}}"/>

                                <div class="pro-img-overlay">
   
 
                                     <iframe id="iframe02" src="p.php?id={{{_highlightResult.startupID.value}}}"></iframe>


                                </div>
                            </div>

                            <div class="product-text">
                                <span class="pro-price"><img src="http://res.cloudinary.com/dgml9ji66/image/upload/c_fill,h_250,w_265/v1/{{{_highlightResult.logo.value}}}" class="thumb-md img-circle"/></span>
                                <h3 class="box-title m-b-0"><a href="<?php echo BASE_PATH; ?>/startup/profile/{{objectID}}">{{{_highlightResult.name.value}}}</a></h3>
                                <small class="text-muted db">
                                <br>
                                <span class="m-r-10"><i class="icon-calender"></i> {{{_highlightResult.date.value}}}</span> 
                                <span class="m-r-10"><i class="fa fa-heart-o"></i> <div id="likes">{{{_highlightResult.likes.value}}}</div></span>  
                                    <i class="fa fa-industry"></i> {{{_highlightResult.industry.value}}}</small>
                            </div>
                        </div>
                    </div>




   </div> 
</div>  



    </div>
  </div>




</script>





</main>


                   
                </div>

                
                 <!-- ============================================================== -->
                <!-- Main Screen End -->
                <!-- ============================================================== -->
               
                <div id="pagination"></div>

             
            </div>

              


 <div class="modal fade text-center" id="signin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="container center-block">
                <div class="signup-container center-block">
                    <button type="button" data-dismiss="modal" class='exit-button'><img src="https://d3tr6q264l867m.cloudfront.net/static/mainapp/assets/images/exit-icon.png" class="exit-icon center-block"></button>
                    <div class="signup-card center-block">
                        <img src="https://d3tr6q264l867m.cloudfront.net/static/mainapp/assets/images/logo.svg" class="center-block signup-card-image">
                        <!--<h2 class="signup-card-title bold text-center">Sign in as a Startup!</h2>-->
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

                              <div class="col-md-12">
                                    <div class="login-buttons">
                            <a href="https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id=78x2ye1ktvzj7d&redirect_uri=<?php echo BASE_PATH; ?>/linkedin/&state=987654321&scope=r_basicprofile,r_emailaddress">
                                      <div class="li-connect connect-background" data-track="home:facebook-connect">
                         <span class="fa fa-linkedin"></span>
                        
                         <span class="connect-text">Connect with Linkedin</span>
                         
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


               
               

             
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; Ample Admin brought to you by themedesigner.in </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo BASE_PATH; ?>/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="<?php echo BASE_PATH; ?>/js/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="<?php echo BASE_PATH; ?>/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo BASE_PATH; ?>/js/waves.js"></script>
    <!--Counter js -->
    <script src="<?php echo BASE_PATH; ?>/js/jquery.waypoints.js"></script>
    <script src="<?php echo BASE_PATH; ?>/js/jquery.counterup.min.js"></script>
     <!-- Sweet-Alert  -->
    <script src="<?php echo BASE_PATH; ?>/js/sweetalert.min.js"></script>
    <script src="<?php echo BASE_PATH; ?>/js/jquery.sweet-alert.custom.js"></script>
    <!--Morris JavaScript -->
    <script src="<?php echo BASE_PATH; ?>/js/raphael-min.js"></script>
    <script src="<?php echo BASE_PATH; ?>/js/morris.js"></script>
    <!-- chartist chart -->
    <script src="<?php echo BASE_PATH; ?>/js/chartist.min.js"></script>
    <script src="<?php echo BASE_PATH; ?>/js/chartist-plugin-tooltip.min.js"></script>
    <!-- Calendar JavaScript -->
    <script src="<?php echo BASE_PATH; ?>/js/moment.js"></script>
    <script src='<?php echo BASE_PATH; ?>/js/fullcalendar.min.js'></script>
    <script src="<?php echo BASE_PATH; ?>/js/cal-init.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo BASE_PATH; ?>/js/custom.min.js"></script>
    <!-- Custom tab JavaScript -->
    <script src="<?php echo BASE_PATH; ?>/js/cbpFWTabs.js"></script>
    <script type="text/javascript">
    (function() {
        [].slice.call(document.querySelectorAll('.sttabs')).forEach(function(el) {
            new CBPFWTabs(el);
        });
    })();
    </script>
    <script src="<?php echo BASE_PATH; ?>/js/jquery.toast.js"></script>


     <!-- Magnific popup JavaScript -->
    <script src="<?php echo BASE_PATH; ?>/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo BASE_PATH; ?>/js/jquery.magnific-popup-init.js"></script>


    <!--Style Switcher -->
    <script src="<?php echo BASE_PATH; ?>/js/jQuery.style.switcher.js"></script>
    


    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.js"></script>
    <script src="<?php echo BASE_PATH; ?>/app.js"></script>
    <script src="<?php echo BASE_PATH; ?>/js/profile-entrepreneur.js"></script>

<!--
<script>
window.onload = function() {
    var tpl, jsassets, tag, i,l;
tpl = document.getElementById('hit-template');
// At this point, ensure your template has been rendered and attached to the page
// by your template processor
jsassets = (tpl.getAttribute('data-jsassets') || '').split(',');
for(i = 0, l = jsassets.length; i < l; i++){
  tag = document.createElement('script');
  tag.type = "text/javascript";
  tag.src = jsassets[i];
  document.head.appendChild(tag);
}


}
</script>
-->


  

</body>

</html>
