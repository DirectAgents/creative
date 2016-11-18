<?php

session_start();
require_once '../../../class.participant.php';
include_once("../../../config.php");

    // WePay PHP SDK - http://git.io/mY7iQQ
    require '../../wepay.php';


$participant_home = new PARTICIPANT();

if(!$participant_home->is_logged_in())
{
  $participant_home->redirect('../login.php');
}

$stmt = $participant_home->runQuery("SELECT * FROM tbl_participant WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['participantSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

    // application settings
    $client_id = 131244;
    $client_secret = "5a612c797c";
    $access_token = $row['access_token'];

    // change to useProduction for live environments
    Wepay::useStaging($client_id, $client_secret);

    $wepay = new WePay($access_token);

    // create an account for a user
    $response = $wepay->request('account/get_update_uri', array(
        'account_id'          => $row['account_id']
        //'mode'   => 'iframe'
    ));

    // display the response
    print_r($response);

    header("Location:".$response -> uri."");
?>
<!--
<style>

a.verify-badge img#verify-image-payment{display:none !important;}

</style>

<html>
    <head>
    </head>
    
    <body>
        
        <h1>Bank Account:</h1>
        
        <p>The user will checkout here:</p>
        
        <?php //if (isset($error)): ?>
            <h2 style="color:red">ERROR: <?php echo htmlspecialchars($error); ?></h2>
        <?php //else: ?>
            <div id="checkout_div"></div>
        
            <script type="text/javascript" src="https://stage.wepay.com/js/iframe.wepay.js">
            </script>
            
            <script type="text/javascript">
            WePay.iframe_checkout("checkout_div", "https://stage.wepay.com/api/account_update/1091306901?iframe=1");
            </script>
        <?php //endif; ?>
    
    </body>
    
</html>-->