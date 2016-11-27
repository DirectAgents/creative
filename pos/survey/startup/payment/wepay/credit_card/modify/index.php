<?php
    // WePay PHP SDK - http://git.io/mY7iQQ
    require '../../../wepay.php';


    // application settings
    $client_id = 131244;
    $client_secret = "5a612c797c";
    //$access_token = "STAGE_ea3a1b169b93df8ccf8c921f53a53f191ce8065430f92efba802ef6cb38c0877";

    // change to useProduction for live environments
    Wepay::useStaging($client_id, $client_secret);

    $wepay = new WePay($access_token);

    // create an account for a user
    $response = $wepay->request('credit_card/modify', array(


    'client_id' =>    131244,
    'client_secret'    => "5a612c797c",
    'credit_card_id' => 123380815,
    'auto_update' => true,
    "callback_uri" => "http://www.example.com/ipn"

    

));

    // display the response
    print_r($response);
    

?>