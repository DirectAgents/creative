<?php
session_start();

error_reporting(E_ERROR | E_PARSE);



ob_start();

require_once __DIR__ . '/facebook-sdk-v5/autoload.php';


require_once '../../base_path.php';

require_once '../../class.startup.php';

include_once("../../config.php");


if(isset($_SESSION['cookie_deleted'])){

$cookiehash = md5(sha1(username . user_ip));
unset($_COOKIE['RememberMe']);
setcookie('RememberMe', "", time() - 3600); // empty value and old timestamp

}

if(isset($_COOKIE['RememberMe'])){

$stmt = mysqli_query($connecDB,"SELECT * FROM tbl_startup WHERE login_session='".$_COOKIE['RememberMe']."'");
$row = mysqli_fetch_array($stmt);

if($row['login_session'] == $_COOKIE['RememberMe']){

$_SESSION['startupSession'] = $row['userID'];

header("Location:../");
exit();
}
}



if(isset($_GET['p'])){

  $_SESSION['p'] = $_GET['p']; 
}


$user_login = new STARTUP();

if($user_login->is_logged_in()!="")
{
  
  $user_login->redirect('../');
}










if(isset($_POST['btn-login']))
{
  $email = trim($_POST['txtemail']);
  $upass = trim($_POST['txtupass']);
  $rememberme = trim($_POST['txtrememberme']);
  
  if($user_login->login($email,$upass,$rememberme))
  {
    $user_login->redirect('../');
  }
}







//session_start(); //session start

//echo $_SESSION['access_token'];


?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
   <title>Mr. Pao Login</title>

    <link rel="icon" href="../../favicon.ico" type="image/x-icon"/>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="One platform to help wantrepreneurs and entrepreneurs to validate a problem." />

    <meta name="google" content="nositelinkssearchbox" />
    <meta itemprop="name" content="Mr.Pao Launch">
    <meta itemprop="image" content="/public/img/logo.png">

    <meta name="twitter:site" content="@mymisterpao">
    <meta name="twitter:title" content="Mr.Pao Launch">
    <meta name="twitter:description" content="One platform to help wantrepreneurs and entrepreneurs to validate a problem.">
    <meta name="twitter:creator" content="@mymisterpao">

    <meta property="og:url" content="https://misterpao.com">
    <meta property="og:title" content="Mr.Pao Launch">
    <meta property="og:image" content="https://misterpao.com/images/logo/email-logo-large.png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:description" content="One platform to help wantrepreneurs and entrepreneurs to validate a problem.">
    <meta property="og:site_name" content="Mr.Pao Launch">
    <meta property="og:locale" content="en_US">
    <meta property="article:author" content="https://www.facebook.com/MrPao-1960306184214766/">
    <meta property="article:section" content="Technology">
    
    <link rel="stylesheet" href="../../css/reset.css">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Montserrat:400,700'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

        <link rel="stylesheet" href="../../css/style.css">

    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Roboto:400,700,300" rel="stylesheet" type="text/css">


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
       <strong>Sorry!</strong> <br><br>This Account is not Activated Go to your Inbox and Activate it. 
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
        <strong>Wrong username or password. Try again!</strong> 
      </div>
            <?php
    }
    ?>


  <div class="logo">
   <a href="<?php echo BASE_PATH; ?>">
     
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   width="177.628px" height="48.228px" viewBox="0 0 177.628 48.228" enable-background="new 0 0 177.628 48.228"
   xml:space="preserve">
