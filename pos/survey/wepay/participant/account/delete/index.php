<?php

session_start();

require_once '../../../../base_path.php';

include("../../../../config.php"); //include config file
require_once '../../../../class.participant.php';
require_once '../../../../class.startup.php';



$startup_home = new STARTUP();

if($startup_home->is_logged_in())
{
  $startup_home->logout();
}



$participant_home = new PARTICIPANT();

if(!$participant_home->is_logged_in())
{
  $participant_home->redirect('../../../login');
}


$stmt = $participant_home->runQuery("SELECT * FROM tbl_participant WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['participantSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);





//echo $row['access_token'];

    require '../../../../wepay.php';


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

$update_sql = mysqli_query($connecDB,"UPDATE tbl_participant SET 
  account_id='',
  owner_user_id='',
  access_token='',
  code = '',
  bank_account=''

  WHERE userID='".$_SESSION['participantSession']."'");

  
  $sql=mysqli_query($connecDB,"SELECT * FROM wepay WHERE participant_id = '".$_SESSION['participantSession']."' ORDER BY id DESC ");
while($row = mysqli_fetch_array($sql)){

$sql3=mysqli_query($connecDB,"DELETE FROM wepay WHERE id = '".$row['id']."'");

}

//header("Location:../../../");


?>