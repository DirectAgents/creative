<?php


session_start();
require_once '../../../class.customer.php';
include_once("../../../config.php");

//require( "phpmailer/class.phpmailer.php" );

$ip = $_SERVER['REMOTE_ADDR'];






if($_POST)
{


$sql5 = mysqli_query($connecDB,"SELECT * FROM tbl_customer WHERE userID='".$_SESSION['customerSession']."'");
$row5 = mysqli_fetch_array($sql5);



if(isset($_POST['date_option2'])){$date_option2 = $_POST['date_option2'];}else{$date_option2 = '';}
if(isset($_POST['time_option2'])){$time_option2 = $_POST['time_option2'];}else{$time_option2 = '';}
if(isset($_POST['date_option3'])){$date_option3 = $_POST['date_option3'];}else{$date_option3 = '';}
if(isset($_POST['time_option3'])){$time_option3 = $_POST['time_option3'];}else{$time_option3 = '';}


//$all_game_value = implode(",",$_POST['testing']);





$insert_sql = mysqli_query($connecDB,"INSERT INTO tbl_pickup_request(userID, Schedule_Date_Option1, Schedule_Time_Option1, Schedule_Date_Option2, Schedule_Time_Option2, Schedule_Date_Option3, Schedule_Time_Option3) 
VALUES('".$_SESSION['customerSession']."','".$_POST['date_option1']."', '".$_POST['time_option1']."', '".$date_option2."', 
'".$time_option2."', '".$date_option3."', '".$time_option3."')");


  
$date_option_one = $_POST['date_option1'];

if($_POST['date_option2'] != NULL && $_POST['time_option2'] != NULL){

$date_option_two = date('F j, Y',strtotime($_POST['date_option2'])).' @ '.$_POST['time_option2'];

}else{
$date_option_two = '';	
}

if($_POST['date_option3'] != NULL && $_POST['time_option3'] != NULL){

$date_option_three = date('F j, Y',strtotime($_POST['date_option3'])).' @ '.$_POST['time_option3'];

}else{
$date_option_three = '';	
}





// using SendGrid's PHP Library
// https://github.com/sendgrid/sendgrid-php
// If you are using Composer (recommended)
require '../../../sendgrid-php/vendor/autoload.php';
// If you are not using Composer
// require("path/to/sendgrid-php/sendgrid-php.php");
$from = new SendGrid\Email("Request for Pick up", 'support@valifyit.com');
$subject = "Request for Pick up";
$to = new SendGrid\Email($row5['FirstName'], $row5['userEmail']);
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
                        <a href="http://valifyit.com/" target="_blank">
                            <img alt="Logo" src="http://valifyit.com/images/email/email-logo-large.png" width="132" height="48" style="display: block; font-family: Helvetica, Arial, sans-serif; color: #ffffff; font-size: 16px;" border="0">
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
                            <tbody><tr>
                                <td align="center" valign="top" style="font-size:0;">
                                    <!--[if (gte mso 9)|(IE)]>
                                    <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
                                    <tr>
                                    <td align="left" valign="top" width="115">
                                    <![endif]-->
                                    <div style="display:inline-block; margin: 0 -2px; max-width:115px; vertical-align:top; width:100%;">

                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="115">
                                            <tbody><tr>
                                                <td valign="top" style="padding: 40px 0 0 0;" class="mobile-hide"><a href="http://valifyit.com/" target="_blank"><img src="http://valifyit.com/images/email/calendar.jpg" alt="when" width="60" height="55" border="0" style="display: block; font-family: Arial; color: #666666; font-size: 14px; width: 60px; height:55px;"></a></td>
                                            </tr>
                                        </tbody></table>
                                    </div>
                                    <!--[if (gte mso 9)|(IE)]>
                                    </td>
                                    <td align="left" valign="top" width="385">
                                    <![endif]-->
                                    <div style="display:inline-block; margin: 0 -2px; max-width:385px; vertical-align:top; width:100%;">

                                         <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tbody><tr>

                                                <td style="padding: 40px 0 0 0;" class="no-padding">
                                                    <!-- ARTICLE -->
                                                    <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                                        <tbody>
                                                        <tr>
                                                            <td align="left" style="padding: 0 0 5px 25px; font-size: 18px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">Pick-Up Dates Requested</td>
                                                        </tr>

                                                         <tr>
                                                            <td align="left" style="padding: 0 0 5px 25px; font-size: 18px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">&nbsp;</td>
                                                        </tr>

                                                        <tr>
                                                            <td align="left" style="padding: 0 0 5px 25px; font-size: 18px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">'.date('F j, Y',strtotime($date_option_one)).' @ '.$_POST['time_option1'].'</td>

                                                        </tr>
                                                        <tr>
                                                            <td align="left" style="padding: 0 0 5px 25px; font-size: 18px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">'.$date_option_two.'</td>
                                                        </tr>

                                                         <tr>
                                                            <td align="left" style="padding: 0 0 5px 25px; font-size: 18px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">'.$date_option_three.'</td>
                                                        </tr>
                                                      

                                                    </tbody></table>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </div>
                                    <!--[if (gte mso 9)|(IE)]>
                                    </td>
                                    </tr>
                                    </table>
                                    <![endif]-->
                                </td>
                            </tr>
                        </tbody></table>
                        
                        
                        
                        
                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600;">
                            <tbody><tr>
                                <td align="center" valign="top" style="font-size:0;">
                                    <!--[if (gte mso 9)|(IE)]>
                                    <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
                                    <tr>
                                    <td align="left" valign="top" width="115">
                                    <![endif]-->
                                    <div style="display:inline-block; margin: 0 -2px; max-width:115px; vertical-align:top; width:100%;">

                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="115">
                                            <tbody><tr>
                                                <td valign="top" style="padding: 40px 0 0 0;" class="mobile-hide"><a href="http://valifyit.com/" target="_blank"><img src="http://valifyit.com/images/email/location.jpg" alt="where" width="60" height="55" border="0" style="display: block; font-family: Arial; color: #666666; font-size: 14px; width: 60px; height:55px;"></a></td>
                                            </tr>
                                        </tbody></table>
                                    </div>
                                    <!--[if (gte mso 9)|(IE)]>
                                    </td>
                                    <td align="left" valign="top" width="385">
                                    <![endif]-->
                                    <div style="display:inline-block; margin: 0 -2px; max-width:385px; vertical-align:top; width:100%;">

                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tbody><tr>

                                                <td style="padding: 40px 0 0 0;" class="no-padding">
                                                    <!-- ARTICLE -->
                                                    <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                                        <tbody>
                                                        <tr>
                                                            <td align="left" style="padding: 0 0 5px 25px; font-size: 18px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">'.$row5['Address'].'</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" style="padding: 0 0 5px 25px; font-size: 18px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">'.$row5['Zip'].' '.$row5['State'].', '.$row5['City'].'</td>
                                                        </tr>
                                                       

                                                        
                                                      

                                                    </tbody></table>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </div>
                                    <!--[if (gte mso 9)|(IE)]>
                                    </td>
                                    </tr>
                                    </table>
                                    <![endif]-->
                                </td>
                            </tr>
                
                          

                        </tbody></table>










                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600;">
                            <tbody>

 <tr>
                               
                    <td align="center" style="padding: 20px; font-size: 22px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #666;" class="padding" colspan="2">
    
                    </td>
                </tr>

                             <tr>
                               
                    <td align="left" style="padding: 20px; font-size: 22px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #666;" class="padding" colspan="2">
	What to do next?
                    </td>
                </tr>


                <tr>
                               
                    <td align="left" style="padding: 20px; font-size: 18px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #000;" class="padding" colspan="2">
	We will send you a confirmation by email once we can confirm the pick up date and time requested by you.
                    </td>
                </tr>


                        </tbody></table>






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
                        <a href="http://valifyit.com/terms/" target="_blank" style="color: #666666; text-decoration: none;">Terms of Service</a> | <a href="http://valifyit.com/privacy/" target="_blank" style="color: #666666; text-decoration: none;">Privacy</a>  | <a href="http://valifyit.com/faq/" target="_blank" style="color: #666666; text-decoration: none;">FAQ</a> </td>
                       
                        
 
                   
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


$output = json_encode(array('status' => 'success','text'=> '<div class="success">Successfully Pick Up Requested!</div>'));
die($output);



}


?>