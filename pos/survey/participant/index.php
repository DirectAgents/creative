<?php 

require_once '../base_path.php'; 


include_once("../config.php");



?>



<?php


if(isset($_POST['btn-notify']))
{

 
  $email = trim($_POST['txtemail']);
 


$sql = mysqli_query($connecDB,"SELECT * FROM tbl_participant_newsletter WHERE userEmail='".$email."'");


if(mysqli_num_rows($sql)>0)
{

  
    $msg = "
          <div class='alert alert-error'>
       <button class='close' data-dismiss='alert'>&times;</button>
          <strong>Sorry !</strong>  Email already exists. Please Try another one
        </div>
        ";
  }
  else
  {


date_default_timezone_set('America/New_York');
$date = date('Y-m-d'); 

    $insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_participant_newsletter(userEmail, Date) VALUES('".$email."', '".$date."')");
      
      

       $msg = "
          <div class='alert alert-success'>
            <button class='close' data-dismiss='alert'>&times;</button>
            <strong>Success! We'll keep you updated with news about upcoming startups.</strong>
            </div>
          ";


// using SendGrid's PHP Library
// https://github.com/sendgrid/sendgrid-php
// If you are using Composer (recommended)
require '../sendgrid-php/vendor/autoload.php';
// If you are not using Composer
// require("path/to/sendgrid-php/sendgrid-php.php");
$from = new SendGrid\Email("Thank you", "no-reply@valifyit.com");
$subject = "Great!";
$to = new SendGrid\Email('', $email);
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
                        <a href="http://litmus.com" target="_blank">
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
                                                We\'ll notify you once we have space for you to sign up
                                                </td>
                                            </tr>
                                            
                                             
                                        </table>
                                    </div>
                                   
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

 
}


?>

<script src="https://use.typekit.net/oos2wfr.js"></script>
<script>try{Typekit.load({ async: false });}catch(e){}</script>
<html itemscope itemtype="http://schema.org/Product">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible"content="IE=edge">

    <title>Valify Launch</title>

    <link rel="icon" href="../favicon.ico" type="image/x-icon"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="The modern way to start a scalable, high-growth business" />

    <meta name="google" content="nositelinkssearchbox" />
    <meta itemprop="name" content="Valify Launch">
    <meta itemprop="image" content="/public/img/logo.png">

    <meta name="twitter:site" content="@Valifyit">
    <meta name="twitter:title" content="Valify Launch">
    <meta name="twitter:description" content="The modern way to start a scalable, high-growth business">
    <meta name="twitter:creator" content="@Valifyit">

    <meta property="og:url" content="https://valifyit.com">
    <meta property="og:title" content="Valify Launch">
    <meta property="og:image" content="https://launch.valifyit.com/public/img/logo-Valifylaunch-og.png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:description" content="The modern way to start a scalable, high-growth business">
    <meta property="og:site_name" content="Valify Launch">
    <meta property="og:locale" content="en_US">
    <meta property="article:author" content="https://www.facebook.com/valifyit/">
    <meta property="article:section" content="Technology">

  
    

<link href="<?php echo BASE_PATH; ?>/css/launch.css" rel="stylesheet">

<link rel="stylesheet" media="all" href="<?php echo BASE_PATH; ?>/assets/application-d939c3182b808a58e625b4260b6955c9.css" />
<script src="<?php echo BASE_PATH; ?>/js/application-4b458517a28f0f3fb52cdb61d93011a6.js"></script>


<script type='text/javascript'>//<![CDATA[
$(window).load(function(){
$(document).ready(function() {
  $('a[rel="relativeanchor"]').click(function(){
      $('html, body').animate({
          scrollTop: $( $.attr(this, 'href') ).offset().top
      }, 500);
      return false;
  }); 
});
});//]]> 

</script>


</head>

<body>
  <div id="tour_center_target"></div>
<div class='div--full-height'>
   <div id='header'>
<nav id='main_nav' role='main-navigation'>
<div class='container-fluid nav-contents'>
<div class='nav-item logo'>
<a class="brand-logo-light nav-logo-swoosh" href="index.html" target="_top">
<img src="<?php echo BASE_PATH; ?>/img/navigation/logo-2.png" width="137" height="54"/>
</a>
</div>

<div class='nav-item'>
<a target="_top" href="<?php echo BASE_PATH; ?>">For Startups</a>

</div>

<div class='nav-item'>
<a target="_top" href="<?php echo BASE_PATH; ?>/participant/">For Participants</a>

</div>


<div class='nav-spacer'></div>


<div class='nav-item nav-item-with-button'>
<a class='btn-signin' target="_top" href="<?php echo BASE_PATH; ?>/participant/login/">Sign In</a>

</div>

<div class='nav-item nav-item-with-button'>
<a class='btn-primary' href='<?php echo BASE_PATH; ?>/participant/signup/' target='_top'>Sign Up</a>
</div>

</div>
</nav>
<nav id='main_nav_mobile'>
<div class='container-fluid nav-contents'>
<div class='nav-item'>
<a class="brand-logo-light nav-logo-swoosh" href="index.html" target="_top">

<img src="<?php echo BASE_PATH; ?>/img/navigation/logo-2.png" width="137" height="54"/>
</a>
</div>

<div class='nav-spacer'></div>
<div class='nav-item'>
<a data-target='.mobile-nav-list' data-toggle='collapse'>
<i class='fa fa-bars fa-lg'></i>
</a>
</div>
<ul class='mobile-nav-list collapse'>
<li><a target="_top" href="<?php echo BASE_PATH; ?>">For Startups</a>
</li>

<li><a target="_top" href="<?php echo BASE_PATH; ?>/participant/">For Participants</a>
</li>

<li><a target="_top" href="<?php echo BASE_PATH; ?>/participant/login/">Sign In</a>
</li>

<li>
<a href='<?php echo BASE_PATH; ?>/participant/signup/' target='_top'>Sign Up</a>
</li>

</ul>
</div>
</nav>

</div>
</div>

  <header class="hero">
  
    <div class="wrap">
      <h1 class="title">Help Startups to succeed.</h1>
      <span class="description">
        One platform to help startups to validate their ideas.
      </span>
  
      <a class="signup" href="<?php echo BASE_PATH; ?>/participant/signup/">
        Sign Up
      </a>
      <a href="#myAnchor" rel="relativeanchor">
      <div class="learn-more">
      
        <span>Learn more</span>
       
        <svg class="chevron-down">
          <polyline class="line" stroke-linecap="round" points="0.5,5.5 12,18.5 23.5,5.5 "/>
        </svg>
      </div>
       </a>
    </div>
  </header>
  <div id="myAnchor"></div>
  <section class="value">
    <div class="prop">
      <div class="icon">
        <img src="../images/vectorgraphs/share-feedback.jpg"/>
      </div>
      <div class="prop-text">
         <h2 class="title">Share your feedback</h2>
        <span class="description">meet and share your opinion</span>
        <ul>
          <li>Meet and share your feedback with a startup</li>
          <li>Your personal opinion counts </li>
          <li>Meetings are casual </li>
        </ul>
      </div>
    </div>
    <div class="prop">
      <div class="icon">
        <img src="../images/vectorgraphs/earn-money.jpg"/>
      </div>
      <div class="prop-text">
       <h2 class="title">Earn money to share your feedback</h2>
         <span class="description">get paid for your thoughts</span>
        <ul>
         <li>Earn extra money by providing your feedback </li>
          <li>Get paid by the minute </li>
          <li>Make money during your lunch break </li>
        </ul>
      </div>
    </div>
    <div class="prop">
      <div class="icon">
        <img src="../images/vectorgraphs/big-idea.jpg"/>
      </div>
      <div class="prop-text">
       <h2 class="title">Be a part of the next big thing</h2>
       <span class="description">feel special</span>
        <ul>
          <li>Be a part of "the" big thing </li>
          <li>Make your initial contact with the co-founder/founder of a Startup </li>
          <li>Receive special perks</li>
        </ul>
      </div>
    </div>
  </section>
  

<!--

  <section class="features"
      ng-click="vm.toggle()"
      ng-class="{active: vm.cards}">
  
      <h2 class="title">Benefits</h2>

      <div class="wrapper">


          <div class="feature"
              ng-click="vm.toggle(1); $event.stopPropagation();"
              ng-class="{
                  active: vm.activeCard === 1,
                  viewed: vm.viewed[1] === true
              }">
              <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 69.36 69.36"><defs><style>.cls-1-1{fill:#cef0e8;}.cls-2{fill:#fff;}.cls-2,.cls-3,.cls-4,.cls-5,.cls-6,.cls-7{stroke:#26a990;stroke-width:0.75px;}.cls-2,.cls-3{stroke-miterlimit:10;}.cls-3{fill:#9ae0d0;}.cls-4{fill:none;stroke-linecap:square;}.cls-5{fill:#26a990;}.cls-6{fill:#e5f9f5;}.cls-7{fill:#f0fffc;}</style></defs><title>icon-1</title><g id="Layer_2" data-name="Layer 2"><g id="icons_color" data-name="icons color"><g id="Certificate"><circle id="Oval" class="cls-1" cx="34.68" cy="34.68" r="34.68"/><path id="Shape" class="cls-2" d="M53,18.88a2.46,2.46,0,0,1-2.46,2.46H17.43A2.46,2.46,0,0,0,15,23.81V49.09H50.54A2.46,2.46,0,0,0,53,46.63V18.88Z"/><path id="Shape-2" data-name="Shape" class="cls-3" d="M17.43,51.55a2.46,2.46,0,0,0,2.46-2.46V23.81a2.46,2.46,0,0,1-4.92,0V49.09A2.46,2.46,0,0,0,17.43,51.55Z"/><path id="Shape-3" data-name="Shape" class="cls-3" d="M53,18.88a2.46,2.46,0,1,0-4.92,0v2.46h2.46A2.46,2.46,0,0,0,53,18.88Z"/><path id="Line" class="cls-4" d="M30.61,38.84H24.44"/><path id="Line-2" data-name="Line" class="cls-4" d="M47.74,35.37H24.16"/><path id="Line-3" data-name="Line" class="cls-4" d="M47.74,31.91H24.16"/><path id="Line-4" data-name="Line" class="cls-4" d="M30.89,27.74H24.16"/><path id="Shape-4" data-name="Shape" class="cls-5" d="M42.79,48.27v6.16L45.67,53l2.88,1.45V48.11a5,5,0,0,1-5.76.16Z"/><path id="Shape-5" data-name="Shape" class="cls-6" d="M45.55,38.94a5.07,5.07,0,0,0,0,10.15V38.94Z"/><path id="Shape-6" data-name="Shape" class="cls-7" d="M50.62,44a5.08,5.08,0,0,0-5.07-5.07V49.09A5.08,5.08,0,0,0,50.62,44Z"/></g></g></g></svg>
              </div>
              <h2 class="title">Share your feedback</h2>
              <span class="description">
                  Begin as an investor-friendly Delaware C-Corp
              </span>
              <span class="learn-more"><a href="/">Click to learn more &raquo;</a></span>
  
              <svg class="close" ng-click="vm.activeCard = null; $event.stopPropagation();" xmlns="http://www.w3.org/2000/svg" viewBox="-1 -1 26 26"><path class="line" d="M.5.5l23 23M23.5.5l-23 23"></path></svg>
  
           
  
           
          </div>
  
          <div class="feature"
              ng-click="vm.toggle(2); $event.stopPropagation();"
              ng-class="{
                  active: vm.activeCard === 2,
                  viewed: vm.viewed[2] === true
              }">
              <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 69.33 69.33"><defs><style>.cls-2-1{fill:#cef0e8;}.cls-2-2,.cls-2-4{fill:#fff;}.cls-2-2,.cls-2-3,.cls-2-4{stroke:#26a990;stroke-miterlimit:10;}.cls-2-2{stroke-width:0.75px;}.cls-2-3{fill:#9ae0d0;}.cls-2-3,.cls-2-4{stroke-width:0.5px;}</style></defs><title>icon-2</title><g id="Layer_2" data-name="Layer 2"><g id="icons_color" data-name="icons color"><circle class="cls-2-1" cx="34.67" cy="34.67" r="34.67"/><rect class="cls-2-2" x="20" y="31.15" width="3.26" height="13.61"/><rect class="cls-2-2" x="46.07" y="31.15" width="3.26" height="13.61"/><rect class="cls-2-2" x="37.38" y="31.15" width="3.26" height="13.61"/><rect class="cls-2-2" x="28.69" y="31.15" width="3.26" height="13.61"/><path class="cls-2-2" d="M51.5,45.84v1.09H17.83V45.84a1.09,1.09,0,0,1,1-1.08H50.53A1.09,1.09,0,0,1,51.5,45.84Z"/><path class="cls-2-2" d="M53.68,48V49.1h-38V48a1.09,1.09,0,0,1,1.09-1.09H52.59A1.08,1.08,0,0,1,53.68,48Z"/><path class="cls-2-2" d="M51.5,30.06a1.08,1.08,0,0,1-1.08,1.09H18.92a1.09,1.09,0,0,1,0-2.17h31.5A1.08,1.08,0,0,1,51.5,30.06Z"/><path class="cls-2-2" d="M35.62,15.26a1.34,1.34,0,0,0-1.9,0L20,29H49.33Z"/><path class="cls-2-3" d="M34.67,18.72l7.4,7.4H27.27Z"/><path class="cls-2-4" d="M34.67,24.65A1.38,1.38,0,1,1,36,23.27,1.38,1.38,0,0,1,34.67,24.65Z"/></g></g></svg>
              </div>
              <h2 class="title">Earn money to share your feedback</h2>
              <span class="description">Designed with startups in mind, with no fees or minimums</span>
              <span class="learn-more">Click to learn more &raquo;</span>
              <svg class="close" ng-click="vm.activeCard = null; $event.stopPropagation();" xmlns="http://www.w3.org/2000/svg" viewBox="-1 -1 26 26"><path class="line" d="M.5.5l23 23M23.5.5l-23 23"></path></svg>
  
          
  
         
          </div>
  
          <div class="feature"
              ng-click="vm.toggle(3); $event.stopPropagation();"
              ng-class="{
                  active: vm.activeCard === 3,
                  viewed: vm.viewed[3] === true
              }">
              <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 72.53 72.25"><defs><style>.cls-3-1{fill:#2ec3a1;}.cls-3-2,.cls-3-7{fill:#fff;}.cls-3-2,.cls-3-4,.cls-3-9{stroke:#26a990;stroke-width:0.75px;}.cls-3-3{fill:#9ae0d0;}.cls-3-4,.cls-3-6{fill:#cef0e8;}.cls-3-5{clip-path:url("index.html#clip-path");}.cls-3-8{clip-path:url("index.html#clip-path-2");}.cls-3-9{fill:none;}.cls-3-10{clip-path:url("index.html#clip-path-3");}.cls-3-11{clip-path:url("index.html#clip-path-4");}.cls-3-12{clip-path:url("index.html#clip-path-5");}.cls-3-13{clip-path:url("index.html#clip-path-6");}.cls-3-14{clip-path:url("index.html#clip-path-7");}.cls-3-15{clip-path:url("index.html#clip-path-8");}.cls-3-16{clip-path:url("index.html#clip-path-9");}.cls-3-17{clip-path:url("index.html#clip-path-10");}.cls-3-18{clip-path:url("index.html#clip-path-11");}.cls-3-19{clip-path:url("index.html#clip-path-12");}.cls-3-20{clip-path:url("index.html#clip-path-13");}.cls-3-21{clip-path:url("index.html#clip-path-14");}.cls-3-22{clip-path:url("index.html#clip-path-15");}.cls-3-23{clip-path:url("index.html#clip-path-16");}.cls-3-24{clip-path:url("index.html#clip-path-17");}.cls-3-25{clip-path:url("index.html#clip-path-18");}.cls-3-26{clip-path:url("index.html#clip-path-19");}</style><clipPath id="clip-path"><ellipse class="cls-3-1" cx="36.27" cy="36.12" rx="34.77" ry="34.63"/></clipPath><clipPath id="clip-path-2"><rect class="cls-3-2" x="20.91" y="27.64" width="30.74" height="30.62"/></clipPath><clipPath id="clip-path-3"><rect class="cls-3-1" x="24.07" y="30.68" width="3.79" height="3.77"/></clipPath><clipPath id="clip-path-4"><rect class="cls-3-1" x="31.01" y="30.68" width="3.79" height="3.77"/></clipPath><clipPath id="clip-path-5"><rect class="cls-3-3" x="37.97" y="30.68" width="3.79" height="3.77"/></clipPath><clipPath id="clip-path-6"><rect class="cls-3-3" x="44.91" y="30.68" width="3.79" height="3.77"/></clipPath><clipPath id="clip-path-7"><rect class="cls-3-1" x="24.07" y="37.6" width="3.79" height="3.77"/></clipPath><clipPath id="clip-path-8"><rect class="cls-3-1" x="31.01" y="37.6" width="3.79" height="3.77"/></clipPath><clipPath id="clip-path-9"><rect class="cls-3-3" x="37.97" y="37.6" width="3.79" height="3.77"/></clipPath><clipPath id="clip-path-10"><rect class="cls-3-3" x="44.91" y="37.6" width="3.79" height="3.77"/></clipPath><clipPath id="clip-path-11"><rect class="cls-3-3" x="24.07" y="44.52" width="3.79" height="3.78"/></clipPath><clipPath id="clip-path-12"><rect class="cls-3-3" x="31.01" y="44.52" width="3.79" height="3.78"/></clipPath><clipPath id="clip-path-13"><rect class="cls-3-3" x="37.97" y="44.52" width="3.79" height="3.78"/></clipPath><clipPath id="clip-path-14"><rect class="cls-3-3" x="24.07" y="51.45" width="3.79" height="3.77"/></clipPath><clipPath id="clip-path-15"><rect class="cls-3-3" x="31.01" y="51.45" width="3.79" height="3.77"/></clipPath><clipPath id="clip-path-16"><rect class="cls-3-3" x="37.97" y="51.45" width="3.79" height="3.77"/></clipPath><clipPath id="clip-path-17"><rect class="cls-3-1" x="44.91" y="44.52" width="3.79" height="10.7"/></clipPath><clipPath id="clip-path-18"><rect class="cls-3-2" x="20.91" y="14.01" width="30.74" height="13.63"/></clipPath><clipPath id="clip-path-19"><rect class="cls-3-4" x="24.07" y="16.91" width="24.42" height="7.84"/></clipPath></defs><title>icon-3</title><g id="Layer_2" data-name="Layer 2"><g id="icons_color" data-name="icons color"><ellipse class="cls-3-1" cx="36.27" cy="36.12" rx="34.77" ry="34.63"/><g class="cls-3-5"><rect class="cls-3-6" width="72.53" height="72.25"/></g><rect class="cls-3-7" x="20.91" y="27.64" width="30.74" height="30.62"/><g class="cls-3-8"><rect class="cls-3-2" x="19.41" y="26.15" width="33.73" height="33.6"/></g><rect class="cls-3-9" x="20.91" y="27.64" width="30.74" height="30.62"/><rect class="cls-3-1" x="24.07" y="30.68" width="3.79" height="3.77"/><g class="cls-3-10"><rect class="cls-3-1" x="22.57" y="29.19" width="6.78" height="6.76"/></g><rect class="cls-3-1" x="31.01" y="30.68" width="3.79" height="3.77"/><g class="cls-3-11"><rect class="cls-3-1" x="29.52" y="29.19" width="6.78" height="6.76"/></g><rect class="cls-3-3" x="37.97" y="30.68" width="3.79" height="3.77"/><g class="cls-3-12"><rect class="cls-3-3" x="36.47" y="29.19" width="6.77" height="6.76"/></g><rect class="cls-3-3" x="44.91" y="30.68" width="3.79" height="3.77"/><g class="cls-3-13"><rect class="cls-3-3" x="43.42" y="29.19" width="6.78" height="6.76"/></g><rect class="cls-3-1" x="24.07" y="37.6" width="3.79" height="3.77"/><g class="cls-3-14"><rect class="cls-3-1" x="22.57" y="36.11" width="6.78" height="6.76"/></g><rect class="cls-3-1" x="31.01" y="37.6" width="3.79" height="3.77"/><g class="cls-3-15"><rect class="cls-3-1" x="29.52" y="36.11" width="6.78" height="6.76"/></g><rect class="cls-3-3" x="37.97" y="37.6" width="3.79" height="3.77"/><g class="cls-3-16"><rect class="cls-3-3" x="36.47" y="36.11" width="6.77" height="6.76"/></g><rect class="cls-3-3" x="44.91" y="37.6" width="3.79" height="3.77"/><g class="cls-3-17"><rect class="cls-3-3" x="43.42" y="36.11" width="6.78" height="6.76"/></g><rect class="cls-3-3" x="24.07" y="44.52" width="3.79" height="3.78"/><g class="cls-3-18"><rect class="cls-3-3" x="22.57" y="43.03" width="6.78" height="6.76"/></g><rect class="cls-3-3" x="31.01" y="44.52" width="3.79" height="3.78"/><g class="cls-3-19"><rect class="cls-3-3" x="29.52" y="43.03" width="6.78" height="6.76"/></g><rect class="cls-3-3" x="37.97" y="44.52" width="3.79" height="3.78"/><g class="cls-3-20"><rect class="cls-3-3" x="36.47" y="43.03" width="6.77" height="6.76"/></g><rect class="cls-3-3" x="24.07" y="51.45" width="3.79" height="3.77"/><g class="cls-3-21"><rect class="cls-3-3" x="22.57" y="49.95" width="6.78" height="6.76"/></g><rect class="cls-3-3" x="31.01" y="51.45" width="3.79" height="3.77"/><g class="cls-3-22"><rect class="cls-3-3" x="29.52" y="49.95" width="6.78" height="6.76"/></g><rect class="cls-3-3" x="37.97" y="51.45" width="3.79" height="3.77"/><g class="cls-3-23"><rect class="cls-3-3" x="36.47" y="49.95" width="6.77" height="6.76"/></g><rect class="cls-3-1" x="44.91" y="44.52" width="3.79" height="10.7"/><g class="cls-3-24"><rect class="cls-3-1" x="43.42" y="43.03" width="6.78" height="13.68"/></g><rect class="cls-3-7" x="20.91" y="14.01" width="30.74" height="13.63"/><g class="cls-3-25"><rect class="cls-3-2" x="19.41" y="12.52" width="33.73" height="16.62"/></g><rect class="cls-3-9" x="20.91" y="14.01" width="30.74" height="13.63"/><rect class="cls-3-6" x="24.07" y="16.91" width="24.42" height="7.84"/><g class="cls-3-26"><rect class="cls-3-4" x="22.68" y="15.65" width="27.19" height="10.36"/></g><rect class="cls-3-9" x="24.07" y="16.91" width="24.42" height="7.84"/></g></g></svg>
              </div>
              <h2 class="title">Be a part of the next big thing</h2>
              <span class="description">Your finances and expenses, set up and managed by real live experts</span>
              <span class="learn-more">Click to learn more &raquo;</span>
              <svg class="close" ng-click="vm.activeCard = null; $event.stopPropagation();" xmlns="http://www.w3.org/2000/svg" viewBox="-1 -1 26 26"><path class="line" d="M.5.5l23 23M23.5.5l-23 23"></path></svg>
  
           
  
          
          </div>
  
          <div class="feature"
              ng-click="vm.toggle(4); $event.stopPropagation();"
              ng-class="{
                  active: vm.activeCard === 4,
                  viewed: vm.viewed[4] === true
              }">
              <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 70"><defs><style>.cls-4-1,.cls-4-2,.cls-4-5{fill:#cef0e8;}.cls-4-2,.cls-4-3,.cls-4-4,.cls-4-5,.cls-4-6,.cls-4-7{stroke:#26a990;stroke-miterlimit:10;}.cls-4-2{stroke-width:0.5px;}.cls-4-3{fill:#9ae0d0;}.cls-4-3,.cls-4-4,.cls-4-5,.cls-4-6{stroke-width:0.75px;}.cls-4-4{fill:#fff;}.cls-4-6{fill:#2ec3a1;}.cls-4-7{fill:none;stroke-width:1.25px;}</style></defs><title>icon-4</title><g id="Layer_2" data-name="Layer 2"><g id="icons_color" data-name="icons color"><circle class="cls-4-1" cx="35" cy="35" r="35"/><circle class="cls-4-2" cx="35" cy="35" r="13.56"/><path class="cls-4-3" d="M48.56,35a13.51,13.51,0,0,1-4,9.58l4,4A19.14,19.14,0,0,0,54.19,35H48.56Z"/><path class="cls-4-4" d="M35,21.45A13.56,13.56,0,0,1,48.56,35h5.64A19.2,19.2,0,0,0,35,15.81v5.64h0Z"/><path class="cls-4-5" d="M35,21.45V15.81a19,19,0,0,0-7.34,1.47l2.16,5.21A13.52,13.52,0,0,1,35,21.45Z"/><path class="cls-4-6" d="M44.58,44.59A13.55,13.55,0,1,1,29.81,22.48l-2.16-5.21A19.19,19.19,0,1,0,48.57,48.58Z"/><line class="cls-4-7" x1="30.23" y1="40.04" x2="40.25" y2="30.02"/><circle class="cls-4-7" cx="31.82" cy="31.58" r="2.26"/><circle class="cls-4-7" cx="38.66" cy="38.42" r="2.26"/></g></g></svg>
              </div>
              <h2 class="title">Make great connections with great Startups</h2>
              <span class="description">Issue and manage stock from day one and avoid compliance issues</span>
              <span class="learn-more">Click to learn more &raquo;</span>
              <svg class="close" ng-click="vm.activeCard = null; $event.stopPropagation();" xmlns="http://www.w3.org/2000/svg" viewBox="-1 -1 26 26"><path class="line" d="M.5.5l23 23M23.5.5l-23 23"></path></svg>
  
            
  
          
          </div>
  
          
  
          
  
      </div>
  </section>

  -->
  
  
  
  <footer>
  
    <div class="subscribe-cta">
      <h3>Get notified?</h3>
      <p>Subscribe to hear about new startups are up to.</p>


