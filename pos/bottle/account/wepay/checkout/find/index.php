<?php
    // WePay PHP SDK - http://git.io/mY7iQQ
    require '../../../../wepay.php';

session_start();
require_once '../../../../class.customer.php';
include_once("../../../../config.php");


$customer_home = new CUSTOMER();

if(!$customer_home->is_logged_in())
{
  $customer_home->redirect('../../../../login/');
}

$stmt = $customer_home->runQuery("SELECT * FROM tbl_customer WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['customerSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);



    // application settings
    $account_id = $row['account_id']; // your app's account_id
    $client_id = 164910;
    $client_secret = "9983463efa";
    $access_token = $row['access_token']; // your app's access_token

    // change to useProduction for live environments
    Wepay::useStaging($client_id, $client_secret);

    $wepay = new WePay($access_token);

    // create the checkout
    $response = $wepay->request('checkout/find/', array(
        'account_id'        => $account_id,
        'sort_order' => 'DESC'
        //'start_time' => '2017/08/16',
        //'end_time' => '2017/08/18'
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



