<?php

session_start();
include("../../config.php"); //include config file
require_once '../../class.participant.php';



$participant_home = new PARTICIPANT();

if(!$participant_home->is_logged_in())
{
  $participant_home->redirect('../login');
}

$stmt = $participant_home->runQuery("SELECT * FROM tbl_participant WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['participantSession']));
$row_participant = $stmt->fetch(PDO::FETCH_ASSOC);

if($row_participant['account_id'] != '') {  


?>



<?php

  // WePay PHP SDK - http://git.io/mY7iQQ
    require '../../wepay.php';


 // application settings
    $account_id = $row_participant['account_id']; // your participant's account_id
    $client_id = $wepay_client_id;
    $client_secret = $wepay_client_secret;
    $access_token = $row_participant['access_token']; // your participant's access_token

    // change to useProduction for live environments
    Wepay::useStaging($client_id, $client_secret);

    $wepay = new WePay($access_token);

    // create the checkout
  

       try {
    $checkout = $wepay->request('/checkout/find', array(


        'account_id'        => $row_participant['account_id'],
        'sort_order' => 'DESC'
        //'start_time' => '2016/11/04',
        //'end_time' => '2016/11/06'
        //'state' => 'new'
      )
    );
} catch (WePayException $e) { // if the API call returns an error, get the error message for display later
    $error = $e->getMessage();
}

if (isset($error)){
    echo htmlspecialchars($error);
    exit();
    //header("Location:http://localhost/creative/pos/survey/startup/payment/?error=".htmlspecialchars($error)."#credit-card");
    }else{

print_r($checkout);

  ////////Total Amount////////

$sum = 0;
//$refund_amount_sum = 0;

 foreach ($checkout as $responsefinal) {
        $gross     = $responsefinal->gross - $responsefinal->refund->amount_refunded; 
        $fee = $responsefinal->fee->processing_fee;
        $sum+= $gross - $fee;

        


        //$refund     = $responsefinal->refund->amount_refunded;
        //$refund_amount_sum+= $refund;

    }


   


}
    


?> 


        
      


        <h2 class="no-mobile">
         Total amount earned
        </h2>

  <fieldset>

<section data-group="payment" style="">
    
      <div class="note notforheader mobile-block">
        
          <h2><?php echo "$"; echo $sum; ?></h2>
        
        
      </div>
    
<p>&nbsp;</p>

 <h3>Transactions</h3>




<?php

$sql=mysqli_query($connecDB,"SELECT DISTINCT(checkout_find_date) FROM wepay WHERE account_id = '".$row_participant['account_id']."' AND refunded = '' ORDER BY order_by DESC ");
//$result=mysql_query($sql);
//$row=mysql_fetch_array($result);

  //if username exists
if(mysqli_num_rows($sql)>0)
{


//get all records from add_delete_record table
while($row = mysqli_fetch_array($sql))
{ 



?>




 <div class="therow">
    <div class="col-lg-12">
     



  <table class="table">
    <tbody>
      <tr class="info">
        <td colspan="2" style="text-align:left"><?php echo $row['checkout_find_date']; ?></td>
        
      </tr>




<?php 
$sql2=mysqli_query($connecDB,"SELECT * FROM wepay WHERE account_id = '".$row_participant['account_id']."' AND checkout_find_date = '".$row['checkout_find_date']."' AND refunded = '' ORDER BY id DESC ");

while($row2 = mysqli_fetch_array($sql2)){

  echo $row2['id'];

$sql3=mysqli_query($connecDB,"SELECT * FROM tbl_startup WHERE userID = '".$row2['startup_id']."'");
$row3 = mysqli_fetch_array($sql3);





?>


      <tr>
        <td style="text-align:left"><?php echo $row3['FirstName'].' '.$row3['LastName']; ?></td>
        <td style="text-align:right">$<?php echo $row2['checkout_find_amount']; //echo $row2['id']; ?></td>
       
      </tr>
    
  


<?php } ?>




  </tbody>
  </table>
</div>
      
    </div>
  


  



  <?php } }else{?>

<div class="no-account-yet">
<p>No Transactions so far!</p>
</div>

    <?php } ?>


<?php }else{ ?>

<div class="no-account-yet">
<p><h3>You havent created an account yet to receive payments!</h3></p>

</div>






<div class="wepay_btn_box">  
  <div class="wepay_btn">

<a id="start_oauth2">Click here to create an Account to receive payments</a>
 
<script type="text/javascript">

WePay.set_endpoint("stage"); // stage or production

WePay.OAuth2.button_init(document.getElementById('start_oauth2'), {
    "client_id":"164910",
     "scope":["manage_accounts","collect_payments","view_user","send_money","preapprove_payments"],
    //"user_name":"test user",
    //"user_email":"test@example.com",
    "redirect_uri":"http://localhost/creative/pos/survey/participant/payment?verified=1",
    "top":100, // control the positioning of the popup with the top and left params
    "left":100,
    "state":"robot", // this is an optional parameter that lets you persist some state value through the flow
    "callback":function(data) {
    /** This callback gets fired after the user clicks "grant access" in the popup and the popup closes. The data object will include the code which you can pass to your server to make the /oauth2/token call **/
        //alert(data.code);
    if (data.code.length !== 0) {
      // send the data to the server
      window.location.href = "http://localhost/creative/pos/survey/participant/account/wepay/oauth2/token/?client_id=164910&code="+data.code+"&redirect_uri=http://localhost/creative/pos/survey/participant/account/wepay/&client_secret=9983463efa&code="+data.code;

    } else {
      // an error has occurred and will be in data.error
    }
  }
});

</script>

</div>

</div>


  <?php } ?>







      
          