<g>
  <linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="9.7275" y1="22.043" x2="60.8164" y2="22.043">
    <stop  offset="0" style="stop-color:#2484C6"/>
    <stop  offset="0.1372" style="stop-color:#2986C7"/>
    <stop  offset="0.2432" style="stop-color:#368CCB"/>
    <stop  offset="0.3388" style="stop-color:#4898D3"/>
    <stop  offset="0.4282" style="stop-color:#5FA9DD"/>
    <stop  offset="0.5125" style="stop-color:#7BC2EB"/>
    <stop  offset="0.5645" style="stop-color:#91D9F8"/>
    <stop  offset="0.6235" style="stop-color:#7CC2EC"/>
    <stop  offset="0.7241" style="stop-color:#5FA9DD"/>
    <stop  offset="0.8223" style="stop-color:#4998D3"/>
    <stop  offset="0.9159" style="stop-color:#3A8ECD"/>
    <stop  offset="1" style="stop-color:#348BCB"/>
  </linearGradient>
  <path fill="url(#SVGID_1_)" d="M60.318,28.925c-0.258-0.084-2.188-3.472-2.188-3.472s-0.706-2-0.706-2.399
    c0-0.401-0.353-3.362-0.353-3.362l-0.636-2.497c0,0-0.059-0.66-0.853-0.824c-0.794-0.163-2.206-0.541-3.1-0.776
    c-0.893-0.234-1.49-0.353-2.015-0.329c-0.525,0.023-2.812,0.212-3.034,0.283c-0.222,0.071-4.95,1.716-4.95,1.716
    s-1.248,0.048-1.529,0c-0.283-0.046-1.506-0.635-1.789-0.845c-0.282-0.212-1.694-1.931-1.694-1.931s-0.822-1.104-1.129-1.269
    c-0.305-0.166-2.164-0.754-2.164-0.754s-4.377-0.282-4.659-0.234c-0.283,0.046-4.447,0.754-4.752,0.988
    c-0.306,0.234-8.659,3.047-8.659,3.047s-1.278,0.4-1.578,0.608c-0.301,0.209-2.044,2.226-2.044,2.226l-0.94,1.601l-1.663,8.181
    c1.354-0.227-0.723,0.148,0,0c-0.062-0.725-0.091-1.45-0.106-2.179c-0.007-0.364,0.557-0.363,0.565,0
    c0.013,0.69,0.042,1.378,0.097,2.064c2.184-0.442,5.849-1.141,7.95-1.54c0.001,0,0.001,0,0.001,0
    c0.175,0.005,0.335-0.032,0.48-0.091c0.694-0.13,1.129-0.211,1.129-0.211s-0.496,0.061-0.959,0.127
    c0.34-0.192,0.551-0.471,0.551-0.471s2.588,1.278,2.988,1.498c0.4,0.22,5.953,1.373,5.953,1.373l2.706,0.321
    c0,0,4.187-0.157,4.258-0.157s4.234-0.858,4.399-0.935c0.165-0.078,3.529-0.995,3.529-0.995l3.098,0.118l1.984,1.119
    c0,0,0.878,0.856,1.169,1.092c0.291,0.236,3.493,1.82,3.583,1.842c0.089,0.02,0.925-0.345,1.625-0.367
    c0.7-0.021,2.258-0.054,2.846,0c0.588,0.054,1.247-0.275,1.6-0.486c0.354-0.212,1.486-0.942,1.486-0.942
    S60.577,29.009,60.318,28.925z M33.887,24.721c-0.538,1.06-1.218,2.375-2.247,3.042c-0.166,0.107-0.354-0.007-0.415-0.168
    c-0.13-0.344-0.122-0.714-0.026-1.066c-0.025-0.11,0.019-0.21,0.094-0.276c0.12-0.289,0.293-0.554,0.499-0.771
    c0.081-0.084,0.175-0.097,0.261-0.07c0.232-0.314,0.521-0.626,0.667-0.971c0.301-0.708,0.274-1.834,0.098-2.577
    c-0.071-0.304-0.167-0.59-0.278-0.866c0.375,2.155-0.528,4.808-2.364,5.811c-0.022,0.012-0.043,0.013-0.065,0.02
    c-0.252,0.233-0.629-0.153-0.383-0.411c1.724-1.798,2.067-4.354,0.691-6.452c-0.584-0.893-1.204-1.315-2.091-1.866
    c-0.228-0.141-0.427-0.283-0.613-0.437c-0.419,0.08-0.868,0.105-1.305,0.118c-0.002,0.108-0.062,0.208-0.202,0.24
    c-0.6,0.126-1.172,0.163-1.619,0.649c-0.355,0.385-0.675,0.804-0.977,1.232c-0.589,0.834-1.066,2.009-0.724,3.041
    c0.088,0.267-0.213,0.414-0.409,0.311c-0.031,0.028-0.068,0.049-0.118,0.061c-0.392,0.089-0.655-0.008-0.824-0.224
    c-0.037-0.068-0.064-0.12-0.086-0.158c-0.012-0.025-0.027-0.045-0.038-0.07c-0.045-0.178,0.361-3.178,0.361-3.178l2.083-2.842
    c0,0,0.921-0.75,1.393-1.065c0.059,0.011,0.118,0.018,0.175,0.029c0.043-0.064,0.112-0.112,0.214-0.112
    c0.752,0,1.471,0.03,2.21,0.17c0.026,0.005,0.049,0.009,0.075,0.013c0.019-0.153,0.149-0.31,0.349-0.278
    c0.724,0.113,1.508,0.371,2.184,0.667c0.753,0.331,1.157,0.988,1.855,1.408c1,0.599,1.762,1.057,1.814,2.291
    C34.193,21.541,34.641,23.239,33.887,24.721z M54.626,25.624c0.005,0.579-0.101,0.923-0.37,1.436
    c-0.05,0.098-0.13,0.135-0.212,0.137c-0.403,0.38-0.732,0.836-1.247,1.075c-0.328,0.154-0.615-0.333-0.286-0.485
    c0.015-0.007,0.024-0.019,0.038-0.024c-0.006-0.038-0.004-0.08,0.01-0.126c0.488-1.594,0.604-3.545,0.075-5.179
    c-0.526-1.623-1.867-2.155-3.216-2.892c-0.085-0.046-0.143-0.147-0.14-0.243c0.036-1.217,2.101-0.929,2.814-0.571
    c0.052,0.027,0.083,0.062,0.106,0.102c0.421,0.264,0.769,0.625,1.181,0.906c0.158,0.106,0.152,0.289,0.069,0.413
    c0.12,0.122,0.234,0.254,0.333,0.407c0.461,0.712,0.949,1.597,1.087,2.446C55.024,23.982,54.616,24.683,54.626,25.624z"/>
  <path fill="#27AAE1" d="M32.117,19.947l-2.471-1.958l-1.676-0.124l-1.765,0.246c0,0-1.112,0.353-1.129,0.407
    c-0.015,0.046-1.459,1.587-1.823,1.976c-0.047,0.089-0.09,0.182-0.132,0.274l-0.334,1.25c-0.022,0.313,0.002,0.625,0.102,0.925
    c0.041,0.125-0.004,0.222-0.083,0.283l0.1,0.179l2.189,0.897c0.038-0.086,0.117-0.153,0.245-0.143
    c0.423,0.027,0.696,0.27,1.081,0.396c0.333,0.108,0.659,0.184,0.931,0.415c0.102,0.088,0.11,0.196,0.069,0.287l3.404,1.396
    l1.326-1.324l0.565-1.764v-1.923L32.117,19.947z"/>
  <path fill="#27AAE1" d="M52.511,27.787c0.013-0.007,0.025-0.016,0.039-0.023c-0.007-0.039-0.005-0.081,0.009-0.127
    c0.42-1.371,0.561-3.007,0.257-4.477c-0.313-0.914-0.757-1.702-1.262-2.295c-0.546-0.466-1.208-0.804-1.889-1.167
    c-0.186-0.013-0.369,0.004-0.545,0.057c-1.348,0.411-1.838,2.729-1.094,5.175c0.745,2.45,2.442,4.102,3.791,3.692
    c0.247-0.075,0.463-0.216,0.65-0.407C52.341,28.094,52.312,27.878,52.511,27.787z"/>
  <path fill="#0F8743" d="M28.189,12.589c2.208-0.206,4.386-0.186,6.596-0.172c-1.56-2.406-3.645-4.021-3.645-4.021
    c-3.011-2.884-5.359,1.626-6.557,4.824C25.739,12.85,26.968,12.702,28.189,12.589z"/>
  <path fill="#0F8743" d="M24.431,27.506c-1.179-0.379-2.188,0.026-3.3-0.482c-1.092-0.5-2.271-0.088-3.434-0.236
    c0.016,3.642,3.506,5.668,3.506,5.668c6.312,6.436,6.687,0.812,6.687,0.812c0.015-1.021,0.483-2.447,1.115-3.838
    C27.466,28.905,26.076,28.035,24.431,27.506z"/>
  <path fill="#0F8743" d="M43.659,16.65c1.219-0.078,2.259-0.687,3.448-0.862c1.167-0.171,2.341-0.151,3.513-0.271
    c0.4-0.041,0.722-0.034,1.02,0.005c-1.069-2.685-3-6.021-5.439-3.684c0,0-2.73,2.119-3.963,5.016
    C42.68,16.707,43.154,16.681,43.659,16.65z"/>
  <path fill="#0F8743" d="M51.753,30.392c-1.479-0.719-2.914-1.513-4.341-2.331c-0.185-0.105-0.162-0.315-0.049-0.435l-0.77-0.401
    c1.083,1.627,2.366,4.325,2.388,5.896c0,0,0.322,4.813,5.722-0.695c0,0,0.385-0.358,0.879-0.955
    C54.188,31.251,53.038,31.014,51.753,30.392z"/>
  <path fill="#0C8742" d="M43.196,35.362c0,0,3.044-0.729,3.299-3.118c0,0,0.602-4.084-3.848-1.75c0,0-6.129-1.369-5.253,1.789
    C37.395,32.283,38.999,36.021,43.196,35.362z"/>
  <g>
    <path fill="#FFFFFF" d="M15.492,18.469c0.077,0.078,0.155,0.157,0.226,0.242c0.243,0.285,0.422,0.603,0.615,0.919
      c0.122,0.204,0.245,0.405,0.37,0.616c-0.111,0.065-0.213,0.131-0.321,0.192c-0.044,0.028-0.056,0.068-0.044,0.121
      c0.013,0.044,0.049,0.064,0.097,0.065c0.026-0.003,0.051,0.001,0.079-0.002c0.25-0.004,0.497-0.011,0.751-0.015
      c0.335-0.009,0.669-0.013,1.003-0.025c0.02,0,0.054-0.02,0.061-0.041c0.243-0.516,0.486-1.029,0.72-1.546
      c0.028-0.057,0.028-0.135,0.026-0.203c-0.001-0.065-0.037-0.082-0.097-0.056c-0.044,0.02-0.087,0.043-0.13,0.07
      c-0.106,0.062-0.212,0.121-0.32,0.184c-0.031-0.047-0.061-0.09-0.088-0.13c-0.109-0.175-0.225-0.346-0.33-0.523
      c-0.213-0.365-0.551-0.487-0.943-0.454c-0.665,0.058-1.332,0.129-1.997,0.2c-0.121,0.008-0.24,0.021-0.359,0.034
      c-0.017,0.002-0.039,0.002-0.056,0.005c0.021,0.013,0.044,0.018,0.067,0.024c0.007,0.002,0.012,0.005,0.02,0.005
      C15.085,18.204,15.312,18.286,15.492,18.469z"/>
    <path fill="#FFFFFF" d="M12.298,21.588c0.12,0.055,0.236,0.116,0.354,0.171c-0.008,0.025-0.021,0.042-0.029,0.059
      c-0.107,0.208-0.213,0.417-0.317,0.623c-0.064,0.13-0.122,0.263-0.123,0.413c-0.006,0.157,0.075,0.286,0.166,0.413
      c0.47,0.657,0.936,1.314,1.405,1.971c0.012,0.018,0.029,0.038,0.041,0.058c0.006-0.029,0.003-0.048-0.001-0.064
      c-0.1-0.335-0.075-0.654,0.081-0.97c0.193-0.374,0.379-0.75,0.569-1.125c0.083-0.162,0.167-0.325,0.249-0.489
      c0.125,0.06,0.249,0.121,0.37,0.172c0.031,0.01,0.075,0.009,0.095-0.01c0.022-0.017,0.031-0.062,0.02-0.092
      c-0.01-0.045-0.039-0.086-0.064-0.123c-0.314-0.47-0.628-0.941-0.939-1.41c-0.033-0.054-0.067-0.068-0.131-0.062
      c-0.35,0.051-0.699,0.094-1.053,0.139c-0.237,0.029-0.471,0.054-0.708,0.085c-0.025-0.001-0.048,0.003-0.061,0.021
      c-0.025,0.025-0.056,0.06-0.057,0.092c-0.007,0.023,0.024,0.062,0.046,0.079C12.233,21.566,12.271,21.575,12.298,21.588z"/>
    <path fill="#FFFFFF" d="M18.268,25.532c-0.002-0.032-0.006-0.059-0.01-0.089c0.033-0.005,0.057-0.009,0.081-0.013
      c0.239-0.022,0.478-0.045,0.716-0.071c0.29-0.033,0.504-0.158,0.622-0.447c0.282-0.682,0.576-1.358,0.864-2.035
      c0.053-0.127,0.107-0.25,0.16-0.375c-0.003-0.005-0.009-0.007-0.012-0.013c-0.027,0.034-0.048,0.06-0.072,0.092
      c-0.163,0.197-0.357,0.35-0.603,0.423c-0.187,0.051-0.384,0.092-0.579,0.117c-0.478,0.054-0.957,0.096-1.437,0.146
      c-0.023,0-0.045,0.004-0.078,0.006c-0.008-0.062-0.011-0.113-0.017-0.166c-0.011-0.076-0.021-0.155-0.037-0.231
      c-0.009-0.028-0.045-0.066-0.07-0.067c-0.033,0.001-0.069,0.027-0.099,0.046c-0.015,0.009-0.021,0.034-0.028,0.057
      c-0.235,0.528-0.476,1.058-0.714,1.587c-0.019,0.036-0.016,0.06,0.011,0.093c0.267,0.329,0.533,0.661,0.799,0.991
      c0.093,0.111,0.182,0.226,0.274,0.339c0.028,0.034,0.061,0.075,0.102,0.094c0.033,0.011,0.081,0.009,0.117,0
      c0.042-0.012,0.058-0.053,0.05-0.099c-0.008-0.04-0.01-0.076-0.012-0.12C18.286,25.708,18.277,25.621,18.268,25.532z"/>
    <path fill="#FFFFFF" d="M19.336,20.054c-0.559,0.408-1.111,0.808-1.668,1.209c0.005,0.015,0.01,0.017,0.013,0.026
      c0.389,0.518,0.774,1.034,1.167,1.548c0.015,0.02,0.057,0.034,0.082,0.032c0.252-0.02,0.504-0.049,0.756-0.075
      c0.079-0.011,0.16-0.023,0.233-0.053c0.267-0.096,0.465-0.282,0.62-0.505c0.167-0.247,0.163-0.497-0.001-0.7
      c-0.388-0.484-0.779-0.967-1.169-1.448C19.356,20.076,19.346,20.068,19.336,20.054z"/>
    <path fill="#FFFFFF" d="M14.541,23.669c-0.019,0.004-0.046,0.018-0.055,0.036c-0.115,0.218-0.238,0.432-0.34,0.657
      c-0.167,0.368-0.152,0.744,0,1.111c0.094,0.226,0.261,0.324,0.501,0.3c0.652-0.065,1.303-0.127,1.954-0.193
      c0.017-0.002,0.036-0.009,0.051-0.013c-0.069-0.695-0.14-1.387-0.207-2.083c-0.015-0.001-0.021-0.004-0.028-0.004
      C15.793,23.54,15.167,23.604,14.541,23.669z"/>
    <path fill="#FFFFFF" d="M14.391,18.397c-0.16,0.046-0.29,0.123-0.363,0.282c-0.132,0.276-0.271,0.546-0.406,0.822
      c-0.133,0.273-0.269,0.546-0.406,0.822c0.613,0.329,1.223,0.655,1.839,0.983c0.022-0.051,0.051-0.101,0.072-0.147
      c0.266-0.51,0.524-1.017,0.784-1.528c0.009-0.024,0.017-0.06,0.004-0.083c-0.167-0.3-0.354-0.587-0.598-0.829
      C15.061,18.468,14.774,18.297,14.391,18.397z"/>
  </g>
  <path fill="#0F8743" d="M57.592,21.034c-0.091-0.168-0.182-0.339-0.275-0.517c-0.026,0.64-0.043,1.28,0.098,1.896
    c0.041,0.172-0.07,0.296-0.202,0.337c0.351,0.61,0.658,1.104,0.897,1.414c0.01,0.013,0.239,0.363,0.517,0.979
    C58.299,23.756,57.792,22.443,57.592,21.034z"/>
  <path fill="#0F8743" d="M59.638,30.385c-0.091,2.306-0.868,5.086-3.186,8.068c-0.05,0.09-5.04,8.608-19.002,8.608
    c-0.148,0-0.3,0-0.452-0.002c-0.156-0.008-9.907-0.578-17.097-5.068l0.031-0.071c-0.088-0.04-8.852-3.975-9.202-13.84l-0.013-0.104
    c-0.011-0.049-0.955-4.816,4.053-11.225l-0.048-0.037c0.695-1.097,1.406-2.299,2.352-3.364c0.976-1.041,2.121-1.924,3.457-1.799
    c0,0,3.988,0.583,4.449-3.502c0,0,0.167-1.449-0.209-3.114c4.186-1.254,21.261-5.579,26.311,5.475
    c0.103,0.224,1.307,2.824,2.725,5.736c0.472,0.02,0.95,0.071,1.394,0.194c-0.258-0.526-0.513-1.051-0.758-1.557
    c0,0,6.794-3.887,3.148-9.715c-0.514-0.658-0.915-1.061-0.988-1.132c-0.013-0.014-0.02-0.02-0.02-0.02
    c-5.146-4.906-8.719-1.325-9.839,0.121C39.199-0.197,27.858,2.757,24.44,3.808c-0.797-2.063-2.64-4.051-6.829-3.784
    c0,0-0.789,0.062-1.854,0.428l0-0.005c0,0-0.131,0.044-0.343,0.128c-0.48,0.186-0.999,0.439-1.524,0.771
    c-0.214,0.13-0.441,0.277-0.676,0.44c-7.954,6.867,0.299,14.669,0.299,14.669c-4.302,6.198-3.828,9.148-3.971,11.46l0-0.001
    c0,0-0.014,0.282,0.019,0.77c0.003,0.041,0.006,0.084,0.008,0.125c0.19,2.422,1.509,9.277,10.125,14.434
    c7.447,4.412,17.093,4.972,17.264,4.982c0.167,0.001,0.327,0.003,0.489,0.003c6.765,0,11.499-1.876,14.655-3.924
    c0,0,7.927-4.796,8.661-13.066l-0.003,0.004c0.02-0.198,0.029-0.391,0.04-0.584c0.005-0.124,0.014-0.246,0.017-0.371
    c0-0.032-0.001-0.063,0-0.096C60.422,30.209,60.028,30.286,59.638,30.385z"/>
  <path fill="#0F8743" d="M47.293,37.564c0.375-0.125,0.585-0.208,0.585-0.208l1.13-1c-7.784,3.166-16.618,0.222-18.476-0.468
    c0.193-0.107,0.404-0.193,0.63-0.226c0,0-2.232-1.003-1.72,1.248c0,0,0.036-0.138,0.369-0.447
    c5.35,11.288,17.243,4.958,17.243,4.958l-0.014-0.56c-0.183,0.078-0.364,0.153-0.545,0.222l-0.491-1.099L47.293,37.564z
     M31.739,38.323c1.704,0.894,6.066,1.622,6.066,1.622c-1.799-0.341-5.792-2.1-6.731-2.519c-0.369-0.548-0.612-1.006-0.746-1.28
    c6.239,3.792,13.177,2.502,16.111,1.676l-1.204,1.627c-1.931,0.889-4.83,0.7-4.83,0.7c0.674,0.978,4.926,0.246,4.926,0.246
    l0.364,0.99C38.098,44.073,33.796,40.851,31.739,38.323z"/>
  <path fill="#0F8743" d="M61.359,29.521c-3.53-3.132-3.494-9.12-3.493-9.188c-0.006-1.719-0.559-3.055-1.642-3.978
    c-1.611-1.37-4.328-1.766-8.075-1.171c-2.86,0.453-5.25,1.319-5.376,1.365c-0.166,0.07-0.339,0.12-0.514,0.149
    c-2.289,0.362-4.712-2.892-4.735-2.923c-0.012-0.016-0.023-0.03-0.035-0.044c-1.707-1.888-4.823-2.489-9.265-1.785
    c-6.452,1.021-13.455,4.4-13.75,4.542c-0.107,0.053-0.195,0.138-0.25,0.243l-0.095,0.183c0.658-0.108,1.304-0.29,1.982-0.212
    c0.112,0.012,0.185,0.079,0.228,0.161c2.374-1.042,7.43-3.085,12.06-3.818c4.028-0.64,6.803-0.162,8.246,1.412
    c0.268,0.358,2.921,3.795,5.788,3.339c0.264-0.041,0.524-0.116,0.748-0.21c0.023-0.008,2.387-0.865,5.142-1.302
    c3.364-0.533,5.847-0.213,7.182,0.92c0.834,0.711,1.243,1.735,1.249,3.122c-0.003,0.254-0.045,5.978,3.344,9.524
    c-0.603,0.342-1.669,0.841-3.055,1.061c-3.069,0.486-6.118-0.564-9.058-3.122c-0.127-0.112-1.362-1.077-5.273-0.457
    c-1.473,0.231-3.163,0.663-5.057,1.292c-0.01,0.005-0.987,0.39-2.506,0.632c-2.627,0.416-6.535,0.369-10.233-2.225
    c-0.023-0.016-0.048-0.03-0.073-0.042c-0.198-0.1-4.823-1.199-10.267-0.337c-1.723,0.274-2.812,0.345-4.203,0.984
    c0.018,0.499,0.046,0.998,0.098,1.495c1.263-0.564,2.609-0.745,4.105-0.983c4.849-0.766,9.305-0.385,9.74-0.179
    c3.991,2.779,8.187,2.833,11.007,2.385c1.653-0.262,2.703-0.679,2.715-0.685c1.804-0.599,3.436-1.018,4.848-1.241
    c3.343-0.529,4.366,0.197,4.369,0.197c3.987,3.468,7.618,3.754,9.962,3.383c2.496-0.396,4.049-1.582,4.115-1.631
    c0.13-0.103,0.21-0.257,0.214-0.421C61.55,29.791,61.483,29.632,61.359,29.521z"/>
  <path fill="#0F8743" d="M27.011,17.516c-2.848,0.452-4.794,3.107-4.381,5.95c0.16-0.028,0.321-0.053,0.48-0.063
    c-0.375-2.584,1.392-4.995,3.977-5.405c2.605-0.413,5.051,1.364,5.464,3.968c0.301,1.901-0.566,3.711-2.066,4.716
    c0.185,0.057,0.356,0.134,0.502,0.244c1.51-1.134,2.36-3.041,2.045-5.036C32.577,19.021,29.881,17.061,27.011,17.516z"/>
  <path d="M51.689,23.765c-0.108,0.405-0.441,0.731-0.882,0.801c-0.593,0.093-1.152-0.312-1.246-0.906
    c-0.091-0.571,0.281-1.102,0.834-1.228c-0.456-0.212-0.976-0.295-1.509-0.211c-0.575,0.092-1.071,0.37-1.451,0.756
    c0.126,0.758,0.282,1.511,0.434,2.269c0.18,0.896,0.491,1.378,1.299,1.827c0.259,0.145,0.283,0.159,0.439,0.328
    c0.033-0.004,0.066,0,0.098-0.005c1.43-0.227,2.405-1.567,2.178-2.997C51.848,24.173,51.775,23.965,51.689,23.765z"/>
  <g>
    <path fill="#0F8743" d="M52.125,28.891c-2.12,0.336-4.226-1.785-4.691-4.726c-0.467-2.942,0.881-5.607,3.001-5.945
      c2.12-0.335,4.227,1.785,4.692,4.727C55.594,25.887,54.246,28.554,52.125,28.891z M50.522,18.771
      c-1.818,0.288-2.958,2.669-2.539,5.308c0.417,2.638,2.237,4.55,4.056,4.263c1.817-0.29,2.957-2.669,2.539-5.309
      C54.159,20.395,52.341,18.482,50.522,18.771z"/>
  </g>
  <g>
    <path fill="#0F8743" d="M52.732,24.123c0.267,1.687-0.104,3.265-0.878,4.261c0.227-0.03,0.455-0.031,0.684-0.018
      c0.696-1.115,1.005-2.679,0.744-4.329c-0.449-2.835-2.419-4.898-4.459-4.745c-0.005,0.007-0.005,0.012-0.011,0.02
      c-0.154,0.204-0.302,0.415-0.45,0.624c0.103-0.031,0.208-0.057,0.315-0.075C50.496,19.573,52.314,21.485,52.732,24.123z"/>
  </g>
  <path fill="#0F8743" d="M16.818,16.654c0,0-3.071,1.424-3.8,2.048c-0.73,0.623,0.528-1.141,0.528-1.141l1.306-0.907l0.964-0.387"/>
  <circle fill="#FFFFFF" cx="50.469" cy="23.556" r="1.298"/>
  <path fill="#0F8743" d="M33.617,26.403c1.085-1.479,1.605-3.388,1.292-5.363c-0.615-3.889-4.206-6.552-8.018-5.948
    c-3.773,0.598-6.345,4.168-5.802,8.011c-0.289,0.03-0.455,0.056-0.455,0.056l0.136,0.86c4.699-0.568,6.99,1.674,6.99,1.674
    c7.171,6.152,8.155-1.188,8.155-1.188C35.106,25.521,34.33,26.1,33.617,26.403z M31.996,26.661
    c-0.53-0.057-0.986-0.244-1.348-0.453c-3.091-2.279-6.23-3.029-6.23-3.029c-1.06-0.152-2.006-0.158-2.688-0.125
    c-0.496-3.369,1.756-6.508,5.062-7.032c3.33-0.526,6.464,1.799,7.002,5.195C34.125,23.306,33.383,25.304,31.996,26.661z"/>
  <path fill="#0F8743" d="M29.396,25.791l-0.355,0.348C29.167,26.031,29.286,25.915,29.396,25.791z"/>
  <path d="M31.94,22.741c-0.033-0.201-0.083-0.396-0.146-0.584c-0.061,0.802-0.658,1.486-1.487,1.618
    c-0.968,0.153-1.877-0.507-2.029-1.474c-0.153-0.967,0.507-1.875,1.474-2.028c0.249-0.04,0.492-0.025,0.719,0.036
    c-0.791-0.597-1.813-0.883-2.869-0.716c-1.556,0.247-2.727,1.409-3.076,2.849l-0.11,0.74c0,0,3.14,0.75,6.23,3.029l0.355-0.346
    C31.743,25.043,32.126,23.917,31.94,22.741z"/>
  <g>
    
      <linearGradient id="SVGID_2_" gradientUnits="userSpaceOnUse" x1="-1.063" y1="48.9922" x2="-8.0858" y2="15.2566" gradientTransform="matrix(0.9984 0.0561 -0.0561 0.9984 13.6495 5.4498)">
      <stop  offset="0" style="stop-color:#2484C6"/>
      <stop  offset="0.1372" style="stop-color:#2986C7"/>
      <stop  offset="0.2432" style="stop-color:#368CCB"/>
      <stop  offset="0.3388" style="stop-color:#4898D3"/>
      <stop  offset="0.4282" style="stop-color:#5FA9DD"/>
      <stop  offset="0.5125" style="stop-color:#7BC2EB"/>
      <stop  offset="0.5645" style="stop-color:#91D9F8"/>
      <stop  offset="0.6235" style="stop-color:#7CC2EC"/>
      <stop  offset="0.7241" style="stop-color:#5FA9DD"/>
      <stop  offset="0.8223" style="stop-color:#4998D3"/>
      <stop  offset="0.9159" style="stop-color:#3A8ECD"/>
      <stop  offset="1" style="stop-color:#348BCB"/>
    </linearGradient>
    <path fill="url(#SVGID_2_)" d="M11.095,23.417l0.774-1.5l-1.968-1.388l-1.036-0.435l-2.593,0.52c0,0-1.197,0.696-1.274,0.743
      c-0.077,0.044-1.686,2.801-1.722,3.014c-0.036,0.215-1.413,3.22-1.446,3.366c-0.033,0.145-1.524,5.188-1.524,5.188L0.15,35.701
      c0,0,1.144,3.343,1.164,3.418c0.02,0.075,2.688,3.134,2.688,3.134s1.854,0.696,1.926,0.725c0.073,0.028,2.228,0.716,2.228,0.716
      s0.653-1.986,0.662-2.132c0.008-0.149-0.131-1.364,0.259-1.637c0.39-0.274,1.423-0.66,1.423-0.66s1.413-0.586,1.375-0.786
      c-0.039-0.2-2.632-4.931-2.632-4.931s0.113-2.003,0.016-2.47c-0.097-0.466-0.399-1.669-0.454-2.005
      c-0.056-0.333-0.121-1.372-0.121-1.372"/>
    
      <linearGradient id="SVGID_3_" gradientUnits="userSpaceOnUse" x1="-1.3145" y1="20.5044" x2="-4.907" y2="20.4798" gradientTransform="matrix(0.9984 0.0561 -0.0561 0.9984 13.6495 5.4498)">
      <stop  offset="0" style="stop-color:#2484C6"/>
      <stop  offset="0.1372" style="stop-color:#2986C7"/>
      <stop  offset="0.2432" style="stop-color:#368CCB"/>
      <stop  offset="0.3388" style="stop-color:#4898D3"/>
      <stop  offset="0.4282" style="stop-color:#5FA9DD"/>
      <stop  offset="0.5125" style="stop-color:#7BC2EB"/>
      <stop  offset="0.5645" style="stop-color:#91D9F8"/>
      <stop  offset="0.6235" style="stop-color:#7CC2EC"/>
      <stop  offset="0.7241" style="stop-color:#5FA9DD"/>
      <stop  offset="0.8223" style="stop-color:#4998D3"/>
      <stop  offset="0.9159" style="stop-color:#3A8ECD"/>
      <stop  offset="1" style="stop-color:#348BCB"/>
    </linearGradient>
    <path fill="url(#SVGID_3_)" d="M9.987,26.908c-0.03-0.135,0.07-0.218,0.176-0.229l0.215-0.298l0.694-2.58l-1.192-0.28L8.731,24.67
      c0,0-1.067,1.89-0.935,2.167c0.132,0.278,0.899,1.098,0.899,1.098l0.541,0.029l0.752-1.044
      C9.989,26.918,9.989,26.913,9.987,26.908z"/>
    <path fill="#0F8743" d="M9.565,28.373c0.114-0.071,0.231-0.136,0.347-0.201c0.095-0.418,0.168-0.847,0.075-1.264
      c-0.056-0.247,0.329-0.33,0.384-0.083c0.007,0.029,0.009,0.058,0.015,0.087l0.207-0.349c-0.187-0.059-0.343-0.171-0.402-0.401
      c-0.059-0.231-0.026-0.546,0.198-0.657c0.051-0.152,0.116-0.297,0.19-0.437l-1.542,2.595c-0.292-0.124-0.732-0.373-0.849-0.798
      c-0.146-0.529,0.236-1.268,1.108-2.134c0.012-0.01,0.024-0.026,0.034-0.04c0.148-0.192,0.671-0.731,1.115-0.704
      c0.19,0.015,0.372,0.145,0.542,0.379c0.005-0.008,0.01-0.018,0.015-0.026c0.136-0.236,0.249-0.482,0.35-0.729
      c-0.254-0.237-0.538-0.375-0.856-0.396c-0.059-0.005-0.115,0.005-0.172,0.009L8.86,21.587c-0.143-0.161-0.388-0.174-0.548-0.031
      c-0.16,0.144-0.173,0.387-0.031,0.548l1.241,1.387C9.11,23.744,8.816,24.093,8.731,24.2c-0.025,0.025-0.045,0.047-0.069,0.074
      c-0.209-0.175-0.458-0.288-0.747-0.314c-1.569-0.144-4.054,2.12-5.471,3.567c1.152-4.145,2.776-6.568,4.731-7.042
      c1.95-0.468,3.826,1.047,4.641,1.833c0.094-0.262,0.194-0.523,0.312-0.777c-1.013-0.922-2.982-2.33-5.131-1.808
      c-2.509,0.604-4.416,3.643-5.667,9.033c-0.25,0.523-2.495,5.449-0.53,9.806c1.192,2.647,3.688,4.503,7.416,5.515
      c0.047,0.011,0.094,0.016,0.141,0.011c0.063-0.007,0.125-0.03,0.179-0.067c0.094-0.062,0.155-0.163,0.167-0.277
      c0.078-0.699,0.412-2.67,1.008-3.359c0.084-0.101,0.113-0.232,0.083-0.352c1.005-0.558,1.829-0.986,2.021-1.025
      c0.131-0.012,0.248-0.092,0.307-0.212c0.061-0.117,0.054-0.258-0.015-0.372C12.069,38.368,8.333,32.067,9.565,28.373z
       M7.438,40.497C7.264,40.6,7.197,40.818,7.286,41c0.088,0.183,0.301,0.266,0.489,0.192l0.793-0.308
      c-0.315,0.807-0.492,1.766-0.577,2.331c-3.254-0.97-5.434-2.638-6.483-4.961c-1.792-3.967,0.287-8.649,0.516-9.143
      c1.567-1.776,4.5-4.505,5.82-4.38c0.123,0.012,0.223,0.051,0.308,0.119c-0.648,0.822-0.893,1.566-0.712,2.222
      c0.035,0.126,0.084,0.241,0.142,0.346c-1.071,0.74-4.166,3.219-4.248,7.179c-0.005,0.216,0.165,0.394,0.379,0.397
      c0.017,0.001,0.033,0,0.049-0.001c0.191-0.02,0.344-0.18,0.348-0.379c0.076-3.657,3.113-6.005,3.987-6.606
      c0.226,0.176,0.463,0.297,0.653,0.377c-0.958,3.504,1.646,8.581,2.462,10.047C10.236,38.868,8.339,39.965,7.438,40.497z"/>
  </g>
  <ellipse fill="#FFFFFF" cx="29.886" cy="22.084" rx="1.885" ry="1.841"/>
