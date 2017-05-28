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


$startup_home = new STARTUP();

if(!$startup_home->is_logged_in())
{
  $startup_home->redirect('../../../../login.php');
}

$stmt = $startup_home->runQuery("SELECT * FROM tbl_startup WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['startupSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);




//echo $checkout -> checkout_id;



 // WePay PHP SDK - http://git.io/mY7iQQ
    require '../../wepay.php';

    // application settings
    $account_id = 1490191444; // your app's account_id
    $client_id = 131244;
    $client_secret = "5a612c797c";
    $access_token = 'STAGE_82d35f3842b7060f36ba20a47376b476d44f377d476935436fec8be77f548232'; // your app's access_token

    // change to useProduction for live environments
    Wepay::useStaging($client_id, $client_secret);

    $wepay = new WePay($access_token);

    // create the checkout
    $response = $wepay->request('checkout/create', array(
        'account_id'        => $account_id,
        'amount'            => '24.95',
        'short_description' => 'Services rendered by freelancer',
        'type'              => 'service',
        'currency'          => 'USD'
    ));

    // display the response
    print_r($response);



?>


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
            WePay.iframe_checkout("checkout_div", "https://stage.wepay.com/api/checkout/<?php echo $response -> checkout_id; ?>/<?php echo $response -> account_id; ?>");
            </script>
        <?php endif; ?>
    
    </body>
    
</html>





