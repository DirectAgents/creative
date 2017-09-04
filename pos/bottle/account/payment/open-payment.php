<?php

session_start();

require_once '../../base_path.php';

include("../../config.php"); //include config file
require_once '../../class.customer.php';



$customer_home = new CUSTOMER();

if(!$customer_home->is_logged_in())
{
  $customer_home->redirect('../../login');
}

$stmt = $customer_home->runQuery("SELECT * FROM tbl_customer WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['customerSession']));
$row_customer = $stmt->fetch(PDO::FETCH_ASSOC);



if($row_customer['account_id'] != '' && $row_customer['bank_account'] != '') {  


?>


<script>
$(document).ready(function(){





$(function(){
    
    jQuery.fn.taskid = function () {
    
       var options = $.parseJSON($(this).attr('data-button'));
        
       var taskid = (options.taskid);
       var userid = (options.userid);
       //alert(options.option2);

       if(taskid !=''){

      $( "#the-container" ).load( "open-payment-selected.php?taskid="+taskid+"&userid="+userid );
    
      }

       return this;
    }

    $('button').click(function(){
        //var data='hello inside';
    
        $(this).taskid();
        $(this).userid();
    });


});



 }); 

 </script>







      

<div id="the-container">

 <h3>Open Payments</h3>




<?php

$sql=mysqli_query($connecDB,"SELECT  * FROM tbl_completed_tasks WHERE userID = '".$_SESSION['customerSession']."' AND Payment = 'N' ORDER BY id DESC");
//$result=mysql_query($sql);
//$row=mysql_fetch_array($result);

  //if username exists
if(mysqli_num_rows($sql)>0)
{


//get all records from add_delete_record table
while($row = mysqli_fetch_array($sql))
{ 

  //echo $row['ProjectID'];



?>





    <div class="col-lg-12">


 <!-- <table class="table">
    <tbody>
     

      <tr class="info">
        <td style="text-align:left"><?php echo $row['Pickup_Date']; ?></td>
        <td style="text-align:right">&nbsp;</td>
        <td style="text-align:right">&nbsp;</td>
       
      </tr>
   </table>  
-->


  <table class="table">
    <tbody>
     

       <tr>
        <td style="text-align:left" class="grey">PickUp#</td>
        <td style="text-align:right" class="grey">Date of Pickup</td>
        <td style="text-align:right" class="grey">Amount</td>
        <td style="text-align:right" class="grey">&nbsp;</td>
       
      </tr>




<?php 
$sql2=mysqli_query($connecDB,"SELECT * FROM tbl_completed_tasks WHERE userID = '".$_SESSION['customerSession']."' ORDER BY id DESC ");

while($row2 = mysqli_fetch_array($sql2)){



?>


      <tr>
        <td style="text-align:left"><?php echo $row2['taskID']; //echo $row2['id']; ?></td>
        <td style="text-align:right"><a href="<?php echo BASE_PATH; ?>/ideas/p/<?php echo $rowprojectwepay['Category']; ?>/?id=<?php echo $rowprojectwepay['ProjectID']; ?>"><?php echo date('F j, Y',strtotime($row['Pickup_Date'])); ?></a></td>
        <td style="text-align:right">$<?php echo $row2['Amount'];?></td>
        <td style="text-align:right"><button type='button' data-button='{"taskid": <?php echo $row2['taskID'];?>, "userid": <?php echo $row2['userID'];?>}'>Retrieve Payment</button>

     </td>
       
      </tr>
    
  


<?php } ?>




  </tbody>
  </table>

    </div>
  


  



  <?php } }else{?>

<div class="no-account-yet">
<p>No New Open Payments!</p>
</div>

    <?php } ?>


<?php }else{ ?>

<div class="no-account-yet">
<p><h3>You haven't set up a bank account yet to receive payments!</h3></p>

</div>






<div class="wepay_btn_box">  
  <div class="wepay_btn">

<h3>Add a Bank Account</h3>
<h4>Note.: You must be at least 18 years old and must have a tax ID (EIN or SSN)</h4>

<p>&nbsp;</p>
<a id="start_oauth2">Click here to create an Account to receive payments</a>
<p>&nbsp;</p>
<!--<h4>or</h4>
<p>&nbsp;</p>
<h4>Accept payments in <u>cash</u> if you don't qualify above </h4>
<h4>Note.: If you accept payments in cash we can't track your payment history</h4>
<p>&nbsp;</p>
<p><a href="#" id="pay-in-cash" class="wepay-widget-button">I want to accept payments in cash</a></p>-->

<input type="hidden" name="userid" value="<?php echo $_SESSION['customerSession']; ?>"/>

<div id="result"></div>

<script>
$(document).ready(function() {


$("#pay-in-cash").click(function (e) { //user clicks on button

e.preventDefault();

var proceed = true;


if(proceed) //everything looks good! proceed...
        {
            //get input field values data to be sent to server
            post_data = {
                'userid'     : $('input[name=userid]').val()

            };


 //Ajax post data to server
            $.post('save-cash-only.php', post_data, function(response){  
                if(response.type == 'error'){ //load json data from server and output message     
                    output = '<div class="error">'+response.text+'</div>';
                }else{
                    
                    output = '<div class="success">'+response.text+'</div>';
                    //reset values in all input fields
                    //$("#result").slideUp();
                }
               $("#result").hide().html(output).slideDown();
            }, 'json');
        }
    });









});
    
   


</script>

<?php require '../../wepay.php'; ?>

<script type="text/javascript">

WePay.set_endpoint("<?php echo $endpoint; ?>"); // stage or production

WePay.OAuth2.button_init(document.getElementById('start_oauth2'), {
    "client_id":"<?php echo $wepay_client_id; ?>",
     "scope":["manage_accounts","collect_payments","view_user","send_money","preapprove_payments"],
    //"user_name":"test user",
    //"user_email":"test@example.com",
    "redirect_uri": "<?php echo BASE_PATH; ?>/account/payment/",
    "top":100, // control the positioning of the popup with the top and left params
    "left":100,
    "state":"robot", // this is an optional parameter that lets you persist some state value through the flow
    "callback":function(data) {
    /** This callback gets fired after the user clicks "grant access" in the popup and the popup closes. The data object will include the code which you can pass to your server to make the /oauth2/token call **/
        //alert(data.code);
    if (data.code.length !== 0) {
      // send the data to the server
      window.location.href = "<?php echo BASE_PATH; ?>/account/wepay/oauth2/token/?client_id=<?php echo $wepay_client_id; ?>&code="+data.code+"&redirect_uri=<?php echo BASE_PATH; ?>/account/wepay/&client_secret=<?php echo $wepay_client_secret; ?>&code="+data.code;

    } else {
      // an error has occurred and will be in data.error
    }
  }
});

</script>

</div>

</div>


  <?php }  ?>


</div>




      
    