</g>
<g>
  <path fill="#0E8744" d="M98.088,22.239L97.92,39.341h6.185V26.652c0,0-0.173-1.685,4.031-1.227l0.263-5.039
    C108.399,20.387,101.081,19.246,98.088,22.239z"/>
  <path fill="#0E8744" d="M89.048,14.359c0,0-3.176,0.428-4.305,4.245l-3.543,9.041l-3.542-9.041
    c-1.13-3.817-4.306-4.245-4.306-4.245c-4.368-0.091-4.123,4.612-4.123,4.612l-0.947,20.37h6.475V24.254l2.809,8.214
    c1.405,4.001,3.634,3.819,3.634,3.819s2.23,0.183,3.634-3.819l2.81-8.214v15.087h6.475l-0.947-20.37
    C93.171,18.971,93.415,14.268,89.048,14.359z"/>
  <path fill="#0E8744" d="M113.174,32.653h-0.428c-1.905,0-3.451,1.544-3.451,3.45c0,1.906,1.546,3.451,3.451,3.451h0.428
    c1.906,0,3.451-1.545,3.451-3.451C116.625,34.197,115.08,32.653,113.174,32.653z"/>
  <path fill="#0E8744" d="M120.595,15.612v23.729h6.505v-8.614h4.979c0,0,6.963,0.033,6.963-8.305
    C139.042,22.422,139.607,10.389,120.595,15.612z M132.505,22.895c0,2.657-2.641,2.734-2.641,2.734H127.1V19.78h3.528
    C132.704,19.78,132.505,22.895,132.505,22.895z"/>
  <path fill="#0E8744" d="M142.194,21.04l0.436,4.419c0,0,8.933-1.908,9.23,1.36c0,0-10.376-1.177-10.376,6.842
    c0,0-0.214,6.321,8.2,5.68c0,0,5.85-0.581,7.896-2.292V25.537C157.58,25.537,158.709,17.169,142.194,21.04z M151.86,34.598
    c0,0-4.375,1.284-4.352-1.603c0,0-0.069-2.427,4.352-2.335V34.598z"/>
  <path fill="#0E8744" d="M169.336,20.361c-4.578,0-8.29,3.711-8.29,8.292v2.442c0,4.58,3.712,8.292,8.29,8.292
    c4.58,0,8.292-3.712,8.292-8.292v-2.442C177.628,24.072,173.917,20.361,169.336,20.361z M171.841,32.134
    c0,1.382-1.122,2.503-2.505,2.503c-1.384,0-2.503-1.122-2.503-2.503v-4.521c0-1.382,1.119-2.503,2.503-2.503
    c1.383,0,2.505,1.122,2.505,2.503V32.134z"/>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>


   </a>
  </div>
