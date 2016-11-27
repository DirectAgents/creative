<?php

session_start();

require_once '../../../../../base_path.php';

include("../../../../../config.php"); //include config file
require_once '../../../../../class.participant.php';
require_once '../../../../../class.startup.php';



$startup_home = new STARTUP();

if(!$startup_home->is_logged_in())
{
  $startup_home->redirect('../../../../login');
}

$stmt = $startup_home->runQuery("SELECT * FROM tbl_startup WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['startupSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);





    require '../../../../../wepay.php';


    // application settings
    $client_id = $wepay_client_id;
    $client_secret = $wepay_client_secret;
    $access_token = $row['access_token'];

    // change to useProduction for live environments
    Wepay::useStaging($client_id, $client_secret);

    $wepay = new WePay($access_token);

    // create an account for a user
    $response = $wepay->request('account/delete', array(


    'account_id' =>    $row['account_id']

    
    


));

    // display the response
    print_r($response);

    //header("Location:".$response -> uri."");

$update_sql = "UPDATE tbl_startup SET 
  account_id='',
  owner_user_id='',
  access_token='',
  code = ''

  WHERE userID='".$_SESSION['startupSession']."'";

mysql_query($update_sql);


//header("Location:../../../");


?>