<?php
    // WePay PHP SDK - http://git.io/mY7iQQ
    require '../../../../../wepay.php';

    // application settings
    $account_id = "1489540520";  // id of the account where the money is sent to
    $client_id = $wepay_client_id;
    $client_secret = $wepay_client_secret;
    $access_token = "STAGE_dd8cb573ddb535adff60053c82d2371997e30b72b6e4e4d65e450c2453b2377e"; // access_token of the account where the money is sent to

    // change to useProduction for live environments
    Wepay::useStaging($client_id, $client_secret);

    $wepay = new WePay($access_token);

    // create the checkout
    $response = $wepay->request('checkout/', array(
        'checkout_id'        => 91493942
    ));

    // display the response
    print_r($response);
?>