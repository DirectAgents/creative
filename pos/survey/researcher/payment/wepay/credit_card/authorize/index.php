<?php
session_start();
require_once '../../../../../base_path.php';

include("../../../../../config.php"); //include config file
require_once '../../../../../class.researcher.php';
require_once '../../../../../class.participant.php';


// WePay PHP SDK - http://git.io/mY7iQQ
    require '../../../../../wepay.php';

    

$participant_home = new PARTICIPANT();

if($participant_home->is_logged_in())
{
  $participant_home->logout();
}



$researcher_home = new RESEARCHER();

if(!$researcher_home->is_logged_in())
{
  $researcher_home->redirect('../../../login');
}



$stmt = $researcher_home->runQuery("SELECT * FROM tbl_researcher WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['researcherSession']));
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


    $update_sql = "UPDATE tbl_researcher SET 
  cc_last_four='".$response -> last_four."',
  cc_name='".$response -> credit_card_name."'

  WHERE userID='".$_SESSION['researcherSession']."'";


   mysql_query($update_sql);


   header("Location:http://localhost/survey/researcher/payment/");


    

?>