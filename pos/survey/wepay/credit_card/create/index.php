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



if($_GET){

    // application settings
    $client_id = 131244;
    $client_secret = "5a612c797c";
    $access_token = "STAGE_666742d562cf4b06ac151db71833011133e011c8f98f73c5cff3ca33e5b429a6";

    // change to useProduction for live environments
    Wepay::useStaging($client_id, $client_secret);

    $wepay = new WePay($access_token);

    // create an account for a user
    $response = $wepay->request('credit_card/create', array(


    'client_id' =>    131244,
    'user_name'    => $_GET["user_name"],
    'email' => $_GET["email"],
    'cc_number'    => $_GET["cc_number"],
    'cvv'    => $_GET["cvv"],
    'expiration_month'    => $_GET["expiration_month"],
    'expiration_year'    => $_GET["expiration_year"],   
    'address' => ['address1' => $_GET["billing_address1"],'city'=>$_GET["billing_city"],'region'=>$_GET["billing_state"],'country'=>$_GET["billing_country"],'postal_code'=> $_GET["billing_zip"]]

    
    /*'client_id' =>    131244,
    'user_name'    => $_GET["user_name"],
    'email' => $_GET["email"],
    'cc_number'    => "5496198584584769",
    'cvv'    => "123",
    'expiration_month'    => 4,
    'expiration_year'    => 2020,   
    'address' => ['address1' => '100 Main Street','city'=>'New York','region'=>"CA",'country'=> "US",'postal_code'=> "94025"]*/


));

    // display the response
    print_r($response);


 $update_sql = "UPDATE tbl_startup SET 
  credit_card_id='".$response -> credit_card_id."'

  WHERE userID='".$_SESSION['startupSession']."'";


   mysql_query($update_sql);


   header("Location:http://localhost/survey/wepay/credit_card/authorize/?credit_card_id=".$response -> credit_card_id);

}
    

?>