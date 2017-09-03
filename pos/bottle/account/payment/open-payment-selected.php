<?php

session_start();

require_once '../../base_path.php';

include("../../config.php"); //include config file
require_once '../../class.customer.php';


$sql=mysqli_query($connecDB,"SELECT * FROM tbl_completed_tasks WHERE taskID = '".$_GET['taskid']."'");
$row = mysqli_fetch_array($sql);


$sqladmin=mysqli_query($connecDB,"SELECT * FROM tbl_admin");
$rowadmin = mysqli_fetch_array($sqladmin);


?>


<script>

$(document).ready(function(){



        //alert(homeless_donation);

        /*if (amount < 1 ) {

         $("#amount"+<?php echo $row2['userID']; ?>).css('border-color','red');  //change border color to red  
            proceed = false;

        }*/

$(".accept").click(function() { 

      var proceed = true;


        var id = $('input[name=id]').val();
        var userid = $('input[name=userid]').val();
        var adminid = $('input[name=adminid]').val();
        var taskid = $('input[name=taskid').val();
        var amount = $('input[name=amount').val();
        var homeless_donation = $('input[name=homeless_donation').val();
        var homeless_id = $('input[name=homeless_id').val();

        //alert(homeless_donation);

        //everything looks good! proceed...
        if(proceed) 
        {

      $(".result-no-date").hide(); 
      $(".result-accept").show().slideDown();
      $(".cancel-accept").hide();
      $(".close-accept").show();



          $( ".processing" ).show();
            //data to be sent to server
            post_data = {'userid':userid,'adminid':adminid,'taskid':taskid,'amount':amount,'homeless_donation':homeless_donation, 'homeless_id':homeless_id};
            
            //Ajax post data to server
            $.post('make-payment.php', post_data, function(response){  
              //alert("yes"); 

                //load json data from server and output message     
        if(response.type == 'error')
        {
          output = '<div class="errorXYZ">'+response.text+'</div>';
        }else{
          
            
            output = '<div class="success">Yo</div>';


          //reset values in all input fields
          $('#contact_form input').val(''); 
          $('#contact_form textarea').val(''); 
        }
        
        $(".cancel-accept").hide();
        $(".result-accept").show();
        $(".close-accept").show();
        $("#result-accept-"+response.text).hide().slideDown();
            }, 'json');
      
        }



 });
 
 });     

</script>




<!-- Start Accept -->

<div id="slide" class="well slide">
  <div class="result-accept">
    <div id="result-accept">Payment was sent successfully!</div>
  </div>




<h4>Retrieve Payment</h4>
<p>&nbsp;</p>


<input type="hidden" name="the_date" id="the_date" value=""/>


<input type="text" name="userid" id="userid" value="<?php echo $_GET['userid']; ?>">
<input type="text" name="taskid" id="taskid" value="<?php echo $_GET['taskid']; ?>">
<input type="text" name="adminid" id="adminid" value="<?php echo $rowadmin['userID']; ?>">
<input type="text" name="amount" id="amount" value="<?php echo $row['Amount']; ?>">


<script>

$(document).ready(function(){

 $(".preview-payment").click(function() {  

        var id = $('input[name=id]').val();
        var userid = $('input[name=userid]').val();
        var adminid = $('input[name=adminid]').val();
        var taskid = $('input[name=taskid').val();
        var amount = $('input[name=amount').val();
        var homeless_donation = $('input[name=homeless_donation').val();
        var homeless_id = $('input[name=homeless_id').val();

        //alert(homeless_id);


        

        //alert(homeless_donation);
        //alert(amount);

        $("#amount-credited").text(amount);
        $("#homeless_donation_amount").text(homeless_donation);
        

        var payout_to_customer = amount - homeless_donation;

        $("#payout-to-customer").text(payout_to_customer);

        if (homeless_donation-amount > 0 ){
          $("#error-calculation").html('<div class="result-no-date"><div style="text-align:center;font-size:18px; padding:10px; width:100%; background:#c31e23; color:#fff; margin-bottom:15px;">Please lower your donation amount!</div></div>');
        }



 });
 
 });


</script>




<div id="error-calculation"></div>


<h3>Payout explained:</h3>

<div style="float:left; width:100%">
<p><h4><div style="float:left">Amount credited: $</div><div id="amount-credited" style="float:left"></div></h4></p>
</div>


<div style="float:left; width:100%">
<p><h4><div style="float:left">Your donation to the homeless:  $</div><div id="homeless_donation_amount" style="float:left"></div></h4>

<div id="homeless_donation_id" style="float:left"></div>


</p>
</div>

<div style="float:left; width:100%">
<p><h4><div style="float:left">Total payout to you:  $</div><div id="payout-to-customer" style="float:left"></div></h4></p>
</div>



<div class="popupoverlay-btn">
  <div class="cancel-accept">
    <button class="slide_close cancel">Cancel</button>
    <button class="accept btn-delete">Submit</button>
</div>

<div class="popupoverlay-btn">
  <div class="close-accept">
    <button class="slide_close cancel">Close</button>
</div>
</div>

</div>
</div>

<!-- End Accept -->





<div id="the-container">

<h2>We have collected <strong>$<?php echo $row['Amount']; ?></strong> from your recycles</h2>

<h3>Please choose a homeless person you want to donate to <a href="<?php echo BASE_PATH; ?>/homeless" target="_blank">Click Here</a></h3>

Enter amount you want to donate to the homeless person you have selected<br>
<br>

<p>$<input type="text" id="homeless_donation" name="homeless_donation" placeholder="e.g 3.00"/></p>

<p><input type="text" id="homeless_id" name="homeless_id" placeholder="link"/></p>




<p><a href="#" class="create-one-btn slide_open preview-payment">Preview Payment</a></p>


</div>


<script>
$(document).ready(function () {

    $('#slide').popup({
        focusdelay: 400,
        outline: true,
        vertical: 'top'
    });

});
</script>