</div>








<div class="form">


  
<div class="info">
  <h1>Sign in to your account</h1>
</div>

<div class="loginas">
  <h3>Are you a <span class="role">Potential Customer</span>? <a href="<?php echo BASE_PATH; ?>/participant/login/">Click here</a></h3>
</div>


<div class="form-login">

  
  <form class="login-form">
    <input type="email" name="txtemail" placeholder="Email Address" required/>
    <input type="password" name="txtupass" placeholder="Password" required/>
    <input type="checkbox" name="txtrememberme" value="Yes"/><label> Remember me</label>
    <button type="submit" name="btn-login">LOGIN</button>
    <p class="message">Not registered? <a href="<?php echo BASE_PATH; ?>/startup/signup">Sign up</a></p>
    <p class="message"> <a href="../fpass.php">Forgot your Password ? </a></p>
   
  </form>

</div>



<div style="margin-top:30px; background:#f5f5f5">
  
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


require_once ('libraries/Google/autoload.php');

//Insert your cient ID and secret 
//You can get it from : https://console.developers.google.com/
$client_id = '762314707749-fpgm9cgcutqdr6pehug9khqal9diajaq.apps.googleusercontent.com'; 
$client_secret = 'SkjeNM0N02slGKfpNc7vwFiX';
$redirect_uri = ''.BASE_PATH.'/entrepreneur/login/';

