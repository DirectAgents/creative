<?php

session_start();
require_once '../../base_path.php';


require_once '../../class.participant.php';
require_once '../../class.startup.php';
require_once '../../config.php';
require_once '../../config.inc.php';


require '../../wepay.php';


$startup_home = new STARTUP();

if($startup_home->is_logged_in())
{
  $startup_home->logout();
}



$participant_home = new PARTICIPANT();

if(!$participant_home->is_logged_in())
{
  $participant_home->redirect('../login');
}

$stmt = $participant_home->runQuery("SELECT * FROM tbl_participant WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['participantSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);




  

?> 


<?php 


if($row['Payment_Method'] == 'Cash'){

echo "<h3>You will receive payments in cash.</h3>";

}else{


?>  




<?php if($row['account_id'] != '' && $row['Payment_Method'] == 'Bank' ) { ?>  



<?php




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



  $update_sql = mysqli_query($connecDB,"UPDATE tbl_participant SET 

  bank_account = '".$bankaccount."'

  WHERE userID='".$_SESSION['participantSession']."'");


}

    //header("Location:".$response -> uri."");
        //'address' => ['address1' => '100 Main Street','city'=>'New York','region'=>"CA",'country'=> "US",'postal_code'=> "94025"]*/

    //echo $response -> balances -> reserved_amount;

     

?>








 

   <?php if($row['bank_account'] == '' ) { ?>  


<div class="no-account-yet">
   <h3>You haven't set up a bank account yet to receive payments!<br><br>Create one <strong>below</strong><h3>


</div>




<?php

    // create the withdrawal
    $response = $wepay->request('account/get_update_uri', array(
        'account_id'    => $row['account_id'],
        'redirect_uri'  => BASE_PATH.'/participant/payment/verify/',
        'mode'          => 'iframe'
    ));

    // display the response
    //print_r($response);
//echo $response-> uri;

?>


<iframe src="<?php echo $endpoint_url; ?>/api/account_update/<?php echo $row['account_id']; ?>?iframe=1&redirect_uri=<?php echo BASE_PATH; ?>/participant/payment/verify/" frameborder="0" border="0" cellspacing="0" scrolling="no" style="border-style: none;width: 100%; height: 400px; padding:0px;" ></iframe>





   <?php } ?>


   <?php if($row['bank_account'] != '') { ?>
<h3>
    You have currently set <i><?php echo $bankaccount;?></i> to receive payments
</h3>
    <br>





<iframe src="<?php echo $endpoint_url; ?>/withdrawal_auto/edit/<?php echo $row['account_id']; ?>/US?iframe=1" frameborder="0" border="0" cellspacing="0" scrolling="no" style="border-style: none;width: 100%; height: 400px; padding:0px;" ></iframe>

   <?php  } ?>  


  <?php }else{ ?>


  <div class="no-account-yet">
   <h3>You haven't set up a bank account yet to receive payments!<h3>
</div>


<div class="wepay_btn_box">  
  <div class="wepay_btn">

<h3>Add a Bank Account</h3>
<h4>Note.: You must be at least 18 years old and must have a tax ID (EIN or SSN)</h4>

<p>&nbsp;</p>  

<a id="start_oauth3">Click here to create an Account to receive payments</a>
 
<script type="text/javascript">

WePay.set_endpoint("stage"); // stage or production

WePay.OAuth2.button_init(document.getElementById('start_oauth3'), {
    "client_id":"<?php echo $wepay_client_id; ?>",
     "scope":["manage_accounts","collect_payments","view_user","send_money","preapprove_payments"],
    //"user_name":"test user",
    //"user_email":"test@example.com",
    "redirect_uri":"<?php echo BASE_PATH; ?>/participant/payment/?verified=1",
    "top":100, // control the positioning of the popup with the top and left params
    "left":100,
    "state":"robot", // this is an optional parameter that lets you persist some state value through the flow
    "callback":function(data) {
    /** This callback gets fired after the user clicks "grant access" in the popup and the popup closes. The data object will include the code which you can pass to your server to make the /oauth2/token call **/
        //alert(data.code);
    if (data.code.length !== 0) {
      // send the data to the server
      window.location.href = "<?php echo BASE_PATH; ?>/participant/account/wepay/oauth2/token/?client_id=164910&code="+data.code+"&redirect_uri=<?php echo BASE_PATH; ?>/participant/account/wepay/&client_secret=9983463efa&code="+data.code;

    } else {
      // an error has occurred and will be in data.error
    }
  }
});

</script>

</div>

</div>

<?php  } }  ?> 
