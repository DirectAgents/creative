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

$update_sql = mysqli_query($connecDB,"UPDATE tbl_startup SET 
  account_id='',
  owner_user_id='',
  access_token='',
  code = '',
  billing_address_one='',
  billing_city='',
  billing_state='',
  billing_country='',
  credit_card_id='',
  cc_last_four='',
  cc_name=''
  

  WHERE userID='".$_SESSION['startupSession']."'");


$sql=mysqli_query($connecDB,"SELECT * FROM wepay WHERE startup_id = '".$_SESSION['startupSession']."' ORDER BY id DESC ");
while($row = mysqli_fetch_array($sql)){

$sql3=mysqli_query($connecDB,"DELETE FROM wepay WHERE id = '".$row['id']."'");

}


//header("Location:../../../");


?>