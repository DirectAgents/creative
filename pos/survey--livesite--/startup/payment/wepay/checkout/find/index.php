<?php
   
session_start();
require_once '../../../../../base_path.php';

include("../../../../../config.php"); //include config file
require_once '../../../../../class.startup.php';
require_once '../../../../../class.participant.php';


 // WePay PHP SDK - http://git.io/mY7iQQ
    require '../../../../../wepay.php';


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




$stmt = $participant_home->runQuery("SELECT * FROM tbl_startup WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['startupSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);


    // application settings
    $account_id = $row['account_id']; // startup's account id
    $client_id =  $wepay_client_id;
    $client_secret = $wepay_client_secret;
    $access_token = $row['access_token']; // startup's access_token

    // change to useProduction for live environments
    Wepay::useStaging($client_id, $client_secret);

    $wepay = new WePay($access_token);

    // find the checkout
    $response = $wepay->request('checkout/find/', array(
        'account_id'        => 1489540520,
        'sort_order' => 'DESC',
        'start_time' => '2016/11/06',
        'end_time' => '2016/12/06'
        //'state' => 'new'
    ));

    // display the response
    print_r($response);

//echo $response[0]['checkout_id'];


////////Total Amount////////

$sum = 0;

 foreach ($response as $responsefinal) {
        $amount         = $responsefinal->amount; 
        $sum+= $amount;
    }

echo $sum;



////////Month////////

 foreach ($response as $responsefinal) {
        $time         = $responsefinal->create_time; 
        //echo $time;

        //echo date("g:i a F j, Y ", $time);

        //echo date("F Y", $time);
    }


    
      

?>



