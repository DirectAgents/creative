<?php

 session_start();
 require_once '../class.entrepreneur.php';
 require_once '../class.investor.php';
 require_once '../base_path.php';
 include_once("../config.php"); 
 require_once '../facebook-sdk-v5/autoload.php';


 $sql = "SELECT * FROM tbl_users WHERE username ='".$_GET['username']."'";  
 $result = mysqli_query($connecDB, $sql);  
 $row_entrepreneur = mysqli_fetch_array($result);


/*

$investor_home = new INVESTOR();

if($investor_home->is_logged_in())
{
  $investor_home->logout();
}



$startup_home = new STARTUP();

if(!$startup_home->is_logged_in())
{
  $startup_home->redirect(''.BASE_PATH.'');
}

*/



//session_start(); //session start

//echo $_SESSION['access_token'];


require_once ('../libraries/Google/autoload.php');

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
if($client->isAccessTokenExpired()) {
    $authUrl = $client->createAuthUrl();
    //header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
}



/************************************************
  If we have an access token, we can make
  requests, else we generate an authentication URL.
 ************************************************/
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
  //$client->refreshToken(json_decode($_SESSION['access_token'])->access_token);
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
  $result = mysqli_query($connecDB,"SELECT COUNT(google_id) as usercount FROM tbl_users WHERE google_id=$user->id ");
  $user_count = $result->fetch_object()->usercount; //will return 0 if user doesn't exist

  


  $fullname = $user->givenName.' '.$user->familyName;

  //show user picture
  //echo '<img src="'.$user->picture.'" style="float: right;margin-top: 33px;" />';
  //echo $user_count;
  //echo $user->email;
  if($user->email) //if user already exist change greeting text to "Welcome Back"
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
        echo $_SESSION['startupSession'];
        //echo "asdfasfd";
        //header('Location: '.BASE_PATH.'/startup/profile/'.$_SESSION['entrepreneurSession'].'/');
        //exit();


    
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


  $resultfacebook = mysqli_query($connecDB,"SELECT COUNT(facebook_id) as usercountfacebook FROM tbl_users WHERE facebook_id='".$user['id']."' ");
  $user_count_facebook = $resultfacebook->fetch_object()->usercountfacebook; //will return 0 if user doesn't exist

  
  $sql = mysqli_query($connecDB,"SELECT * FROM tbl_users WHERE Email = '".$user['email']."'");
  $row = mysqli_fetch_array($sql);


  //show user picture
  //echo '<img src="'.$user->picture.'" style="float: right;margin-top: 33px;" />';
  //echo $user_count;
  //echo $user->email;
  if($row['userID'] != '') //if user already exist change greeting text to "Welcome Back"
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
        
    }
  else //else greeting text "Thanks for registering"
  { 


   date_default_timezone_set('America/New_York');
    $date = date('Y-m-d'); 

    $gender = ucfirst($user['gender']);

        //echo 'Hi '.$user->name.', Thanks for Registering! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
    $fullname = $user['first_name'].' '.$user['last_name'];

    $insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_users (facebook_id, Fullname, Email, Gender, ProfileImage, Date_Created) 
      VALUES ('".$user['id']."',  '".$fullname."', '".$user['email']."', '".$gender."' , 'Facebook', '".$date."')");
    //$statement->bind_param('issss', $user['id'],  $user['name'], $user['email']);
    //$statement->execute();
    //echo $mysqli->error;

    //mysqli_query($insert_sql);  
    
    $sql = mysqli_query($connecDB,"SELECT * FROM tbl_users WHERE Email = '".$user['email']."'");
    $row = mysqli_fetch_array($sql);

    $_SESSION['entrepreneurSession'] = $row['userID'];
    //header("Location: ../index.php");
    //echo $row['userID'];
    //echo "123";
    //header('Location: '.BASE_PATH.'/startup/profile/'.$_SESSION['entrepreneurSession'].'/');
    //exit(); 




    //echo $user->id;



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
        <!-- animation CSS -->
        <link href="<?php echo BASE_PATH; ?>/css/animate.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?php echo BASE_PATH; ?>/css/style.css" rel="stylesheet">
        <!-- color CSS -->
        <link href="<?php echo BASE_PATH; ?>/css/blue-dark.css" id="theme" rel="stylesheet">
        <link href="<?php echo BASE_PATH; ?>/css/materialdesignicons.min.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <script src='//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>

        

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
                            $('#preview_team').html('<li><img src=\"' + $.cloudinary.url(v["public_id"], { format: 'jpg', resource_type: v["resource_type"], transformation: [{ width: 200, crop: "fill" }] }) + '\" />')
                            $('#headshot_id').html(v["public_id"])
                            $('#url_preview_team').html('<input type="checkbox" style="display:none" name="team_member_headshot[]" value="' + v["public_id"] + '" checked/>')
                        });
                    });
            });

            $('#upload_widget_multiple_company').click(function() {
                //alert("add");
                cloudinary.openUploadWidget({ upload_preset: preset_name, sources: ['local', 'url', 'image_search'], multiple: false },
                    function(error, result) {
                        console.log(error, result);
                        ids_and_ratios = {};
                        $.each(result, function(i, v) {
                            $("#preview_company").show();
                            $("#preview_edit_company").hide();
                            $('#preview_company').html('<li><img src=\"' + $.cloudinary.url(v["public_id"], { format: 'jpg', resource_type: v["resource_type"], transformation: [{ width: 200, crop: "fill" }] }) + '\" class="thumb-lg img-circle" />')
                            $('#headshot_id').html(v["public_id"])
                            $('#url_preview_company').html('<input type="checkbox" style="display:none" name="company_logo[]" value="' + v["public_id"] + '" checked/>')
                        });
                    });
            });

            $('#upload_widget_multiple_screenshot').click(function() {
                //alert("add");
                cloudinary.openUploadWidget({ upload_preset: preset_name, sources: ['local', 'url', 'image_search'], multiple: false },
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

        });
        //]]>
        </script>




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
          

        <?php include '../nav.php'; ?>

            <!-- End Top Navigation -->
            

        <?php include '../left-sidebar.php'; ?>
        

            <!-- ============================================================== -->
            <!-- Page Content -->
            <!-- ============================================================== -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row bg-title">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <h4 class="page-title">Profile page</h4> </div>

                       
                    </div>
                    <!-- /.row -->
                    <!-- .row -->
                    <div class="row">
                        <div class="col-md-4 col-xs-12">
                            <div class="white-box">
                                <div class="user-bg">
                                    <div class="overlay-box">
                                        <div class="user-content">
                                            <a href="javascript:void(0)">
                                    
<?php if($row_entrepreneur['ProfileImage'] == 'Google'){ ?>
         <img src="<?php echo $row_entrepreneur['google_picture_link']; ?>" class="thumb-lg img-circle" alt="img">
<?php } ?>

<?php if($row_entrepreneur['ProfileImage'] == 'Facebook'){ ?>
<img src="https://graph.facebook.com/<?php echo $row_entrepreneur['facebook_id']; ?>/picture?type=large" class="thumb-lg img-circle" alt="img">
<?php } ?>

<?php if($row_entrepreneur['ProfileImage'] == 'Linkedin'){ ?>
        <img src="<?php echo $row_entrepreneur['linkedin_picture_link']; ?>" class="thumb-lg img-circle" alt="img">
       
<?php } ?>

</a>


                                            <div id="fullname">
                                                <h4 class="text-white"><?php echo $row_entrepreneur['Fullname'];?></h4>
                                            </div>
                                            <div id="position">
                                                <?php if($row_entrepreneur['Position'] != ''){ ?>
                                                <h5 class="text-white">
                                                    <?php 
                                                //echo str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($row['City'])))).', '.$row['State'];
                                                echo $row_entrepreneur['Position'];
                                                ?></h5>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="user-btm-box">
                                    <div class="col-md-4 col-sm-4 text-center">
                                        <p class="text-purple">
                                            <div id="facebook">
                                                <a href="<?php echo $row['Facebook'];?>"><i class="ti-facebook"></i></a>
                                            </div>
                                        </p>
                                    </div>
                                    <div class="col-md-4 col-sm-4 text-center">
                                        <p class="text-blue">
                                            <div id="twitter">
                                                <a href="<?php echo $row['Twitter'];?>"><i class="ti-twitter"></i></a>
                                            </div>
                                        </p>
                                    </div>
                                    <div class="col-md-4 col-sm-4 text-center">
                                        <p class="text-danger">
                                            <div id="linkedin">
                                                <a href="<?php echo $row['Linkedin'];?>"><i class="ti-linkedin"></i></a>
                                            </div>
                                        </p>
                                    </div>
                             
                             <?php if(isset($_SESSION['entrepreneurSession'])) { ?>    
                               <?php if($_GET['username'] != $_SESSION['usernameSession']) { ?>    

<?php if($row_entrepreneur['ProfileImage'] == 'Google'){  $profileimage = $row_entrepreneur['google_picture_link']; } ?>
<?php if($row_entrepreneur['ProfileImage'] == 'Facebook'){  $profileimage = "https://graph.facebook.com/".$row_entrepreneur['facebook_id']."/picture"; } ?>
<?php if($row_entrepreneur['ProfileImage'] == 'Linkedin'){  $profileimage = $row_entrepreneur['linkedin_picture_link'];  } ?>

                                 <p>&nbsp;</p>

        <?php 
    $sql_connect = mysqli_query($connecDB,"SELECT * FROM tbl_connections_startup WHERE requested_id ='".$_GET['id']."' AND requested_id = '".$_SESSION['entrepreneurSession']."'");
                ?>                 
                                 
                
    <div class="col-md-12 col-sm-12 text-center sa-connect-btn" <?php if(mysqli_num_rows($sql_connect)<=0) { ?> style="display:block" 
        <?php }else{ ?> style="display:none" <?php } ?> >
                                   <a href="javascript: void(0);" id="sa-connect" data-userid="<?php echo $_SESSION['entrepreneurSession']; ?>" data-id="<?php echo $_GET['id']; ?>" data-thumb="<?php echo $profileimage; ?>" class="btn btn-danger waves-effect waves-light">Connect +</a>
                                 </div> 
               
    <div class="col-md-12 col-sm-12 text-center sa-connect-sent" <?php if(mysqli_num_rows($sql_connect)>0) { ?> style="display:block" <?php }else{ ?> style="display:none" <?php } ?>>
                                    <a href="javascript: void(0);" id="sa-connect-cancel" class="btn btn-outline btn-default waves-effect waves-light"><span class="btn-label"><i class="fa fa-close"></i></span>Cancel Request</a>
                                  </div>
                
                               <?php } ?>  

                            <?php }else{ ?>   
                            
                              
                                    <p>&nbsp;</p>
                                 <div class="col-md-12 col-sm-12 text-center">
                                    <a href="javascript: void(0);" id="sa-basic" class="btn btn-danger hidden-xs hidden-sm waves-effect waves-light">Connect +</a>
                                 </div> 
                               
                            <?php } ?>    

                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-xs-12">
                            <div class="white-box">
                                <ul class="nav nav-tabs tabs customtab">
                                    <li class="tab active">
                                        <a href="#company" id="company-tab" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Company</span> </a>
                                    </li>
                                    <?php //if(!isset($_SESSION['entrepreneurSession'])){ ?>
                                    <li class="tab">
                                        <a href="#team" id="team-tab" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Meet the Team</span> </a>
                                    </li>
                                   <?php //} ?>
                                    <?php if(isset($_SESSION['usernameSession']) && $_SESSION['usernameSession'] == $_GET['username']) { ?>
                                    <li class="tab">
                                        <a href="#connections" id="connections-tab" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Connections</span> </a>
                                    </li>
                                    <!--
                                    <li class="tab">
                                        <a href="#messages" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> <span class="hidden-xs">Messages</span> </a>
                                    </li>
                                        -->

                                    <li class="tab">
                                        <a href="#bookmarks" id="bookmark-tab" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> <span class="hidden-xs">Bookmarks</span> </a>
                                    </li>

                                    <li class="tab">
                                        <a href="#settings" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Settings</span> </a>
                                    </li>
                                    <?php } ?>
                                </ul>


                                <div class="tab-content">

            <!-- ============================================================== -->
            <!-- Company Tab Starts -->
            <!-- ============================================================== -->
                    <div class="tab-pane active" id="company">
                            
                     <form class="form-horizontal form-material" id="save-company">


                         <div id="upload-logo">
                                    <div class="form-group">
                                                <div class="col-sm-12">
                                                            <a href="#" class="cloudinary-button" id="upload_widget_multiple_company">Upload Company Logo</a>
                                                            <br>
                                                            <br>
                                                            <ul id="preview_company"></ul>
                                                            <div id="url_preview_company"><input type="checkbox" style="display:none" name="company_logo[]" value="<?php echo $row_startup['Logo']; ?>" checked/></div>
                                                            <!--<div id="headshot_id"></div>-->
                                                </div>
                                            </div>
                                </div>
                            
                       
                             <div id="thecompany"></div>
                    
                               
                            
                              <div id="upload-screenshot">
                                    <div class="form-group">
                                                <div class="col-sm-12">
                                                            <a href="#" class="cloudinary-button" id="upload_widget_multiple_screenshot">Upload Screenshot</a>
                                                            <br>
                                                            <br>
                                                            <ul id="preview_screenshot"></ul>
                                                            <div id="url_preview_screenshot"><input type="checkbox" style="display:none" name="video_screenshot[]" value="<?php echo $row_startup['Screenshot']; ?>" checked/></div>
                                                            <!--<div id="headshot_id"></div>-->
                                                            <p>Note.: The screenshot of the video clip has to have a minimum dimension of 340px in width.</p> 
                                                </div>

                                            </div>

                                </div>


                           


                        <div id="save-cancel">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="fcbtn btn btn-info btn-outline btn-1d save-company" style="margin-right:10px;">Save</button>
                                        <button class="fcbtn btn btn-danger btn-outline btn-1d cancel-company">Cancel</button>
                                    </div>
                                </div>
                         </div>       



                             </form>   

                                          
                                    </div>
            <!-- ============================================================== -->
            <!-- Company Tab Ends -->
            <!-- ============================================================== -->


            <!-- ============================================================== -->
            <!-- Meet the Team Tab Starts -->
            <!-- ============================================================== -->
             <div class="tab-pane" id="team">

                <form class="form-horizontal form-material" id="save-team-member">
                        <?php if(isset($_SESSION['entrepreneurSession']) && $_SESSION['entrepreneurSession'] == $row_entrepreneur['userID']) { ?>
                        <div id="add-a-team-member">
                             <div class="col-sm-12" style="padding-left:15px">
                                         <div class="row"> 
                                             <ul class="side-icon-text pull-left">
                                                    <li><a href="#" class="add-team-member"><span class="circle circle-sm bg-success di"><i class="ti-plus"></i></span><span>Add a Team Member</span></a></li>
                                             </ul>
                                        </div>
                            </div> 
                             <p>&nbsp;</p>  
                         </div>  
                        <?php } ?>  
                
                        <div id="existing-team-members"></div>
                                  
                                    
                                <div id="upload-headshot">
                                    <div class="form-group">
                                                <div class="col-sm-12">
                                                            <a href="#" class="cloudinary-button" id="upload_widget_multiple_team">Upload Headshot</a>
                                                            <br>
                                                            <br>
                                                            <ul id="preview_team"></ul>
                                                            <div id="url_preview_team"><input type="checkbox" style="display:none" name="team_member_headshot[]" value="" checked/></div>
                                                            <!--<div id="headshot_id"></div>-->
                                                </div>
                                            </div>

                       
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="fcbtn btn btn-info btn-outline btn-1d save-team-member" style="margin-right:10px;">Save</button>
                                        <button class="fcbtn btn btn-danger btn-outline btn-1d cancel-team-member">Cancel</button>
                                    </div>
                                </div>
                        

                                </div>

                           

                             </form>   


                            
                            </div>
            <!-- ============================================================== -->
            <!-- Meet the Team Tab Ends -->
            <!-- ============================================================== -->
            

            <!-- ============================================================== -->
            <!-- Connections Tab Starts -->
            <!-- ============================================================== -->

                                        <div class="table-responsive manage-table tab-pane" id="connections">
                                            <div id="connections-tab-content"></div>     
                                        </div>

                                  
            <!-- ============================================================== -->
            <!-- Connections Tab Ends -->
            <!-- ============================================================== -->
                                   
                                    
            <!-- ============================================================== -->
            <!-- Bookmarks Tab Starts -->
            <!-- ============================================================== -->


                                    <div class="table-responsive manage-table tab-pane" id="bookmarks">
                                         <div id="bookmark-tab-content"></div>     
                                    </div>
                           
            <!-- ============================================================== -->
            <!-- Bookmarks Tab Ends -->
            <!-- ============================================================== -->


            <!-- ============================================================== -->
            <!-- Settings Tab Starts -->
            <!-- ============================================================== -->
                                    <div class="tab-pane" id="settings">
                                        <form class="form-horizontal form-material" id="update-profile">
                                           
                                            <div class="form-group">
                                                <label class="col-md-12">Phone No</label>
                                                <div class="col-md-12">
                                                    <input type="text" id="fm_phone" name="fm_phone" placeholder="Phone Number" value="<?php echo $row['Phone'];?>" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Location</label>
                                                <div class="col-md-12">
                                                    <div class="zip">
                                                        <input type="text" maxlength="5" placeholder="Type your zip code" class="form-control form-control-line zip-textinput">
                                                        <input type="text" id="fm_location" name="fm_location" maxlength="5" placeholder="123 456 7890" class="form-control form-control-line city-state-textinput">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Skills Set</label>
                                                <div class="col-md-4">
                                                    <input type="text" id="fm_skills" name="fm_skills" placeholder="Enter Skill" class="form-control form-control-line">
                                                </div>
                                               
                                                <div class="col-md-8">
                                                    <button class="btn btn-add" id="add-skills"><span class="glyphicon glyphicon-plus"></span> Add</button>
                                                </div>
                                                <div class="col-md-12" style="padding:15px 0 0 0;">
                                                    <div id="responds">
                                                        <?php
                                                        //include db configuration file

                                                        echo '<input type="hidden" name="userid" id="userid" value="'.$row_entrepreneur['userID'].'">';


                                                        //MySQL query
                                                        $Result = mysqli_query($connecDB,"SELECT * FROM tbl_users WHERE userID ='".$row_entrepreneur['userID']."' ");


                                                        //get all records from add_delete_record table
                                                        $row2 = mysqli_fetch_array($Result);




                                                        $ctop = $row2['Skills']; 
                                                        $ctop = explode(',',$ctop); 



                                                        if($row2['Skills'] != '' && $row2['Skills'] != 'NULL' ){



                                                        foreach($ctop as $skill)  
                                                        { 
                                                            //Uncomment the last commented line if single quotes are showing up  
                                                            //otherwise delete these 3 commented lines 


                                                        //get skill string
                                                        $ret = explode('(', $skill);
                                                        $skill_string =  $ret[0];
                                                            

                                                        //MySQL query
                                                        $sqlskill = mysqli_query($connecDB,"SELECT * FROM skills WHERE skill = '".$skill_string."' ");
                                                        $row3 = mysqli_fetch_array($sqlskill);


                                                        echo '<div id="item_'.$row3['id'].'">';
                                                        echo '<div class="skillsdiv">';
                                                        if(in_array($skill,$ctop)){
                                                        echo '<input id="skillselection_'.$row3['id'].'" name="skillselection[]" type="checkbox"  value="'.$skill.'" style="display:none" checked/>';
                                                        }
                                                        echo '<div class="del_wrapper">';
                                                        echo '<div class="the-skill">';
                                                        echo $skill;
                                                        echo '</div>';
                                                        echo '<a href="#" class="del_button" id="del-'.$row3['id'].'">';
                                                        echo '<img src="'.BASE_PATH.'/images/icon_del.gif" border="0" class="icon_del" />';
                                                        echo '</a></div>';
                                                        //echo '<input name="interestselection[]" type="checkbox"  value="'.$interest.'"/>';
                                                        echo '</div>';
                                                        echo '</div>';
                                                        } 



                                                        }





                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-3">
                                                    <div class="form-group" style="padding-left:15px;">
                                                        <label class="col-md-3" style="padding-left:0px;">Facebook</label>
                                                        <input type="text" id="fm_facebook" name="fm_facebook" value="<?php echo $row['Facebook'];?>" class="form-control form-control-line"> </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group" style="padding-left:15px;">
                                                        <label class="col-md-3" style="padding-left:0px;">Twitter</label>
                                                        <input type="text" id="fm_twitter" name="fm_twitter" value="<?php echo $row['Twitter'];?>" class="form-control form-control-line"> </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group" style="padding-left:15px;">
                                                        <label class="col-md-3" style="padding-left:0px;">Linkedin</label>
                                                        <input type="text" id="fm_linkedin" name="fm_linkedin" value="<?php echo $row['Linkedin'];?>" class="form-control form-control-line"> </div>
                                                </div>
                                            </div>
                                            <!--
                                            <div class="form-group">
                                                <label class="col-md-12">About Me</label>
                                                <div class="col-md-12">
                                                    <textarea id="fm_about" name="fm_about" rows="5" class="form-control form-control-line">
                                                        <?php echo $row['About'] ;?>
                                                    </textarea>
                                                </div>
                                            </div>-->
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success btn-update-profile">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
            <!-- ============================================================== -->
            <!-- Settings Tab Ends -->
            <!-- ============================================================== -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                     <div id="saved">Saved Successfully</div>
                     <div id="deleted">Deleted Successfully</div>
                  
                </div>
                <!-- /.container-fluid -->

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
                         <a href="<?php echo $authUrl; ?>">
                         <span class="google-connect-text connect-text">Connect with Google</span>
                         </a>
                    </div>
                                    </a>
                                </div>
                            </div>

                              <div class="col-md-12">
                                    <div class="login-buttons">
                                    <a href="<?php echo $authUrl; ?>">
                                      <div class="li-connect connect-background" data-track="home:facebook-connect">
                         <span class="fa fa-linkedin"></span>
                         <a href="https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id=78x2ye1ktvzj7d&redirect_uri=<?php echo BASE_PATH; ?>/linkedin/&state=987654321&scope=r_basicprofile,r_emailaddress">
                         <span class="connect-text">Connect with Linkedin</span>
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



             <footer class="footer text-center">2017 &copy; Ample Admin brought to you by themedesigner.in 

            </footer>
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
        <!--Morris JavaScript -->
        <script src="<?php echo BASE_PATH; ?>/js/raphael-min.js"></script>
        <script src="<?php echo BASE_PATH; ?>/js/morris.js"></script>
        <!-- chartist chart -->
        <script src="<?php echo BASE_PATH; ?>/js/chartist.min.js"></script>
        <script src="<?php echo BASE_PATH; ?>/js/chartist-plugin-tooltip.min.js"></script>
        <!-- Sweet-Alert  -->
        <script src="<?php echo BASE_PATH; ?>/js/sweetalert.min.js"></script>
        <script src="<?php echo BASE_PATH; ?>/js/jquery.sweet-alert.custom.js"></script>
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
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="<?php echo BASE_PATH; ?>/js/profile-entrepreneur.js"></script>
        <!--Style Switcher -->
        <script src="<?php echo BASE_PATH; ?>/js/jQuery.style.switcher.js"></script>
    </body>

    </html>