//database
$db_username = "root"; //Database Username
$db_password = "123"; //Database Password
$host_name = "localhost"; //Mysql Hostname
$db_name = 'mrpao'; //Database Name


//incase of logout request, just unset the session var
if (isset($_GET['logout'])) {
  unset($_SESSION['access_token']);
  unset($_SESSION['fb_access_token_startup']);
  unset($_SESSION['startupSession']);
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
  $result = mysqli_query($connecDB,"SELECT COUNT(userEmail) as usercount FROM tbl_startup WHERE userEmail='".$user->email."' ");
  $user_count = $result->fetch_object()->usercount; //will return 0 if user doesn't exist

  $sql = mysqli_query($connecDB,"SELECT * FROM tbl_startup WHERE userEmail = '".$user->email."'");
  $row = mysqli_fetch_array($sql);


  //show user picture
  //echo '<img src="'.$user->picture.'" style="float: right;margin-top: 33px;" />';
  //echo $user_count;
  //echo $user->email;
  if($user_count) //if user already exist change greeting text to "Welcome Back"
    {

    $statement = $mysqli->prepare("UPDATE tbl_startup SET 
    profile_image = '',
    facebook_id = '',
    google_id = '".$user->id."',
    FirstName = '".$user->givenName."',
    LastName = '".$user->familyName."',
    google_picture_link = '".$user->picture."',
    account_verified = '1'  
    
    WHERE userEmail='".$user->email."'");
   
   $statement->execute();


        //echo 'Welcome back '.$user->name.'! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
        $_SESSION['startupSession'] = $row['userID'];
        header("Location: ../index.php");
        exit();
    }
  else //else greeting text "Thanks for registering"
  { 
        //echo 'Hi '.$user->name.', Thanks for Registering! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
    
    

unset($_SESSION['startupSession']);
unset($_SESSION['access_token']);


echo "
          <div class='alert alert-error'>
       <button class='close' data-dismiss='alert'>&times;</button>
          <strong>Sorry !</strong> No account found</a>
        </div>
        ";


   
    //mysqli_query($update_sql);

    //echo $user->id;

    if($mysqli->error == "Duplicate entry '".$user->email."' for key 'userEmail'"){
    
      //exit(header("Location: ../index.php"));

    }

    }
  
  //print user details
  //echo '<pre>';
  //print_r($user);
  //echo '</pre>';
}


//echo '</div>';





?>



<?php

$fb = new Facebook\Facebook([
  'app_id' => '1797081013903216',
  'app_secret' => 'f30f4c99e31c934f65b515c1f777940f',
  'default_graph_version' => 'v2.2',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl(''.BASE_PATH.'/startup/login/login-callback.php', $permissions);








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

/*  

echo '<div style="float:left; width:100%;">';

echo '<div style="margin:0 auto; width: 82%;">';

echo '<a class="social-signin__btn btn_google btn_default-bis" href="' . $authUrl . '"> <span class="icon icon_google"></span> Google </a>';

echo '<a class="social-signin__btn btn_facebook btn_default-bis"  href="../../logout.php"> <span class="icon icon_facebook"></span> Logout from Facebook! </a>';

echo '</div>';
echo '</div>';

echo "<p>&nbsp;</p>";
*/



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

$_SESSION['user_id'] = $user['id'];

/*
echo 'Name: ' . $user['name'];
echo "<br>";
echo 'Email: ' . $user['email'];
echo "<br>";
echo 'id: ' . $user['id'];
*/


//check if user exist in database using COUNT


  $resultfacebook = mysqli_query($connecDB,"SELECT COUNT(facebook_id) as usercountfacebook FROM tbl_startup WHERE userEmail='".$user['email']."' ");
  $user_count_facebook = $resultfacebook->fetch_object()->usercountfacebook; //will return 0 if user doesn't exist

  $sql = mysqli_query($connecDB,"SELECT * FROM tbl_startup WHERE userEmail = '".$user['email']."'");
  $row = mysqli_fetch_array($sql);



  //show user picture
  //echo '<img src="'.$user->picture.'" style="float: right;margin-top: 33px;" />';
  //echo $user_count;
  //echo $user->email;
  if($user_count_facebook) //if user already exist change greeting text to "Welcome Back"
    {   

    $update_sql = mysqli_query($connecDB,"UPDATE tbl_startup SET 
    facebook_id = '".$user['id']."',   
    profile_image = '',
    google_picture_link = '',
    account_verified = '1'  
    
    WHERE userEmail='".$user['email']."'");

        //echo 'Welcome back '.$user->name.'! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
        $_SESSION['startupSession'] = $row['userID'];
        $_SESSION['facebook_photo'] = $user['id'];
        header("Location: ../index.php");
        //echo $_SESSION['startupSession'];
        exit();
    }
  else //else greeting text "Thanks for registering"
  { 




unset($_SESSION['startupSession']);
unset($_SESSION['facebook_photo']);
unset($_SESSION['fb_access_token_startup']);




echo "
          <div class='alert alert-error'>
       <button class='close' data-dismiss='alert'>&times;</button>
          <strong>Sorry !</strong> No account found</a>
        </div>
        ";





    exit();



    //echo $user->id;




    if($mysqli->error == "Duplicate entry '".$user['email']."' for key 'userEmail'"){
    
      //exit(header("Location: ../index.php"));

    }

 

  }  




}







?>

</div>


</div>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="<?php echo BASE_PATH; ?>/js/index.js"></script>

    <script src="<?php echo BASE_PATH; ?>/bootstrap/js/jquery-1.9.1.min.js"></script>
    <script src="<?php echo BASE_PATH; ?>/bootstrap/js/bootstrap.min.js"></script>
    
    
  </body>
</html>
