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
  //echo $row['credit_card_id'];


 // WePay PHP SDK - http://git.io/mY7iQQ
    require '../../../../wepay.php';

    // application settings
    $account_id = $row['account_id']; // startup's account id
    $client_id =  $wepay_client_id;
    $client_secret = $wepay_client_secret;
    $access_token = $row['access_token']; // startup's access_token

    // change to useProduction for live environments
    Wepay::useStaging($client_id, $client_secret);

    $wepay = new WePay($access_token);

    // create the checkout
    $response = $wepay->request('credit_card', array(
        'client_id'        => $client_id,
        'client_secret'        => $client_secret,
        'credit_card_id'        => (int)$row['credit_card_id']


    ));

    // display the response
    print_r($response);




?>



