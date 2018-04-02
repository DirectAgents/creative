<?php

 if(isset($cloudinary_section)){
 require_once('algoliasearch-client-php-master/algoliasearch.php');

 $client = new \AlgoliaSearch\Client("F3O2TAOV5W", "a48a018178dec80cadba88cee14f169b");

 //$index = $client->initIndex('startups');
 $index = $client->initIndex($cloudinary_section);
}


$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


if(isset($_SESSION['entrepreneurSession'])){

$sql = mysqli_query($connecDB,"SELECT * FROM tbl_users WHERE userID = '".$_SESSION['entrepreneurSession']."'");
$row = mysqli_fetch_array($sql);


 if(empty($row['Type'])){

      header('Location: '.BASE_PATH.'/choose/');
      //echo $_SESSION['entrepreneurSession'];
      //echo "asdasdf";
      exit();

  }

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
    
    

    $insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_users (google_id, Fullname, Email, google_picture_link, ProfileImage, Date_Created) 
      VALUES ('".$user->id."',  '".$fullname."', '".$user->email."', '".$user->picture."' , 'Google' , '".$date."')");
    //$statement->bind_param('issss', $user['id'],  $user['name'], $user['email']);
    //$statement->execute();
    //echo $mysqli->error;

    //mysqli_query($insert_sql);  

        $sql = mysqli_query($connecDB,"SELECT * FROM tbl_users WHERE Email = '".$user->email."'");
        $row = mysqli_fetch_array($sql);

        $_SESSION['entrepreneurSession'] = $row['userID'];
        $_SESSION['google_id'] = $user->id;
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
  if ($sql->num_rows == 1) //if user already exist change greeting text to "Welcome Back"
    {

    
    

    $update_sql = mysqli_query($connecDB,"UPDATE tbl_users SET 
    facebook_id = '".$user['id']."', 
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

    $theusername = strtolower($firstname.'-'.$lastname);


    $insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_users (username, facebook_id, Fullname, Email, Gender, ProfileImage, Date_Created) 
      VALUES ('".$theusername."', '".$user['id']."',  '".$fullname."', '".$user['email']."', '".$gender."' , 'Facebook', '".$date."')");
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
        <!-- chartist CSS -->
        <link href="<?php echo BASE_PATH; ?>/css/chartist.min.css" rel="stylesheet">
        <link href="<?php echo BASE_PATH; ?>/css/chartist-plugin-tooltip.css" rel="stylesheet">
        <!-- Calendar CSS -->
        <link href="<?php echo BASE_PATH; ?>/css/fullcalendar.css" rel="stylesheet" />
        <!--alerts CSS -->
        <link href="<?php echo BASE_PATH; ?>/css/sweetalert.css" rel="stylesheet" type="text/css">
        <!-- Footable CSS -->
        <link href="<?php echo BASE_PATH; ?>/css/footable.core.css" rel="stylesheet">
        <link href="<?php echo BASE_PATH; ?>/css/bootstrap-select.min.css" rel="stylesheet" />
        <!-- animation CSS -->
        <link href="<?php echo BASE_PATH; ?>/css/animate.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?php echo BASE_PATH; ?>/css/style.css" rel="stylesheet">
        <!-- color CSS -->
        <link href="<?php echo BASE_PATH; ?>/css/blue-dark.css" id="theme" rel="stylesheet">
        <link href="<?php echo BASE_PATH; ?>/css/materialdesignicons.min.css" rel="stylesheet">
        <!-- Fontawesome -->
        <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <!-- Multiple Selection -->
        <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/css/chosen.css">
        

        <script src='//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>






    <link rel="stylesheet" href="https://cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.css">


      <!-- Popup CSS -->
    <link href="<?php echo BASE_PATH; ?>/css/magnific-popup.css" rel="stylesheet">



<!-- Add jQuery library -->
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>





    <!-- Add fancyBox main JS and CSS files -->
    <script type="text/javascript" src="<?php echo BASE_PATH; ?>/source/jquery.fancybox.pack.js?v=2.1.5"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_PATH; ?>/source/jquery.fancybox.css?v=2.1.5" media="screen" />

    <!-- Add Button helper (this is optional) -->
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_PATH; ?>/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
    <script type="text/javascript" src="<?php echo BASE_PATH; ?>/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

    <!-- Add Thumbnail helper (this is optional) -->
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_PATH; ?>/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
    <script type="text/javascript" src="<?php echo BASE_PATH; ?>/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

    <!-- Add Media helper (this is optional) -->
    <script type="text/javascript" src="<?php echo BASE_PATH; ?>/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

        

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->


        <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/jquery.validate.min.js"></script>
        <!--<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.0/js/bootstrap.min.js"></script>-->
        <script type="text/javascript" src="https://res.cloudinary.com/demo/raw/upload/v1425809551/jquery.cloudinary_t0p9km.js"></script>
        <script type="text/javascript" src="https://widget.cloudinary.com/global/all.js"></script>

         <script type="text/javascript">
        //<![CDATA[
        $(window).load(function() {
            var cloud_name = 'dgml9ji66';
            var preset_name = 'scnk5xom';
            if (cloud_name != '' && preset_name != '') $('#message').remove();


            $.cloudinary.config({ cloud_name: cloud_name });
            cloudinary.setCloudName(cloud_name);
            $('#upload_widget_multiple_team').click(function() {
                //alert("add");
                cloudinary.openUploadWidget({ upload_preset: preset_name, sources: ['local', 'url', 'image_search'], multiple: false },
                    function(error, result) {
                        console.log(error, result);
                        ids_and_ratios = {};
                        $.each(result, function(i, v) {
                            $("#preview_team").show();
                            $('#preview_team').html('<li><img src=\"' + $.cloudinary.url(v["public_id"], { format: 'jpg', resource_type: v["resource_type"], transformation: [{ width: 88, height: 88, crop: "fill" }] }) + '\" />')
                            $('#headshot_id').html(v["public_id"])
                            $('#url_preview_team').html('<input type="checkbox" style="display:none" name="team_member_headshot[]" value="' + v["public_id"] + '" checked/>')
                        });
                    });
            });

            $('#upload_widget_multiple_logo').click(function() {
                //alert("add");
                cloudinary.openUploadWidget({ upload_preset: preset_name, sources: ['local', 'url', 'image_search'], multiple: false },
                    function(error, result) {
                        console.log(error, result);
                        ids_and_ratios = {};
                        $.each(result, function(i, v) {
                            $("#preview_logo").show();
                            $("#preview_edit_logo").hide();
                            $('#preview_logo').html('<li><img src=\"' + $.cloudinary.url(v["public_id"], { format: 'jpg', resource_type: v["resource_type"], transformation: [{ width: 88, height: 88, crop: "fill" }] }) + '\" class="thumb-lg img-circle" />')
                            $('#headshot_id').html(v["public_id"])
                            $('#url_preview_logo').html('<input type="checkbox" style="display:none" name="company_logo[]" value="' + v["public_id"] + '" checked/>')
                        });
                    });
            });

            $('#upload_widget_multiple_screenshot').click(function() {
                //alert("add");
                //added max_files: '1' but not tested yet 
                cloudinary.openUploadWidget({ upload_preset: preset_name, sources: ['local', 'url', 'image_search'], multiple: false, max_files: '1' },
                    function(error, result) {
                        console.log(error, result);
                        ids_and_ratios = {};
                        $.each(result, function(i, v) {
                            $("#preview_screenshot").show();
                            $("#preview_edit_screenshot").hide();
                            $('#preview_screenshot').html('<li><img src=\"' + $.cloudinary.url(v["public_id"], { format: 'jpg', resource_type: v["resource_type"], transformation: [{ width: 200, crop: "fill" }] }) + '\"/>')
                            $('#headshot_id').html(v["public_id"])
                            $('#url_preview_screenshot').html('<input type="checkbox" style="display:none" name="video_screenshot[]" value="' + v["public_id"] + '" checked/>')
                        });
                    });
            });

            $('#upload_widget_multiple_resume').click(function() {
                //alert("add");
                cloudinary.openUploadWidget({ upload_preset: 'bzg3asb5', sources: ['local', 'url', 'image_search'], multiple: false, client_allowed_formats : ['pdf'] },
                    function(error, result) {
                        console.log(error, result);
                        ids_and_ratios = {};
                        $.each(result, function(i, v) {
                            $( ".save-resume" ).removeClass( "hidden" );
                            $( ".cancel-resume" ).removeClass( "hidden" ); 
                            $(".save-resume").show();
                            $("#preview_resume").show();
                            $("#preview_edit_resume").hide();
                            $('#preview_resume').html('<li><img src=\"' + $.cloudinary.url(v["public_id"], { format: 'jpg', resource_type: v["resource_type"], transformation: [{ width: 200, crop: "fill" }] }) + '\"/>')
                            $('#headshot_id').html(v["public_id"])
                            $('#url_preview_resume').html('<input type="checkbox" style="display:none" name="resume[]" value="' + v["public_id"] + '" checked/>')
                        });
                    });
            });

        });
        //]]>
        </script>



    </head>