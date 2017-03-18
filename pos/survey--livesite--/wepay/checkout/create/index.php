<?php
    // WePay PHP SDK - http://git.io/mY7iQQ
    require '../../wepay.php';


session_start();
require_once '../../../class.participant.php';
include_once("../../../config.php");


$participant_home = new PARTICIPANT();

if(!$participant_home->is_logged_in())
{
  $participant_home->redirect('../../../participant/login.php');
}

$stmt = $participant_home->runQuery("SELECT * FROM tbl_participant WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['participantSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);



    // application settings
    $account_id = $row['account_id']; // your app's account_id
    $client_id = 131244;
    $client_secret = "5a612c797c";
    $access_token = $row['access_token']; // your app's access_token

    // change to useProduction for live environments
    Wepay::useStaging($client_id, $client_secret);

    $wepay = new WePay($access_token);

    // create the checkout
    $response = $wepay->request('checkout/create', array(
        'account_id'        => $account_id,
        'amount'            => '3.95',
        'short_description' => 'Test User Payment Services rendered by freelancer',
        'type'              => 'service',
        'currency'          => 'USD'
    ));

    // display the response
    print_r($response);
?>