<?php
    // WePay PHP SDK - http://git.io/mY7iQQ
    require '../../../wepay.php';


    // application settings
    $client_id = 131244;
    $client_secret = "5a612c797c";
    $access_token = "STAGE_a23eabbeaca77edee4e5e1753e4cbe6534483df17cf16a3e1e7159476859fadc";

    // change to useProduction for live environments
    Wepay::useStaging($client_id, $client_secret);

    $wepay = new WePay($access_token);

    // create an account for a user
    $response = $wepay->request('user/send_confirmation/', array(
    'email_message'    => 'Welcome to my <strong>application</strong>'
));



    // display the response
    print_r($response);
?>