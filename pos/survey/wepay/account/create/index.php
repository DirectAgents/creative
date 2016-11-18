<?php

session_start();
require_once '../../../class.participant.php';
include_once("../../../config.php");

    // WePay PHP SDK - http://git.io/mY7iQQ
    require '../../wepay.php';


$participant_home = new PARTICIPANT();

if(!$participant_home->is_logged_in())
{
  $participant_home->redirect('../login.php');
}

$stmt = $participant_home->runQuery("SELECT * FROM tbl_participant WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['participantSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);



    // application settings
    $client_id = 131244;
    $client_secret = "5a612c797c";
    $access_token = $_GET['access_token'];

    // change to useProduction for live environments
    Wepay::useStaging($client_id, $client_secret);

    $wepay = new WePay($access_token);

    // create an account for a user
    $response = $wepay->request('account/create/', array(
        'name'          => 'Pauly Rossler Account Name',
        'description'   => 'A description for your account.'
    ));

    // display the response
    print_r($response);


  $update_sql = "UPDATE tbl_participant SET 
  account_id='".$response -> account_id."',
  owner_user_id='".$response -> owner_user_id."',
  access_token = '".$_GET['access_token']."'

  WHERE userID='".$_SESSION['participantSession']."'";


   mysql_query($update_sql);


   //header("Location:http://localhost/survey/participant/payment/");




?>