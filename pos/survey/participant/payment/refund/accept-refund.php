<?php


session_start();
require_once '../../../base_path.php';

include("../../../config.php"); //include config file
include("../../../config.inc.php");
require_once '../../../class.startup.php';
require_once '../../../class.participant.php';




date_default_timezone_set('America/New_York');


$startup_home = new STARTUP();

if($startup_home->is_logged_in())
{
  $startup_home->logout();
}





$participant_home  = new PARTICIPANT();

if(!$participant_home ->is_logged_in())
{
  $participant_home ->redirect('../login');
}




$stmt = $participant_home->runQuery("SELECT * FROM tbl_participant WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['participantSession']));
$row_participant = $stmt->fetch(PDO::FETCH_ASSOC);


$wepay = mysql_query("SELECT * FROM wepay WHERE id = '".$_GET['id']."'");
$rowwepay = mysql_fetch_array($wepay);


/*
$stmtparticipant="SELECT * FROM tbl_participant WHERE userID='".$_GET['participantid']."' ";
$resultparticipant=mysql_query($stmtparticipant);
$rowparticipant=mysql_fetch_array($resultparticipant);
*/



 // WePay PHP SDK - http://git.io/mY7iQQ
    require '../../../wepay.php';

    // application settings
    $account_id = $row_participant['account_id']; // participant's account_id
    $client_id = $wepay_client_id;
    $client_secret = $wepay_client_secret;
    $access_token = $row_participant['access_token']; // participant's access_token

    // change to useProduction for live environments
    Wepay::useStaging($client_id, $client_secret);

    $wepay = new WePay($access_token);

    // create the checkout
     // create the checkout
    try {
    $response = $wepay->request('/checkout/refund', array(
        'checkout_id'        => $rowwepay['checkout_id'],
        'refund_reason'      => $rowwepay['refundreason']
     )
    );
} catch (WePayException $e) { // if the API call returns an error, get the error message for display later
    $error = $e->getMessage();
}

    // display the response
    //print_r($response);

if (isset($error)){
    
    //header("Location:http://localhost/survey/startup/payment/?error=".htmlspecialchars($error)."#credit-card");

 echo '<div class="response">';
   //print_r ($response);
 	echo '<div class="errorXYZ">';
   		//echo htmlspecialchars($error);
 	if(htmlspecialchars($error) =='Checkout object must be in state captured. Currently it is in state refunded'){
 		echo "Refund is already accepted.";
 	}else{
 		//echo htmlspecialchars($error);
 		echo "Sorry. Something went wrong";
 	}
 	echo "</div>";   
 echo "</div>";   

    }else{


 echo '<div class="response">';
   //print_r ($response);
  echo '<div class="success2">';
   echo 'Refund Accepted!';
  echo "</div>";	  
 echo "</div>";   	


}   


$update_sql = "UPDATE wepay SET 
  refundrequest='',
  refunded='yes'

  WHERE id='".$_GET['id']."'";


  mysql_query($update_sql);

  ?>





