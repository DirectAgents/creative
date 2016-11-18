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
  $researcher_home->redirect('../login');
}






$stmt = $participant_home->runQuery("SELECT * FROM tbl_participant WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['participantSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);



    // application settings
    $client_id = $wepay_client_id;
    $client_secret = $wepay_client_secret;
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

if($row['account_id'] == ''){

  $update_sql = "UPDATE tbl_researcher SET 
  account_id='".$response -> account_id."',
  owner_user_id='".$response -> owner_user_id."',
  access_token = '".$_GET['access_token']."'

  WHERE userID='".$_SESSION['researcherSession']."'";


   mysql_query($update_sql);


}else{

  $update_sql = "UPDATE tbl_researcher SET 
  owner_user_id='".$response -> owner_user_id."',
  access_token = '".$_GET['access_token']."'

  WHERE userID='".$_SESSION['researcherSession']."'";

  mysql_query($update_sql);


}





   header("Location:http://localhost/survey/researcher/payment/");




?>