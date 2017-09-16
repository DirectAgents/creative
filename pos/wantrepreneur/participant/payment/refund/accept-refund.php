<?php


session_start();
require_once '../../../base_path.php';

include("../../../config.php"); //include config file
include("../../../config.inc.php");
require_once '../../../class.startup.php';
require_once '../../../class.participant.php';




date_default_timezone_set('America/New_York');


$startup_home = new STARTUP();

if($startup_home->is_logged_in())
{
  $startup_home->logout();
}





$participant_home  = new PARTICIPANT();

if(!$participant_home ->is_logged_in())
{
  $participant_home ->redirect('../login');
}




$stmt = $participant_home->runQuery("SELECT * FROM tbl_participant WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['participantSession']));
$row_participant = $stmt->fetch(PDO::FETCH_ASSOC);


$wepay = mysqli_query($connecDB,"SELECT * FROM wepay WHERE id = '".$_GET['id']."'");
$rowwepay = mysqli_fetch_array($wepay);


$startup = mysqli_query($connecDB,"SELECT * FROM tbl_startup WHERE userID = '".$rowwepay['startup_id']."'");
$rowstartup = mysqli_fetch_array($startup);

/*
$stmtparticipant="SELECT * FROM tbl_participant WHERE userID='".$_GET['participantid']."' ";
$resultparticipant=mysql_query($stmtparticipant);
$rowparticipant=mysql_fetch_array($resultparticipant);
*/



 // WePay PHP SDK - http://git.io/mY7iQQ
    require '../../../wepay.php';

    // application settings
    $account_id = $row_participant['account_id']; // participant's account_id
    $client_id = $wepay_client_id;
    $client_secret = $wepay_client_secret;
    $access_token = $row_participant['access_token']; // participant's access_token

    // change to useProduction for live environments
    Wepay::useStaging($client_id, $client_secret);

    $wepay = new WePay($access_token);

    // create the checkout
     // create the checkout
    try {
    $response = $wepay->request('/checkout/refund', array(
        'checkout_id'        => $rowwepay['checkout_id'],
        'refund_reason'      => $rowwepay['refundreason']
     )
    );
} catch (WePayException $e) { // if the API call returns an error, get the error message for display later
    $error = $e->getMessage();
}

    // display the response
    //print_r($response);

if (isset($error)){
    
    //header("Location:http://localhost/creative/pos/survey/startup/payment/?error=".htmlspecialchars($error)."#credit-card");

 echo '<div class="response">';
   //print_r ($response);
 	echo '<div class="errorXYZ">';
   		//echo htmlspecialchars($error);
 	if(htmlspecialchars($error) =='Checkout object must be in state captured. Currently it is in state refunded'){
 		echo "Refund is already accepted.";
 	}else{
 		//echo htmlspecialchars($error);
 		echo "Sorry. Something went wrong";
 	}
 	echo "</div>";   
 echo "</div>";   

    }else{


 echo '<div class="response">';
   //print_r ($response);
  echo '<div class="success2">';
   echo 'Refund Accepted!';
  echo "</div>";	  
 echo "</div>";   	


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
$from = new SendGrid\Email("Refund Request Accepted", "support@valifyit.com");
$subject = "Refund Request Accepted";
$to = new SendGrid\Email($rowstartup['FirstName'], $rowstartup['userEmail']);
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
                                                '.$rowstartup['FirstName'].' '.$rowstartup['LastName'].' accepted your refund request of $'.$final_amount.'
                                                
                                                </td>
                                            </tr>

                                             <tr>
                                                 <td align="left" style="padding: 0 0 5px 25px;font-size: 16px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">&nbsp;
                                                
                                                </td>
                                            </tr>

                                            <tr>
                                                 <td align="left" style="padding: 0 0 5px 25px;font-size: 14px; font-family: Helvetica, Arial, sans-serif; font-weight: bold; color: #333333;" class="padding">
                                                You will receive your money within 2-3 business days
                                                
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


$update_sql = mysqli_query($connecDB,"UPDATE wepay SET 
  refundrequest='',
  refunded='yes'

  WHERE id='".$_GET['id']."'");














  ?>










