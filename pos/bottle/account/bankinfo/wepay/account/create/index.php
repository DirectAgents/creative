<?php

session_start();
require_once '../../../../../class.customer.php';
include_once("../../../../../config.php");

    // WePay PHP SDK - http://git.io/mY7iQQ
    require '../../../../../wepay.php';


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
    $access_token = $_GET['access_token'];

    // change to useProduction for live environments
    Wepay::useStaging($client_id, $client_secret);

    $wepay = new WePay($access_token);

    // create an account for a user
    $response = $wepay->request('account/create/', array(
        'name'          => 'Account of '. $row['FirstName'].' '.$row['LastName'],
        'description'   => 'A description for your account.'
    ));

    // display the response
    print_r($response);

if($row['account_id'] == ''){

  $update_sql = mysqli_query($connecDB,"UPDATE tbl_customer SET 
  account_id='".$response -> account_id."',
  owner_user_id='".$response -> owner_user_id."',
  access_token = '".$_GET['access_token']."'

  WHERE userID='".$_SESSION['customerSession']."'");




}else{

  $update_sql = mysqli_query($connecDB,"UPDATE tbl_customer SET 
  owner_user_id='".$response -> owner_user_id."',
  access_token = '".$_GET['access_token']."'

  WHERE userID='".$_SESSION['customerSession']."'");



}





   header("Location:http://localhost/creative/pos/bottle/account/bankinfo/?p=bankaccount");




?>