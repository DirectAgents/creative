<?php
    // WePay PHP SDK - http://git.io/mY7iQQ
    require '../../wepay.php';

session_start();
require_once '../../../../../class.participant.php';
include_once("../../../../../config.php");


$participant_home = new PARTICIPANT();

if(!$participant_home->is_logged_in())
{
  $participant_home->redirect('../../../../login/');
}

$stmt = $participant_home->runQuery("SELECT * FROM tbl_participant WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['participantSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);


    // application settings
    $client_id = 131244;
    $client_secret = "5a612c797c";
    $access_token = "STAGE_666742d562cf4b06ac151db71833011133e011c8f98f73c5cff3ca33e5b429a6";

    // change to useProduction for live environments
    Wepay::useStaging($client_id, $client_secret);

    $wepay = new WePay($access_token);

    // create an account for a user
    $response = $wepay->request('withdrawal/find', array(
    'account_id'    => $row['account_id']
));





    // display the response
    print_r($response);
   

?>