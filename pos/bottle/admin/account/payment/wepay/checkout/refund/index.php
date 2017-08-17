<?php
    // WePay PHP SDK - http://git.io/mY7iQQ
    require '../../../../../wepay.php';

    // application settings
    $account_id = "1489540520"; // participant's account_id
    $client_id = $wepay_client_id;
    $client_secret = $wepay_client_secret;
    $access_token = "STAGE_dd8cb573ddb535adff60053c82d2371997e30b72b6e4e4d65e450c2453b2377e"; // participant's access_token


    // change to useProduction for live environments
    Wepay::useStaging($client_id, $client_secret);

    $wepay = new WePay($access_token);

    // create the checkout
    $response = $wepay->request('checkout/refund', array(
        'checkout_id'        => 91493942,
        'refund_reason'      => 'Want my money back'
    ));

    // display the response
    print_r($response);
?>