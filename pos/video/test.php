<?php

session_start();
require ("facebook-sdk-v5/autoload.php");


if(isset($_GET['state'])) {
    $_SESSION['FBRLH_state'] = $_GET['state'];
}

/*Step 1: Enter Credentials*/
$fb = new \Facebook\Facebook([
    'app_id' => '1797081013903216',
    'app_secret' => 'f30f4c99e31c934f65b515c1f777940f',
    'default_graph_version' => 'v2.2',
    //'default_access_token' => '{access-token}', // optional
]);


/*Step 2 Create the url*/
if(empty($access_token)) {

    echo "<a href='{$fb->getRedirectLoginHelper()->getLoginUrl("http://localhost/creative/pos/video/test.php")}'>Login with Facebook </a>";
}

/*Step 3 : Get Access Token*/
$access_token = $fb->getRedirectLoginHelper()->getAccessToken();


/*Step 4: Get the graph user*/
if(isset($access_token)) {


    try {
        $response = $fb->get('/me',$access_token);

        $fb_user = $response->getGraphUser();

        echo  $fb_user->getName();




        //  var_dump($fb_user);
    } catch (\Facebook\Exceptions\FacebookResponseException $e) {
        echo  'Graph returned an error: ' . $e->getMessage();
    } catch (\Facebook\Exceptions\FacebookSDKException $e) {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
    }

}


?>