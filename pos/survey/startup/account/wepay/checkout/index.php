<?php
    
    session_start();

    // WePay PHP SDK - http://git.io/mY7iQQ
    require '../../../../wepay.php';
    require_once '../../../../class.startup.php';
    


    $startup_home = new STARTUP();


    $stmt = $startup_home->runQuery("SELECT * FROM tbl_startup WHERE userID=:uid");
    $stmt->execute(array(":uid"=>$_SESSION['startupSession']));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    //echo $row['account_id'];

    // application settings
    $account_id = $row['account_id']; // your app's account_id
    $client_id = $wepay_client_id;
    $client_secret = $wepay_client_secret;
    $access_token = $row['access_token']; // your app's access_token

    // change to useProduction for live environments
    Wepay::useStaging($client_id, $client_secret);

    $wepay = new WePay($access_token);

    // create the checkout
    $response = $wepay->request('checkout/', array(
        'checkout_id'        => 1959413640
    ));

    // display the response
    print_r($response);
?>


