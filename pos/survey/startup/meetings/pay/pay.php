<?php

/**
 * This PHP script helps you do the iframe checkout
 *
 */


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

$payment_to_me = 1;

}


///If Payout is more than $7 than charge 15% for service fee////

if($rowproject['Pay'] >= '7'){

$payment_to_me = $rowproject['Pay'] * 0.15;

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
    $access_token_me = 'STAGE_3157a9551b8c9c076f9a3631d1af99785eeafaa1674ff9cebbe0ca8887846d69';

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


//continue here
   $insert_sql = mysqli_query($connecDB,"INSERT INTO wepay(ProjectID, startup_id, participant_id, order_by, account_id, checkout_id, checkout_find_date, checkout_find_amount, service_fee, fees, total) VALUES('".$_POST['projectid']."','".$_SESSION['startupSession']."','".$_POST['participantid']."', '".$order_by."' ,'".$checkout -> account_id."', '".$checkout -> checkout_id."', '".$checkout_find_date."','".$checkout -> amount."', '".$payment_to_me."',
   '".$checkout -> fee-> processing_fee."', '".$checkout -> gross."')");




try {
    $checkout = $wepay_me->request('/checkout/create', array(
            'account_id' => $wepay_account_id, // ID of my account
            'amount' => $payment_to_me, // dollar amount you want to charge the user
            'short_description' => "Payment from Cirl to me", // a short description of what the payment is for
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



$insert_sql = mysqli_query($connecDB,"INSERT INTO  tbl_meeting_archived(userID, startupID, ProjectID, Viewed_by_Startup, Viewed_by_Participant, Date_of_Meeting, Final_Time, Location, Payment, Met, Date_Posted, Time_Posted) VALUES('".$rowpayment['userID']."','".$rowpayment['startupID']."',
  '".$rowpayment['ProjectID']."', 'No', 'No', '".$rowpayment['Date_of_Meeting']."', '".$rowpayment['Final_Time']."','".$rowpayment['Location']."','Yes','".$rowpayment['Met']."','".$the_date."','".$the_time."')");


$sql=mysqli_query($connecDB,"DELETE FROM tbl_meeting_recent WHERE ProjectID = '".$_POST['projectid']."' AND userID = '".$_POST['participantid']."'");




    $output = json_encode(array('type'=>'message', 'text' => '<div class="success">Successfully Sent Payment!</div>'));
    die($output);







}


  }else{

    $output = json_encode(array('type'=>'message', 'text' => '<div class="errorXYZ">Payment already sent</div>'));
    die($output);
  }


}



?>
