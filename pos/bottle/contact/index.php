<?php require_once '../base_path.php'; ?>


<script src="https://use.typekit.net/oos2wfr.js"></script>
<script>try{Typekit.load({ async: false });}catch(e){}</script>
<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8"/>
    <title>Mr.Pao -  Contact us</title>
    <meta name="viewport" content="width=device-width, maximum-scale=1"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <link rel="canonical" href="index.php"/>

    
        <link rel="stylesheet" href="../css/launch-1482254397619.css">
    
    

    <!--[if lt IE 9]>
    
        <script src="http://d25gbwvd82b2e5.cloudfront.net/assets/javascripts/html5shiv.min.js"></script>
    
    <![endif]-->

<script src="../js/application-4b458517a28f0f3fb52cdb61d93011a6.js"></script>


  
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
        
<header id="mainNav" class="navbar">
    <div class="navbar-inner">
        <div class="container-fluid">
            
             <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            
            <a class="brand" href="<?php echo BASE_PATH; ?>">
            
                
                 <img src="<?php echo BASE_PATH; ?>/img/navigation/logo-2.png" width="137" height="54"/>
                

            
            </a>

             <div class="nav-collapse collapse">
                <ul class="nav">
                    
                        <li id="home"><a href="<?php echo BASE_PATH; ?>/login/">Sign in <b class="caret"></b></a></li>
                        <li id="home"><a href="<?php echo BASE_PATH; ?>/signup/">Sign up <b class="caret"></b></a></li>
                    
                    
                    
                </ul>
            </div><!--/.nav-collapse -->
          
        </div><!--/container-->
    </div><!--/navbar-inner-->
</header>
        <section id="contentArea" class="container-fluid">
            <div class="row-fluid">
                <section id="main-content" class="span12">
                    <div class="contentWrapper">
                        
                        
   <div class="col-md-9">
<h1 class="Valify-margin--large--bottom Valify-margin--large--top">


<?php


if(isset($_POST['btn-send']))
{

 

// using SendGrid's PHP Library
// https://github.com/sendgrid/sendgrid-php
// If you are using Composer (recommended)
require '../sendgrid-php/vendor/autoload.php';
// If you are not using Composer
// require("path/to/sendgrid-php/sendgrid-php.php");
$from = new SendGrid\Email("Contact Form Valify", "support@misterpao.com");
$subject = "Contact Form Mr.Pao";
$to = new SendGrid\Email('', 'ald183s@gmail.com');
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
                                                 <td align="left" style="padding: 0 0 5px 25px; font-size: 18px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">
                                                Fullname: '.$_POST['txtfirstname'].' '.$_POST['txtlastname'].'
                                                </td>
                                            </tr>

                                             <tr>
                                                 <td align="left" style="padding: 0 0 5px 25px; font-size: 18px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">
                                                Email: '.$_POST['txtemail'].'
                                                </td>
                                            </tr>

                                               <tr>
                                                 <td align="left" style="padding: 0 0 5px 25px; font-size: 18px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">
                                                Reason: '.$_POST['txtsubject'].'
                                                </td>
                                            </tr>


                                              <tr>
                                                 <td align="left" style="padding: 0 0 5px 25px; font-size: 18px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">
                                                Message:
                                                </td>
                                            </tr>

                                             <tr>
                                                 <td align="left" style="padding: 0 0 5px 25px; font-size: 18px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">
                                                '.$_POST['details'].'
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
            
echo '<div class="name-field col-md-6">'; 
echo '<div style="background:#eee; font-size:18px; width:auto; text-align:center; padding:5px;">';
echo "Thank you for reaching to us. We'll get back to you shortly";       
echo '</div>';
echo '</div>'; 
     
   
  }


?>




<p><h2>GET IN TOUCH WITH US</h2></p>
<form id="contactForm" method="post">

  <input type="hidden" name="passwordpass" id="passwordpass"/>

    <div class="name-field col-md-6">
      <div class="form-group">
    <input type="text" name="txtfirstname" id="txtfirstname" class="txtfirstname" placeholder="First Name *" oninvalid="this.setCustomValidity('Enter Your First Name')" oninput="setCustomValidity('')" required/>
    </div>
  </div>
    
    <div class="name-field col-md-6">
      <div class="form-group">
    <input type="text" name="txtlastname" id="txtlastname" class="txtlastname" placeholder="Last Name *" oninvalid="this.setCustomValidity('Enter Your Last Name')" oninput="setCustomValidity('')" required/>
    </div>
   </div>
    
   
    <div class="name-field col-md-6">
      <div class="form-group">
    <input type="email" name="txtemail" id="txtemail" placeholder="Email Address *" oninvalid="this.setCustomValidity('Enter a valid Email Address')" oninput="setCustomValidity('')" required/>
    </div>
  </div>


   <div class="name-field col-md-6">
      <div class="form-group">
      <select id="txtsubject" name="txtsubject" style="width:306px" required/>
      <option value="">Select a reason</option>
      <option value="General Inquiry">General Inquiry</option>
      <option value="Technical Support">Technical Support</option>
      <option value="Request a Bug">Report a Bug</option>
      <option value="Request a Feature">Request a Feature</option>

      </select>
  
    </div>
  </div>
    
    <div class="name-field col-md-6">
      <div class="form-group">
   <textarea name="details" id="details" placeholder="Message"></textarea>

   </div>
    </div>
  
    <button type="submit" name="btn-send" id="btn-send">SEND</button>
   
</form>



</div>

        
    

                    </div><!--/contentWrapper-->
                    
                </section><!--/content-->
               
            </div><!--/row-->
            <footer>
                

<p>&copy; 2017 Paotastik, LLC
    
    
        
    
</p>
            </footer>
        </section><!--/.fluid-container-->
        

        
        


        

    </body>
</html>