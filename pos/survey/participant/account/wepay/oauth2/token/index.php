<?php
    // WePay PHP SDK - http://git.io/mY7iQQ
    require '../../../../../wepay.php';

session_start();
require_once '../../../../../class.participant.php';
include_once("../../../../../config.php");


$participant_home = new PARTICIPANT();

if(!$participant_home->is_logged_in())
{
  $participant_home->redirect('../../../../login.php');
}

$stmt = $participant_home->runQuery("SELECT * FROM tbl_participant WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['participantSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);


    // application settings
    $client_id = $wepay_client_id;
    $client_secret = $wepay_client_secret;
    $access_token = $wepay_access_token;

    // change to useProduction for live environments
    Wepay::useStaging($client_id, $client_secret);

    $wepay = new WePay($access_token);

    // create an account for a user
    $response = $wepay->request('oauth2/token', array(
    'client_id'    => $wepay_client_id,
    'client_secret'    => $wepay_client_secret,
    'redirect_uri'    => "http://localhost/survey/participant/payment?verified=1",
    'code'    => $_GET['code'],
));



    // display the response
    print_r($response);
    //echo "user_id: ";
    $user_id = $response -> user_id;
    //echo $user_id;
    //echo "<br>";
    //echo "access_token: ";
    $access_token_user = $response -> access_token;
    //echo $access_token;


 $update_sql = "UPDATE tbl_participant SET 
 code='".$_GET['code']."'

  WHERE userID='".$_SESSION['participantSession']."'";


   mysql_query($update_sql);


header("Location: http://localhost/survey/participant/account/wepay/account/create/?user_id=".$user_id."&access_token=".$access_token_user."")

?>