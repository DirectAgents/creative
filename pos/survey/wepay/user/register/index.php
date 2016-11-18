<?php

// WePay PHP SDK - http://git.io/mY7iQQ

 require '../../../wepay.php';

    // application settings
    $account_id = 1261957888; // your app's account_id
    $client_id = 131244;
    $client_secret = "5a612c797c";
    $access_token = "STAGE_666742d562cf4b06ac151db71833011133e011c8f98f73c5cff3ca33e5b429a6"; // your app's access_token

    // change to useProduction for live environments
    Wepay::useStaging($client_id, $client_secret);

    $wepay = new WePay($access_token);

// register new merchant
$response = $wepay->request('user/register/', array(
    'client_id'        => 131244,
    'client_secret'    => "5a612c797c",
    'email'            => 'brendanimak@gmail.com',
    'scope'            => 'manage_accounts,collect_payments,view_user,preapprove_payments,send_money',
    'first_name'       => 'Franz',
    'last_name'        => 'Peter',
    'original_ip'      => '74.125.224.84',
    'original_device'  => 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_6;
                             en-US) AppleWebKit/534.13 (KHTML, like Gecko)
                             Chrome/9.0.597.102 Safari/534.13',
    "tos_acceptance_time" => 1209600
));




// display the response
print_r($response);

?>