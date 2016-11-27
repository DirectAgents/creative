<?php

session_start();
require_once '../../base_path.php';


require_once '../../class.participant.php';
require_once '../../class.startup.php';
require_once '../../config.php';
require_once '../../config.inc.php';


$startup_home = new STARTUP();

if($startup_home->is_logged_in())
{
  $startup_home->logout();
}



$participant_home = new PARTICIPANT();

if(!$participant_home->is_logged_in())
{
  $participant_home->redirect('../login.php');
}

$stmt = $participant_home->runQuery("SELECT * FROM tbl_participant WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['participantSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);




  

?> 



<?php if($row['account_id'] != '') { ?>  



<?php

require '../../wepay.php';


    // application settings
    $client_id = $wepay_client_id;
    $client_secret = $wepay_client_secret;
    $access_token = $row['access_token'];

    // change to useProduction for live environments
    Wepay::useStaging($client_id, $client_secret);

    $wepay = new WePay($access_token);

    // create an account for a user
      try {
    $response = $wepay->request('account', array(

  


    'account_id' =>    $row['account_id']

    
    


) );
} catch (WePayException $e) { // if the API call returns an error, get the error message for display later
    $error = $e->getMessage();
}


if (isset($error)){
echo htmlspecialchars($error);
echo". Please refresh page and try again.";
exit();
    }else{
    // display the response
    //print_r($response);
    $bankaccount = $response->balances[0]->withdrawal_bank_name;

}

    //header("Location:".$response -> uri."");
        //'address' => ['address1' => '100 Main Street','city'=>'New York','region'=>"CA",'country'=> "US",'postal_code'=> "94025"]*/

    //echo $response -> balances -> reserved_amount;

     

?>








 

   <?php if($bankaccount == '' ) { ?>  


<div class="no-account-yet">
   <h3>You haven't set up a bank account yet to receive payments!<br><br>Create one <strong>below</strong><h3>


</div>




<?php

    // create the withdrawal
    $response = $wepay->request('account/get_update_uri', array(
        'account_id'    => $row['account_id'],
        'redirect_uri'  => 'http://localhost/survey/participant/payment/',
        'mode'          => 'iframe'
    ));

    // display the response
    //print_r($response);
//echo $response-> uri;

?>


<iframe src="https://stage.wepay.com/api/account_update/72134051?iframe=1&redirect_uri=http%3A%2F%2Flocalhost%2Fsurvey%2Fparticipant%2Fpayment%2F" frameborder="0" border="0" cellspacing="0" scrolling="no" style="border-style: none;width: 100%; height: 400px; padding:0px;" ></iframe>





   <?php } ?>


   <?php if($bankaccount != '') { ?>
<h3>
    You have currently set <i><?php echo $bankaccount;?></i> to receive payments
</h3>
    <br>



<iframe src="https://stage.wepay.com/api/account_add_bank/<?php echo $row['account_id']; ?>/1927f8bc/US?iframe=1" width="100%" height="400" frameBorder="0" ></iframe>


   <?php  } ?>  


  <?php }else{ ?>


  <div class="no-account-yet">
   <h3>You haven't created an account yet to receive payments!<h3>
</div>


<div class="wepay_btn_box">  
  <div class="wepay_btn">

<a id="start_oauth3">Click here to create an Account to receive payments</a>
 
<script type="text/javascript">

WePay.set_endpoint("stage"); // stage or production

WePay.OAuth2.button_init(document.getElementById('start_oauth3'), {
    "client_id":"164910",
     "scope":["manage_accounts","collect_payments","view_user","send_money","preapprove_payments"],
    //"user_name":"test user",
    //"user_email":"test@example.com",
    "redirect_uri":"http://localhost/survey/participant/payment?verified=1",
    "top":100, // control the positioning of the popup with the top and left params
    "left":100,
    "state":"robot", // this is an optional parameter that lets you persist some state value through the flow
    "callback":function(data) {
    /** This callback gets fired after the user clicks "grant access" in the popup and the popup closes. The data object will include the code which you can pass to your server to make the /oauth2/token call **/
        //alert(data.code);
    if (data.code.length !== 0) {
      // send the data to the server
      window.location.href = "http://localhost/survey/participant/account/wepay/oauth2/token/?client_id=164910&code="+data.code+"&redirect_uri=http://localhost/survey/participant/account/wepay/&client_secret=9983463efa&code="+data.code;

    } else {
      // an error has occurred and will be in data.error
    }
  }
});

</script>

</div>

</div>

<?php  }  ?> 
