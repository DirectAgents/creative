<?php
session_start();
require_once '../../../../../base_path.php';

include("../../../../../config.php"); //include config file
require_once '../../../../../class.startup.php';
require_once '../../../../../class.participant.php';


// WePay PHP SDK - http://git.io/mY7iQQ
    require '../../../../../wepay.php';

    

$participant_home = new PARTICIPANT();

if($participant_home->is_logged_in())
{
  $participant_home->logout();
}



$startup_home = new STARTUP();

if(!$startup_home->is_logged_in())
{
  $startup_home->redirect('../../../login');
}



$stmt = $startup_home->runQuery("SELECT * FROM tbl_startup WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['startupSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);


    // application settings
    $client_id = $wepay_client_id;
    $client_secret = $wepay_client_secret;
    $access_token = $row['access_token'];

    // change to useProduction for live environments
    Wepay::useStaging($client_id, $client_secret);

    $wepay = new WePay($access_token);

    // create an account for a user
    $response = $wepay->request('credit_card/authorize', array(


    'client_id' =>    $wepay_client_id,
    'client_secret'    => $wepay_client_secret,
    'credit_card_id' => (int)$_GET["credit_card_id"]
    
));

    // display the response
    print_r($response);


    $update_sql = mysqli_query($connecDB,"UPDATE tbl_startup SET 
  cc_last_four='".$response -> last_four."',
  cc_name='".$response -> credit_card_name."'

  WHERE userID='".$_SESSION['startupSession']."'");




   header("Location:http://localhost/creative/pos/survey/startup/payment/?p=credit-card");


    

?>