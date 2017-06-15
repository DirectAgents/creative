<?php 

session_start();

require_once 'base_path.php'; 


include_once("config.php");


if(isset($_GET['id'])){
$_SESSION['craigslist'] = 'yes';
}else{
$_SESSION['craigslist'] = 'no';
}


?>



<?php


if(isset($_POST['btn-notify']))
{

 
  $email = trim($_POST['txtemail']);
  $share = trim($_POST['txtshare']);
  
 


$sql = mysqli_query($connecDB,"SELECT * FROM tbl_signups WHERE userEmail='".$email."'");


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

    $insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_signups(userEmail,share,craigslist, Date) VALUES('".$email."','".$share."', '".$_SESSION['craigslist']."', '".$date."')");
      
      

       $msg = "
          <div class='alert alert-success'>
            <button class='close' data-dismiss='alert'>&times;</button>
            <strong>Success! We'll notify you once we launch.</strong>
            </div>
          ";


// using SendGrid's PHP Library
// https://github.com/sendgrid/sendgrid-php
// If you are using Composer (recommended)
require 'sendgrid-php/vendor/autoload.php';
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
                                                We\'ll notify you once we launch
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

    <link rel="icon" href="favicon.ico" type="image/x-icon"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Get better with your tennis game with the advice of experienced coaches." />

    <meta name="google" content="nositelinkssearchbox" />
    <meta itemprop="name" content="Valify Launch">
    <meta itemprop="image" content="/public/img/logo.png">

    <meta name="twitter:site" content="@Valifyit">
    <meta name="twitter:title" content="Valify Launch">
    <meta name="twitter:description" content="Get better with your tennis game with the advice of experienced coaches.">
    <meta name="twitter:creator" content="@Valifyit">

    <meta property="og:url" content="https://valifyit.com">
    <meta property="og:title" content="Valify Launch">
    <meta property="og:image" content="https://launch.valifyit.com/public/img/logo-Valifylaunch-og.png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:description" content="Get better with your tennis game with the advice of experienced coaches.">
    <meta property="og:site_name" content="Valify Launch">
    <meta property="og:locale" content="en_US">
    <meta property="article:author" content="">
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



  <script src="https://cdnjs.cloudflare.com/ajax/libs/webshim/1.16.0/minified/polyfiller.js"></script> 

    <script> 
        webshim.activeLang('en');
        webshims.polyfill('forms');
        webshims.cfg.no$Switch = true;
    </script>



<!-- Facebook Pixel Code -->
<!--
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '461244287387895'); // Insert your pixel ID here.
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=461244287387895&ev=PageView&noscript=1"
/></noscript>
<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->





</head>

<body>
  <div id="tour_center_target"></div>
<div class='div--full-height'>
   <div id='header'>
<nav id='main_nav' role='main-navigation'>
<div class='container-fluid nav-contents'>
<div class='nav-item logo'>
<a class="brand-logo-light nav-logo-swoosh" href="" target="_top">
<img src="img/navigation/logo-2.png" width="137" height="54"/>
</a>
</div>


<div class='nav-item'>
<a href="#howitworks" rel="relativeanchor">How it works</a>

</div>


<div class='nav-item'>
<a href="#benefits" rel="relativeanchor">Benefits</a>

</div>


<div class='nav-spacer'></div>

<!--
<div class='nav-item nav-item-with-button'>
<a class='btn-signin' target="_top" href="<?php echo BASE_PATH; ?>/startup/login/">Sign In</a>

</div>

<div class='nav-item nav-item-with-button'>
<a class='btn-primary' href='<?php echo BASE_PATH; ?>/startup/signup/' target='_top'>Sign Up</a>
</div>
-->

</div>
</nav>
<nav id='main_nav_mobile'>
<div class='container-fluid nav-contents'>
<div class='nav-item'>
<a class="brand-logo-light nav-logo-swoosh" href="index.html" target="_top">

<img src="img/navigation/logo-2.png" width="137" height="54"/>
</a>
</div>

<div class='nav-spacer'></div>
<div class='nav-item'>
<a data-target='.mobile-nav-list' data-toggle='collapse'>
<i class='fa fa-bars fa-lg'></i>
</a>
</div>
<ul class='mobile-nav-list collapse'>
<li><a href="#howitworks" rel="relativeanchor">How it works</a>
</li>

<li><a href="#benefits" rel="relativeanchor">Benefits</a>
</li>
<!--
<li><a target="_top" href="<?php echo BASE_PATH; ?>/startup/login/">Sign In</a>
</li>

<li>
<a href='<?php echo BASE_PATH; ?>/startup/signup/' target='_top'>Sign Up</a>
</li>
-->

</ul>
</div>
</nav>

</div>
</div>

  <header class="hero">
  
    <div class="wrap">
      <h1 class="title">Start to improve your tennis.</h1>
      <span class="description">
        Get better with your tennis game with the advice of experienced coaches.
      </span>

      


<p>&nbsp;</p>

<div class="subscribe-cta">


<?php if(isset($msg)) echo $msg;  ?>

<div id="form"></div>

<form class="form-signin" method="post" action="#form">

<div data-reactid=".hbspt-forms-0.0:$0">

<div class="hs_email field hs-form-field" data-reactid=".hbspt-forms-0.0:$0.$email"><div class="input" data-reactid=".hbspt-forms-0.0:$0.$email.$email">

<input type="email" name="txtemail" id="txtemail" class="hs-input" required="" placeholder="Your email" value="" oninvalid="this.setCustomValidity('Enter Your Email')" oninput="setCustomValidity('')" required>
</div>

