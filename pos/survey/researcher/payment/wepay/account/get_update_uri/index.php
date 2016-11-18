<?php

session_start();
require_once '../../../../../base_path.php';


require_once '../../../../../class.participant.php';
require_once '../../../../../class.researcher.php';
require_once '../../../../../config.php';
require_once '../../../../../config.inc.php';


$researcher_home = new RESEARCHER();

if($researcher_home->is_logged_in())
{
  $researcher_home->logout();
}



$participant_home = new PARTICIPANT();

if(!$participant_home->is_logged_in())
{
  $participant_home->redirect('../login.php');
}

$stmt = $participant_home->runQuery("SELECT * FROM tbl_participant WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['participantSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

    require '../../../wepay.php';


    // application settings
    $client_id = $wepay_client_id;
    $client_secret = $wepay_client_secret;
    $access_token = $row['access_token'];

    // change to useProduction for live environments
    Wepay::useStaging($client_id, $client_secret);

    $wepay = new WePay($access_token);

    // create an account for a user
    $response = $wepay->request('account/get_update_uri', array(


    'account_id' =>    $row['account_id'],
    'mode'    => 'iframe'

    
    


));

    // display the response
    print_r($response);

    header("Location:".$response -> uri."");



?>