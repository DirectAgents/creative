<?php


session_start();
require_once '../../../base_path.php';

include("../../../config.php"); //include config file
include("../../..//config.inc.php");
require_once '../../../class.startup.php';
require_once '../../../class.participant.php';




date_default_timezone_set('America/New_York');


$startup_home = new STARTUP();

if(!$startup_home->is_logged_in())
{
  $startup_home->redirect('../../login');
}

$stmt = $startup_home->runQuery("SELECT * FROM tbl_startup WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['startupSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);


$wepay = mysqli_query($connecDB,"SELECT * FROM wepay WHERE id = '".$_GET['id']."'");
$rowwepay = mysqli_fetch_array($wepay);


$project = mysqli_query($connecDB,"SELECT * FROM tbl_startup_project WHERE ProjectID = '".$rowwepay['ProjectID']."'");
$rowproject = mysqli_fetch_array($project);


$participant = mysqli_query($connecDB,"SELECT * FROM tbl_participant WHERE userID = '".$rowwepay['participant_id']."'");
$rowparticipant = mysqli_fetch_array($participant);


if($rowwepay['refundrequest'] != 'yes'){

/*
$stmtparticipant="SELECT * FROM tbl_participant WHERE userID='".$_GET['participantid']."' ";
$resultparticipant=mysql_query($stmtparticipant);
$rowparticipant=mysql_fetch_array($resultparticipant);
*/



$update_sql = mysqli_query($connecDB,"UPDATE wepay SET 
  refundrequest='yes',
  refundreason= '".$_GET['refundreason']."'

  WHERE id='".$_GET['id']."'");








?>





<!DOCTYPE html>
<html>
<head>
<title>A Responsive Email Template</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<style type="text/css">
    /* CLIENT-SPECIFIC STYLES */
    body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;} /* Prevent WebKit and Windows mobile changing default text sizes */
    table, td{mso-table-lspace: 0pt; mso-table-rspace: 0pt;} /* Remove spacing between tables in Outlook 2007 and up */
    img{-ms-interpolation-mode: bicubic;} /* Allow smoother rendering of resized image in Internet Explorer */

    /* RESET STYLES */
    img{border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;}
    table{border-collapse: collapse !important;}
    body{height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important;}

    /* iOS BLUE LINKS */
    a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
    }

    /* MOBILE STYLES */
    @media screen and (max-width: 525px) {

        /* ALLOWS FOR FLUID TABLES */
        .wrapper {
          width: 100% !important;
            max-width: 100% !important;
        }

        /* ADJUSTS LAYOUT OF LOGO IMAGE */
        .logo img {
          margin: 0 auto !important;
        }

        /* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
        .mobile-hide {
          display: none !important;
        }

        .img-max {
          max-width: 100% !important;
          width: 100% !important;
          height: auto !important;
        }

        /* FULL-WIDTH TABLES */
        .responsive-table {
          width: 100% !important;
        }

        /* UTILITY CLASSES FOR ADJUSTING PADDING ON MOBILE */
        .padding {
          padding: 10px 5% 15px 5% !important;
        }

        .padding-meta {
          padding: 30px 5% 0px 5% !important;
          text-align: center;
        }

        .no-padding {
          padding: 0 !important;
        }

        .section-padding {
          padding: 50px 15px 50px 15px !important;
        }

        /* ADJUST BUTTONS ON MOBILE */
        .mobile-button-container {
            margin: 0 auto;
            width: 100% !important;
        }

        .mobile-button {
            padding: 15px !important;
            border: 0 !important;
            font-size: 16px !important;
            display: block !important;
        }

    }

    /* ANDROID CENTER FIX */
    div[style*="margin: 16px 0;"] { margin: 0 !important; }
</style>
</head>

<body>

<?php



if (strpos($rowwepay['checkout_find_amount'], '.') == false) {
    $final_amount =  $rowwepay['checkout_find_amount'].'.00';
}else{
    $final_amount =  $rowwepay['checkout_find_amount'];
}





// using SendGrid's PHP Library
// https://github.com/sendgrid/sendgrid-php
// If you are using Composer (recommended)
require '../../../sendgrid-php/vendor/autoload.php';
// If you are not using Composer
// require("path/to/sendgrid-php/sendgrid-php.php");
$from = new SendGrid\Email("Refund Request", "support@valifyit.com");
$subject = "Refund Request";
$to = new SendGrid\Email($rowparticipant['FirstName'], $rowparticipant['userEmail']);
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
                                                 <td align="left" style="padding: 0 0 5px 25px;font-size: 16px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">
                                                '.$row['FirstName'].' '.$row['LastName'].' is requesting a refund of $'.$final_amount.'
                                                
                                                </td>
                                            </tr>

                                             <tr>
                                                 <td align="left" style="padding: 0 0 5px 25px;font-size: 16px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">&nbsp;
                                                
                                                </td>
                                            </tr>

                                            <tr>
                                                 <td align="left" style="padding: 0 0 5px 25px;font-size: 14px; font-family: Helvetica, Arial, sans-serif; font-weight: bold; color: #333333;" class="padding">
                                                Refund Reason:
                                                
                                                </td>
                                            </tr>

                                             <tr>
                                                 <td align="left" style="padding: 0 0 5px 25px;font-size: 14px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">
                                                '.$rowwepay['refundreason'].'
                                                
                                                </td>
                                            </tr>

                                             <tr>
                                                 <td align="left" style="padding: 0 0 5px 25px;font-size: 14px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">
                                               &nbsp;
                                                
                                                </td>
                                            </tr>

                                             <tr>
                                                 <td align="left" style="padding: 0 0 5px 25px;font-size: 14px; font-family: Helvetica, Arial, sans-serif; font-weight: bold; color: #333333;" class="padding">
                                                You met with '.$row['FirstName'].' to provide feedback about this idea: 
                                                
                                                </td>
                                            </tr>

                                             <tr>
                                                 <td align="left" style="padding: 0 0 5px 25px;font-size: 14px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">
                                              &nbsp;
                                                
                                                </td>
                                            </tr>

                                            <tr>
                                                 <td align="left" style="padding: 0 0 5px 25px;font-size: 14px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">
                   <a href="'.BASE_PATH.'/ideas/p/'.$rowproject['Category'].'/?id='.$rowproject['ProjectID'].'">'.$rowproject['Name'].'</a>
                                                
                                                </td>
                                            </tr>

                                              <tr>
                                                 <td align="left" style="padding: 0 0 5px 25px;font-size: 14px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">
                                              &nbsp;
                                                
                                                </td>
                                            </tr>


                                               <tr>
                               
                    <td align="center" style="padding: 20px; background:#4c71dc; font-size: 25px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #ffffff;" class="padding" colspan="2"><a href="'.BASE_PATH.'/participant/payment/" style="font-weight: normal; color: #ffffff;">Accept Refund Request</a></td>
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


?>


</body>
</html>






<div class="success2">Refund Request Sent!</div>


<?php }else{ ?>



<div class="errorXYZ">Refund Request Already Sent!</div>


<?php } ?>