<textarea rows="4" cols="50" name="txtshare" id="txtshare" placeholder="Tell us why you are interested to sign up" oninvalid="this.setCustomValidity('Please share')" oninput="setCustomValidity('')" required></textarea>

</div></div><div class="hs_submit" data-reactid=".hbspt-forms-0.2"><div class="hs-field-desc" style="display:none;" data-reactid=".hbspt-forms-0.2.0"></div><div class="actions" data-reactid=".hbspt-forms-0.2.1">

<input type="submit" value="Sign me up" name="btn-notify" id="btn-notify" class="hs-button primary large" rel="relativeanchor" data-reactid=".hbspt-forms-0.2.1.0"></div>


</div>

 <span class="note">
        We will launch soon. Sign up to be notified when we launch.
      </span>

</form>





    </div>

    
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
        <img src="images/footwork.jpg"/>
      </div>
      <div class="prop-text">
        <h2 class="title">Analyize your game</h2>
        <span class="description">Increase your tennis rating</span>
        <ul>
          <li>See how well you are doing on the court</li>
          <li>Recognize your own fault and avoid unforced errors</li>
          <li>Find out what can you improve to be a stronger player</li>
        </ul>
      </div>
    </div>
    <div class="prop">
      <div class="icon">
         <img src="images/coach.jpg"/>
      </div>
      <div class="prop-text">
        <h2 class="title">Get Connected</h2>
        <span class="description">Reach out to tennis coaches</span>
        <ul>
          <li>Your game will be analyized by tennis coaches</li>
          <li>Each coach will provide you tips and suggestions</li>
          <li>Arrange to meet to discuss your latest spark </li>
        </ul>
      </div>
    </div>
    <div class="prop">
      <div class="icon">
         <img src="images/vectorgraphs/feedback.jpg"/>
      </div>
      <div class="prop-text">
        <h2 class="title">Get Feedback</h2>
        <span class="description">Hear direct from a coach</span>
        <ul>
          <li>Hear and listen to an experienced coach </li>
          <li>Use the tips in your next game and improve your game</li>
          <li>Book a tennis session with a coach</li>
        </ul>
      </div>
    </div>
  </section>
  


<div id="benefits"></div>
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
              <div class="icon-features">
               <img src="img/features/save-money.png"/>
              </div>
              <h2 class="title">Save money</h2>
              <span class="description">
                Private tennis lessons can be expensive per hour. We charge a fraction of all that. 
              </span>
             
  
          </div>
  
          <div class="feature"
              ng-click="vm.toggle(2); $event.stopPropagation();"
              ng-class="{
                  active: vm.activeCard === 2,
                  viewed: vm.viewed[2] === true
              }">
              <div class="icon-features">
               <img src="img/features/coach.png"/>
              </div>
              <h2 class="title">Choose the right coach</h2>
              <span class="description">Coaches with different backgrounds will give you tips and suggestions to improve your tennis. Booking the right coach for you afterwards is optional.</span>
             
              <svg class="close" ng-click="vm.activeCard = null; $event.stopPropagation();" xmlns="http://www.w3.org/2000/svg" viewBox="-1 -1 26 26"><path class="line" d="M.5.5l23 23M23.5.5l-23 23"></path></svg>
  
           
  
          
          </div>
  
          <div class="feature"
              ng-click="vm.toggle(3); $event.stopPropagation();"
              ng-class="{
                  active: vm.activeCard === 3,
                  viewed: vm.viewed[3] === true
              }">
               <div class="icon-features">
               <img src="img/features/partner.png"/>
              </div>
              <h2 class="title">Find tennis partners</h2>
              <span class="description">meet new tennis partners based on your rating and arrange a match.</span>
             
              <svg class="close" ng-click="vm.activeCard = null; $event.stopPropagation();" xmlns="http://www.w3.org/2000/svg" viewBox="-1 -1 26 26"><path class="line" d="M.5.5l23 23M23.5.5l-23 23"></path></svg>
  
        
  
       
          </div>
  
          <div class="feature"
              ng-click="vm.toggle(4); $event.stopPropagation();"
              ng-class="{
                  active: vm.activeCard === 4,
                  viewed: vm.viewed[4] === true
              }">
               <div class="icon-features">
               <img src="img/features/feel-good.png"/>
              </div>
              <h2 class="title">Feel better about yourself</h2>
              <span class="description">by learning and listening from experienced tennis coaches, you can feel more confident one game after another.</span>
             
              <svg class="close" ng-click="vm.activeCard = null; $event.stopPropagation();" xmlns="http://www.w3.org/2000/svg" viewBox="-1 -1 26 26"><path class="line" d="M.5.5l23 23M23.5.5l-23 23"></path></svg>
  
          
  
       
          </div>
  
  
          
  
      </div>
  </section>


  
  
 <div id="howitworks"></div>
  <footer>
   
    <div class="subscribe-cta">
      <h3>How it works</h3>
      <p>Step 1: We will video record you during your matches.</p>
      <p>Step 2: Our editing team will point out your footwork, strokes, volleys etc.</p>
      <p>Step 3: Your video clip will be shared with experienced coaches in our network for private feedback.</p>
      <p>Step 4: Wait for the feedback and suggestions coming in by the coaches.</p>

<p><img src="images/filming.png"/></p>


    </div>
   
  
    <div class="copyright">
      © 2017 Valify. All rights reserved 
    </div>
  
  </footer>
 

<script type="text/javascript" src="js/launch.js"></script></body>
</html>
