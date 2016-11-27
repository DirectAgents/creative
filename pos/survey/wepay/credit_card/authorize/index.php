<?php
   session_start();
require_once '../../../class.startup.php';
include_once("../../../config.php");

    // WePay PHP SDK - http://git.io/mY7iQQ
    require '../../wepay.php';


$startup_home = new STARTUP();

if(!$startup_home->is_logged_in())
{
  $startup_home->redirect('../../../login.php');
}

$stmt = $startup_home->runQuery("SELECT * FROM tbl_startup WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['startupSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);


    // application settings
    $client_id = 131244;
    $client_secret = "5a612c797c";
    $access_token = "STAGE_666742d562cf4b06ac151db71833011133e011c8f98f73c5cff3ca33e5b429a6";

    // change to useProduction for live environments
    Wepay::useStaging($client_id, $client_secret);

    $wepay = new WePay($access_token);

    // create an account for a user
    $response = $wepay->request('credit_card/authorize', array(


    'client_id' =>    131244,
    'client_secret'    => "5a612c797c",
    'credit_card_id' => (int)$_GET["credit_card_id"]
    
));

    // display the response
    print_r($response);


    $update_sql = "UPDATE tbl_startup SET 
  cc_last_four='".$response -> last_four."',
  cc_name='".$response -> credit_card_name."'

  WHERE userID='".$_SESSION['startupSession']."'";


   mysql_query($update_sql);


   header("Location:http://localhost/survey/startup/payment/");


    

?>