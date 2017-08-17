<?php
    // WePay PHP SDK - http://git.io/mY7iQQ
    require '../../../../../wepay.php';

session_start();
require_once '../../../../../class.customer.php';
include_once("../../../../../config.php");

require_once '../../../../../base_path.php';


$customer_home = new CUSTOMER();

if(!$customer_home->is_logged_in())
{
  $customer_home->redirect('../../login');
}


$stmt = $customer_home->runQuery("SELECT * FROM tbl_customer WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['customerSession']));
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
    'redirect_uri'    => BASE_PATH."/account/bankinfo/",
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


 $update_sql = mysqli_query($connecDB,"UPDATE tbl_customer SET 
 code='".$_GET['code']."'

  WHERE userID='".$_SESSION['customerSession']."'");




header("Location: http://localhost/creative/pos/bottle/account/bankinfo/wepay/account/create/?user_id=".$user_id."&access_token=".$access_token_user."")

?>