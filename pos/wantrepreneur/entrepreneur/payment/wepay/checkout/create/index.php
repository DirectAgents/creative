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
require_once '../../../../../class.startup.php';
include_once("../../../../../config.php");

require '../../../../../wepay.php';


date_default_timezone_set('America/New_York');


$startup_home = new STARTUP();

if(!$startup_home->is_logged_in())
{
  $startup_home->redirect('../../../../login');
}

$stmt = $startup_home->runQuery("SELECT * FROM tbl_startup WHERE userID='".$_GET['startupid']."'");
$stmt->execute(array(":uid"=>$_GET['startupid']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);


$stmtparticipant="SELECT * FROM tbl_participant WHERE userID='".$_GET['participantid']."' ";
$resultparticipant=mysql_query($stmtparticipant);
$rowparticipant=mysql_fetch_array($resultparticipant);



//echo $rowparticipant['FirstName'];

//exit();


$stmtproject="SELECT * FROM tbl_startup_project WHERE startupID='".$_GET['startupid']."' AND ProjectID = '".$_GET['projectid']."' ";
$resultproject=mysql_query($stmtproject);
$rowproject=mysql_fetch_array($resultproject);



$payamount = $rowproject['Pay'] * 2.9 / 100 + 0.30;


$payamount_final = $rowproject['Pay'] + 1 ;

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

/** 
 * Initialize the WePay SDK object 
 */

Wepay::useStaging($client_id, $client_secret);
$wepay = new WePay($access_token);

/**
 * Make the API request to get the checkout_uri
 * 
 */
try {
    $checkout = $wepay->request('/checkout/create', array(
            'account_id' => $account_id, // ID of the account that you want the money to go to
            'amount' => $payamount_final, // dollar amount you want to charge the user
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
   
echo '<div id="receipt">';
   print_r ($checkout);
   echo "</div>";




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
   $insert_sql = "INSERT INTO wepay(ProjectID, startup_id, participant_id, order_by, account_id, checkout_id, checkout_find_date, checkout_find_amount, fees, total) VALUES('".$_GET['projectid']."','".$_GET['startupid']."','".$_GET['participantid']."', '".$order_by."' ,'".$checkout -> account_id."', '".$checkout -> checkout_id."', '".$checkout_find_date."','".$checkout -> gross."',
   '".$checkout -> fee-> processing_fee."', '".$checkout -> gross."')";
mysql_query($insert_sql);   


}


$update_sql = "UPDATE tbl_project_request SET 
  Payment=''

  WHERE ProjectID='".$_GET['projectid']."' AND userID='".$_GET['participantid']."'";


  mysql_query($update_sql);






?>
