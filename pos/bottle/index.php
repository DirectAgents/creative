<?php 

session_start();

require_once 'base_path.php'; 


include_once("config.php");


if(isset($_GET['id'])){

if($_GET['id'] == '1'){ 
$_SESSION['source'] = 'craigslist';
}

if($_GET['id'] == '2'){ 
$_SESSION['source'] = 'twitter';
}

}else{
$_SESSION['source'] = 'no';
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

    $insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_signups(userEmail,share,source, Date) VALUES('".$email."','".$share."', '".$_SESSION['source']."', '".$date."')");
      
      

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
         
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Valifys - Update</title>
    
  <style type="text/css">
    .ReadMsgBody{
      width:100%;
      background-color:#f7f4f4;
    }
    .ExternalClass{
      width:100%;
      background-color:#f7f4f4;
    }
    body{
      width:100%;
      background-color:#f7f4f4;
      margin:0;
      padding:0;
      -webkit-font-smoothing:antialiased;
      font-family:Georgia,Times,serif;
    }
    table{
      border-collapse:collapse;
    }
  @media only screen and (max-width: 640px){
    body[yahoo] .deviceWidth{
      width:440px !important;
      padding:0;
    }

} @media only screen and (max-width: 640px){
    body[yahoo] .center{
      text-align:center !important;
    }

} @media only screen and (max-width: 479px){
    body[yahoo] .deviceWidth{
      width:320px !important;
      padding:0;
    }

} @media only screen and (max-width: 479px){
    body[yahoo] .center{
      text-align:center !important;
    }

}</style></head>
  <body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" yahoo="fix" style="font-family: Georgia, Times, serif">
    <!-- Wrapper -->
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
      <tr>
        <td width="100%" valign="top" bgcolor="#f7f4f4" style="padding-top:20px;">
          
          <!-- Start Header-->
          <table width="580" border="0" cellpadding="0" cellspacing="0" align="center" class="deviceWidth">
            <tr>
              <td width="100%">
                <!-- Logo -->
                <table border="0" cellpadding="0" cellspacing="0" align="center" class="deviceWidth">
                  <tr>
                    <td style="padding:10px 20px;" class="center">
                      <a href="#"><img src="http://www.valifyit.com/mailchimp/email-template-1/logo.png" alt="" border="0"></a>
                    </td>
                  </tr>
                </table>
                <!-- End Logo -->
                <!-- Nav -->
                <!-- End Nav -->
              </td>
            </tr>
          </table>
          <!-- End Header -->
          <!-- One Column -->
          <table width="580" class="deviceWidth" border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#eeeeed">
            <tr>
              <td valign="top" style="padding:0;" bgcolor="#ffffff">
                <a href="#"><img class="deviceWidth" src="http://www.valifyit.com/mailchimp/email-template-1/headliner.jpg" alt="" border="0" style="display: block;"></a>
              </td>
            </tr>
            <tr>
              <td style="font-size:13px;color:#959595;font-weight:normal;text-align:left;font-family:Verdana, Geneva, sans-serif;line-height:24px;vertical-align:top;padding:10px 15px 10px 15px;" bgcolor="#ffffff">
                <div style="color:#384142;">
                  <h1>Hello everyone!</h1>
                  
                  We are in the process to create and built our first prototype for our product
                  <br>
                  <br>
                  <h2>We are excited</h2>
                  We can\'t wait to send you weekly updates about our progress and we are looking forward to receive great feedback from our users.<br>
                  <br>
                  <h2>We launch in November 2017</h2>
                  Yes, we will launch in just couple months. We will offer your a platform to sign up and create your profile and get you started to earn cash back by just recycling.<br>
                  <br>
                  Thank you,<br>
                  Valify Team</div>
                </td>
              </tr>
            </table>
            <!-- End One Column -->
            <!-- Dark Background, Three Column Images -->
            <!-- 3 Small Images -->
            <!-- End 3 Small Images -->
            <!-- Dark Background, Three Column Images -->
            <!-- 2 Column Images - text left -->
            <!-- End 2 Column Images  - text left -->
            <!-- Blog Headlines -->
            <!-- end blog headlines -->
            <div style="height:35px;"> </div>
            <!-- spacer -->
            <!-- 4 Columns -->
            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
              <tr>
                <td bgcolor="#f7f4f4" style="padding:30px 0;">
                  <table width="580" border="0" cellpadding="0" cellspacing="0" align="center" class="deviceWidth">
                    <tr>
                      <td><table width="40%" cellpadding="0" cellspacing="0" border="0" align="center" class="deviceWidth">
                        <tr>
                            <td valign="top" style="font-size:11px;color:#f1f1f1;font-weight:normal;font-family:Georgia, Times, serif;line-height:26px;vertical-align:top;text-align:center;" class="center">
                              
                              
                              <a href="#"><img src="http://www.valifyit.com/mailchimp/email-template-1/footer_logo2.png" alt="" border="0" style="padding-top: 5px;"></a>
                              <br><a href="#" style="text-decoration:none;color:#848484;font-weight:normal;">347-719-0193</a>
                              <br><a href="#" style="text-decoration:none;color:#848484;font-weight:normal;">contact@valifyit.com</a>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
            <!-- End 4 Columns -->
          </td>
        </tr>
      </table>
      <!-- End Wrapper -->
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
    <meta name="description" content="Recycle and get rewarded in cash" />

    <meta name="google" content="nositelinkssearchbox" />
    <meta itemprop="name" content="Valify Launch">
    <meta itemprop="image" content="/public/img/logo.png">

    <meta name="twitter:site" content="@Valifyit">
    <meta name="twitter:title" content="Valify Launch">
    <meta name="twitter:description" content="Recycle and get rewarded in cash">
    <meta name="twitter:creator" content="@Valifyit">

    <meta property="og:url" content="https://valifyit.com">
    <meta property="og:title" content="Valify Launch">
    <meta property="og:image" content="https://launch.valifyit.com/public/img/logo-Valifylaunch-og.png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:description" content="Recycle and get rewarded in cash">
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

<div class='nav-item'>
<a href="#facts" rel="relativeanchor">Facts</a>

</div>


<div class='nav-spacer'></div>


<div class='nav-item nav-item-with-button'>
<a class='btn-signin' target="_top" href="<?php echo BASE_PATH; ?>/login/">Sign In</a>

</div>

<div class='nav-item nav-item-with-button'>
<a class='btn-primary' href='<?php echo BASE_PATH; ?>/signup/' target='_top'>Sign Up</a>
</div>


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
      <h1 class="title">Let us pick up your recycle and get paid</h1>
      <span class="description">
         We do the hard work for you
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
        We will launch in November. Sign up to be notified when we launch.
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
        <img src="images/recycle-bottles.jpg"/>
      </div>
      <div class="prop-text">
        <h2 class="title">Recycle your bottles</h2>
        <span class="description">Recycle and feel good about it</span>
        <ul>
          <li>Recycle your bottles and cans and reduce landfills</li>
          <li>Save trees</li>
          <li>Create jobs</li>
        </ul>
      </div>
    </div>
    <div class="prop">
      <div class="icon">
         <img src="images/reverse-vending-machine.jpg"/>
      </div>
      <div class="prop-text">
        <h2 class="title">Get paid by these vending machines</h2>
        <span class="description">Make some extra cash</span>
        <ul>
          <li>Vending machines may be far located from where you live</li>
          <li>Let us pick your bottles and cash them out for you</li>
          <li>We do the hard work for you and make you money</li>
        </ul>
      </div>
    </div>
    <div class="prop">
      <div class="icon">
         <img src="images/restaurants.jpg"/>
      </div>
      <div class="prop-text">
        <h2 class="title">Restaurants</h2>
        <span class="description">Eat out and get rewarded</span>
        <ul>
          <li>Our participant restaurants will reward you when you recycle </li>
          <li>Feel good when you eat out</li>
          <li>Receive special deals from your local restaurants</li>
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
              <h2 class="title">Earn extra cash</h2>
              <span class="description">
                For each recycled bottle you will earn cash back.
              </span>
             
  
          </div>
  
          <div class="feature"
              ng-click="vm.toggle(2); $event.stopPropagation();"
              ng-class="{
                  active: vm.activeCard === 2,
                  viewed: vm.viewed[2] === true
              }">
              <div class="icon-features">
               <img src="img/features/convenient.png"/>
              </div>
              <h2 class="title">It's convenient</h2>
              <span class="description">We will do the hard work for you.</span>
             
              <svg class="close" ng-click="vm.activeCard = null; $event.stopPropagation();" xmlns="http://www.w3.org/2000/svg" viewBox="-1 -1 26 26"><path class="line" d="M.5.5l23 23M23.5.5l-23 23"></path></svg>
  
           
  
          
          </div>
  
          <div class="feature"
              ng-click="vm.toggle(3); $event.stopPropagation();"
              ng-class="{
                  active: vm.activeCard === 3,
                  viewed: vm.viewed[3] === true
              }">
               <div class="icon-features">
               <img src="img/features/earth.png"/>
              </div>
              <h2 class="title">Keep environment clean</h2>
              <span class="description">Each bottle you recycle helps the environment</span>
             
              <svg class="close" ng-click="vm.activeCard = null; $event.stopPropagation();" xmlns="http://www.w3.org/2000/svg" viewBox="-1 -1 26 26"><path class="line" d="M.5.5l23 23M23.5.5l-23 23"></path></svg>
  
        
  
       
          </div>
  
          <div class="feature"
              ng-click="vm.toggle(4); $event.stopPropagation();"
              ng-class="{
                  active: vm.activeCard === 4,
                  viewed: vm.viewed[4] === true
              }">
               <div class="icon-features">
               <img src="img/features/restaurant.png"/>
              </div>
              <h2 class="title">Get rewarded from your favorite restaurants</h2>
              <span class="description">Recycleable bottles from your local restaurants will be collected and credited to your account.</span>
             
              <svg class="close" ng-click="vm.activeCard = null; $event.stopPropagation();" xmlns="http://www.w3.org/2000/svg" viewBox="-1 -1 26 26"><path class="line" d="M.5.5l23 23M23.5.5l-23 23"></path></svg>
  
          
  
       
          </div>
  
  
          
  
      </div>
  </section>






  <div id="facts"></div>
  <section class="features" style="background:#fff"
      ng-click="vm.toggle()"
      ng-class="{active: vm.cards}">
  
      <h2 class="title">Facts</h2>

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
              <h2 class="title">Not convenient or accessible</h2>
              <span class="description">
               25% of americanc don't recylce because of invonvience and lack of easy access to recycle bins or centers
              </span>
             
  
          </div>
  
          <div class="feature"
              ng-click="vm.toggle(2); $event.stopPropagation();"
              ng-class="{
                  active: vm.activeCard === 2,
                  viewed: vm.viewed[2] === true
              }">
              <div class="icon-features">
               <img src="img/features/time.png"/>
              </div>
              <h2 class="title">It takes up too much time</h2>
              <span class="description">It is not convenient for everyone to travel to the next reverse vending machine to recyle bottles and cans</span>
             
              <svg class="close" ng-click="vm.activeCard = null; $event.stopPropagation();" xmlns="http://www.w3.org/2000/svg" viewBox="-1 -1 26 26"><path class="line" d="M.5.5l23 23M23.5.5l-23 23"></path></svg>
  
           
  
          
          </div>


      <div class="feature"
              ng-click="vm.toggle(2); $event.stopPropagation();"
              ng-class="{
                  active: vm.activeCard === 2,
                  viewed: vm.viewed[2] === true
              }">
              <div class="icon-features">
               <img src="img/features/forget.png"/>
              </div>
              <h2 class="title">Forget</h2>
              <span class="description">You forget to recycle your bottles and cans and put them into one trash bin.</span>
             
              <svg class="close" ng-click="vm.activeCard = null; $event.stopPropagation();" xmlns="http://www.w3.org/2000/svg" viewBox="-1 -1 26 26"><path class="line" d="M.5.5l23 23M23.5.5l-23 23"></path></svg>
  
           
  
          
          </div>


           <div class="feature"
              ng-click="vm.toggle(2); $event.stopPropagation();"
              ng-class="{
                  active: vm.activeCard === 2,
                  viewed: vm.viewed[2] === true
              }">
              <div class="icon-features">
               <img src="img/features/lazy.png"/>
              </div>
              <h2 class="title">Being Lazy</h2>
              <span class="description">People are not willing to walk to the next vending machine to receive $0.05 for each bottle</span>
             
              <svg class="close" ng-click="vm.activeCard = null; $event.stopPropagation();" xmlns="http://www.w3.org/2000/svg" viewBox="-1 -1 26 26"><path class="line" d="M.5.5l23 23M23.5.5l-23 23"></path></svg>
  
           
  
          
          </div>
  
         
  
        
  
  
          
  
      </div>
  </section>


  



 <div id="howitworks"></div>
  <section class="value">
   <h2 class="title">How it works</h2>
    <div class="prop">
     
      <div class="prop-text-how-it-works">
        <h2 class="title">Step 1</h2>
        <span class="description">Create a free account</span>
       <img src="images/create-account.jpg"/>
       </div>
        <div class="prop-text-how-it-works">
        <h2 class="title">Step 2</h2>
        <span class="description">We send you bags to use for recycle</span>
       <img src="images/trash-bags.jpg"/>
      </div>
      <div class="prop-text-how-it-works">
        <h2 class="title">Step 3</h2>
        <span class="description">Recycle your bottles into trash bags</span>
       <img src="images/recycle-bottles.jpg"/>
      </div>

       <div class="prop-text-how-it-works">
        <p>&nbsp;</p> <p>&nbsp;</p>
        <h2 class="title">Step 4</h2>
        <span class="description">Schedule time and day for pick-up</span>
       <img src="images/schedule-time-for-pick-up.jpg"/>
      </div>
       <div class="prop-text-how-it-works">
        <p>&nbsp;</p> <p>&nbsp;</p>
        <h2 class="title">Step 5</h2>
        <span class="description">Earn money</span>
       <img src="images/money.jpg"/>
      </div>
    </div>
    
   
  </section>







  <footer>
   
 
   
  
   <div class="copyright">
      © 2017 Valify. All rights reserved  |  <a href="#">Terms of Service</a>  |  <a href="#">Privacy</a>  |  <a href="<?php echo BASE_PATH; ?>/faq/">FAQ</a>  |  <a href="#">About</a>  |  <a href="#">Contact us</a> 
    </div>
  
  </footer>
 

<script type="text/javascript" src="js/launch.js"></script></body>
</html>
