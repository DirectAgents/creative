<?php
   
session_start();



require_once '../../../../../base_path.php';

include("../../../../../config.php"); //include config file
require_once '../../../../../class.startup.php';
require_once '../../../../../class.participant.php';



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




 // WePay PHP SDK - http://git.io/mY7iQQ
    require '../../../../../wepay.php';






$stmt = $participant_home->runQuery("SELECT * FROM tbl_startup WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['startupSession']));
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
    'redirect_uri'    => BASE_PATH."/startup/payment/",
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


 $update_sql = mysqli_query($connecDB,"UPDATE tbl_startup SET 
 code='".$_GET['code']."'

  WHERE userID='".$_SESSION['startupSession']."'");




header("Location: http://localhost/creative/pos/survey/startup/account/wepay/account/create/?user_id=".$user_id."&access_token=".$access_token_user."")

?>