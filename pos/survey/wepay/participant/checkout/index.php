<?php


    session_start();

require_once '../../../base_path.php';

include("../../../config.php"); //include config file
require_once '../../../class.participant.php';
require_once '../../../class.startup.php';



$startup_home = new STARTUP();

if($startup_home->is_logged_in())
{
  $startup_home->logout();
}



$participant_home = new PARTICIPANT();

if(!$participant_home->is_logged_in())
{
  $participant_home->redirect('../../../login');
}


$stmt = $participant_home->runQuery("SELECT * FROM tbl_participant WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['participantSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);




    // WePay PHP SDK - http://git.io/mY7iQQ
    require '../../../wepay.php';

    // application settings
    $account_id = $row['account_id']; // your app's account_id
    $client_id = $wepay_client_id;
    $client_secret = $wepay_client_secret;
    $access_token = $row['access_token'];

    // change to useProduction for live environments
    Wepay::useStaging($client_id, $client_secret);

    $wepay = new WePay($access_token);

    // create the checkout
    $response = $wepay->request('checkout/', array(
        'checkout_id'        => 1739028422
    ));

    // display the response
    print_r($response);
?>