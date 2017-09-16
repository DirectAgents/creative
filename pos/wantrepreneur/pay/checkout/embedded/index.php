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


$startup_home = new STARTUP();

if(!$startup_home->is_logged_in())
{
  $startup_home->redirect('../../../startup/login.php');
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
    $access_token = 'STAGE_7e8df0f6456207755e2cc04f6ed9054fa9bdd4e899269a6e2780252b428de431'; // your app's access_token

    // change to useProduction for live environments
    Wepay::useStaging($client_id, $client_secret);

    $wepay = new WePay($access_token);

    // create the checkout
    $response = $wepay->request('checkout/create', array(
        'account_id'        => $account_id,
        'amount'            => '4.95',
        'short_description' => 'Services rendered by freelancer',
        'type'              => 'service',
        'currency'          => 'USD',
        'payment_method' => ['type' => 'credit_card', 'credit_card' => ['id' => 3805118309]]





    ));

    // display the response
    print_r($response);

    $create_time  = $response->create_time; 
     

    //echo date("F Y", $create_time);

if (date("F", $create_time) == "January") { $order_by = '1'; };
if (date("F", $create_time) == "February") { $order_by = '2'; };
if (date("F", $create_time) == "March") { $order_by = '3'; };
if (date("F", $create_time) == "April") { $order_by = '4'; };
if (date("F", $create_time) == "May") { $order_by = '5'; };
if (date("F", $create_time) == "June") { $order_by = '6'; };
if (date("F", $create_time) == "July") { $order_by = '7'; };
if (date("F", $create_time) == "August") { $order_by = '8'; };
if (date("F", $create_time) == "September") { $order_by = '9'; };
if (date("F", $create_time) == "October") { $order_by = '10'; };
if (date("F", $create_time) == "November") { $order_by = '11'; };
if (date("F", $create_time) == "December") { $order_by = '12'; };


    $insert_sql = "INSERT INTO wepay(startup_id, order_by, account_id, checkout_id, checkout_find_amount, checkout_find_date) VALUES(
    '".$_SESSION['startupSession']."','".$order_by."','".$account_id."','".$response -> checkout_id."','".$response -> amount."','".date("F Y", $create_time)."')";
mysql_query($insert_sql);    



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
            WePay.iframe_checkout("checkout_div", "https://stage.wepay.com/api/checkout/<?php echo $response -> checkout_id; ?>/<?php echo $response -> account_id; ?>");
            </script>
        <?php endif; ?>
    
    </body>
    
</html>

-->



