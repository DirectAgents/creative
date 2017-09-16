<?php


session_start();
require_once '../../../class.startup.php';
include_once("../../../config.php");


require '../../../wepay.php';


$startup_home = new STARTUP();

if(!$startup_home->is_logged_in())
{
  $startup_home->redirect('../../../startup/login');
}

$stmt = $startup_home->runQuery("SELECT * FROM tbl_startup WHERE userID='".$_SESSION['startupSession']."'");
$stmt->execute(array(":uid"=>$_SESSION['startupSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);


    // application settings
    $client_id = $wepay_client_id;
    $client_secret = $wepay_client_secret;
    $access_token_me = $wepay_access_token;

/** 
 * Initialize the WePay SDK object 
 */

Wepay::useStaging($client_id, $client_secret);
$wepay = new WePay($access_token_me);

/**
 * Make the API request to get the checkout_uri
 * 
 */
try {
    $checkout = $wepay->request('/checkout/create', array(
            'account_id' => $wepay_account_id, // ID of my account
            'amount' => 23, // dollar amount you want to charge the user
            'short_description' => "Payment for test", // a short description of what the payment is for
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


//continue here
   $insert_sql = mysqli_query($connecDB,"INSERT INTO wepay(my_checkout_id) VALUES('".$checkout -> checkout_id."')");


}

?>