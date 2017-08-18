<?php
    
    session_start();

    // WePay PHP SDK - http://git.io/mY7iQQ
    require '../../../wepay.php';
    require_once '../../../class.customer.php';

    include_once("../../../config.php");
    

$customer_home = new CUSTOMER();

if(!$customer_home->is_logged_in())
{
  $customer_home->redirect('../../../account/login');
}


$stmt = $customer_home->runQuery("SELECT * FROM wepay WHERE customer_id=:uid ORDER BY id DESC");
$stmt->execute(array(":uid"=>$_SESSION['customerSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);


$stmtcustomer = mysqli_query($connecDB,"SELECT * FROM tbl_customer WHERE account_id='".$row['account_id']."'");
$rowcustomer = mysqli_fetch_array($stmtcustomer);

    //echo $row['account_id'];

    // application settings
    $account_id = $row['account_id']; // your app's account_id
    $client_id = $wepay_client_id;
    $client_secret = $wepay_client_secret;
    $access_token = $rowcustomer['access_token']; // your app's access_token

    // change to useProduction for live environments
    Wepay::useStaging($client_id, $client_secret);

    $wepay = new WePay($access_token);

    // create the checkout
    $response = $wepay->request('checkout/', array(
        'checkout_id'        => $row['checkout_id']
    ));

    // display the response
    print_r($response);
?>


