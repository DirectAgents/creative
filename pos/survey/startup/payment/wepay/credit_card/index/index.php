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
require_once '../../../../class.startup.php';
include_once("../../../../config.php");


$startup_home = new STARTUP();

if(!$startup_home->is_logged_in())
{
  $startup_home->redirect('../../../login.php');
}

$stmt = $startup_home->runQuery("SELECT * FROM tbl_startup WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['startupSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);




//echo $checkout -> checkout_id;



 // WePay PHP SDK - http://git.io/mY7iQQ
    require '../wepay.php';

    // application settings
    $account_id = 1261957888; // your app's account_id
    $client_id = 131244;
    $client_secret = "5a612c797c";
    $access_token = 'STAGE_666742d562cf4b06ac151db71833011133e011c8f98f73c5cff3ca33e5b429a6'; // your app's access_token

    // change to useProduction for live environments
    Wepay::useStaging($client_id, $client_secret);

    $wepay = new WePay($access_token);

    // create the checkout
    $response = $wepay->request('credit_card', array(
        'client_id'        => $client_id,
        'client_secret'        => $client_secret,
        'credit_card_id'        => 3805118309


    ));

    // display the response
    print_r($response);




?>



