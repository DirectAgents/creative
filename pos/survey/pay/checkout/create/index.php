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
require_once '../../../../../class.researcher.php';
include_once("../../../../../config.php");


$researcher_home = new RESEARCHER();

if(!$researcher_home->is_logged_in())
{
  $researcher_home->redirect('../../../../login.php');
}

$stmt = $researcher_home->runQuery("SELECT * FROM tbl_researcher WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['researcherSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);



    // application settings
    $account_id = 1640383212; // your app's account_id
    $client_id = 131244;
    $client_secret = "5a612c797c";
    $access_token = 'STAGE_b396fde5d89bcab9fb8afff440752c149cfd2365a68b21bbf5a1b736be3017be'; // your app's access_token

/** 
 * Initialize the WePay SDK object 
 */
require '../../wepay.php';
Wepay::useStaging($client_id, $client_secret);
$wepay = new WePay($access_token);

/**
 * Make the API request to get the checkout_uri
 * 
 */
try {
    $checkout = $wepay->request('/checkout/create', array(
            'account_id' => $account_id, // ID of the account that you want the money to go to
            'amount' => 140, // dollar amount you want to charge the user
            'short_description' => "this is a test payment", // a short description of what the payment is for
            'type' => "service", // the type of the payment - choose from GOODS SERVICE DONATION or PERSONAL
            'currency'          => 'USD',
            'payment_method' => ['type' => ‘credit_card’, [ 'credit_card' => ['id' => 3951836993]]]
            //'payment_method' => ['type' => 'credit_card', 'id' => 3805118309] 

           
        )
    );
} catch (WePayException $e) { // if the API call returns an error, get the error message for display later
    $error = $e->getMessage();
}


print_r ($checkout);

//echo $checkout -> checkout_id;



?>
<!--
<html>
    <head>
    </head>
    
    <body>
        
        <h1>Checkout:</h1>
        
        <p>The user will checkout here:</p>
        
        <?php if (isset($error)): ?>
            <h2 style="color:red">ERROR: <?php echo htmlspecialchars($error); ?></h2>
        <?php else: ?>
            <div id="checkout_div"></div>
        
            <script type="text/javascript" src="https://stage.wepay.com/js/iframe.wepay.js">
            </script>
            
            <script type="text/javascript">
            WePay.iframe_checkout("checkout_div", "https://stage.wepay.com/api/checkout/<?php echo $checkout -> checkout_id; ?>/<?php echo $checkout -> account_id; ?>");
            </script>
        <?php endif; ?>
    
    </body>
    
</html>
-->




