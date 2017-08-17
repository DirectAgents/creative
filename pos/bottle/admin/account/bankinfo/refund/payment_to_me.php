<?php


session_start();
require_once '../../../base_path.php';

include("../../../config.php"); //include config file
include("../../../config.inc.php");


$wepay = mysqli_query($connecDB,"SELECT * FROM wepay WHERE id = '".$_GET['id']."'");
$rowwepay = mysqli_fetch_array($wepay);



 // WePay PHP SDK - http://git.io/mY7iQQ
    require '../../../wepay.php';

    // application settings
    $account_id = $wepay_account_id; // participant's account_id
    $client_id = $wepay_client_id;
    $client_secret = $wepay_client_secret;
    $access_token = $wepay_access_token; // participant's access_token

    // change to useProduction for live environments
    Wepay::useStaging($client_id, $client_secret);

    $wepay = new WePay($access_token);

    // create the checkout
     // create the checkout
    try {
    $response = $wepay->request('/checkout/refund', array(
        'checkout_id'        => $rowwepay['my_checkout_id'],
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


}   





  ?>







