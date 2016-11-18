<?php
    // WePay PHP SDK - http://git.io/mY7iQQ
    require '../wepay.php';

    // application settings
    $account_id = 518305355; // your app's account_id
    $client_id = 131244;
    $client_secret = "5a612c797c";
    $access_token = "STAGE_ea3a1b169b93df8ccf8c921f53a53f191ce8065430f92efba802ef6cb38c0877"; // your app's access_token

    // change to useProduction for live environments
    Wepay::useStaging($client_id, $client_secret);

    $wepay = new WePay($access_token);

    // create the checkout
    $response = $wepay->request('checkout/create', array(
        'account_id'        => $account_id,
        'amount'            => '3.95',
        'short_description' => 'Test User Payment Services rendered by freelancer',
        'type'              => 'service',
        'currency'          => 'USD'
    ));

    // display the response
    print_r($response);
?>