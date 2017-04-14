<?php

/**
 * This PHP script helps you do the iframe checkout
 *
 */

require_once '../../../base_path.php';

/**
 * Put your API credentials here:
 * Get these from your API app details screen
 * https://stage.wepay.com/app
 */
session_start();
require_once '../../../class.startup.php';
include_once("../../../config.php");

require '../../../wepay.php';


date_default_timezone_set('America/New_York');


$startup_home = new STARTUP();

if(!$startup_home->is_logged_in())
{
  $startup_home->redirect('../../../startup/login');
}

$stmt = $startup_home->runQuery("SELECT * FROM tbl_startup WHERE userID='".$_SESSION['startupSession']."'");
$stmt->execute(array(":uid"=>$_SESSION['startupSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);


$stmtparticipant=mysqli_query($connecDB,"SELECT * FROM tbl_participant WHERE userID='".$_POST['participantid']."' ");
$rowparticipant=mysqli_fetch_array($stmtparticipant);



//echo $rowparticipant['FirstName'];

//exit();


if($_POST){


$stmtpayment=mysqli_query($connecDB,"SELECT * FROM tbl_meeting_recent WHERE startupID='".$_SESSION['startupSession']."' AND ProjectID = '".$_POST['projectid']."' AND userID = '".$_POST['participantid']."' ");
$rowpayment=mysqli_fetch_array($stmtpayment);



if($rowpayment['Payment'] != 'Yes'){



$stmtproject=mysqli_query($connecDB,"SELECT * FROM tbl_startup_project WHERE startupID='".$_SESSION['startupSession']."' AND ProjectID = '".$_POST['projectid']."' ");
$rowproject=mysqli_fetch_array($stmtproject);





//$fee = ($rowproject['Pay'] + 1) * (2.9 / 100) + 0.30;


///PAYMENT TO PARTICIPANT///

$fee = ($rowproject['Pay']) * (2.9 / 100) + 0.30;

$payamount = $rowproject['Pay'];


function numberFormatPrecision($number, $precision = 2, $separator = '.')
{
    $numberParts = explode($separator, $number);
    $response = $numberParts[0];
    if(count($numberParts)>1){
        $response .= $separator;
        $response .= substr($numberParts[1], 0, $precision);
    }
    return $response;
}


$payamount_to_participant = numberFormatPrecision($payamount, 2, '.');


///////////////////////////////////////////PAYMENT TO PARTICIPANT///////////////////////////////////////////


///If Payout is less than $7 than charge $1.32 for service fee////

if($rowproject['Pay'] <= '7'){

$payment_to_me = 1.00;
$payment_to_me_mysql = 1.32;

}


///If Payout is more than $7 than charge 15% for service fee////

if($rowproject['Pay'] > '7'){

$payment_to_me = $rowproject['Pay'] * 0.15;
$payment_to_me_mysql = $rowproject['Pay'] * 0.15;


}


/* 
$arr = explode('.', $payamount);
$payamount1  = $arr[0];
$payamount2  = $arr[1];

$payamount3 = substr($payamount2, 0, 2);


$payamount_final = $payamount1.'.'.$payamount3;
*/




    // application settings
    $account_id = $rowparticipant['account_id']; // ID of the account that you want the money to go to
    $client_id = $wepay_client_id;
    $client_secret = $wepay_client_secret;
    $access_token = $rowparticipant['access_token']; // Access Token of the account that you want the money to go to
    $access_token_me = $wepay_access_token;

/** 
 * Initialize the WePay SDK object 
 */

Wepay::useStaging($client_id, $client_secret);
$wepay = new WePay($access_token);
$wepay_me = new WePay($access_token_me);

/**
 * Make the API request to get the checkout_uri
 * 
 */
try {
    $checkout = $wepay->request('/checkout/create', array(
            'account_id' => $account_id, // ID of the account that you want the money to go to
            'amount' => $payamount_to_participant, // dollar amount you want to charge the user
            'short_description' => "Payment to ".$rowparticipant['FirstName']." ", // a short description of what the payment is for
            'type' => "service", // the type of the payment - choose from GOODS SERVICE DONATION or PERSONAL
            'currency'          => 'USD',
            //'payment_method' => ['type' => 'credit_card', 'id' => $row["credit_card_id"] 


 

'payment_method' => [ 
'type' => 'credit_card', 
'credit_card'=> [ 
'id'=> $row["credit_card_id"]
]
]
    



           
        )
    );
} catch (WePayException $e) { // if the API call returns an error, get the error message for display later
    $error = $e->getMessage();
}

















if (isset($error)){
    echo htmlspecialchars($error);
    //header("Location:http://localhost/creative/pos/survey/startup/payment/?error=".htmlspecialchars($error)."#credit-card");
    }else{
    

   // display the response
   
//echo '<div id="receipt">';
   //print_r ($checkout);
   //echo "</div>";




//echo $checkout -> create_time;

$timestamp=$checkout -> create_time;
$checkout_find_date = gmdate("F Y", $timestamp);

$month = gmdate("F", $timestamp);

if($month == 'January') {$order_by = '1';}
if($month == 'February') {$order_by = '2';}
if($month == 'March') {$order_by = '3';}
if($month == 'April') {$order_by = '4';}
if($month == 'May') {$order_by = '5';}
if($month == 'June') {$order_by = '6';}
if($month == 'July') {$order_by = '7';}
if($month == 'August') {$order_by = '8';}
if($month == 'September') {$order_by = '9';}
if($month == 'October') {$order_by = '10';}
if($month == 'November') {$order_by = '11';}
if($month == 'December') {$order_by = '12';}







try {
    $my_checkout = $wepay_me->request('/checkout/create', array(
            'account_id' => $wepay_account_id, // ID of my account
            'amount' => $payment_to_me, // dollar amount you want to charge the user
            'short_description' => "Payment from Valify to me", // a short description of what the payment is for
            'type' => "service", // the type of the payment - choose from GOODS SERVICE DONATION or PERSONAL
            'currency'          => 'USD',
            //'payment_method' => ['type' => 'credit_card', 'id' => $row["credit_card_id"] 


 

'payment_method' => [ 
'type' => 'credit_card', 
'credit_card'=> [ 
'id'=> $row["credit_card_id"]
]
]
    



           
        )
    );
} catch (WePayException $e) { // if the API call returns an error, get the error message for display later
    $error = $e->getMessage();
}



$the_date = date('Y-m-d'); 
date_default_timezone_set('America/New_York');
$the_time = date('h:i:s A');


$total = $checkout -> amount + $checkout -> gross + $checkout -> fee-> processing_fee;


//continue here
   $insert_sql = mysqli_query($connecDB,"INSERT INTO wepay(ProjectID, startup_id, participant_id, order_by, account_id, checkout_id,my_checkout_id, checkout_find_date, checkout_find_amount, service_fee, fees, total, Date, Time) VALUES('".$_POST['projectid']."','".$_SESSION['startupSession']."','".$_POST['participantid']."', '".$order_by."' ,'".$checkout -> account_id."', '".$checkout -> checkout_id."','".$my_checkout -> checkout_id."', '".$checkout_find_date."','".$checkout -> amount."', '".$payment_to_me_mysql."',
   '".$checkout -> fee-> processing_fee."', '".$total."','".$the_date."','".$the_time."')");










/*
$insert_sql = mysqli_query($connecDB,"INSERT INTO  tbl_meeting_archived(userID, startupID, ProjectID, Viewed_by_Startup, Viewed_by_Participant, Date_of_Meeting, Final_Time, Location, Payment, Met, Date_Posted, Time_Posted) VALUES('".$rowpayment['userID']."','".$rowpayment['startupID']."',
  '".$rowpayment['ProjectID']."', 'No', 'No', '".$rowpayment['Date_of_Meeting']."', '".$rowpayment['Final_Time']."','".$rowpayment['Location']."','Yes','".$rowpayment['Met']."','".$the_date."','".$the_time."')");
*/

/*$sql=mysqli_query($connecDB,"DELETE FROM tbl_meeting_recent WHERE ProjectID = '".$_POST['projectid']."' AND userID = '".$_POST['participantid']."'");*/


$update_sql = mysqli_query($connecDB,"UPDATE tbl_meeting_recent SET 
  Payment='Yes'

  WHERE ProjectID='".$_POST['projectid']."'");




if (strpos($checkout -> amount, '.') == false) {
    $final_amount =  $checkout -> amount.'.00';
}else{
    $final_amount =  $checkout -> amount;
}



// using SendGrid's PHP Library
// https://github.com/sendgrid/sendgrid-php
// If you are using Composer (recommended)
require '../../../sendgrid-php/vendor/autoload.php';
// If you are not using Composer
// require("path/to/sendgrid-php/sendgrid-php.php");
$from = new SendGrid\Email("Valify Payment Received", "support@valifyit.com");
$subject = "Payment confirmation";
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
                                                 <td align="left" style="padding: 0 0 5px 25px; font-size: 18px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">
                                        You\'ve received a $'.$final_amount.' payment from '.$row['FirstName'].' '.$row['LastName'].'
                                                </td>
                                            </tr>

                                            <tr>
                                                 <td align="left" style="padding: 0 0 5px 25px; font-size: 16px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">
                                                The funds should appear in your bank account in 2-5 business days.
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
                        <a href="'.BASE_PATH.'/terms/" target="_blank" style="color: #666666; text-decoration: none;">Terms of Service</a> | <a href="'.BASE_PATH.'/privacy/" target="_blank" style="color: #666666; text-decoration: none;">Privacy</a>  | <a href="'.BASE_PATH.'/faq/" target="_blank" style="color: #666666; text-decoration: none;">FAQ</a> </td>
                       
                        
 
                   
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








// using SendGrid's PHP Library
// https://github.com/sendgrid/sendgrid-php
// If you are using Composer (recommended)
require '../../../sendgrid-php/vendor/autoload.php';
// If you are not using Composer
// require("path/to/sendgrid-php/sendgrid-php.php");
$from = new SendGrid\Email("Valify Payment Sent", "support@valifyit.com");
$subject = "Payment confirmation";
$to = new SendGrid\Email($row['FirstName'], $row['userEmail']);
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
                                                 <td align="left" style="padding: 0 0 5px 25px; font-size: 18px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">
                                                You\'ve sent a $'.$final_amount.' payment to '.$rowparticipant['FirstName'].' '.$rowparticipant['LastName'].'.
                                                </td>
                                            </tr>

                                             <tr>
                                                 <td align="left" style="padding: 0 0 5px 25px; font-size: 18px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">
                                               &nbsp;
                                                </td>
                                            </tr>


                                            <tr>
                                                 <td align="left" style="padding: 0 0 5px 25px; font-size: 18px; font-family: Helvetica, Arial, sans-serif; font-weight: bold; color: #333333;" class="padding">
                                                Here are your total charges:
                                                </td>
                                            </tr>


                                              <tr>
                                                 <td align="left" style="padding: 0 0 5px 25px; font-size: 18px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">
                                                Payment to '.$rowparticipant['FirstName'].':
                                                </td>
                                                <td align="left" style="padding: 0 0 5px 25px; font-size: 18px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">
                                                $'.$final_amount.'
                                                </td>
                                            </tr>


                                             <tr>
                                                 <td align="left" style="padding: 0 0 5px 25px; font-size: 18px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">
                                               Processing Fee:
                                                </td>
                                                <td align="left" style="padding: 0 0 5px 25px; font-size: 18px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">
                                                $'.$checkout -> fee-> processing_fee.'
                                                </td>
                                            </tr>

                                            <tr>
                                                 <td align="left" style="padding: 0 0 5px 25px; font-size: 18px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">
                                               Service Fee:
                                                </td>
                                                <td align="left" style="padding: 0 0 5px 25px; font-size: 18px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">
                                                $'.$payment_to_me_mysql.'
                                                </td>
                                            </tr>

                                             <tr>
                                                 <td align="left" style="padding: 0 0 5px 25px; font-size: 18px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">
                                               &nbsp;
                                                </td>
                                            </tr>

                                            <tr>
                                                 <td align="left" style="padding: 0 0 5px 25px; font-size: 18px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">
                                               Total Charges:
                                                </td>
                                                <td align="left" style="padding: 0 0 5px 25px; font-size: 18px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding">
                                                $'.$total.'
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
                        <a href="'.BASE_PATH.'/terms/" target="_blank" style="color: #666666; text-decoration: none;">Terms of Service</a> | <a href="'.BASE_PATH.'/privacy/" target="_blank" style="color: #666666; text-decoration: none;">Privacy</a>  | <a href="'.BASE_PATH.'/faq/" target="_blank" style="color: #666666; text-decoration: none;">FAQ</a> </td>
                       
                        
 
                   
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






$output = json_encode(array('type'=>'message', 'text' => '<div class="success">Successfully Sent Payment!</div>'));
die($output);



}


  }else{

    $output = json_encode(array('type'=>'message', 'text' => '<div class="errorXYZ">Payment already sent</div>'));
    die($output);
  }


}



?>