<?php if(isset($msg)) echo $msg;  ?>

<div id="form"></div>

<form class="form-signin" method="post" action="#form">

<div data-reactid=".hbspt-forms-0.0:$0">

<div class="hs_email field hs-form-field" data-reactid=".hbspt-forms-0.0:$0.$email"><div class="input" data-reactid=".hbspt-forms-0.0:$0.$email.$email">

<input type="email" name="txtemail" id="txtemail" class="hs-input" required="" placeholder="Your email" value="" oninvalid="this.setCustomValidity('Enter Your Email')" oninput="setCustomValidity('')" required>

</div>

</div></div><div class="hs_submit" data-reactid=".hbspt-forms-0.2"><div class="hs-field-desc" style="display:none;" data-reactid=".hbspt-forms-0.2.0"></div><div class="actions" data-reactid=".hbspt-forms-0.2.1">

<input type="submit" value="Subscribe" name="btn-notify" id="btn-notify" class="hs-button primary large" rel="relativeanchor" data-reactid=".hbspt-forms-0.2.1.0"></div></div>

</form>





    </div>
  
     <div class="copyright">
      © 2017 Valify. All rights reserved  |  <a href="<?php echo BASE_PATH; ?>/terms/">Terms of Service</a>  |  <a href="<?php echo BASE_PATH; ?>/privacy/">Privacy</a>  |  <a href="<?php echo BASE_PATH; ?>/faq/">FAQ</a>  |  <a href="<?php echo BASE_PATH; ?>/about/">About</a>  |  <a href="<?php echo BASE_PATH; ?>/contact/">Contact us</a> 
    </div>
  
  </footer>
  <footer class="email">
  
    <span class="title">Not ready to get started?</span>
    <span class="instructions">We can still help you move your startup forward. Subscribe to hear from experienced founders and investors on building a scalable and investable business, delivered weekly to your inbox.</span>
  
    <input type="email">
    <button>Subscribe</button>
    
  </footer>

<script type="text/javascript" src="<?php echo BASE_PATH; ?>/js/launch.js"></script></body>
</html>
